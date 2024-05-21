<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Main
{
    use HasFactory, SoftDeletes;

    protected $table = 'collection';
    protected $attributes = [
        'title'=>'Без названия',
        'author_id'=>'0',
        'release_year'=>'2024',
        'description'=>'Расскажите о сборнике.',
        'cover'=>'?',
        'is_listenable'=>'0',
    ];

    protected $fillable = [
        'title',
        'author_id',
        'release_year',
        'description',
        'cover',
        'is_listenable',
    ];

    public function poems() {
        return $this->belongsToMany(\App\Models\Poem::class,'poem_collection'); // в кавычках - таблица связки
    }

    /*public function authorsNames() {
        return $this->belongsToMany(\App\Models\Poem::class,'poem_collection'); // в кавычках - таблица связки
    }*/
}
