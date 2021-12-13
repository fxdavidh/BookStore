<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Genre::create([
            'id' => '1',
            'name' => 'Action',
        ]);
        \App\Models\Genre::create([
            'id' => '2',
            'name' => 'Fiction',
        ]);
    }
}