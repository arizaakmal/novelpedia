<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //make author seeder
         Author::factory(5)->create();

         Author::create([
             'name' => 'Lucky Old Cat',
             'slug' => 'lucky-old-cat',
         ]);
    }
}
