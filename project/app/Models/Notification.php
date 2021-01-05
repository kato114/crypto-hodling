<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function order()
    {
    	return $this->belongsTo('App\Models\Order')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\User','vendor_id')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
    }

    public function conversation()
    {
        return $this->belongsTo('App\Models\Conversation')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
    }

    public static function countRegistration()
    {
        return Notification::where('user_id','!=',null)->where('is_read','=',0)->orderBy('id','desc')->get()->count();
    }

    public static function countOrder()
    {
        return Notification::where('order_id','!=',null)->where('is_read','=',0)->orderBy('id','desc')->get()->count();
    }

    public static function countProduct()
    {
        return Notification::where('product_id','!=',null)->where('is_read','=',0)->orderBy('id','desc')->get()->count();
    }

    public static function countConversation()
    {
        return Notification::where('conversation_id','!=',null)->where('is_read','=',0)->orderBy('id','desc')->get()->count();
    }

}
