<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::insert([
            'name' => 'admin',
            'role' => 'admin',
            'username' => 'admin',
            'password' => hash::make('12345678'),
        ]);
        User::insert([
            'name' => 'member',
            'role' => 'member',
            'username' => 'member',
            'password' => hash::make('12345678'),
        ]);
    }
}
