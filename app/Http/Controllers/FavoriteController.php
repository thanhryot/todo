<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FavoriteController extends Controller
{
    public function index(){
    	return view('frontend_v1.pages.favorite', ['favorites' => $this->getToRedis()]);
    }


    public function setToRedis($user_id ,$item){
		Redis::set("favorite:$user_id:$item", $item);

		return redirect()->route('favorite.index');
    }


    public function getToRedis(){
    	$user_id = auth()->id();
    	$keys = Redis::command('keys', ["*favorite:$user_id*"]);
    	
    	if(sizeof($keys) > 0){
    		return Redis::command('mget', $keys );
    	}

    	return [];
	    
    }

    public function clear(){
    	Redis::command('flushall');

		return redirect()->route('favorite.index');
    }
}
