<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    private $books = [
        [
            'id' => 1,
            'title' => 'Laskar Pelangi',
            'description' => 'Novel ini menceritakan tentang sekelompok anak-anak di sebuah desa di Indonesia yang berjuang untuk mendapatkan pendidikan.',
            'author_id' => 3,
            'genre_id' => 1,
            'price' => 100000,
            'stock' => 10,
            'cover_photo' => 'laskar_pelangi.jpg',
        ],
        [
            'id' => 2,
            'title' => 'Supernova: Kesatria, Putri, dan Bintang Jatuh',
            'description' => 'Novel ini menceritakan tentang perjalanan hidup seorang pemuda yang bernama Bhisma.',
            'author_id' => 6,
            'genre_id' => 6,
            'price' => 120000,
            'stock' => 5,
            'cover_photo' => 'supernova.jpg',
        ],
        [
            'id' => 3,
            'title' => 'Rindu',
            'description' => 'Novel ini menceritakan tentang perjalanan cinta seorang pemuda yang bernama Rindu.',
            'author_id' => 1,
            'genre_id' => 3,
            'price' => 130000,
            'stock' => 8,
            'cover_photo' => 'rindu.jpg',
        ],
        [
            'id' => 4,
            'title' => 'Murder on the Orient Express',
            'description' => 'Novel ini menceritakan tentang penyelidikan kasus pembunuhan di dalam kereta api.',
            'author_id' => 5,
            'genre_id' => 7,
            'price' => 150000,
            'stock' => 5,
            'cover_photo' => 'murder.jpg',
        ],
        [
            'id' => 5,
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'description' => 'Novel ini menceritakan tentang petualangan seorang anak bernama Harry Potter di sekolah sihir Hogwarts.',
            'author_id' => 4,
            'genre_id' => 1,
            'price' => 100000,
            'stock' => 10,
            'cover_photo' => 'harry_potter.jpg',
        ],
        [
            'id' => 6,
            'title' => 'Manusia Setengah Salmon',
            'description' => 'Novel ini menceritakan tentang kehidupan seorang pemuda yang memiliki sifat unik dan lucu.',
            'author_id' => 2,
            'genre_id' => 1,
            'price' => 120000,
            'stock' => 5,
            'cover_photo' => 'manusia_setengah_salmon.jpg',
        ],
    ];
    public function getBooks()
    {
        return $this->books;
    }
}
