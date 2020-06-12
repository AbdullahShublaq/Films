<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_name' => $this->user->username,
            'user_avatar' => $this->user->avatar,
            'user_rating' => $this->user->ratings->where('film_id', $this->film->id)->first() == NULL ? NULL : $this->user->ratings->where('film_id', $this->film->id)->first()->rating,
            'title' => $this->title,
            'review' => $this->review,
            'created_at' => date('d F Y',strtotime($this->created_at))
        ];
    }
}
