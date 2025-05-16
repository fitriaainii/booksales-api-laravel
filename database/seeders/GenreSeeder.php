<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Fiksi',
            'description' => 'Genre fiksi adalah genre yang berisi cerita-cerita yang tidak nyata atau imajinatif. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.'
        ]);
        Genre::create([
            'name' => 'Non-Fiksi',
            'description' => 'Genre non-fiksi adalah genre yang berisi cerita-cerita yang berdasarkan fakta atau kenyataan. Cerita-cerita ini bisa berupa biografi, autobiografi, atau karya sastra lainnya.'
        ]);
        Genre::create([
            'name' => 'Romance',
            'description' => 'Genre romansa adalah genre yang berisi cerita-cerita yang berfokus pada hubungan percintaan antara tokoh-tokohnya. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.'
        ]);
        Genre::create([
            'name' => 'Horor',
            'description' => 'Genre horor adalah genre yang berisi cerita-cerita yang menakutkan atau menyeramkan. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.'
        ]);
        Genre::create([
            'name' => 'Petualangan',
            'description' => 'Genre petualangan adalah genre yang berisi cerita-cerita yang berfokus pada perjalanan atau petualangan tokoh-tokohnya. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.'
        ]);
        Genre::create([
            'name' => 'Ilmiah',
            'description' => 'Genre ilmiah adalah genre yang berisi cerita-cerita yang berfokus pada ilmu pengetahuan dan teknologi. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.'
        ]);
        Genre::create([
            'name' => '	Misteri/Detektif',
            'description' => 'Genre misteri/detektif adalah genre yang berisi cerita-cerita yang berfokus pada penyelidikan atau pemecahan teka-teki. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.'
        ]);
        Genre::create([
            'name' => 'Sejarah',
            'description' => 'Genre sejarah adalah genre yang berisi cerita-cerita yang berfokus pada peristiwa-peristiwa sejarah. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.'
        ]);
    }
}
