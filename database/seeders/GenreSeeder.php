<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => 'Fiction',
        ]);
        DB::table('genres')->insert([
            'name' => 'Action',
        ]);
        DB::table('genres')->insert([
            'name' => 'History',
        ]);
        DB::table('genres')->insert([
            'name' => 'Fantasy',
        ]);
        DB::table('genres')->insert([
            'name' => 'Thriller',
        ]);
        DB::table('genres')->insert([
            'name' => 'Mystery',
        ]);
    }
}