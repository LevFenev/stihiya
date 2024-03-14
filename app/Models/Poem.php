<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poem extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'poem';

    public function getComments(string $id) {
        $comments = Comment::where('poem_id',$id)->get();
        return $comments;
    }
}
