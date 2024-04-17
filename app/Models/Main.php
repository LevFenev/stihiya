<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;

    const STATUS_NEW = 'new';
    const STATUS_DRAFT = 'draft';
    const STATUS_UNLISTED = 'unlisted';
    const STATUS_PUBLISHED = 'published';
    const STATUS_HIDDEN = 'hidden';

    public function getAttributeNames() {
        $attributeNames = \Schema::getColumnListing($this->table);
        return $attributeNames;
    }

    public function username() {
        $user = $this->user; //должен достать из relation
        if(is_null($user)){
            return "неизвестен";
        } return $user->name;
    }
}
