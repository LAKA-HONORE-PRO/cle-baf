<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LevelResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'intitule' => $this->intitule,
            'description' => $this->description,
            'objectifs' => $this->objectifs,
            'slug' => $this->slug,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}