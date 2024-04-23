<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\Console\Style\comment;

class Poem extends Main
{
    use HasFactory,SoftDeletes;

    protected $table = 'poem';
    protected $attributes = [
        'title'=>'Без названия',
        'author_id'=>0,
        'publisher_id'=>0,
        'release_date'=>'2024-01-01 00:00:00',
        'release_year'=>2024,
        'content'=>'Без содержания'
    ];

/*    const STATUS_NEW = 'new';
    const STATUS_DRAFT = 'draft';
    const STATUS_UNLISTED = 'unlisted';
    const STATUS_PUBLISHED = 'published';
    const STATUS_HIDDEN = 'hidden';*/

    //white-list для заполнения // указываю какие поля можно заполнять fillable
    protected $fillable = ['title', 'content', 'release_year', 'created_at'];

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

    /*public function username() { XXX IN THE MAIN MODEL NOW XXX
        $user = $this->user; //должен достать из relation
        if(is_null($user)){
            return "неизвестен";
        } return $user->name;
    }*/

    /*public function getAttributeNames() {
        $attributeNames = \Schema::getColumnListing($this->table);
        return $attributeNames;
    }*/

    /*public function getAuthorName() {
        if ($this->user())
    }*/
}
