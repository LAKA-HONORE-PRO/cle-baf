<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamenResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'intitule' => $this->intitule,
            'unit_id' => $this->unit_id,
            'unit' => new UnitResource($this->whenLoaded('unit')),
            'duree' => $this->duree,
            'type' => $this->type,
            'etat' => $this->etat,
            'nbre_points' => $this->nbre_points,
            'nbre_passage' => $this->nbre_passage,
            'slug' => $this->slug,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}