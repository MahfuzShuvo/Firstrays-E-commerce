<?php

namespace App\Http\Controllers\Admin\Pages\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Zone;

class ZonesController extends Controller
{
    public function store(Request $request)
    {
    	// Validation
    	$validator  = \Validator::make($request->all(), [
	        'name' => 'required|max:500|unique:zones',
	        'district_id' => 'required',
    	]);

    	if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


    	$zone = new Zone;

    	$zone->name = $request->name;
    	$zone->district_id = $request->district_id;
    	
    	$zone->save();
    	
    	session()->flash('success', 'Successfully added the zone!!');
    	return redirect('/zones');
    }

    public function delete_zone($id)
    {
        $zone = Zone::find($id);
        
        if (!is_null($zone)) {
    		
    		$zone->delete();
    	}

        session()->flash('success', 'Successfully deleted the zone!!');
        return redirect()->back();
    }
}
