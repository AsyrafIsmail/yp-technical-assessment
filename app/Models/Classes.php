<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public function subjects() {
        return $this->belongsToMany(Subject::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
