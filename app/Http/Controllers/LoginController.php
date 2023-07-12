<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Log in',
            'judul' => 'Login Acount'
        ]);
    }


    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:rfc:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        return back()->with('LoginFailed', 'Something went wrong when you filled the input !! ');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
