<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function create() {
        return inertia('User/Signup');
    }

    public function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => 'required|min:3|max:20|unique:users',
            'email' => 'required|email|max:254|unique:users',
            'password' => 'required|min:8|confirmed',
        ]));
        Auth::login($user);
        event(new Registered($user));

        return redirect()->route('home')
            ->with('message', 'Account created🎉 Check your email for the verification link!');
    }
}
