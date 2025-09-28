<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::insert([
            [
                'name' => 'Alice',
                'email' => 'alice@example.com',
                'password' => bcrypt('password'),
                'points' => 10,
            ],
            [
                'name' => 'Bob',
                'email' => 'bob@example.com',
                'password' => bcrypt('password'),
                'points' => 20,
            ],
        ]);
    }
}
