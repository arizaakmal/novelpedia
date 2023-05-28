<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Novel;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;


class NovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Novel::factory(10)->create();

       $novel =  Novel::create([
            'title' => 'Reincarnation Of The Strongest Sword God',
            'slug' => 'reincarnation-of-the-strongest-sword-god',
            'description' => 'Starting over once more, he has entered this “living game” again in order to control his own fate. This time, he will not be controlled by others. Previously the Level 200 Sword King, he will rise to a higher peak in this life. Methods to earn money! Dungeon conquering strategies! Legendary Quests! Equipment drop locations! Undiscovered battle techniques! Even the secrets Beta Testers were unknowledgeable of, he knows of them all. Massive wars, life advancement, entering Godhood, sword reaching to the peak; a legend of a man becoming a Sword God has begun.',
            'author_id' => 6,
            'cover' => 'Reincarnation-Of-The-Strongest-Sword-God.png'
        ]);

        $genre = Genre::whereIn('id', [1, 2, 5])->get();
        $novel->genres()->attach($genre);

        // Menyimpan cover gambar ke storage dan menghubungkannya dengan novel
        $cover = 'Reincarnation-Of-The-Strongest-Sword-God.png';
        Storage::copy('covers/' . $cover, 'public/covers/' . $cover);
        $novel->cover = $cover;
        $novel->save();
    }
}

