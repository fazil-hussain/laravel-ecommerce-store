<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pro = Product::find();
        // $cat = $pro->category;
        // dd($cat);
        $val=Product::paginate(10);
        return view('admin.all-product')->with('dataa',$val);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productid=Product::create([
            'name'=>$request->name,
            'category_id' =>  $request->category_id,
            'description'=>$request->description,
            'tags'=>$request->tags,
            'stock'=>$request->quantity,
            'price'=>$request->price


        ]);

        if($request->has('color'))
        {
            foreach ($request->color as $key => $colorId) {
                ProductColor::create([
                    'product_id'=>  $productid->id,
                    'color_id'=> $colorId
                ]);
            }
        }
        if($request->has('size'))
        {
            foreach ($request->size as $key => $sizeId) {
                ProductSize::create([
                    'product_id'=>  $productid->id,
                    'size_id'=> $sizeId
                ]);
            }
        }
        if($request->has('image'))
            foreach ($request->image as $key => $images) {
                ProductImage::create([
                    'product_id'=>  $productid->id,
                    'image'=>$images
                ]);
            }
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $product=Product::find($product);

        // foreach ($product->colors as $color) {
        //     $color= $color->colorData->id;
        // }

        // foreach ($product->sizes as $size) {
        //     $size= $size->SizeData->id;
        // }

        return view('admin.update-product')->with('dataa',$product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $productt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productt)
    {
        $product=Product::find($productt);
        // dd($product);
        if($request->image == null)
        {
            $productid= $product->update([
                'name'=>$request->name,
                'category_id' =>  $request->category,
                'description'=>$request->description,
                'tags'=>$request->tags,
                'quantity'=>$request->quantity,
                'price'=>$request->price
            ]);

        if($request->has('color'))
        {
            foreach ($product->colors as  $colorr)
                {
                    $colorr->delete();
                }
            foreach ($request->color as $key => $colorId) {
                ProductColor::create([
                    'product_id'=>  $product->id,
                    'color_id'=> $colorId
                ]);
            }
        }
        if($request->has('size'))
        {
            foreach ($product->sizes as  $size)
                {
                    $size->delete();
                }
            foreach ($request->size as $key => $sizeId) {
                ProductSize::create([
                    'product_id'=>  $product->id,
                    'size_id'=> $sizeId
                ]);
            }
        }
          return redirect()->route('prodcuct.index');
        }
        else
        {

          $productid= $product->update([
                'name'=>$request->name,
                'category_id' =>  $request->category,
                'description'=>$request->description,
                'tags'=>$request->tags,
                'quantity'=>$request->quantity,

            ]);

        if($request->has('color'))
        {
            foreach ($request->color as $key => $colorId) {
                ProductColor::create([
                    'product_id'=>  $product->id,
                    'color_id'=> $colorId
                ]);
            }
        }
        if($request->has('size'))
        {
            foreach ($request->size as $key => $sizeId) {
                ProductSize::create([
                    'product_id'=>  $product->id,
                    'size_id'=> $sizeId
                ]);
            }
        }
        if($request->has('image'))
        {

        }

            return redirect()->route('prodcuct.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $val=Product::find($product);

        $val->delete();
        return redirect()->back();
    }

    public function getpro($id)
    {

        $sizearray=[];
        $colorarray=[];
       $product=Product::find($id);
       $colors=$product->colors;
       $sizes=$product->sizes;
       $images=$product->images;

       foreach ($sizes as $key => $size) {
           $sizeData = $size->SizeData;
           $sizearray[] = $sizeData;
       }
       foreach ($colors as $key => $colorr) {
          $color= $colorr->colorData;
          $colorarray[]=$color;

       }


       return response(["product" => $product, "colors" => $colorarray, "sizes" => $sizearray,"images" => $images]);
    }

    public function add(Request $request)
    {
        return response(1);
    }

    public function catpro()
    {
        $produts=Product::paginate(10);
        
        return view('site.shop')->with('products' , $produts);
    }

    public function categorypro($id)
    {

        return view('site.shop')->with('cat_id' , $id);
    }


}
