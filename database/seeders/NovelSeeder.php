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

        $novelsData = [
            [
                'title' => 'Reincarnation Of The Strongest Sword God',
                'slug' => 'reincarnation-of-the-strongest-sword-god',
                'views' => 24562,
                'pages' => 225,
                'rating' => 9.5,
                'description' => 'Starting over once more, he has entered this “living game” again in order to control his own fate. This time, he will not be controlled by others. Previously the Level 200 Sword King, he will rise to a higher peak in this life. Methods to earn money! Dungeon conquering strategies! Legendary Quests! Equipment drop locations! Undiscovered battle techniques! Even the secrets Beta Testers were unknowledgeable of, he knows of them all. Massive wars, life advancement, entering Godhood, sword reaching to the peak; a legend of a man becoming a Sword God has begun.',
                'author_id' => 6,
                'cover' => 'Reincarnation-Of-The-Strongest-Sword-God.png',
                'genres' => [1, 2, 5],
            ],
            [
                'title' => 'Library of Heaven\'s Path',
                'slug' => 'library-of-heavens-path',
                'views' => 14569,
                'pages' => 143,
                'rating' => 8.9,
                'description' => 'Traversing into another world, Zhang Xuan finds himself becoming an honorable teacher.
                Along with his transcension, a mysterious library appears in his mind.
                As long as it is something he has seen, regardless of whether it is a human or an object, a book on its weaknesses will be automatically compiled in the library.
                Thus, he becomes formidable.',
                'author_id' => 7,
                'cover' => 'Library-of-Heavens-Path.jpg',
                'genres' => [1, 3, 5],
            ],
            [
                'title' => 'The Nightingale',
                'slug' => 'the-nightingale',
                'views' => 17890,
                'pages' => 343,
                'rating' => 9.1,
                'description' => 'FRANCE, 1939
                In the quiet village of Carriveau, Vianne Mauriac says good-bye to her husband, Antoine, as he heads for the Front. She doesn’t believe that the Nazis will invade France…but invade they do, in droves of marching soldiers, in caravans of trucks and tanks, in planes that fill the skies and drop bombs upon the innocent. When a German captain requisitions Vianne\'s home, she and her daughter must live with the enemy or lose everything. Without food or money or hope, as danger escalates all around them, she is forced to make one impossible choice after another to keep her family alive.
                Vianne\'s sister, Isabelle, is a rebellious eighteen-year-old, searching for purpose with all the reckless passion of youth. While thousands of Parisians march into the unknown terrors of war, she meets Gaëtan, a partisan who believes the French can fight the Nazis from within France, and she falls in love as only the young can…completely. But when he betrays her, Isabelle joins the Resistance and never looks back, risking her life time and again to save others.',
                'author_id' => 8,
                'cover' => 'axfn59rzrzjbpugupkony8.jpg',
                'genres' => [9, 10],
            ],
            [
                'title' => 'You Better Be Lightning',
                'slug' => 'you-better-be-lightning',
                'views' => 9876,
                'pages' => 234,
                'rating' => 8.7,
                'description' => 'You Better Be Lightning by Andrea Gibson is a queer, political, and feminist collection guided by self-reflection.
                The poems range from close examination of the deeply personal to the vastness of the world, exploring the expansiveness of the human experience from love to illness, from space to climate change, and so much more in between. 
                One of the most celebrated poets and performers of the last two decades, Andrea Gibson’s trademark honesty and vulnerability are on full display in You Better Be Lightning, welcoming and inviting readers to be just as they are.',
                'author_id' => 9,
                'cover' => 'YBBL-Award-Cover-1-360x548.png',
                'genres' => [10],
            ],
            [
                'title' => 'Dune',
                'slug' => 'dune',
                'views' => 2578,
                'pages' => 153,
                'rating' => 8.5,
                'description' => 'On the planet Arrakis, the story of a young man named Paul Atreides begins. Paul\'s father was appointed by the Imperium as ruler of the desert planet also known as Dune. Although not a comfortable place to live, Arrakis has a precious spice that is being fought for throughout the universe. So when the Atreides Clan was betrayed, the destruction of his family forced Paul to take a fateful journey to the desert.',
                'author_id' => 10,
                'cover' => 'ih86gbr4urzmibs3ah49hq.jpg',
                'genres' => [2, 5, 10],
            ],
            [
                'title' => 'Bulan',
                'slug' => 'bulan',
                'views' => 289,
                'pages' => 267,
                'rating' => 9.0,
                'description' => 'Petualangan Raib, Seli, dan Ali berlanjut. Beberapa bulan setelah peristiwa klan bulan, Miss Selena akhirnya muncul di sekolah. Ia membawa kabar menggembirakan untuk anak-anak yang berjiwa petualang seperti Raib, Seli, dan Ali. Miss Selena bersama dengan Av akan mengajak mereka untuk mengunjungi klan matahari selama dua minggu. Av berencana akan bertemu dengan ketua konsil klan matahari, yang menguasai klan matahari sepenuhnya untuk mencari sekutu dalam menghadapi Tamus yang diperkirakan akan bebas dan juga membebaskan raja tanpa mahkota.
                Sesampainya mereka di Klan matahari, mereka disambut oleh festival bunga matahari. Hal yang tidak pernah disangka oleh Av dan Miss Selena adalah ketua konsil klan matahari yang meminta Raib, Seli, Ali, dan Ily untuk menjadi peserta ke-10 dari festival bunga matahari. Setelah perdebatan yang amat panjang, akhirnya rombongan Raib menerima tawaran itu.',
                'author_id' => 11,
                'cover' => '457f51bdb14c378652347759c684df27.jpg',
                'genres' => [2, 5],
            ],



        ];

        foreach ($novelsData as $novelData) {
            $novel = Novel::create([
                'title' => $novelData['title'],
                'slug' => $novelData['slug'],
                'views' => $novelData['views'],
                'pages' => $novelData['pages'],
                'rating' => $novelData['rating'],
                'description' => $novelData['description'],
                'author_id' => $novelData['author_id'],
            ]);

            $genreIds = $novelData['genres'];
            $genres = Genre::whereIn('id', $genreIds)->get();
            $novel->genres()->attach($genres);

            // Menyimpan cover gambar ke storage dan menghubungkannya dengan novel
            $cover = $novelData['cover'];
            Storage::copy('covers/' . $cover, 'public/covers/' . $cover);
            $novel->cover = $cover;
            $novel->save();
        }
    }
}
