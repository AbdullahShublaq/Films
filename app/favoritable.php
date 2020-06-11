<?php
/**
 * Created by PhpStorm.
 * User: jit
 * Date: 11/06/2020
 * Time: 12:32 م
 */

namespace App;


trait favoritable
{
    public function isInFavorite($user)
    {
        if ($user != NULL) {
            $favorites = $user->favorites;
            foreach ($favorites as $favorite) {
                if ($favorite->user_id == $user->id && $favorite->film_id == $this->id){
                    return TRUE;
                }
            }
            return FALSE;
        }
    }

    public function addToFavorite($user)
    {
        if (!$this->isInFavorite($user)) {
            $this->favorites()->create([
                'user_id' => $user->id,
                'film_id' => $this->id,
            ]);
            return TRUE;
        }
        return FALSE;
    }

    public function removeFromFavorite($user)
    {
        if($this->isInFavorite($user)){
            $this->favorites()->where('user_id', $user->id)->delete();
            return TRUE;
        }
        return FALSE;
    }

}