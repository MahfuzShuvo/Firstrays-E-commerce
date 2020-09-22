<?php

namespace App\Http\Controllers\Admin\Pages\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Division;
use App\District;
use App\Zone;

use Storage;

class DivisionsController extends Controller
{
    public function store(Request $request)
    {
    	// Validation
    	// $validator  = \Validator::make($request->all(), [
	    //     'name' => 'required|max:500|unique:divisions',
    	// ]);

    	// if($validator->fails()) {
     //        return redirect()->back()->withErrors($validator)->withInput();
     //    }


    	// $division = new Division;

    	// $division->name = $request->name;
    	
    	// $division->save();
    	
    	// session()->flash('success', 'Successfully added the division!!');
    	// return redirect('/divisions');
        // $json = Storage::disk('local')->get('bangladesh-upazila-district-division.json');
        // $json = json_decode($json, true);
        $divisionPath = 'public/assets/json/bd-divisions.json';
            $divisionJson = json_decode(file_get_contents($divisionPath), true);
            $collection = collect($divisionJson)->where('id', 2);

            // echo $collection;
            foreach ($collection as $key => $value) {
            // $collection = $value['name'];
            // dd($value['name']);
            echo $value->name;
        }

        $districtPath = 'public/assets/json/districts.json';
        $districtJson = json_decode(file_get_contents($districtPath), true);

        $upazilaPath = 'public/assets/json/upazilas.json';
        $upazilaJson = json_decode(file_get_contents($upazilaPath), true);

        
        // $userData = $upazilaJson[2]['data']; // content of "data" field
        // $jackData = $userData[0]; // first object in "data" array - Jack
        // $jackName = $userData['name']; // Jack's name
        // dd($upazilaJson);
        // $array1 = (array) $userData;
        // foreach ($upazilaJson as $key => $value) {
        //     // $collection = $value['name'];
        //     // dd($value['name']);
        //     echo count($value['name']);
        // }
        // $collection = collect($userData)->unique('name');
                
        
    }

    public function delete_division($id)
    {
        $division = Division::find($id);
        
        if (!is_null($division)) {
            // Delete all districts of this division
            $districts = District::where('division_id', $division->id)->get();
            foreach ($districts as $district) {
                $zones = Zone::where('district_id', $district->id)->get();
                foreach ($zones as $zone) {
                    $zone->delete();
                }
                $district->delete();
            }
            $division->delete();
        }

        session()->flash('success', 'Successfully deleted the division and its districts!!');
        return redirect()->back();
    }

    public function status($id)
    {
        $division = Division::find($id);
        if ($division->status) {
            $division->status = 0;
            session()->flash('error', 'Division disabled to show');
        }
        else {
            $division->status = 1;
            session()->flash('success', 'Division enabled to show');
        }
        $division->save();
        return redirect()->back();
    }
}
