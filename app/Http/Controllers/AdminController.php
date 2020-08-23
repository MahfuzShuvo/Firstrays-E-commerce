<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function customers()
    {
        $users = DB::table('users')->get();
        return view('admin.pages.customers', compact('users'));
    }

    public function slider()
    {
        $sliders = DB::table('sliders')->get();
        return view('admin.pages.slider', compact('sliders'));
    }

    public function small_banner()
    {
        $small_banners = DB::table('small_banners')->get();
        return view('admin.pages.small_banner', compact('small_banners'));
    }

    public function medium_banner()
    {
        $medium_banners = DB::table('medium_banners')->get();
        return view('admin.pages.medium_banner', compact('medium_banners'));
    }
}
