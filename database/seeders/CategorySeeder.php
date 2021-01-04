<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([[
        	'category_name' => 'Golongan 1',
        	'category_description' => 'Minimal lulusan Strata 1 Memiliki pengalaman lebih dari 5 tahun',
        	'category_salary' => '80000',
            'overtime_salary' => '150000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
        	'category_name' => 'Golongan 2',
        	'category_description' => 'Minimal lulusan Strata 1 Memiliki pengalaman lebih dari 3 tahun',
        	'category_salary' => '50000',
            'overtime_salary' => '100000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
        	'category_name' => 'Golongan 3',
        	'category_description' => 'Minimal lulusan SLTA sederajatTidak memiliki pengalaman',
        	'category_salary' => '25000',
            'overtime_salary' => '50000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]]);
    }
}
