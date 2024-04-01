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
    protected $attributes = ['title'=>'Без названия','author_id'=>0,'publisher_id'=>0,'release_year'=>2024,'content'=>'Без содержания'];

    const STATUS_NEW = 'new';
    const STATUS_DRAFT = 'draft';
    const STATUS_UNLISTED = 'unlisted';
    const STATUS_PUBLISHED = 'published';
    const STATUS_HIDDEN = 'hidden';

    public function getComments(string $id) {
//        $comments = Comment::where('poem_id',$id)->get();
//        return $comments;
    }

    public function comments() {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'author_id'); //$this->poem_id;
    }

    public function username() {
        $user = $this->user; //должен достать из relation
        if(is_null($user)){
            return "";
        } return $user->name;
    }

    public function getAttributeNames() {
        $attributeNames = \Schema::getColumnListing($this->table);
        return $attributeNames;
    }
}
