<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DataEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('data_employees')->insert([[
            'first_name' => 'Kresna',
            'last_name' => 'Adiputra',
            'address' => 'Denpasar',
            'phone' => '081236668996',
            'gender' => 'Male',
            'category_id' => '1',
            'division_id' => '1',
            'status_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'first_name' => 'Ngurah',
            'last_name' => 'Kresna',
            'address' => 'Denpasar',
            'phone' => '081236668996',
            'gender' => 'Male',
            'category_id' => '2',
            'division_id' => '2',
            'status_id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]]);
    }
}
