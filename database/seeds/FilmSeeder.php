<?php

use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $films = [
            [
                'name' => 'film1',
                'year' => '2019',
                'overview' => 'film1film1film1film1film1film1film1film1film1film1film1film1',
                'background_cover' => 'film_background_covers/film-bg.jpg',
                'poster' => 'film_posters/film-poster.jpg',
                'url' => 'url1',
            ],
            [
                'name' => 'film2',
                'year' => '2020',
                'overview' => 'film2film2film2film2film2film2film2film2film2film2film2film2',
                'background_cover' => 'film_background_covers/film-bg.jpg',
                'poster' => 'film_posters/film-poster.jpg',
                'url' => 'url2',
            ]
        ];

        foreach ($films as $film){
            \App\Film::create($film);
        }

    }
}
