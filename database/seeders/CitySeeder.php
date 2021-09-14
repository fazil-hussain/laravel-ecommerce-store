<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cities')->delete();
        $cities = array(
        array('name' => "Muzaffarābād",'state_id' => 1,'charges' => 100),
        array('name' => "Mīrpur",'state_id' => 1,'charges' => 200),
        array('name' => "Rāwala Kot",'state_id' => 1,'charges' => 300),
        array('name' => "Kotli",'state_id' => 1,'charges' => 400),

        array('name' => "Quetta",'state_id' => 2,'charges' => 500),
        array('name' => "Turbat",'state_id' => 2,'charges' => 600),
        array('name' => "Khuzdar",'state_id' => 2,'charges' => 700),
        array('name' => "Hub",'state_id' => 2,'charges' => 800),

		array('name' => "islamabad",'state_id' => 3,'charges' => 900),

		array('name' => "Sargodha",'state_id' => 4,'charges' => 1000),
		array('name' => "Lahore",'state_id' => 4,'charges' => 1100),
		array('name' => "Jhang",'state_id' => 4,'charges' => 1200),




            );
         DB::table('cities')->insert($cities);

    }
}
