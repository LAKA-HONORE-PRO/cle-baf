<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use \Cviebrock\EloquentSluggable\Sluggable;
    protected $fillable = ['intitule', 'type', 'examen_id', 'nbre_points'];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
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