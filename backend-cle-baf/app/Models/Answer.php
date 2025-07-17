<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use \Cviebrock\EloquentSluggable\Sluggable;
    protected $fillable = ['intitule', 'type', 'is_correct', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'intitule'
            ]
        ];
    }
}