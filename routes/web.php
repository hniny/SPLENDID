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

// Route::get('/', function () {
//     return view('welcome');////
// });


Route::get('/', 'HomeController@index');

Route::get('/products/{id}', 'HomeController@product');
Route::get('/game_update', 'HomeController@gameUpdate');
Route::get('/latest_gaming', 'HomeController@latestGaming');
Route::get('/latest_gaming/latest_gaming_detail/{id}', 'HomeController@latestGamingDetail');

Route::get('/about', 'HomeController@about');

Route::get('/outlets', 'HomeController@outlet');

Route::post('/outlets', 'HomeController@send');

Route::get('/contact', 'HomeController@contact');

Route::post('/contact', 'HomeController@contactEmail');

Route::post('/subscribe', 'HomeController@subscribe');

Route::get('/partnership', 'HomeController@partnership');

Route::get('/benifit', 'HomeController@benifit');

Route::get('/error_qa', 'HomeController@errorQa');



Route::get('/event', 'HomeController@event');

Route::get('/event1', 'HomeController@event1');

Route::get('/event2', 'HomeController@event2');

Route::get('/event3', 'HomeController@event3');

Route::get('/event4', 'HomeController@event4');


Route::get('/video', 'HomeController@video');

Route::get('/product_detail/{id}', 'HomeController@product_detail');
Route::get('/add_cart', 'HomeController@addCart');
Route::get('/showShoppingCartCount', 'HomeController@showCartCount');
Route::get('/showShoppingCartview', 'HomeController@view');
Route::post('/shoppingCartdelete', 'HomeController@trash');
Route::get('/shoppingCartUpdate/{rawId}/{qty}', 'HomeController@update');
Route::get('/showCheckoutview', 'HomeController@checkoutView');
Route::post('/placeOrder', 'HomeController@placeOrder');
Route::get('/warranty', 'HomeController@warranty');
Route::get('/warrantyDetail/{key}/{category}', 'HomeController@warrantyDetail');
Route::get('/laptop_warranty', 'HomeController@warrantyLaptop');
Route::get('/ups_warranty', 'HomeController@warrantyUps');
Route::get('/driver', 'HomeController@driver');
Route::get('/social', 'HomeController@social');
Route::get('/promotions', 'HomeController@promotions');
Route::get('/product_content','HomeController@product_content');
Route::get('/product_content/detail/{id}','HomeController@content_detail');
Route::get('/game_update_detail/{id}','HomeController@gameUpdateDetail');
Route::get('/buid_pc', 'HomeController@buidPc');





Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return '<h3>Cleared Cache Data!</h3>';
});
// Route::get('/admin',function(){
//     return view('la.master');
// });



Route::get('/home', 'HomeController@index')->name('home');
