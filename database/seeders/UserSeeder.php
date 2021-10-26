<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        \App\Models\User::create([
            'id' => '1',
            'email' => 'admin@admin.net',
            'name' => 'admin',
            'password' => Hash::make('secret'),
            'roleId' => '1',
        ]);
        \App\Models\User::create([
            'id' => '2',
            'email' => 'member@member.net',
            'name' => 'member',
            'password' => Hash::make('secret'),
            'roleId' => '2',
        ]);
    }
}
