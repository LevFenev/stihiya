<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'avatar',
    ];

    protected $attributes = [
        'id'=>'0',
        'username'=> 'Имя пользователя',
        'name'=>'Имя',
        'email'=>'ivanov@gmail.com',
        'password'=>'123',
        'bio'=>'Tell us about yourself',
        'avatar'=>'?',
        'status'=>'1',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table = "user";//,"poems"; // почему он выделяет table фиолетовым если она нигде не используется?
    // protected $poems_table = "poems";

    public function comments() {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function poems() {
        return $this->hasMany(\App\Models\Poem::class);
    }

    /*public function getAttributes() вот этим я переписал метод который уже был у модели
    {
        $attributeNames = \Schema::getColumnListing($this->table);
        return $attributeNames;
    }*/
}
