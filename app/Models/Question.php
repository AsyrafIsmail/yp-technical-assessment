<?php

namespace App\Models;

use GuzzleHttp\ClientTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['exam_id', 'question_text', 'type'];
    public function exams() {
        return $this->belongsTo(Exam::class);
    }
    public function options() {
        return $this->hasMany(Option::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

}
