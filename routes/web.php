<?php

use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\StripeController;

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




//...............Admin Routes................//

Route::view('/login','admin/login')->name('login');
Route::POST('/loginauth','App\Http\Controllers\UserController@authentication')->name('loginauth');

Route::middleware(['auth', 'web'])->group(function () {

    Route::view('/admin','admin/index')->name('dashboard');
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('prodcuct', 'App\Http\Controllers\ProductController');
    Route::GET('/deltecategory/{id}' , 'App\Http\Controllers\CategoriesController@delte')->name
    ('deletecategory');
    Route::get('/logout','App\Http\Controllers\UserController@logout')->name('logout');
    Route::resource('color', 'App\Http\Controllers\ColorController');
    Route::resource('image', 'App\Http\Controllers\ImageController');
    Route::get('/neworder','App\Http\Controllers\ManageOrderController@neworder')->name('neworder');
    Route::get('approve/{order_id}','App\Http\Controllers\ManageOrderController@approve')->name('approve');
    Route::get('reject/{order_id}','App\Http\Controllers\ManageOrderController@reject')->name('reject');
    Route::get('/pendingorder','App\Http\Controllers\ManageOrderController@pendingorder')->name('pendingorder');
    Route::get('/deliver/{order_id}','App\Http\Controllers\ManageOrderController@deliver')->name('deliver');
    Route::view('/approvedorder', 'admin.approvedorder')->name('approvedorders');
    Route::view('/rejectedorders', 'admin.rejected_order')->name('rejectedorders');
    Route::view('/deliverdorders', 'admin.deliverd_orders')->name('deliverdorders');
    Route::get('/orderdetails/{order_id}','App\Http\Controllers\ManageOrderController@orderdetails')->name('orderdetails');
    Route::get('/dellorder/{order_id}','App\Http\Controllers\ManageOrderController@delorder')->name('delorder');


});

//...........Front Routes..................//

Route::get('/', function () {
    return view('site/dashboard');
});
Route::view('/home', 'site/dashboard')->name('home');
Route::get('getdata/{id}','App\Http\Controllers\ProductController@getpro');
Route::get('shopingcart', 'App\Http\Controllers\CartController@cart')->name('shopingcart');
Route::post('addtocart','App\Http\Controllers\CartController@add')->name('addtocart');
Route::post('cartincrement','App\Http\Controllers\CartController@increment')->name('cartincrement');
Route::post('cartdecrement','App\Http\Controllers\CartController@decrement')->name('cartdecrement');
Route::post('removeproduct','App\Http\Controllers\CartController@remove')->name('removeproduct');
Route::get('/emptycart','App\Http\Controllers\CartController@clear')->name('emptycart');
Route::POST('/getcountry', 'App\Http\Controllers\CartController@states')->name('getstates');
Route::POST('/getcity','App\Http\Controllers\CartController@cities')->name('getcities');
Route::get('/checkout', 'App\Http\Controllers\CartController@checkout')->name('checkout');
Route::get('chekouttt', 'App\Http\Controllers\CartController@chekpage')->name('chekouttt');
Route::post('/order','App\Http\Controllers\OrderController@insert')->name('order');
Route::get('/shop', 'App\Http\Controllers\ProductController@catpro')->name('shop');
Route::get('cateory-products/{id}', 'App\Http\Controllers\ProductController@categorypro')->name('categoryproducts');
Route::get('/contactus', 'App\Http\Controllers\ContacController@contactpage')->name('contactus');
Route::post('/submitcontact','App\Http\Controllers\ContacController@contactus')->name('contactrequest');
Route::view('/about', 'site.about')->name('about');


//..................Stripe Payment Method..................//

Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');

//.............pdf route............//
Route::get('/pdfview','App\Http\Controllers\PdfController@showorder');

//..................Search Route............//
// Route::get('search', [SearchController::class, 'index'])->name('search');
// Route::get('autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');

Route::POST('/search','App\Http\Controllers\SearchController@searchdata')->name('serach');
Route::get('/getamountofsession','App\Http\Controllers\CartController@updatedamount')->name('getupdatedamount');
Route::get('/getamountofsession','App\Http\Controllers\CartController@updatedamount')->name('getupdatedamount');
