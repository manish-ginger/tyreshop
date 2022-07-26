<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB,Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@tyreshop.com',
            'password' => Hash::make('qwer'),
        ]);
    }
}
