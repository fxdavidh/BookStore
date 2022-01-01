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
            'price' => '20000',
        ]);
        
        DB::table('books')->insert([
            'name' => 'Art of War',
            'author' => 'Sun Tzu',
            'synopsis' => 'Sun Tzu\'s The Art of War is as timely for business people today as it was for military strategists in ancient China. Written in China more than 2,000 years ago, Sun Tzu\'s classic The Art of War is the first known study of the planning and conduct of military operations. These terse, aphoristic essays are unsurpassed in comprehensiveness and depth of understanding, examining not only battlefield maneuvers, but also relevant economic, political, and psychological factors.',
            'cover' => 'https://img.thriftbooks.com/api/images/i/m/59202EB145C8B48BD079F558349BBCD75FA34D53.jpg',
            'price' => '20000',
        ]);
        
        DB::table('books')->insert([
            'name' => 'Lord of the Rings',
            'author' => 'J.R.R. Tolkien',
            'synopsis' => 'The first volume in J.R.R. Tolkien\'s epic adventure THE LORD OF THE RINGS One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkness bind them In ancient times the Rings of Power were crafted by the Elven-smiths, and Sauron, the Dark Lord, forged the One Ring, filling it with his own power so that he could rule all others. But the One Ring was taken from him, and though he sought it throughout Middle-earth',
            'cover' => 'https://img.thriftbooks.com/api/images/i/m/DBCDFD2F74116FBF068626C6357AD9EBE0CCE8B1.jpg',
            'price' => '20000',
        ]);
        
        DB::table('books')->insert([
            'name' => 'The Da Vinci Code',
            'author' => 'Dan Brown',
            'synopsis' => 'The Great American Read While in Paris, Harvard symbologist Robert Langdon is awakened by a phone call in the dead of the night. The elderly curator of the Louvre has been murdered inside the museum, his body covered in baffling symbols. As Langdon and gifted French cryptologist Sophie Neveu sort through the bizarre riddles, they are stunned to discover a trail of clues hidden in the works of Leonardo da Vinci',
            'cover' => 'https://img.thriftbooks.com/api/images/m/7697c15cdb054ad15c83d0a032d3aa4923a83c5a.jpg',
            'price' => '20000',
        ]);
        
        DB::table('books')->insert([
            'name' => 'The Dark Tower',
            'author' => 'Stephen King',
            'synopsis' => 'Now a major motion picture starring Matthew McConaughey and Idris Elba Creating "true narrative magic" ( The Washington Post ) at every revelatory turn, Stephen King surpasses all expectation in the stunning final volume of his seven-part epic masterwork. Entwining stories and worlds from a vast and complex canvas, here is the conclusion readers have long awaited--breathtakingly imaginative, boldly visionary, and wholly entertaining. Roland Deschain and his ka-tet have journeyed together and apart, scattered far and wide across multilayered worlds of wheres and whens.',
            'cover' => 'https://img.thriftbooks.com/api/images/i/m/359068D9025D576D655044487EE0ECA484163942.jpg',
            'price' => '20000',
        ]);
        
        DB::table('books')->insert([
            'name' => 'Ready Player One',
            'author' => 'Ernest Cline',
            'synopsis' => 'As one adventure leads expertly to the next, time simply evaporates."-- Entertainment Weekly A world at stake. A quest for the ultimate prize. Are you ready? In the year 2045, reality is an ugly place. The only time Wade Watts really feels alive is when he\'s jacked into the OASIS, a vast virtual world where most of humanity spends their days. When the eccentric creator of the OASIS dies, he leaves behind a series of fiendish puzzles, based on his obsession with the pop culture of decades past. Whoever is first to solve them will inherit his vast fortune--and control of the OASIS itself. ',
            'cover' => 'https://img.thriftbooks.com/api/images/i/m/B3DBCC55E359B87DDC2DBE9797BC3FFC3C779556.jpg',
            'price' => '20000',
        ]);
    }
}
