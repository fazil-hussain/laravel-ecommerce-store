<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    DB::table('sizes')->insert(array(
        array('size'=>'Large',),
        array('size'=>'Extra Large',),
        array('size'=>'Small',),
        array( 'size'=>'Extra Small',),
        array( 'size'=>'Medium',)
    ));

    }
}
