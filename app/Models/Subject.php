<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function classrooms() {
        return $this->belongsToMany(
            Classroom::class,
            'class_subject',
            'subject_id',
            'classroom_id'
        );
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }
}
