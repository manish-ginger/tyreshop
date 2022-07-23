<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_categories')->insert([
            [
            'name' => 'Car',
            'desc' => 'Car Description',
            ],
            [
                'name' => 'Bus',
                'desc' => 'Bus Description',
                ],
           [
                    'name' => 'Van',
                    'desc' => 'Van Description',
             ],
             [
                'name' => 'Truck',
                'desc' => 'Truck Description',
         ],
    ]);
    }
}
