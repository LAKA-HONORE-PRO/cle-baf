<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    protected $fillable = ['student_id', 'examen_id', 'date', 'note', 'is_valider'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}