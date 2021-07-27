<?php

namespace Database\Seeders;

use App\Models\HrCompany;
use Illuminate\Database\Seeder;

class HrCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HrCompany::factory(20)->create();
    }
}
