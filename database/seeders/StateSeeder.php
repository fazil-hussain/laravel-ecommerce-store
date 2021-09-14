<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	DB::table('states')->delete();
	$states = array(
		array('name' => "Azad kashmir",'country_id' => 1),
		array('name' => "Balochistan",'country_id' => 1),
		array('name' => "Islamabad capital territory",'country_id' => 1),
		array('name' => "Punjab",'country_id' => 1),
		);
		DB::table('states')->insert($states);


    }
}
