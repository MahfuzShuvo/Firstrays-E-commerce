<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class VerificationTokenController extends Controller
{
    public function verifytoken()
    {
    	return view('admin.passwords.verificationToken');
    }

    public function postVerifyToken(Request $request)
    {
    	$admin = Admin::whereCode($request->code)->first();

    	if ($admin == null) {
    		return redirect()->back()->with('error', 'Oops! Invalid Token');
    	}
    	else {
    		return redirect()->route('admin.password.reset', [$admin->code])->with('success', 'Now update your password');
    	}
    }
}
