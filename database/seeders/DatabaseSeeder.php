<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            GenreSeeder::class,
            UserSeeder::class,
            BookSeeder::class,
            BookGenreSeeder::class,
            CartSeeder::class
        ]);
    }
}
