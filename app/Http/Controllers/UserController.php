<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeUnit\FunctionUnit;

class UserController extends Controller
{
    // Show Register/Create User Form
    public function Register()
    {
        return view('users.register');
    }
    //Create new users
    public function Store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email',''],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);
        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/barang')->with('message', 'Pengguna berhasil dibuat dan telah login');
    }
    public function login()
    {
        return view('users.login');
    }
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required','email',''],
            'password' => ['required']
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('message', 'Login Berhasil');
        }
        return back()->withErrors([
            'email' => 'Email atau password salah'
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
