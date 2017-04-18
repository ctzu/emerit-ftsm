<?php

namespace App;

use App\Kelab;
use App\User;
use App\MultipleFile;
use Illuminate\Database\Eloquent\Model;

class Aktiviti extends Model
{
    protected $fillable = [
		'namaKelab',
		'namaAktiviti',
		'tempat',
		'tarikhAktiviti',
		'peringkat',
		'pencapaian',
		'jawatankuasa',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function kelab()
	{
		return $this->belongsTo(Kelab::class);
	}

	public function MultipleFile()
    {
      return $this->hasMany(MultipleFile::class);
    }



}
