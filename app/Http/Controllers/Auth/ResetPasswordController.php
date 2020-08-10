<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;

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
            'phone' => 'required|exists:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::whereCode($id)->first();

        if ($request->phone != $user->phone) {
            return redirect()->back()->with('error', 'Oops! The phone number you entered is invalid');
        }
        else {
            $user->update([
                'password'=>bcrypt($request['password']),
                'code'=>null,
            ]);

            return redirect()->route('login')->with('success', 'Password updated successfully');
        }
    }
}
