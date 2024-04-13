<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory; // что это?

    protected $table = 'song';

    public function comments() {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class); //$this->poem_id;
    }

    /*public function username() { XXX IN THE MAIN MODEL NOW XXX
        $user = $this->user; //должен достать из relation
        if(is_null($user)){
            return "неизвестен";
        }
        return $user->name;
    }*/
}
