<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class PoemCollectionLink extends Model
{
    use HasFactory;

    protected $table = "poem_collection";
}
