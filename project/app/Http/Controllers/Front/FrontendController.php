<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Auth;
use Session;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\User;
use App\Models\Coins;
use App\Models\Portfolio;
use App\Models\Notification;

class FrontendController extends Controller
{
    public function __construct()
    {
    }

	public function index(Request $request)
	{
	    return view('front.index');
	}

    public function login(Request $request)
    {
        return view('front.login');
    }

    public function loginSubmit(Request $request)
    {
        $rules = [
            'email'   => 'required|email',
            'password' => 'required'
        ];

        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
            Session::flash('message', 'Input Correct Data!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }
    
        Session::flash('message', 'Credentials Doesn\'t Match !'); 
        Session::flash('alert-class', 'alert-danger'); 
        return back();    
    }

    public function register(Request $request)
    {
        return view('front.register');
    }
    
    public function registerSubmit(Request $request)
    {
        $rules = [
            'email'   => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];

        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
            Session::flash('message', 'Input Correct Data!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        }

        $user = new User;
        $input = $request->all();        
        $input['password'] = bcrypt($request['password']);
        $user->fill($input)->save();

        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->save();
        Auth::guard('web')->login($user); 
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function cron_job()
    {
        $this->update_portfolio_status();
        $this->update_coin_price();
        //$this->update_coin_list();
    }

    public function update_portfolio_status()
    {
        $pending_portfolios = Portfolio::where('status', '=', '0')->get();
        foreach ($pending_portfolios as $portfolio) {
            $com_date = date("Y-m-d H:i:s", time() - 300);
            if($com_date >= $portfolio->created_at) {
                $portfolio->status = 1;
                $portfolio->save();
            }
        }

        $active_portfolios = Portfolio::where('status', '=', '1')->get();
        foreach ($active_portfolios as $portfolio) {
            $com_date = date("Y-m-d H:i:s");
            if($com_date > $portfolio->end_date) {
                $portfolio->status = 2;
                $portfolio->cbalance = 0;
                foreach ($portfolio->activities as $activity) {
                    $portfolio->cbalance += $activity->amount * $activity->coin->price;
                }
                $portfolio->save();

                $portfolio->user->balance += ($portfolio->cbalance > $portfolio->sbalance ? $portfolio->cbalance : $portfolio->sbalance);
                $portfolio->user->save();
            }
        }
    }
 
    public function update_coin_list()
    {
        set_time_limit(500);

        for($i = 1; $i < 5; $i++) 
        {
            $coin_list = $this->call_api('coins/markets?vs_currency=usd&order=market_cap_desc&per_page=250&page='.$i.'&sparkline=false');
            foreach ($coin_list as $key => $coin) {
                if(Coins::where('cid', '=', $coin['id'])->first() == NULL)
                {
                    $coin_obj = new Coins();
                    $coin_obj->cid = $coin["id"];
                    $coin_obj->sterm = $coin["symbol"];
                    $coin_obj->lterm = $coin["name"];
                    $coin_obj->bio = '';
                    $coin_obj->image = $coin["image"];
                    $coin_obj->price = $coin["current_price"] ?: 0;
                    $coin_obj->price_24_camount = $coin["price_change_24h"] ?: 0;
                    $coin_obj->price_24_cpercent = $coin["price_change_percentage_24h"] ?: 0;
                    $coin_obj->save();
                }
            }
        }
    }

    public function update_coin_price()
    {
        set_time_limit(500);

        for($i = 1; $i < 6; $i++) 
        {
            $coin_list = $this->call_api('coins/markets?vs_currency=usd&order=market_cap_desc&per_page=250&page='.$i.'&sparkline=false');
            foreach ($coin_list as $key => $coin) {
                $coin_obj = Coins::where('cid', '=', $coin['id'])->first();
                if($coin_obj != NULL)
                {
                    $coin_obj->price = $coin["current_price"] ?: 0;
                    $coin_obj->price_24_camount = $coin["price_change_24h"] ?: 0;
                    $coin_obj->price_24_cpercent = $coin["price_change_percentage_24h"] ?: 0;
                    $coin_obj->save();
                }
            }
        }

        $portfolios = Portfolio::where('status', '!=', '2')->get();
        foreach ($portfolios as $portfolio) {
            $portfolio->cbalance = 0;
            foreach ($portfolio->activities as $activity) {
                $portfolio->cbalance += $activity->amount * $activity->coin->price;
            }
            $portfolio->save();
        }
    }

    private function call_api($request)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.coingecko.com/api/v3/' . $request);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-type: application/json"
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        
        $response = curl_exec($ch);
        curl_close($ch);

        $info = json_decode($response, TRUE);

        if ($info == NULL)
            return NULL;
        return $info;
    }
}
