<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HrUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hr_users')->insert([
            [
                'hr_company_id' => 1,
                'hr_company_offices_id' => 1,
                'name'  => 'たにし',
                'kana'  => 'タニシ',
                'email' => 'sample@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
