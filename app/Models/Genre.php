<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [ 
        [
            'id' => 1,
            'name' => 'Fiksi',
            'description' => 'Genre fiksi adalah genre yang berisi cerita-cerita yang tidak nyata atau imajinatif. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.',
        ],                                  
        [
            'id' => 2,
            'name' => 'Non-Fiksi',
            'description' => 'Genre non-fiksi adalah genre yang berisi cerita-cerita yang berdasarkan fakta atau kenyataan. Cerita-cerita ini bisa berupa biografi, autobiografi, atau karya sastra lainnya.',
        ],
        [
            'id' => 3,
            'name' => 'Romansa',
            'description' => 'Genre romansa adalah genre yang berisi cerita-cerita yang berfokus pada hubungan percintaan antara tokoh-tokohnya. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.',
        ],
        [
            'id' => 4,
            'name' => 'Horor',
            'description' => 'Genre horor adalah genre yang berisi cerita-cerita yang menakutkan atau menyeramkan. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.',
        ],
        [
            'id' => 5,
            'name' => 'Petualangan',
            'description' => 'Genre petualangan adalah genre yang berisi cerita-cerita yang berfokus pada perjalanan atau petualangan tokoh-tokohnya. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.',
        ],
        [
            'id' => 6,
            'name' => 'Ilmiah',
            'description' => 'Genre ilmiah adalah genre yang berisi cerita-cerita yang berfokus pada ilmu pengetahuan dan teknologi. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.',
        ],
        [
            'id' => 7,
            'name' => 'Misteri/Detektif',
            'description' => 'Genre misteri/detektif adalah genre yang berisi cerita-cerita yang berfokus pada penyelidikan atau pemecahan teka-teki. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.',
        ],
        [
            'id' => 8,
            'name' => 'Sejarah',
            'description' => 'Genre sejarah adalah genre yang berisi cerita-cerita yang berfokus pada peristiwa-peristiwa sejarah. Cerita-cerita ini bisa berupa novel, cerpen, atau karya sastra lainnya.',
        ],
    ];

    public function getGenres()
    {
        return $this->genres;
    }
}
