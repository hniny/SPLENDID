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
Route::group(['middleware' => ['auth']], function () {
Route::get('/admin', function () {
  return redirect('/admin/dashboard');  
});
Route::get('/admin/dashboard',function(){
  return view('la.dashboard');
});
Route::get('/admin/tables',function(){
  return view('la.tables');
});
Route::get('/forgot-password',function(){
return view('la.credential.forgot-password');
});
Route::get('/login',function(){
  return view('la.credential.login');
});
Route::get('/register',function(){
  return view('la.credential.register');
});

Route::resource('/admin/story', 'StoryController');

Route::resource('/admin/category', 'Admin\CategoryController');

Route::resource('/admin/product', 'Admin\ProductController');
Route::post('/admin/productsearch', 'Admin\ProductController@productsearch');

Route::resource('/admin/country', 'Admin\CountryController');

Route::resource('/admin/city', 'Admin\CityController');

Route::resource('/admin/customer', 'Admin\CustomerController');

Route::resource('/admin/video', 'Admin\VideoController');

Route::resource('/admin/benefit', 'Admin\BenefitController');

Route::resource('/admin/gameupdates', 'Admin\GameupdateController');

Route::resource('/admin/latestgames', 'Admin\LatestgameController');

Route::resource('/admin/product_content','Admin\ContentController');

Route::resource('/admin/warrantyinfo','Admin\WarrantyController');

Route::resource('/admin/ups_warranty','Admin\UpsController');

Route::resource('/admin/error_qa','Admin\ErrorController');

Route::resource('/admin/driver_download','Admin\DriverController');

Route::resource('/admin/partnership', 'Admin\PartnerController');

Route::resource('/admin/pc_category', 'Admin\PcCategoryController');

Route::resource('/admin/pc_item', 'Admin\PcItemController');

Route::resource('/admin/rate', 'Admin\RateController');

Route::get('/admin/get_category/{id}','Admin\ProductController@getCategory');
});
Auth::routes();