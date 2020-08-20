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
}
