<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('books')->insert([
            'name' => 'Harry Potter',
            'author' => 'J. K. Rowling',
            'synopsis' => 'Harry Potter is a series of seven fantasy novels written by British author J. K. Rowling. The novels chronicle the lives of a young wizard.',
            'cover' => 'https://m.media-amazon.com/images/I/51E7NvVLO9L._SL350_.jpg',
            // 'file' => 'http://www.passuneb.com/elibrary/ebooks/Harry%20Potter%20and%20The%20Chamber%20of%20Secrets.pdf',
            'price' => '20000',
            'storeId' => '1', 
            'typeId' => '1',
        ]);

        DB::table('books')->insert([
            'name' => 'Diary of a Wimpy Kid',
            'author' => 'Jeff Kinney and Thomas Clark',
            'synopsis' => 'Boys don\'t keep diaries--or do they? The launch of an exciting and innovatively illustrated new series narrated by an unforgettable kid every family can relate to It\'s a new school year, and Greg Heffley finds himself thrust into middle school, where undersized weaklings share the hallways with kids who are taller, meaner, and already shaving. ',
            'cover' => 'https://img.thriftbooks.com/api/images/i/m/0B9952CD0CDE262938E0CB19094D080AFB3DC2EE.jpg',
            // 'file' => 'http://www.passuneb.com/elibrary/ebooks/Diary%20of%20a%20Wimpy%20Kid%20(Hard%20Luck).pdf',
            'price' => '50000',
            'storeId' => '1', 
            'typeId' => '1',
        ]);

        DB::table('books')->insert([
            'name' => 'Clean Code',
            'author' => 'Robert Cecil Martin',
            'synopsis' => 'Even bad code can function. But if code isn\'t clean, it can bring a development organization to its knees. Every year, countless hours and significant resources are lost because of poorly written code.',
            'cover' => 'https://img.thriftbooks.com/api/images/i/m/0B9952CD0CDE262938E0CB19094D080AFB3DC2EE.jpg',
            // 'file' => 'https://mooc.aptikom.or.id/pluginfile.php/1174/mod_resource/content/1/Clean%20Code_%20A%20Handbook%20of%20Agile%20Software%20C%20-%20Robert%20C.%20Martin.pdf',
            'price' => '50000',
            'storeId' => '2', 
            'typeId' => '2',
        ]);
    }
}
