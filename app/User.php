<?php

namespace App;

use App\Post;
use App\Aktiviti;
use App\Hebahan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'nomatrik','email','password',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes');
    }
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function alreadyliked(Post $post)
    {
        return $post->liked->contains('user_id', $this->id);
    }

    public function aktiviti()
    {
        return $this->hasMany(Aktiviti::class);
    }

    public function hebahan()
    {
        return $this->hasMany(Hebahan::class);
    }
}
