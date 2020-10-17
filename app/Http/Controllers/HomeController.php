<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Wishlist;
use App\Order;

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
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.wishlist', compact('wishlists'));
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.orders', compact('orders'));
    }

    public function reviews()
    {
        return view('user.reviews');
    }

    public function settings()
    {
        return view('user.settings');
    }
}
