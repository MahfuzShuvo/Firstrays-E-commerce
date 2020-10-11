<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Division;
use App\District;
use App\Zone;
use App\Product;
use App\Category;
use App\Brand;
use App\Attribute;
use App\Slider;
use App\SmallBanner;
use App\MediumBanner;
use App\Shipping;
use App\Coupon;
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

    /**
     * Customers Module...........................................................................
     */
    public function customers()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.pages.customers.customers', compact('users'));
    }

    public function divisions()
    {
        $divisions = Division::orderBy('id', 'asc')->get();
        return view('admin.pages.customers.divisions', compact('divisions'));
    }

    public function districts()
    {
        $districts = District::orderBy('division_id', 'asc')->orderBy('name', 'asc')->get();
        return view('admin.pages.customers.districts', compact('districts'));
    }

    public function zones()
    {
        $zones = Zone::orderBy('district_id', 'asc')->orderBy('name', 'asc')->get();
        return view('admin.pages.customers.zones', compact('zones'));
    }

    /**
     * Products Module.............................................................................
     */
    public function all_products()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.pages.products.all_products', compact('products'));
    }

    public function featured_products()
    {
        $products = Product::orderBy('id', 'desc')->where('isFeatured', 1)->get();
        return view('admin.pages.products.featured_products', compact('products'));
    }

    public function promotional_products()
    {
        $products = Product::orderBy('id', 'desc')->where('promotion_price', '!=', null)->get();
        return view('admin.pages.products.promotional_products', compact('products'));
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

    /**
     * Settings Module..................................................................................
     */
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

    public function shipping()
    {
        $shipping = Shipping::orderBy('id', 'asc')->get();
        return view('admin.pages.settings.shipping', compact('shipping'));
    }

    public function coupon()
    {
        $coupon = Coupon::orderBy('id', 'desc')->get();
        return view('admin.pages.settings.coupon', compact('coupon'));
    }

    public function faqs()
    {
        $faqs = Faq::orderBy('faq', 'asc')->get();
        return view('admin.pages.settings.faqs', compact('faqs'));
    }
}
