<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function answer(){
        return $this->hasMany(Answer::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
}
