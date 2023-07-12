<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('signup.index', [
            'title' => 'Register',
            'judul' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:5|max:30',
            'email' => 'required|unique:users|email:rfc,dns|max:40',
            'password' => 'min:6|max:30'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('success', 'Success !! , Now you have an account to Login');
    }
}
