<?php

namespace App\Http\Controllers\Admin\Pages\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shipping;

class ShippingController extends Controller
{
    public function store(Request $request)
    {
    	// Validation
    	$validator  = \Validator::make($request->all(), [
	        'type' => 'required|unique:shippings',
	        'cost' => 'required'
    	]);

    	if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


    	$shipping = new Shipping;

    	$shipping->type = $request->type;
    	$shipping->cost = $request->cost;
    	
    	$shipping->save();
    	
    	session()->flash('success', 'Successfully added shipping!!');
    	return redirect('/shipping');
    }

    public function status($id)
    {
        $shipping = Shipping::find($id);
        if ($shipping->status) {
            $shipping->status = 0;
            session()->flash('error', 'Shipping disabled to show');
        }
        else {
            $shipping->status = 1;
            session()->flash('success', 'Shipping enabled to show');
        }
        $shipping->save();
        return redirect()->back();
    }

    public function delete_shipping($id)
    {
    	$shipping = Shipping::find($id);
    	if (!is_null($shipping)) {
    		
    		$shipping->delete();
    	}
    	session()->flash('success', 'Successfully deleted the shipping!!');
    	return back();
    }

    public function edit_shipping(Request $request, $id)
    {

    	$shipping = Shipping::find($id);

    	$shipping->cost = $request->cost;

    	$shipping->save();


        session()->flash('success', 'Successfully updated the shipping cost!!');
        return redirect('/shipping');
    }
}
