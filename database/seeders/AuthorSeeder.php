<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Tere Liye',
            'description' => 'Tere Liye adalah seorang penulis novel terkenal di Indonesia. Ia dikenal dengan karya-karyanya yang menyentuh hati dan penuh makna.'
        ]);
        Author::create([
            'name' => 'Raditya Dika',
            'description' => 'Raditya Dika adalah seorang penulis, komika, dan sutradara asal Indonesia. Ia dikenal dengan gaya penulisan yang humoris dan menghibur.'
        ]);
        Author::create([
            'name' => 'Andrea Hirata',
            'description' => 'Andrea Hirata adalah seorang penulis asal Indonesia yang terkenal dengan novel Laskar Pelangi. Ia dikenal dengan gaya penulisan yang puitis dan penuh inspirasi.'
        ]);
        Author::create([
            'name' => 'J.K. Rowling',
            'description' => 'J.K. Rowling adalah seorang penulis asal Inggris yang terkenal dengan seri novel Harry Potter. Ia dikenal dengan gaya penulisan yang imajinatif dan penuh petualangan.'
        ]);
        Author::create([
            'name' => 'Agatha Christie',
            'description' => 'Agatha Christie adalah seorang penulis asal Inggris yang terkenal dengan novel-novel misteri dan detektif. Ia dikenal dengan gaya penulisan yang cerdas dan penuh teka-teki.'
        ]);
        Author::create([
            'name' => 'Dee Lestari',
            'description' => 'TDee Lestari adalah seorang penulis asal Indonesia yang terkenal dengan novel-novel fiksi ilmiah. Ia dikenal dengan gaya penulisan yang inovatif dan penuh imajinasi.'
        ]);
    }
}
