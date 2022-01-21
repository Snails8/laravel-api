<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'title' => 'sample',
                'detail' => 'sample detail',
            ],
            [
                'title' => 'test',
                'detail' => 'test detail',
            ],
            [
                'title' => 'example',
                'detail' => 'example detail',
            ],
            [
                'title' => 'title',
                'detail' => 'title detail',
            ],
            [
                'title' => 'description',
                'detail' => 'description detail',
            ],
            [
                'title' => 'fuck',
                'detail' => 'fuck detail',
            ],
        ]);
    }
}
