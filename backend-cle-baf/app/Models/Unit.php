<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use \Cviebrock\EloquentSluggable\Sluggable;
    protected $fillable = ['intitule', 'description', 'objectifs', 'level_id'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function examens()
    {
        return $this->hasMany(Examen::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
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