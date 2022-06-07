<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function groupes() {
        return $this->belongsToMany(Groupe::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
