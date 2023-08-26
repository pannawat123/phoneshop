<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phone')->insert(array(
            [
                
                'name' => 'Iphone5',
                'price' => 1000,
                'typephone_id' => 1,
            ],
            
            [
                'name' => 'Iphone6',
                'price' => 2000,
                'typephone_id' => 2,
            ],
            
            [
                'name' => 'Iphone7',
                'price' => 3000,
                'typephone_id' => 1,
            ]
        ));
    }
}
