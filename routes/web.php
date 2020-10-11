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
Route::get('/check', 'User\CartController@check');
// user 
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'Auth\LoginController@login')->name('user.login');

Route::group(['prefix'=>'user'], function() {
	// profile
	Route::get('/profile', 'HomeController@profile')->name('user.profile');
	Route::post('/edit/{id}', 'User\UserController@edit');

	Route::get('logout', 'Auth\LoginController@logout')->name('user.logout');

	// wishlist
	Route::get('/wishlist', 'HomeController@wishlist')->name('user.wishlist');
	Route::get('/wishlist/{id}', 'User\WishlistController@add_to_wishlist');
	Route::post('/remove_wishlist/{id}', 'User\WishlistController@remove_wishlist');

	// cart
	Route::get('/cart/{id}', 'User\CartController@add_to_cart');
	Route::get('/cart-with-attr/{id}', 'User\CartController@add_to_cart_with_attr');
	Route::get('/cart/update_quantity/{id}', 'User\CartController@update_quantity');

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
	// shipping
	Route::get('/shipping', 'AdminController@shipping')->name('shipping');
	Route::post('/shipping', 'Admin\Pages\Settings\ShippingController@store')->name('shipping.store');
	Route::post('/shipping_status/{id}', 'Admin\Pages\Settings\ShippingController@status');
	Route::post('/edit_shipping/{id}', 'Admin\Pages\Settings\ShippingController@edit_shipping');
	Route::post('/delete_shipping/{id}', 'Admin\Pages\Settings\ShippingController@delete_shipping');
	// coupon
	Route::get('/coupon', 'AdminController@coupon')->name('coupon');
	Route::post('/coupon', 'Admin\Pages\Settings\CouponController@store')->name('coupon.store');
	Route::post('/coupon_status/{id}', 'Admin\Pages\Settings\CouponController@status');
	Route::post('/edit_coupon/{id}', 'Admin\Pages\Settings\CouponController@edit_coupon');
	Route::post('/delete_coupon/{id}', 'Admin\Pages\Settings\CouponController@delete_coupon');
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
	// cart
	Route::get('/cart', 'MasterController@cart')->name('cart');
	Route::post('/cart_delete/{id}', 'User\CartController@cart_delete');

	Route::get('/cart/remove_coupon', 'User\CartController@remove_coupon');
	Route::post('/cart/apply_coupon', 'User\CartController@apply_coupon');
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