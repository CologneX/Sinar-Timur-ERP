<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Show Register/Create User Form
    public function Register()
    {
        return view('users.register');
    }
    //Create new users
    public function Store(Request $request)
    {
        $formFields = $request->validate([
            'nama' => ['required|min:3'],
            'email' => ['required|email|unique:users,email'],
            'password' => ['required|confirmed|min:6']
        ]);
        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user= User::create($formFields);
        // $id =

        // Login
        auth()->login($user);
        return redirect('/')->with('message', 'Pengguna berhasil dibuat');
    }
    public function Login()
    {
        return view('users.login');
    }
}
