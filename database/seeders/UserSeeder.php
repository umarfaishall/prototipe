<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Fundraising',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'name' => 'Korlap',
            'email' => 'korlap@example.com',
            'role' => 'korlap',
            'password' => bcrypt('korlap123'),
        ]);

        User::create([
            'name' => 'Pimpinan',
            'email' => 'pimpinan@example.com',
            'role' => 'pimpinan',
            'password' => bcrypt('pimpinan123'),
        ]);

        User::create([
            'name' => 'Udin',
            'email' => 'user@example.com',
            'role' => 'user',
            'password' => bcrypt('user123'),
            'phone' => '081234567890',
            'domicile' => 'Jakarta',
        ]);
    }
}
