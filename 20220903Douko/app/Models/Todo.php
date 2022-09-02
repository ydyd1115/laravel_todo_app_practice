<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['task'];




    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function tag(){
        return $this->hasone('App\Models\Tag');     
    }
}