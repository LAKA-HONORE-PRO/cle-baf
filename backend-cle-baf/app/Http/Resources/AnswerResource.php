<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'intitule' => $this->intitule,
            'type' => $this->type,
            'is_correct' => $this->is_correct,
            'question_id' => $this->question_id,
            'slug' => $this->slug,
            'question' => new QuestionResource($this->whenLoaded('question')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}