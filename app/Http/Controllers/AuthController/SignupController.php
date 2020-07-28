<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index(){
		return view('frontend_v1.pages.signup');
    }

    public function signup(SignupRequest $request){
    	$user = User::create(request(['name', 'email', 'password']));
    	auth()->login($user);
    	return redirect()->route('home');
    }
}
