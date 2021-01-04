<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('divisions')->insert([[
            'division_name' => 'SDM',
            'description' => 'Divisi Sumber Daya Manusia',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'division_name' => 'Procurement',
            'description' => 'Divisi Pengadaan Barang',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'division_name' => 'Warehouse',
            'description' => 'Divisi Pergudangan',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'division_name' => 'Finance',
            'description' => 'Divisi Pengelola Keuangan',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]]);
    }
}
