<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
        $datas = User::orderBy('id')->get();
        
        return Datatables::of($datas)
            ->addColumn('action', function(User $data) {
                return '<div class="action-list"><a href="' . route('admin-user-show',$data->id) . '" > <i class="fas fa-eye"></i> Details</a><a href="javascript:;" data-href="' . route('admin-user-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            }) 
            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function image()
    {  
        return view('admin.generalsetting.user_image');
    }

    public function show($id)
    {
        if(!User::where('id',$id)->exists())
        {
            return redirect()->route('admin.dashboard')->with('unsuccess',__('Sorry the page does not exist.'));
        }
        $data = User::findOrFail($id);
        return view('admin.user.show',compact('data'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->photo == null){
            $user->delete();
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);      
        }

        if (file_exists(public_path().'/assets/images/users/'.$user->photo)) {
            unlink(public_path().'/assets/images/users/'.$user->photo);
        }

        $user->delete();
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
    }
}