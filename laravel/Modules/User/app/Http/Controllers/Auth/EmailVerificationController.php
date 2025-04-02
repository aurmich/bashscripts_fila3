<?php

/**
 * Handles the email verification process for authenticated users.
 *
 * This controller method is responsible for verifying a user's email address
 * when they click on a verification link. It checks that the user is
 * authenticated, that the provided ID and hash match the user's information,
 * and that the email has not already been verified. If the verification is
 * successful, it marks the email as verified and dispatches a Verified event.
 *
 * @param  string $id  the ID of the user to be verified
 * @param  string $hash  the hash of the user's email address
 * @return \Illuminate\Http\RedirectResponse a redirect response to the home page
 *
 * @throws \Illuminate\Auth\Access\AuthorizationException if the verification fails
 */

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Modules\User\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(config('fortify.home'));
        }

        $user->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
