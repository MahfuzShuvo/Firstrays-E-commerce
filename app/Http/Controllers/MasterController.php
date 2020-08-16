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

    public function user()
    {
    	return view('home');
    }

    public function about()
    {
    	return view('about-us');
    }

    public function privacy_policy()
    {
    	return view('privacy-policy');
    }

    public function cookie_policy()
    {
    	return view('cookie-policy');
    }

    public function warrenty_policy()
    {
        return view('warrenty-policy');
    }

    public function shipping_policy()
    {
        return view('shipping-policy');
    }

    public function why_shop_with_us()
    {
        return view('why-shop-with-us');
    }

    public function faq()
    {
        return view('faq');
    }
}
