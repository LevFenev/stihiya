<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;

    public function username() {
        $user = $this->user; //должен достать из relation
        if(is_null($user)){
            return "неизвестен";
        } return $user->name;
    }
}
