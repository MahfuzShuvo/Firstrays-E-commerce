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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user/logout', 'Auth\LoginController@logout')->name('user.logout');
Route::post('/login', 'Auth\LoginController@login')->name('user.login');

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


// checkout
Route::get('/checkout', 'MasterController@checkout')->name('checkout');
// product-details
Route::get('/product-details', 'MasterController@product_details')->name('product-details');