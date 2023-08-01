<?php

namespace Database\Seeders;

use App\Models\Tags;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Novel;
use App\Models\User;
use Illuminate\Support\Str;
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
        $this->call(AuthorSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(NovelSeeder::class);
        $this->call(UserSeeder::class);
    }
}
