<?php

use Illuminate\Database\Seeder;

class FilmCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $filmCategories = [
            [
                'film_id' => '1',
                'category_id' => '1',
            ],
            [
                'film_id' => '1',
                'category_id' => '2',
            ],
            [
                'film_id' => '2',
                'category_id' => '1',
            ],
        ];

        foreach ($filmCategories as $filmCategory) {
            \Illuminate\Support\Facades\DB::table('film_category')->insert($filmCategory);
        }
    }
}
