<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Auth;
use App\User;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->email) {
            $user->email = $request->email;
        }
        if ($request->street_address) {
            $user->street_address = $request->street_address;
        }
        if ($request->division) {
            $divisionPath = 'public/assets/json/bd-divisions.json';
            $divisionJson = json_decode(file_get_contents($divisionPath), true);
            $collection = collect($divisionJson)->where('id', $request->division);

            foreach ($collection as $key => $value) {
                $user->division = $value['name'];
            }
        }
        if ($request->district) {
            $districtPath = 'public/assets/json/bd-districts.json';
            $districtJson = json_decode(file_get_contents($districtPath), true);
            $collection = collect($districtJson)->where('id', $request->district);

            foreach ($collection as $key => $value) {
                $user->district = $value['name'];
            }
        }
        if ($request->zone) {
            $zonePath = 'public/assets/json/bd-postcodes.json';
            $zoneJson = json_decode(file_get_contents($zonePath), true);
            $collection = collect($zoneJson)->where('postCode', $request->zone);

            foreach ($collection as $key => $value) {
                $user->zone = $value['postOffice'];
                $user->postal_code = $value['postCode'];
            }
        }
        if ($request->file('image')) {
            $image = $request->file('image');

            $imagename = $image->getClientOriginalName();
            $imagesize = $image->getClientSize();
            $ext = $image->getClientOriginalExtension();

            $image_title = uniqid().time().'.'.$ext;
            $image->move('public/assets/images/user/', $image_title);
            $user->image = "public/assets/images/user/".$image_title;
        }
        $user->save();
        return redirect()->back()->with('success', 'Successfully updated your profile');
    }
}
