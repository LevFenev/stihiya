<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Main
{
    use HasFactory, SoftDeletes;

    protected $table = 'collection';
    /*protected $attributes = [
        ''=>'',
    ];

    protected $fillable = [
        '',
    ];*/

    public function poems() {
        return $this->belongsToMany(\App\Models\Poem::class,'poem_collection'); // в кавычках - таблица связки
    }
}
