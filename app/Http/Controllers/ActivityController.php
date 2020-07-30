<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Activity;

class ActivityController extends Controller
{
	const NUMBER_OF_PAGES = 20;

    public function index(){

    	$activities = Activity::where('user_id', auth()->id())
						    ->orderBy('created_at', 'desc')
						    ->paginate(self::NUMBER_OF_PAGES);

		return view('frontend_v1.pages.activity', compact('activities'));
	}
}
