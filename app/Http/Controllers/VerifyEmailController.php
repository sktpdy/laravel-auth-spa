<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
class VerifyEmailController extends Controller
{
    public function notice()
    {
        if(empty(auth()->user()->email_verified_at)) {
            return inertia('Email/Verify');
        }

        return redirect()->route('dashboard')
            ->with('message', 'The email is already verified!');
    }

    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return redirect()->route('home')
            ->with('message', 'Verification link sent📤 Please check your email!');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('dashboard')
            ->with('message', 'Email verified🎉');
    }
}
