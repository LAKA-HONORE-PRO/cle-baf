<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'intitule' => $this->intitule,
            'type' => $this->type,
            'examen_id' => $this->examen_id,
            'slug' => $this->slug,
            'examen' => new ExamenResource($this->whenLoaded('examen')),
            'nbre_points' => $this->nbre_points,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}