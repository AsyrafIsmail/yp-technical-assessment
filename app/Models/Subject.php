<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    public function classes() {
        return $this->belongsToMany(Classes::class);
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }
}
