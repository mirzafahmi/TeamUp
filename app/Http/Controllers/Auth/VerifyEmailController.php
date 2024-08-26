<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('index', absolute: false).'?verified=1')->with('success', 'You already verified your email.');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));

            session()->flash('success', 'Your email has been successfully verified!');
        }

        return redirect()->intended(route('index', absolute: false).'?verified=1');
    }
}
