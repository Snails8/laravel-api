<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')
            ->insert([
                [
                    'name' => '株式会社サンプル',
                    'zipcode' => 'xxx-xxxx',
                    'address' => '愛知県名古屋市Hoge 111',
                    'address_other' => 'スーパーマンション105号',
                    'tel'     => '0000-00-0000',
                    'email'   => 'sample@sample.com',
                    'ceo' => 'サンプル たにし',
                ],
            ]);
    }
}
