<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Ariza Akmal Syahida',
            'username' => 'arizaakmal',
            'email' => 'arizaakmal@gmail.com',
            'password' => 'password',
        ]);
    }
}