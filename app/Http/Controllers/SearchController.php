<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchdata(Request $request){
            $keyword = $request->keyword;
            $products = Product::where('name','LIKE','%'.$keyword.'%')->get();
            if(count($products) > 0)
            {
                return view('site.shop')->with('products',$products);

            }
            else {
                $error = 'Sorry no recourd found!!';
                return view('site.shop')->with('error',$error);

            }

    }

}
