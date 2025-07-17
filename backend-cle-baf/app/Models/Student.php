<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nom', 'prenom', 'tel', 'email', 'password'];

    public function appartenirs()
    {
        return $this->hasMany(Appartenir::class);
    }

    public function composers()
    {
        return $this->hasMany(Composer::class);
    }
}