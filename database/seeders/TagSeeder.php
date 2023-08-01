<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Reincarnation',
            'Overpowered',
            'System',
            'Game',
            'Galactic Empire',
            'Dystopia',
            'Political Intrigue',
            'Wars',
            'Historical Fiction',
            'Women\'s Fiction',
            'Courage',
            'Teacher',
            'Cheats',

            // Add more tags as needed
        ];

        // Insert the tags data into the database
        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        }
    }
}
