<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('presences')->insert([
            'employee_id' => '1',
            'total_attandance' => '10',
            'total_absen' => '5',
            'total_overtime' => '1',
            'presence date' => '2020-11-29'
        ], [
            'employee_id' => '2',
            'total_attandance' => '11',
            'total_absen' => '5',
            'total_overtime' => '5',
            'presence date' => '2020-12-29'
        ]);
    }
}
