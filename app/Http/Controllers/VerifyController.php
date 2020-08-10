<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerifyController extends Controller
{
    public function getVerify()
    {
    	return view('auth.verifyUser');
    }

    public function postVerify(Request $request)
    {
    	if ($user = User::where('code', $request->code)->first()) {
    		$user->active = 1;
    		$user->code = null;
    		$user->save();
    		return redirect()->route('login')->withMessage('Your acount is activated.');

    	}
    	else {
    		return back()->withMessage('Verification code is not correct. Please try again.');
    	}
    }
}
