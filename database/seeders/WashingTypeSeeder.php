<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class WashingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('washing_types')->insert([
            [
            'name' => 'Full wash',
            'desc' => '',
            ],
            [
                'name' => 'Body wash',
                'desc' => '',
                ],
           [
                    'name' => 'Interior wash',
                    'desc' => '',
             ],
             [
                'name' => 'Chassis wash',
                'desc' => '',
         ],
    ]);
    }
}
