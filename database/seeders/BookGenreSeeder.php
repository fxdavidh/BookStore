<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('book__genres')->insert([
            'bookId' => '1',
            'genreId' => '1',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '1',
            'genreId' => '2',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '1',
            'genreId' => '4',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '2',
            'genreId' => '2',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '2',
            'genreId' => '3',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '3',
            'genreId' => '1',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '3',
            'genreId' => '2',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '3',
            'genreId' => '4',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '4',
            'genreId' => '3',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '4',
            'genreId' => '5',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '4',
            'genreId' => '6',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '5',
            'genreId' => '1',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '5',
            'genreId' => '5',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '5',
            'genreId' => '6',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '6',
            'genreId' => '1',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '6',
            'genreId' => '2',
        ]);
        DB::table('book__genres')->insert([
            'bookId' => '6',
            'genreId' => '4',
        ]);
    }
}
