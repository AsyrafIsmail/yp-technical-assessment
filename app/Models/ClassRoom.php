<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function subjects() {
        return $this->belongsToMany(
            Subject::class,
            'class_subject',
            'classroom_id',
            'subject_id'
        );
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }
}
