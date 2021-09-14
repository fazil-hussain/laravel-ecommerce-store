<?php

use App\Models\Category;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stripe\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('category',function(){
    $category = Category::all();
    return response()->json($category);
});

// Route::get('products',function(){
//     $products = Product::all();
//     return response()->json($products);
// });
