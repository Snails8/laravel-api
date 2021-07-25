<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories')
            ->insert([
                [
                    'name' => '重要',
                    'sort_no' => 1,
                ],
                [
                    'name' => '業務',
                    'sort_no' => 2,
                ],
                [
                    'name' => 'その他',
                    'sort_no' => 3,
                ],

            ]);
    }
}
