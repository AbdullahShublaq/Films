<?php
/**
 * Created by PhpStorm.
 * User: jit
 * Date: 11/06/2020
 * Time: 06:15 م
 */

namespace App;


trait reviewable
{
    public function review($user, $title, $review)
    {
        $result = $this->reviews()->updateOrCreate(
            ['user_id' => $user->id, 'film_id' => $this->id],
            ['title' => $title, 'review' => $review]
        );
        return TRUE;
    }

    public function deleteReview($user)
    {
        $this->reviews()->where('user_id', $user->id)->delete();
    }
}