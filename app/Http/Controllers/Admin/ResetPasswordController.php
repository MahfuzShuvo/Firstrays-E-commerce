<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Admin;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // Update Password
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'phone' => 'required|exists:admins',
            'password' => 'required|min:8|confirmed',
        ]);

        $admin = Admin::whereCode($id)->first();

        if ($request->phone != $admin->phone) {
            return redirect()->back()->with('error', 'Oops! The phone number you entered is invalid');
        }
        else {
            $admin->update([
                'password'=>bcrypt($request['password']),
                'code'=>null,
            ]);

            return redirect()->route('admin.login')->with('success', 'Password updated successfully');
        }
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.passwords.reset')->with(
            ['token' => $token, 'phone' => $request->phone]
        );
    }
}
