<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use Sluggable;
    protected $fillable = ['intitule', 'description', 'objectifs'];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function appartenirs()
    {
        return $this->hasMany(Appartenir::class);
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