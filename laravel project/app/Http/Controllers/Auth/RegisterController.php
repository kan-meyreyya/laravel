<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'role' => 'author',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => '1',
            'password' => bcrypt($data['password'])
        ]);
    }
}
