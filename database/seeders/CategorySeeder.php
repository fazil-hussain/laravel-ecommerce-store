<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('categories')->insert([
                [ 'name'=> 'Women Clohes',
                 'description'=> 'All Kind of Women clothes availabel',
                 'tags'=> 'clothes,dress,women',
                 'image'=> 'images/banner-01.jpg'],
                 [ 'name'=> 'Mens Clohes',
                 'description'=> 'All Kind of Mens clothes availabel',
                 'tags'=> 'clothes,dress,women',
                 'image'=> 'images/banner-02.jpg'],
                 [ 'name'=> 'Watches',
                 'description'=> 'All Kind of  watches availabel for men and women',
                 'tags'=> 'watches, restwatch',
                 'image'=> 'images/banner-03.jpg']

                 
             ]);


    }

}
