<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'intitule' => $this->intitule,
            'description' => $this->description,
            'objectifs' => $this->objectifs,
            'type' => $this->type,
            'lien' => $this->lien,
            'unit_id' => $this->unit_id,
            'slug' => $this->slug,
            'unit' => new UnitResource($this->whenLoaded('unit')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}