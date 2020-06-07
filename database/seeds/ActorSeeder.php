<?php

use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $actors = [
            [
                'name' => 'ASH',
                'dob' => '2000-01-25',
                'overview' => 'overviewoverviewoverviewoverviewoverviewoverviewoverviewoverviewoverviewoverviewoverview',
                'biography' => 'biographybiographybiographybiographybiographybiographybiographybiographybiographybiographybiographybiographybiography',
                'avatar' => 'actor_avatars/avatar.jpg',
                'background_cover' => 'actor_background_covers/cover.jpg',
            ],
            [
                'name' => 'MWAK',
                'dob' => '1998-12-07',
                'overview' => 'overviewoverviewoverviewoverviewoverviewoverviewoverviewoverviewoverviewoverviewoverview',
                'biography' => 'biographybiographybiographybiographybiographybiographybiographybiographybiographybiographybiographybiographybiography',
                'avatar' => 'actor_avatars/avatar.jpg',
                'background_cover' => 'actor_background_covers/cover.jpg',
            ],
            [
                'name' => 'HANI',
                'dob' => '1999-06-15',
                'overview' => 'overviewoverviewoverviewoverviewoverviewoverviewoverviewoverviewoverviewoverviewoverview',
                'biography' => 'biographybiographybiographybiographybiographybiographybiographybiographybiographybiographybiographybiographybiography',
                'avatar' => 'actor_avatars/avatar.jpg',
                'background_cover' => 'actor_background_covers/cover.jpg',
            ]
        ];

        foreach ($actors as $actor){
            \App\Actor::create($actor);
        }
    }
}
