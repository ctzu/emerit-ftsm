<?php

namespace App;

use App\Like;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
		'post_content'
	];
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function likes()
	{
		return $this->belongsToMany(User::class, 'likes');
	}
	public function liked()
	{
		return $this->hasMany(Like::class, 'post_id');
	}
}
