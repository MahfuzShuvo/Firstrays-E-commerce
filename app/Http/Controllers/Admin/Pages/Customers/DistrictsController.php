<?php

namespace App\Http\Controllers\Admin\Pages\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;
use App\Zone;

class DistrictsController extends Controller
{
    public function store(Request $request)
    {
    	// Validation
    	$validator  = \Validator::make($request->all(), [
	        'name' => 'required|max:500|unique:districts',
	        'division_id' => 'required',
    	]);

    	if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


    	$district = new District;

    	$district->name = $request->name;
    	$district->division_id = $request->division_id;
    	
    	$district->save();
    	
    	session()->flash('success', 'Successfully added the district!!');
    	return redirect('/districts');
    }

    public function delete_district($id)
    {
        $district = District::find($id);
        
        if (!is_null($district)) {
            // Delete all zones of this division
            $zones = Zone::where('district_id', $district->id)->get();
            foreach ($zones as $zone) {
                $zone->delete();
            }
            $district->delete();
        }

        session()->flash('success', 'Successfully deleted the district with its thana!!');
        return redirect()->back();
    }
}
