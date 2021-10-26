<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Book_Genre::create([
            'bookId' => '1',
            'genreId' => '2',
        ]);
        \App\Models\Book_Genre::create([
            'bookId' => '1',
            'genreId' => '1',
        ]);
    }
}
