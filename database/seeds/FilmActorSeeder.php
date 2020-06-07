<?php

use Illuminate\Database\Seeder;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $filmActors = [
            [
                'film_id' => '1',
                'actor_id' => '1',
            ],
            [
                'film_id' => '1',
                'actor_id' => '2',
            ],
            [
                'film_id' => '2',
                'actor_id' => '2',
            ],
        ];

        foreach ($filmActors as $filmActor) {
            \Illuminate\Support\Facades\DB::table('film_actor')->insert($filmActor);
        }
    }
}
