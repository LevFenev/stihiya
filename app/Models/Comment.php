<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;

    protected $attributes = ['user_id'=>'', 'poem_id'=>'', 'content'=>''];
    protected $table = 'comment';

    protected $fillable = ['user_id', 'poem_id', 'content'];

    public function poem() {
        return $this->belongsTo(\App\Models\Poem::class); //$this->poem_id;
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getAttributeNames() {
        $attributeNames = \Schema::getColumnListing($this->table);
        return $attributeNames;
    }
}
