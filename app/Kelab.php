<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Kelab extends Model
{
	protected $fillable = [
    	'namaKelab',
		'maklumatKelab',
		'jawatankuasa',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function aktiviti()
    {
        return $this->hasMany(Aktiviti::class);
    }

}

