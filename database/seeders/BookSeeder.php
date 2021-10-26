<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Book::create([
            'id' => '1',
            'name' => 'Harry Potter',
            'author' => 'J. K. Rowling',
            'synopsis' => 'Harry Potter is a series of seven fantasy novels written by British author J. K. Rowling. The novels chronicle the lives of a young wizard.',
            'cover' => 'cover/harry_potter.jpg',
            'price' => '20000',
        ]);
    }
}
