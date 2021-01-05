<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function user_notf_count()
    {
        $data = Notification::where('user_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    } 

    public function user_notf_clear()
    {
        $data = Notification::where('user_id','!=',null);
        $data->delete();        
    } 

    public function user_notf_show()
    {
        $datas = Notification::where('user_id','!=',null)->latest('id')->get();
        if($datas->count() > 0){
          foreach($datas as $data){
            $data->is_read = 1;
            $data->update();
          }
        }       
        return view('admin.notification.register',compact('datas'));           
    } 
}
