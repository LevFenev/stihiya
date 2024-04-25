<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Main
{
    use HasFactory;

    protected $table = 'album';
    protected $attributes = [ // to be changed after db update #tbcadu
        'id'=>'0',
        'title'=>'Без названия',
        'author'=>'Имя артиста',
        'release_year'=>'2024',
        'release_date'=>'11.01.2024',
        'file'=>'',
    ];

    public function songs() {
        return $this->belongsToMany(\App\Models\Song::class,'song_album');
    }
}
