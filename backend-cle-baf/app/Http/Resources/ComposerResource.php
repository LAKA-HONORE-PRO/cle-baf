<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComposerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'student' => new StudentResource($this->whenLoaded('student')),
            'examen_id' => $this->examen_id,
            'examen' => new ExamenResource($this->whenLoaded('examen')),
            'date' => $this->date,
            'note' => $this->note,
            'is_valider' => $this->is_valider,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}