<?php

namespace Database\Seeders;

use App\Models\product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $product=product::insert(
                [
                    ['name'=>'Women Shirts',
                    'category_id'=> 1,
                    'description'=>'hello to the world with new city',
                    'tags'=>'hello',
                    'stock'=>40,
                    'price'=>500],

                    ['name'=>'Mens  Shirts',
                    'category_id'=> 2,
                    'description'=>'hello to the world with new city',
                    'tags'=>'hello',
                    'stock'=>50,
                    'price'=>700],
                    ['name'=>'Mens Shorts',
                    'category_id'=> 2,
                    'description'=>'hello to the world with new city',
                    'tags'=>'hello',
                    'stock'=>50,
                    'price'=>700],
                    ['name'=>'Branded Watch',
                    'category_id'=> 3,
                    'description'=>'hello to the world with new city',
                    'tags'=>'hello',
                    'stock'=>50,
                    'price'=>800],

                ]);


            ProductColor::insert([
               [ 'color_id'=>1,
                'product_id'=>1],
                [ 'color_id'=>2,
                'product_id'=>2],
                [ 'color_id'=>3,
                'product_id'=>3],
                [ 'color_id'=>2,
                'product_id'=>4],
            ]);
            ProductSize::insert([
                ['size_id'=>1,
                'product_id'=>1],
                ['size_id'=>2,
                'product_id'=>2],
                ['size_id'=>3,
                'product_id'=>3],
                ['size_id'=>2,
                'product_id'=>4],
            ]);

            ProductImage::insert([
               [ 'product_id'=>1,
                'image'=> '/images/product-01.jpg'],
                [ 'product_id'=>2,
                'image'=> '/images/product-03.jpg'],
                [ 'product_id'=>3,
                'image'=> '/images/product-11.jpg'],
                [ 'product_id'=>4,
                'image'=> '/images/product-06.jpg'],
            ]);



    }
}
