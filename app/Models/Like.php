<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'reaction';

    protected $attributes = [
        'id'=>'',
        'name'=>''
    ];

    protected $fillable = [
        'id', 'name'
    ];
}
