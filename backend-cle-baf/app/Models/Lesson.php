<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use \Cviebrock\EloquentSluggable\Sluggable;
    protected $fillable = ['intitule', 'description', 'objectifs', 'type', 'lien', 'unit_id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
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