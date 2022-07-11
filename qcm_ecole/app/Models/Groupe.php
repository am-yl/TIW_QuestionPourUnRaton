<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    public function users() {
        return $this->hasMany(User::class);
    }

    public function questionnaires() {
        return $this->belongsToMany(Questionnaire::class);
    }
}
