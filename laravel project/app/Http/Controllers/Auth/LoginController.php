<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {      
            return Redirect::intended('dashboard');
        }
    }
}
