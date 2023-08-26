<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typephone')->insert(array(
            [
                'name' => 'Samsung',
            ],
            
            [
                'name' => 'Apple',
            ],
            
            [
                'name' => 'Xiaomi',
            ]
        ));
    }
}
