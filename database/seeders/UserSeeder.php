<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@admin.net',
            'name' => 'admin',
            'password' => Hash::make('secret'),
            'roleId' => '1',
        ]);
        DB::table('users')->insert([
            'email' => 'member@member.net',
            'name' => 'member',
            'password' => Hash::make('secret'),
            'roleId' => '2',
        ]);
    }
}
