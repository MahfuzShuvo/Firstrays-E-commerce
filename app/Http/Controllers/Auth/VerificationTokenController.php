<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class VerificationTokenController extends Controller
{
    public function verifytoken()
    {
    	return view('auth.passwords.verificationToken');
    }

    public function postVerifyToken(Request $request)
    {
    	$user = User::whereCode($request->code)->first();

    	if ($user == null) {
    		return redirect()->back()->with('error', 'Oops! Invalid Token');
    	}
    	else {
    		return redirect()->route('password.reset', [$user->code])->with('success', 'Now update your password');
    	}
    }
}
