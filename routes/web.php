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

Route::view('/', 'welcome');

// login
Route::get('/logout', 'AdminController@logout');
Route::post('register', 'UserController@store');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/user', 'Auth\LoginController@userlogin');
Route::post('/login/affiliate', 'Auth\LoginController@affiliateLogin');


Route::prefix('admin')->group(function () {

Route::get('/affiliate', 'AdminController@affiliateShow');
Route::post('/affiliate_create', 'AdminController@affiliateCreate');
Route::get('affiliateCheckEvent', 'AdminController@affiliateCheckEvent');

//Sub-Affiliate
Route::get('/sub_affiliate', 'AdminController@subAffiliateShow');

//user
Route::get('/user', 'AdminController@UserShow');
Route::get('/user/{user_id}', 'AdminController@UserFullHistory');

});


Route::prefix('user')->group(function () {

Route::get('/', 'UserController@index');
Route::get('/userPayment', 'UserController@userPayment');
Route::post('/add_money', 'UserController@UserAddMoney');

});


Route::prefix('affiliate')->group(function () {

Route::get('/', 'AffiliateController@index');
Route::post('/sub_affiliate_create', 'AffiliateController@create');
Route::get('/sub_affiliate', 'AffiliateController@sub_affiliate');
Route::get('/user', 'AffiliateController@user');
Route::get('/paymentHistory', 'AffiliateController@paymentHistory');
});

