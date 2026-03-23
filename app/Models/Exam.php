<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'classroom_id', 'subject_id', 'duration'];

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
    public function questions() {
        return $this->hasMany(Question::class);
    }
}
