<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieShowResource extends JsonResource
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
            'name' => $this->name,
            'year' => $this->year,
            'rating' => $this->ratings->avg('rating'),
            'rating_count' => $this->ratings->count(),
            'overview' => $this->overview,
            'poster' => $this->poster,
            'api_url' => $this->api_url,
            'reviews' => ReviewShowResource::collection($this->reviews),
            'actors' => MovieActorResource::collection($this->actors)
        ];
    }
}
