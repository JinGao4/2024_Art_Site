<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Art;
use Carbon\Carbon;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        Art::insert([
            ['title' => 'Starry Night','artistname' => 'Vincent Van Gogh',
                'about' => 'The Starry Night is an oil-on-canvas painting by the Dutch Post-Impressionist painter Vincent van Gogh, painted in June 1889. It depicts the view from the east-facing window of his asylum room at Saint-Rémy-de-Provence, just before sunrise, with the addition of an imaginary village.',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg/1135px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg'
            ],

            ['title' => 'The Scream', 'artistname' => ' Edvard Munch',
                'about' => 'In a conversation about the role of raw emotion in art, Edvard Munch’s The Scream is perhaps the most important within the collection of Oslo’s Munch Museum. It showcases the turn-of-the-century experimentation in the expressive quality of art. Described by the artist as his encapsulation of a scream of nature itself, Munch conveyed this intensity not only with the gaunt, ghostlike figure in the foreground who grips his cheeks in anxiety but also with the play of bold reds and oranges and deep blues that construct the landscape beyond. Munch’s palette emphasized the emotional impact of the work and thus demonstrated a key characteristic of the Expressionist movement that would grow in acclaim thanks to Munch’s iconic work.',
                'image' => 'https://invaluable.com/blog/wp-content/uploads/sites/77/2022/09/Munch.jpg'],

            ['title' => 'MACHINE HALLUCINATIONS — NATURE DREAMS', 'artistname' => 'Refik Anadol',
                'about' => 'MACHINE HALLUCINATIONS — NATURE DREAMS, designed specifically for KÖNIG GALERIE, comprises three novel aesthetic approaches to a vast photographic dataset of nature: A giant data sculpture displaying machine-generated, dynamic pigments of nature titled NATURE DREAMS, four new series of data paintings, and WINDS OF BERLIN, a site-specific, public art projection on the tower of ST. AGNES which will be created based on environmental real-time data collected from the city.',
                'image' => 'https://www.koeniggalerie.com/cdn/shop/files/2021_Refik-Anadol_Machine-Hallucinations-Nature-Dreams_KOENIG-GALERIE-NAVE_Berlin_c_Roman_Maerz-_2_1600x.jpg?v=1642082324'],

            ['title' => 'Still Life with Papaya', 'artistname' => 'Armando Morales',
            'about' => "Still Life with Papaya is an Oil on Paper Painting created by Armando Morales in 2001. The image is used according to Educational Fair Use, and tagged Still Life and Fruit.",
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnjbrJAynq-2VdAjgmudzRcoqN5eVPVFBQ9g&s'],

            ['title' => 'Mamam', 'artistname' => 'Louise Bourgeois',
            'about' => "Standing at a height of 30 meters in the shape of a spider, Maman is an iconic sculptural artwork by Louise Bourgeois, made in 1990. Various versions of the piece exist, created using a diverse range of materials. Built for an exhibition at the Tate Modern, it pays homage to Bourgeois‘ mother, who died suddenly when the artist was just 21.",
            'image' => 'https://i0.wp.com/blog.artsper.com/wp-content/uploads/2019/07/bourgeois.jpg?w=644&ssl=1'],

            ['title' => 'Untitled', 'artistname' => 'Keith Haring',
            'about' => "This painting sums up the Pop Art style of Keith Haring, with dynamic figures and a simple composition. From his beginnings as a graffiti artist on the New York subway, Keith Haring began his career with his immediately recognizable figures and patterns. One of his most commonly represented symbols is the heart. He used his work to popularize important messages about sexuality and AIDS during a time when the stigma and taboo surrounding these topics were still prevalent.",
            'image' => 'https://i0.wp.com/blog.artsper.com/wp-content/uploads/2019/07/haring.jpg?w=644&ssl=1'],

        ]);
    }
}
