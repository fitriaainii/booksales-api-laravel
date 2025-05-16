<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Laskar Pelangi',
            'author_id' => 3,
            'genre_id' => 1,
            'price' => 100000,
            'stock' => 10,
            'cover_photo' => 'laskar_pelangi.jpg'
        ]);
        Book::create([
            'title' => 'Supernova: Kesatria, Putri, dan Bintang Jatuh',
            'author_id' => 6,
            'genre_id' => 6,
            'price' => 120000,
            'stock' => 5,
            'cover_photo' => 'supernova.jpg'
        ]);
        Book::create([
            'title' => 'Rindu',
            'author_id' => 1,
            'genre_id' => 3,
            'price' => 130000,
            'stock' => 8,
            'cover_photo' => 'rindu.jpg'
        ]);
        Book::create([
            'title' => 'Murder on the Orient Express',
            'author_id' => 5,
            'genre_id' => 7,
            'price' => 150000,
            'stock' => 5,
            'cover_photo' => 'murder.jpg'
        ]);
        Book::create([
            'title' => "Harry Potter and the Sorcerer's Stone",
            'author_id' => 4,
            'genre_id' => 3,
            'price' => 150000,
            'stock' => 5,
            'cover_photo' => 'harry_potter.jpg'
        ]);
        Book::create([
            'title' => 'Manusia Setengah Salmon',
            'author_id' => 2,
            'genre_id' => 1,
            'price' => 120000,
            'stock' => 5,
            'cover_photo' => 'manusia_setengah_salmon.jpg'
        ]);
    }
}

