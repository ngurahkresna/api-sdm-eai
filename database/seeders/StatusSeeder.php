<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuses')->insert([[
            'status_name' => 'Pegawai Tetap',
            'description' => 'Pegawai tetap adalah pegawai yang menerima atau memperoleh penghasilan dalam jumlah tertentu secara teratur termasuk anggota dewan komisaris dan anggota dewan pengawas',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'status_name' => 'Pegawai Kontrak',
            'description' => ' Pegawai kontrak merupakan perjanjian kerja antara pekerja dengan pengusaha untuk mengadakan hubungan kerja dalam waktu tertentu atau untuk pekerja tertentu',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'status_name' => 'Magang',
            'description' => 'Magang adalah calon pegawai (yang belum diangkat secara tetap serta belum menerima gaji atau upah karena dianggap masih dalam taraf belajar)',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]]);
    }
}
