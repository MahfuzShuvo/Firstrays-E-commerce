<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function checkout()
    {
    	return view('checkout');
    }
    public function product_details()
    {
    	return view('product-details');
    }
}
