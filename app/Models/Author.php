<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'id' => 1,
            'name' => 'Tere Liye',
            'description' => 'Tere Liye adalah seorang penulis novel terkenal di Indonesia. Ia dikenal dengan karya-karyanya yang menyentuh hati dan penuh makna.',
        ],
        [
            'id' => 2,
            'name' => 'Raditya Dika',
            'description' => 'Raditya Dika adalah seorang penulis, komika, dan sutradara asal Indonesia. Ia dikenal dengan gaya penulisan yang humoris dan menghibur.',
        ],
        [
            'id' => 3,
            'name' => 'Andrea Hirata',
            'description' => 'Andrea Hirata adalah seorang penulis asal Indonesia yang terkenal dengan novel Laskar Pelangi. Ia dikenal dengan gaya penulisan yang puitis dan penuh inspirasi.',
        ],
        [
            'id' => 4,
            'name' => 'J.K. Rowling',
            'description' => 'J.K. Rowling adalah seorang penulis asal Inggris yang terkenal dengan seri novel Harry Potter. Ia dikenal dengan gaya penulisan yang imajinatif dan penuh petualangan.',
        ],
        [
            'id' => 5,
            'name' => 'Agatha Christie',
            'description' => 'Agatha Christie adalah seorang penulis asal Inggris yang terkenal dengan novel-novel misteri dan detektif. Ia dikenal dengan gaya penulisan yang cerdas dan penuh teka-teki.',
        ],
        [
            'id' => 6,
            'name' => 'Dee Lestari',
            'description' => 'Dee Lestari adalah seorang penulis asal Indonesia yang terkenal dengan novel-novel fiksi ilmiah. Ia dikenal dengan gaya penulisan yang inovatif dan penuh imajinasi.',
        ],
    ];
    public function getAuthors()
    {
        return $this->authors;
    }
}
