<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appartenir extends Model
{
    protected $fillable = ['student_id', 'level_id', 'attestation_link', 'is_valider'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}