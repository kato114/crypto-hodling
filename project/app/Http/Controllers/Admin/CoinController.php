<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Coins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class CoinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Coins::orderBy('id','asc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('image', function(Coins $data) {
                                return '<img src="'.$data->image.'" width="20" /> ' . $data->cid;
                            })
                            ->addColumn('price', function(Coins $data) {
                                return '$ ' . $data->price;
                            })
                            ->addColumn('status', function(Coins $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-coin-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><<option data-val="0" value="'. route('admin-coin-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->rawColumns(['image', 'status', 'action'])
                            ->toJson();//--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.coin.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.coin.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        $data = new Coins;
        $data->sterm = $request->get('sterm');
        $data->lterm = $request->get('lterm');
        $data->bio = $request->get('bio');
        $data->price = 99999;
        $data->save();

        $msg = 'New Data Added Successfully.';
        return response()->json($msg);      
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Coins::findOrFail($id);
        return view('admin.coin.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        $data = Coins::findOrFail($id);
        $data->sterm = $request->get('sterm');
        $data->lterm = $request->get('lterm');
        $data->bio = $request->get('bio');
        $data->save();
        //--- Logic Section Ends

        //--- Redirect Section          
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);    
        //--- Redirect Section Ends  
    }

    //*** GET Request
    public function destroy($id)
    {
        $data = Coins::findOrFail($id);
        $data->delete();
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
    }

    public function status($id1,$id2)
    {
        $data = Coins::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }
}
