<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admin')->insert([
            [
                'name' => 'Mahmud',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123')
            ],
            [
                'name' => 'Hassan',
                'email' => 'admin2@example.com',
                'password' => Hash::make('admin456')
            ],
            [
                'name' => 'Rana',
                'email' => 'admin3@example.com',
                'password' => Hash::make('admin789')
            ]
        ]);
    }
}
