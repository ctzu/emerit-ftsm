<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Hebahan extends Model
{
    protected $fillable = [
    	'user_id',
		'tajukAktiviti',
		'maklumatAktiviti'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}