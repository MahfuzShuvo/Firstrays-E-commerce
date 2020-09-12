<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Product;
use App\Category;
use App\Brand;
use App\Attribute;
use App\Slider;
use App\SmallBanner;
use App\MediumBanner;
use App\Faq;

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
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.pages.customers.customers', compact('users'));
    }

    public function all_products()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.pages.products.all_products', compact('products'));
    }

    public function categories()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $main_category = Category::orderBy('name', 'desc')->where('parent_id', null)->get();
        return view('admin.pages.products.categories', compact('categories', 'main_category'));
    }

    public function brands()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        return view('admin.pages.products.brands', compact('brands'));
    }

    public function attributes()
    {
        $attributes = Attribute::orderBy('name', 'asc')->get();
        return view('admin.pages.products.attributes', compact('attributes'));
    }

    public function slider()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('admin.pages.settings.slider', compact('sliders'));
    }

    public function small_banner()
    {
        $small_banners = SmallBanner::orderBy('id', 'desc')->get();
        return view('admin.pages.settings.small_banner', compact('small_banners'));
    }

    public function medium_banner()
    {
        $medium_banners = MediumBanner::orderBy('id', 'desc')->get();
        return view('admin.pages.settings.medium_banner', compact('medium_banners'));
    }

    public function faqs()
    {
        $faqs = Faq::orderBy('faq', 'asc')->get();
        return view('admin.pages.settings.faqs', compact('faqs'));
    }
}
