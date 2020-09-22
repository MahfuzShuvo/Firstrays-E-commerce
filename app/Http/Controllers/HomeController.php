<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Wishlist;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.dashboard');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function wishlist()
    {
        return view('user.wishlist');
    }

    public function orders()
    {
        return view('user.orders');
    }

    public function reviews()
    {
        return view('user.reviews');
    }

    public function settings()
    {
        return view('user.settings');
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

    public function add_to_wishlist($id)
    {
        $wishlist = new Wishlist;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->product_id = $id;

        $wishlist->save();
        return redirect()->back()->with('success', 'Product is added to your wishlist');
    }
}
