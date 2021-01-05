<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\Portfolio;
use App\Models\Coins;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
        $datas = Portfolio::orderBy('id')->get();
        
        return Datatables::of($datas)
            ->addColumn('start_date', function(Portfolio $data) {
                return substr($data->created_at, 0, 10);
            }) 
            ->addColumn('end_date', function(Portfolio $data) {
                return substr($data->end_date, 0, 10);
            }) 
            ->addColumn('username', function(Portfolio $data) {
                return $data->user->name;
            }) 
            ->addColumn('action', function(Portfolio $data) {
                return '<div class="action-list"><a href="' . route('admin-portfolio-show',$data->id) . '" > <i class="fas fa-eye"></i> Details</a></div>';
            }) 
            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('admin.portfolio.index');
    }

    public function show($id)
    {
        if(!Portfolio::where('id',$id)->exists())
        {
            return redirect()->route('admin.dashboard')->with('unsuccess',__('Sorry the page does not exist.'));
        }
        $data = Portfolio::findOrFail($id);
        $coin_list = Coins::get()->toArray();
        $coin_list = array_combine(array_column($coin_list, 'sterm'), array_column($coin_list, 'price'));
        return view('admin.portfolio.show',compact('data', 'coin_list'));
    }
}