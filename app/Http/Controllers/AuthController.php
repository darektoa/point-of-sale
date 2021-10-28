<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView() {
        return view('auth.login');
    }


    public function registerView() {
        return view('auth.register');
    }


    public function register(Request $request) {
        $request->validate([
            'email'                 => 'required|unique:users',
            'password'              => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        User::create([
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return redirect()->route('login.loginView');
    }


    public function login(Request $request) {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('dashboard.index');
        }

        return back();
    }


    public function logout() {
        Auth::logout();
        return redirect()->route('login.loginView');
    }
}
