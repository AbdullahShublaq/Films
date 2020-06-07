<?php

use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $favorites = [
            [
                'user_id' => '1',
                'film_id' => '1',
            ],
            [
                'user_id' => '1',
                'film_id' => '2',
            ],
            [
                'user_id' => '2',
                'film_id' => '2',
            ]
        ];

        foreach ($favorites as $favorite) {
            \App\Favorite::create($favorite);
        }
    }
}
