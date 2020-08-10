<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\User;
use App\SendCode;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function postForgot(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|exists:users',
        ]);

        $user = User::wherePhone($request->phone)->first();

        if ($user->active == 0) {
            return  redirect()->back()->with('error', 'Oops! Your phone number is not activated. Please activate first.');
        }
        else {
            $user->update([
                'code' => SendCode::sendCode($user->phone),
            ]);

            return redirect('verifytoken')->with('success', 'An OTP is sent to your phone to verify your number.');
        }
    }
}
