<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

// user 
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'Auth\LoginController@login')->name('user.login');

Route::group(['prefix'=>'user'], function() {
	Route::get('/profile', 'HomeController@profile')->name('user.profile');
	Route::post('/edit/{id}', 'HomeController@edit');

	Route::get('logout', 'Auth\LoginController@logout')->name('user.logout');

	Route::get('/wishlist', 'HomeController@wishlist')->name('user.wishlist');
	Route::post('/wishlist/{id}', 'HomeController@add_to_wishlist');

	Route::get('/orders', 'HomeController@orders')->name('user.orders');
	Route::get('/reviews', 'HomeController@reviews')->name('user.reviews');
	Route::get('/settings', 'HomeController@settings')->name('user.settings');
});

//Verify with OTP
Route::get('/verify', 'VerifyController@getVerify')->name('getVerify');
Route::post('/verify', 'VerifyController@postVerify')->name('verify');
//Forgot Password
Route::post('/postForgot', 'Auth\ForgotPasswordController@postForgot')->name('postForgot');
//Token Verification
Route::get('/verifytoken', 'Auth\VerificationTokenController@verifytoken')->name('verifytoken');
Route::post('/postVerifyToken', 'Auth\VerificationTokenController@postVerifyToken')->name('postVerifyToken');
//Reset Password
Route::resource('/resetpassword', 'Auth\ResetPasswordController');

// admin
Route::group(['prefix'=>'admin'], function() {
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');

	Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');


	Route::get('/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::get('/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	//Forgot Password
	Route::post('/postForgot', 'Admin\ForgotPasswordController@postForgot')->name('admin.postForgot');
	//Token Verification
	Route::get('/verifytoken', 'Admin\VerificationTokenController@verifytoken')->name('admin.verifytoken');
	Route::post('/postVerifyToken', 'Admin\VerificationTokenController@postVerifyToken')->name('admin.postVerifyToken');
	//Reset Password
	Route::resource('/adminresetpassword', 'Admin\ResetPasswordController');



});

// ...........................................................................................
//  Back-end pages
// ............................................................................................
	// Customers module
	// ..........................................................................
	// all customers
	Route::get('/customers', 'AdminController@customers')->name('customers');
	Route::post('/customer_status/{id}', 'Admin\Pages\Customers\CustomerController@status');
	// divisions
	Route::get('/divisions', 'AdminController@divisions')->name('divisions');
	Route::post('/divisions', 'Admin\Pages\Customers\DivisionsController@store')->name('division.store');
	Route::post('/delete_division/{id}', 'Admin\Pages\Customers\DivisionsController@delete_division');
	Route::post('/division_status/{id}', 'Admin\Pages\Customers\DivisionsController@status');
	// districts
	Route::get('/districts', 'AdminController@districts')->name('districts');
	Route::post('/districts', 'Admin\Pages\Customers\DistrictsController@store')->name('district.store');
	Route::post('/delete_district/{id}', 'Admin\Pages\Customers\DistrictsController@delete_district');
	// zones
	Route::get('/zones', 'AdminController@zones')->name('zones');
	Route::post('/zones', 'Admin\Pages\Customers\ZonesController@store')->name('zone.store');
	Route::post('/delete_zone/{id}', 'Admin\Pages\Customers\ZonesController@delete_zone');


	// Products module
	// .............................................................................................
	// all products
	Route::get('/products', 'AdminController@all_products')->name('products');
	Route::post('/products', 'Admin\Pages\Products\ProductsController@store')->name('product.store');
	Route::post('/product_status/{id}', 'Admin\Pages\Products\ProductsController@status');
	Route::post('/product_featured/{id}', 'Admin\Pages\Products\ProductsController@featured');
	Route::post('/delete_product/{id}', 'Admin\Pages\Products\ProductsController@delete_product');
	Route::post('/edit_product/{id}', 'Admin\Pages\Products\ProductsController@edit_product');
	Route::post('/add_product_promotion/{id}', 'Admin\Pages\Products\ProductsController@add_product_promotion');
	// featured products
	Route::get('/featuredProducts', 'AdminController@featured_products')->name('featuredProducts');
	// promotional products
	Route::get('/promotionalProducts', 'AdminController@promotional_products')->name('promotionalProducts');
	// categories
	Route::get('/categories', 'AdminController@categories')->name('categories');
	Route::post('/categories', 'Admin\Pages\Products\CategoriesController@store')->name('category.store');
	Route::post('/delete_category/{id}', 'Admin\Pages\Products\CategoriesController@delete_category');
	Route::post('/category_status/{id}', 'Admin\Pages\Products\CategoriesController@status');
	// brands
	Route::get('/brands', 'AdminController@brands')->name('brands');
	Route::post('/brands', 'Admin\Pages\Products\BrandsController@store')->name('brand.store');
	Route::post('/delete_brand/{id}', 'Admin\Pages\Products\BrandsController@delete_brand');
	Route::post('/edit_brand/{id}', 'Admin\Pages\Products\BrandsController@edit_brand');
	// attributes
	Route::get('/attributes', 'AdminController@attributes')->name('attributes');
	Route::post('/attributes', 'Admin\Pages\Products\AttributesController@store')->name('attribute.store');
	Route::post('/delete_attribute/{id}', 'Admin\Pages\Products\AttributesController@delete_attribute');


	// Settings module
	// ............................................................................................
	// slider
	Route::get('/slider', 'AdminController@slider')->name('slider');
	Route::post('/slider', 'Admin\Pages\Settings\SliderController@store')->name('slider.store');
	Route::post('/slider_status/{id}', 'Admin\Pages\Settings\SliderController@status');
	Route::post('/delete_slider/{id}', 'Admin\Pages\Settings\SliderController@delete_slider');
	Route::post('/add_url/{id}', 'Admin\Pages\Settings\SliderController@add_url');
	Route::post('/priority/{id}', 'Admin\Pages\Settings\SliderController@priority');
	// small banner
	Route::get('/small_banner', 'AdminController@small_banner')->name('small_banner');
	Route::post('/small_banner', 'Admin\Pages\Settings\SmallBannerController@store')->name('small_banner.store');
	Route::post('/small_banner_status/{id}', 'Admin\Pages\Settings\SmallBannerController@status');
	Route::post('/delete_small_banner/{id}', 'Admin\Pages\Settings\SmallBannerController@delete_small_banner');
	// medium banner
	Route::get('/medium_banner', 'AdminController@medium_banner')->name('medium_banner');
	Route::post('/medium_banner', 'Admin\Pages\Settings\MediumBannerController@store')->name('medium_banner.store');
	Route::post('/medium_banner_status/{id}', 'Admin\Pages\Settings\MediumBannerController@status');
	Route::post('/delete_medium_banner/{id}', 'Admin\Pages\Settings\MediumBannerController@delete_medium_banner');
	// faq
	Route::get('/faqs', 'AdminController@faqs')->name('faqs');
	Route::post('/faqs', 'Admin\Pages\Settings\FaqController@store')->name('faqs.store');
	Route::post('/delete_faqs/{id}', 'Admin\Pages\Settings\FaqController@delete_faqs');
	Route::post('/edit_faqs/{id}', 'Admin\Pages\Settings\FaqController@edit_faqs');



// ........................................................................................................
//	Front-end Pages
// ......................................................................................................
	// checkout
	Route::get('/checkout', 'MasterController@checkout')->name('checkout');
	// product-details
	Route::get('/product-details/{slug}', 'MasterController@product_details');
	// user-dashboard
	Route::get('/user', 'MasterController@user')->name('user');
	// about-us
	Route::get('/about-us', 'MasterController@about')->name('about-us');
	// privacy-policy
	Route::get('/privacy-policy', 'MasterController@privacy_policy')->name('privacy-policy');
	// cookie-policy
	Route::get('/cookie-policy', 'MasterController@cookie_policy')->name('cookie-policy');
	// warrenty-policy
	Route::get('/warrenty-policy', 'MasterController@warrenty_policy')->name('warrenty-policy');
	// shipping-policy
	Route::get('/shipping-policy', 'MasterController@shipping_policy')->name('shipping-policy');
	// why-shop-with-us
	Route::get('/why-shop-with-us', 'MasterController@why_shop_with_us')->name('why-shop-with-us');
	// faq
	Route::get('/faq', 'MasterController@faq')->name('faq');



Route::get('get-districts/{id}', function($id){
	// return json_encode(App\District::where('division_id', $id)->get());
	$districtPath = 'public/assets/json/bd-districts.json';
    $districtJson = json_decode(file_get_contents($districtPath), true);
    $collection = collect($districtJson)->where('division_id', $id);
    return $collection;
});

Route::get('get-zones/{id}', function($id){
	// return json_encode(App\District::where('division_id', $id)->get());
	$poastcodesPath = 'public/assets/json/bd-postcodes.json';
    $poastcodesJson = json_decode(file_get_contents($poastcodesPath), true);
    $collection = collect($poastcodesJson)->where('district_id', $id);
    return $collection;
});

Route::get('get-postal-code/{code}', function($code){
	// return json_encode(App\District::where('division_id', $id)->get());
	$poastcodesPath = 'public/assets/json/bd-postcodes.json';
    $poastcodesJson = json_decode(file_get_contents($poastcodesPath), true);
    $collection = collect($poastcodesJson)->where('postCode', $code);
    return $collection;
});