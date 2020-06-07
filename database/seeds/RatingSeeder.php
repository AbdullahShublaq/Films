<?php

use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ratings = [
            [
                'user_id' => '1',
                'film_id' => '1',
                'rating' => '4',
            ],
            [
                'user_id' => '1',
                'film_id' => '2',
                'rating' => '7',
            ],
            [
                'user_id' => '2',
                'film_id' => '2',
                'rating' => '5',
            ]
        ];

        foreach ($ratings as $rating) {
            \App\Rating::create($rating);
        }

    }
}
