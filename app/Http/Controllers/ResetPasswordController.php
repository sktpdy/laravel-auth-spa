<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    public function request()
    {
        return inertia('Password/Request');
    }

    public function send(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('home')
                ->with('message', 'Check your email for the password reset link 🗝️✨')
            : back()->withErrors(['email' => __($status)]);
    }

    public function reset($token, $email)
    {
        return inertia('Password/Reset', ['token' => $token, 'email' => $email]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if(Auth::check()) {
            app('App\Http\Controllers\AuthController')->destroy($request);
        }

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('message', 'Password Reset Successful🎉')
            : back()->withErrors(['email' => [__($status)]]);
    }
}
