<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('payrolls')->insert([
            'employee_id' => '1',
            'presence_id' => '1',
            'category_id' => '1',
            'sallary' => '5000'
        ]);
    }
}
