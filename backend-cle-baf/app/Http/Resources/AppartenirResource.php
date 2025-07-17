<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppartenirResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'student' => new StudentResource($this->whenLoaded('student')),
            'level_id' => $this->level_id,
            'level' => new LevelResource($this->whenLoaded('level')),
            'attestation_link' => $this->attestation_link,
            'is_valider' => $this->is_valider,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}