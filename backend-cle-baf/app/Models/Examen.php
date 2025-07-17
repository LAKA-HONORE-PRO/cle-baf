<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use \Cviebrock\EloquentSluggable\Sluggable;
    protected $fillable = ['intitule', 'unit_id', 'duree', 'type', 'etat', 'description', 'objectifs', 'nbre_points', 'nbre_passage'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function composers()
    {
        return $this->hasMany(Composer::class);
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