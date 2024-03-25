<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\Console\Style\comment;

class Poem extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'poem';

    public function getComments(string $id) {
//        $comments = Comment::where('poem_id',$id)->get();
//        return $comments;

    }

    public function comments() {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class); //$this->poem_id;
    }

    public function username() {
        $user = $this->user();
        if(is_null($user)){
            return "";
        } return $user->name;
    }
}
