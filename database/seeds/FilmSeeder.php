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
                'url' => '<div itemscope itemtype="https://schema.org/VideoObject"><meta itemprop="uploadDate" content="Wed Mar 04 2020 09:25:08 GMT+0200 (توقيت شرق أوروبا الرسمي)"/><meta itemprop="name" content="Naruto Shippuden Op 4"/><meta itemprop="duration" content="PT1M33.205S" /><meta itemprop="thumbnailUrl" content="https://content.jwplatform.com/thumbs/g7796nVg-1280.jpg"/><meta itemprop="contentUrl" content="https://content.jwplatform.com/videos/g7796nVg-zJl9Il4I.mp4"/><script src="https://cdn.jwplayer.com/players/g7796nVg-mBCrmi1a.js"></script></div>',
            ],
            [
                'name' => 'film2',
                'year' => '2020',
                'overview' => 'film2film2film2film2film2film2film2film2film2film2film2film2',
                'background_cover' => 'film_background_covers/film-bg.jpg',
                'poster' => 'film_posters/film-poster.jpg',
                'url' => '<div itemscope itemtype="https://schema.org/VideoObject"><meta itemprop="uploadDate" content="Wed Mar 04 2020 09:25:08 GMT+0200 (توقيت شرق أوروبا الرسمي)"/><meta itemprop="name" content="Naruto Shippuden Op 4"/><meta itemprop="duration" content="PT1M33.205S" /><meta itemprop="thumbnailUrl" content="https://content.jwplatform.com/thumbs/g7796nVg-1280.jpg"/><meta itemprop="contentUrl" content="https://content.jwplatform.com/videos/g7796nVg-zJl9Il4I.mp4"/><script src="https://cdn.jwplayer.com/players/g7796nVg-mBCrmi1a.js"></script></div>',
            ]
        ];

        foreach ($films as $film){
            \App\Film::create($film);
        }

    }
}
