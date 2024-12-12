<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        Genre::insert([
            ['name' => 'Painting',
                'image' => 'images/arts/painting.jpg',
                'about' => 'Painting is a visual art, which is characterized by the practice of applying paint, pigment, color or other medium to a solid surface. The medium is commonly applied to the base with a brush, but other implements, such as knives, sponges, and airbrushes, may be used. One who produces paintings is called a painter.'],

                ['name' => 'Sculpture',
                'image' => 'images/arts/sculpture.jpg',
                'about' => 'Sculpture is the branch of the visual arts that operates in three dimensions. Sculpture is the three-dimensional art work which is physically presented in the dimensions of height, width and depth. It is one of the plastic arts.'],

                ['name' => 'Digital Art',
                'image' => 'images/arts/digital.jpg',
                'about' => 'Digital art refers to any artistic work or practice that uses digital technology as part of the creative or presentation process. It can also refer to computational art that uses and engages with digital media.'],

                ['name' => 'Illustration',
                'image' => 'images/arts/illustration.jpg',
                'about' => 'An illustration is a decoration, interpretation, or visual explanation of a text, concept, or process, designed for integration in print and digitally published media, such as posters, flyers, magazines, books, teaching materials, animations, video games and films.'],

                ['name' => 'Printmaking',
                'image' => 'images/arts/printmaking.jpg',
                'about' => 'Printmaking is the process of creating artworks by printing, normally on paper, but also on fabric, wood, metal, and other surfaces'],
        ]);
    }
}
