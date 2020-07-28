<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
		return view('frontend_v1.pages.login');
    }

    public function login(LoginRequest $request){
    	$credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return 1;

    }

    public function logout(){
    	auth()->logout();
    	return redirect()->route('home');
    }
}
