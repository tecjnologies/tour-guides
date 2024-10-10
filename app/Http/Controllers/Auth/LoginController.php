<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Request;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;


    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user)
    {   
       
        if ($user->role_id == 1) {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('home');
        }

    }

}