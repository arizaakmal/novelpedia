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

         $authors = [
            [
                'name' => 'Lucky Old Cat',
                'slug' => 'lucky-old-cat',
            ],
            [
                'name' => 'Heng Sao Tian Ya',
                'slug' => 'heng-sao-tian-ya',
            ],
            [
                'name' => 'Kristin Hannah',
                'slug' => 'kristin-hannah',
            ],
            [
                'name' => 'Andrea Gibson',
                'slug' => 'andrea-gibson',
            ],
            [
                'name' => 'Frank Herbert',  
                'slug' => 'frank-herbert',
            ],
            [
                'name' => 'Tere Liye',  
                'slug' => 'tere-liye',
            ],
           
            // Tambahkan data penulis lainnya di sini
        ];
        
        Author::insert($authors);
    }
}
