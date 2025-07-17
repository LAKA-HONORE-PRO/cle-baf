<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'intitule' => $this->intitule,
            'description' => $this->description,
            'objectifs' => $this->objectifs,
            'level_id' => $this->level_id,
            'slug' => $this->slug,
            'level' => new LevelResource($this->whenLoaded('level')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}