<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Admin;
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
    | your application to your admins. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function postForgot(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
        ]);

        $admin = Admin::wherePhone($request->phone)->first();

        if ($admin->active == 0) {
            return  redirect()->back()->with('error', 'Oops! Your phone number is not activated. Please activate first.');
        }
        else {
            $admin->update([
                'code' => SendCode::sendCode($admin->phone),
            ]);


            return redirect('admin/verifytoken')->with('success', 'An OTP is sent to your phone to verify your number.');
        }
    }

    public function showLinkRequestForm()
    {
        return view('admin.passwords.email');
    }
}
