<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['exam_id', 'question_text', 'type'];
    public function exams() {
        return $this->belongsTo(Exam::class);
    }
    public function options() {
        return $this->hasMany(Option::class);
    }
}
