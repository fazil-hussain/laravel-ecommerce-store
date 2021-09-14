<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Users = array(
            array('name'=>'Fazil','Email' => 'fazil@gmail.com' ,'password' => bcrypt(12345)),
        );
        DB::table('Users')->insert($Users);
}
}
