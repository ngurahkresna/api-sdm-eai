<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClaimReimbursementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('claim_reimbursements')->insert([
            'claim_id' => '1',
            'employee_id' => '1',
            'title' => 'Fotocopy Lembar Kerja',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris accumsan mi dolor, id pellentesque leo rutrum non.',
            'proff_of_payment' => 'Nota',
            'date' => '2020-12-31',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
    }
}
