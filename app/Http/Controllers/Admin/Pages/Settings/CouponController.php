<?php

namespace App\Http\Controllers\Admin\Pages\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    public function store(Request $request)
    {
    	// Validation
    	$validator  = \Validator::make($request->all(), [
	        'code' => 'required|unique:coupons',
	        'type' => 'required',
	        'amount' => 'required'
    	]);

    	if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


    	$coupon = new Coupon;

    	$coupon->code = strtoupper($request->code);
    	$coupon->type = $request->type;
    	$coupon->amount = $request->amount;

    	if ($request->expiry_date) {
    		$coupon->expiry_date = $request->expiry_date;
    	}
    	
    	$coupon->save();
    	
    	session()->flash('success', 'Coupon added successfully');
    	return redirect('/coupon');
    }

    public function status($id)
    {
        $coupon = Coupon::find($id);
        if ($coupon->status) {
            $coupon->status = 0;
            session()->flash('error', 'Coupon disabled');
        }
        else {
            $coupon->status = 1;
            session()->flash('success', 'Coupon enabled');
        }
        $coupon->save();
        return redirect()->back();
    }

    public function delete_coupon($id)
    {
    	$coupon = Coupon::find($id);
    	if (!is_null($coupon)) {
    		
    		$coupon->delete();
    	}
    	session()->flash('success', 'Coupon deleted');
    	return back();
    }

    public function edit_coupon(Request $request, $id)
    {

    	$coupon = Coupon::find($id);

    	$coupon->code = strtoupper($request->code);
    	$coupon->type = $request->type;
    	$coupon->amount = $request->amount;

    	$coupon->expiry_date = $request->expiry_date;
    	
    	$coupon->save();


        session()->flash('success', 'Coupon updated successfully');
        return redirect('/coupon');
    }
}
