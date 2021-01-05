<?php

namespace App\Http\Controllers\Dashboard;

use App\Classes\GeniusMailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use Auth;
use Session;
use Validator;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Portfolio;
use App\Models\Coins;
use App\Models\Activity;
use App\Models\Follower;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $data = array();
        $data["coin_list"] = Coins::get();
        
        $data["pbalance"] = Portfolio::select(DB::raw('IFNULL(SUM(cbalance), 0) as cbalance '), DB::raw('IFNULL(SUM(sbalance), 0) as sbalance'))
                ->where('user_id', '=', Auth::user()->id)
                ->where('status', '!=', 2)
                ->first();
        $data["tbalance"] = array(
            'cbalance' => $data['pbalance']['cbalance'] + Auth::user()->balance, 
            'sbalance' => $data['pbalance']['sbalance'] + Auth::user()->balance);

        $data["portfolio_list"] = Portfolio::where('user_id', '=', Auth::user()->id)
            ->where('status', '!=', 2)
            ->orderby('created_at', 'desc')
            ->get();

        return view('dashboard.index', $data);
    }

    public function hodl()
    {
        $portfolio = NULL;
        if(request('pid') != NULL) {
            $portfolio = Portfolio::where('id', '=', request('pid'))
                ->where('user_id', '=', Auth::user()->id)
                ->where('status', '=', 0)->first();
        }

        $data = array();
        $data["coin_list"] = Coins::get();
        $data["portfolio"] = $portfolio;

        return view('dashboard.hodl', $data);
    }

    public function add_hodl()
    {
        $pid = request('pid');
        if($pid != 0) {
            $portfolio = Portfolio::where('id', '=', request('pid'))
                ->where('user_id', '=', Auth::user()->id)
                ->where('status', '=', 0)->first();

            if($portfolio == NULL)
                return back();

            Auth::user()->balance = Auth::user()->balance + $portfolio->sbalance;
            Auth::user()->save();

            Activity::where('portfolio_id', '=', $portfolio->id)->delete();
            $portfolio->delete();
        }


        $added_coin_list = json_decode(request("activity"));

        $portfolio = new Portfolio();
        $portfolio->user_id = Auth::user()->id;
        $portfolio->name = request("name");
        $portfolio->sbalance = $portfolio->cbalance = 0;
        $portfolio->period = request("duration");
        $portfolio->end_date = date("Y-m-d H:i:s", time() + request("duration") * 24 * 60 * 60);
        $portfolio->save();

        foreach ($added_coin_list as $key => $added_coin) {

            $activity = new Activity();
            $portfolio->delete();
            $activity->portfolio_id = $portfolio->id;
            $activity->type = $added_coin->type;
            $activity->amount = $added_coin->amount;
            $activity->price = $added_coin->price;
            $activity->save();

            $portfolio->sbalance += $activity->amount * $activity->price;
        }

        $portfolio->cbalance = $portfolio->sbalance;
        $portfolio->save();

        Auth::user()->balance = Auth::user()->balance - $portfolio->sbalance;
        Auth::user()->save();

        Session::flash('message', 'Portfolio will be locked soon. If you want, edit in 5 mins.'); 
        Session::flash('alert-class', 'alert-success'); 

        return redirect()->route('dashboard');
    }

    public function charts() 
    {
        return view('dashboard.charts');
    }
    
    public function settings() 
    {
        return view('dashboard.settings');
    }
    
    public function portfolio() 
    {
        $data = array();
        $data["top_wins"] = Portfolio::select('user_id', DB::raw('SUM(sbalance) as sbalance'), DB::raw('SUM(cbalance) as cbalance'), DB::raw('SUM(cbalance - sbalance) as diff'))
            ->where('end_date', '>=', date("Y-m-d h:i:s"))
            ->groupby('user_id')
            ->orderby('diff', 'desc')->get();

        $data["portfolio_list"] = Portfolio::select('user_id', 'name', 'sbalance', 'cbalance', 'period', DB::raw('cbalance - sbalance as cha'), DB::raw('(cbalance - sbalance) / sbalance * 100 as percent'))
            ->where('end_date', '>=', date("Y-m-d h:i:s"))
            ->orderby('percent', 'desc')->get();

        return view('dashboard.portfolio', $data);
    }
    
    public function activity() 
    {
        $coin_list = Coins::get()->toArray();
        $data = array();
        $data["activity_list"] = Activity::orderby('created_at', 'desc')->get();
        $data["coin_list"] = array_combine(array_column($coin_list, 'sterm'), array_column($coin_list, 'price'));
        return view('dashboard.activity', $data);
    }
    
    public function profile($id) 
    {
        $data = array();
        $data["user"] = User::where('id', '=', $id)->first();

        $data["pbalance"] = Portfolio::select(DB::raw('IFNULL(SUM(cbalance), 0) as cbalance '), DB::raw('IFNULL(SUM(sbalance), 0) as sbalance'))
                ->where('user_id', '=', $data["user"]->id)
                ->where('status', '!=', 2)
                ->first();
        $data["tbalance"] = array(
            'cbalance' => $data['pbalance']['cbalance'] + $data["user"]->balance, 
            'sbalance' => $data['pbalance']['sbalance'] + $data["user"]->balance);

        $data["portfolio_list"] = Portfolio::where('user_id', '=', $data["user"]->id)
            ->where('status', '!=', 2)
            ->orderby('created_at', 'desc')
            ->get();

        $data["follow_status"] = Follower::where('user_id', '=', $data["user"]->id)->where('follower_id', '=', $id)->first() == NULL ? false : true;

        return view('dashboard.profile', $data);
    }

    public function update_profile(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:127'],
            'firstname' => ['required', 'string', 'max:127'],
            'lastname' => ['required', 'string', 'max:127'],
            'email' => ['required', 'email', 'max:127', Rule::unique('users')->ignore($user->id)],
            'location' => ['string', 'max:127', 'nullable'],
            'phonenumber' => ['string', 'max:127', 'nullable'],
            'bio' => ['string', 'max:255', 'nullable'],
            'facebook' => ['string', 'max:255', 'nullable'],
            'twitter' => ['string', 'max:255', 'nullable'],
            'dribbble' => ['string', 'max:255', 'nullable'],
        ]);

        $user->fill($data);
        $user->save();

        Session::flash('message', 'Profile is updated successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }

    public function update_profile_image(User $user, Request $request)
    {
        if ($file = $request->file('photo')) {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/users/',$name);
            if($user->profile_photo_path != null)
            {
                if (file_exists(public_path().'/assets/images/users/'.$user->profile_photo_path)) {
                    unlink(public_path().'/assets/images/users/'.$user->profile_photo_path);
                }
            }            
            $user->profile_photo_path = $name;
            $user->save();

            Session::flash('message', 'Profile image is updated successfully!'); 
            Session::flash('alert-class', 'alert-success'); 
        }
        
        return back();
    }

    public function update_follow_status(User $user)
    {
        $follow_status = Follower::where('user_id', '=', Auth::user()->id)->where('follower_id', '=', $user->id)->first();
        if($follow_status == NULL)
        {
            $follow = new Follower();
            $follow->user_id = Auth::user()->id;
            $follow->follower_id = $user->id;
            $follow->save();
        } else {
            $follow_status->delete();
        }

        return back();
    }
}
