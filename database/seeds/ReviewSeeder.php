<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $reviews = [
            [
                'user_id' => '1',
                'film_id' => '1',
                'review' => 'nice film',
            ],
            [
                'user_id' => '1',
                'film_id' => '2',
                'review' => 'I like this film very much, and the scenarios is very perfect',
            ],
            [
                'user_id' => '2',
                'film_id' => '2',
                'review' => 'bad film',
            ]
        ];

        foreach ($reviews as $review) {
            \App\Review::create($review);
        }
    }
}
