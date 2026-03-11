<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $validUser = config('app.admin_user', env('ADMIN_USER', 'admin'));
        $validPass = config('app.admin_password', env('ADMIN_PASSWORD', 'admin123'));

        if ($request->username === $validUser && $request->password === $validPass) {
            session(['admin_logged_in' => true]);
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors(['credentials' => 'Usuario o contraseña incorrectos.']);
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('survey.index');
    }
}