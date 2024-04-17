<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Main
{
    use HasFactory, SoftDeletes; // что это?

    protected $table = 'song';
    protected $attributes =
        ['title'=>'Без названия',
        'lyrics'=>'Где песня, Лебовски?',
        'artist_id'=>0,
        'release_date'=>'2024-01-01 00:00:00'];

    protected $fillable = ['title', 'lyrics', 'artist_id', 'release_date'];

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
