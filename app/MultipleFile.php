<?php

namespace App;
use App\Aktiviti;
use Illuminate\Database\Eloquent\Model;

class MultipleFile extends Model
{
    protected $fillable = [
     'aktiviti_id', 
     'image_path'
    ];

    protected $hidden = [
     'created_at',
     'updated_at',
     'id',
     'aktiviti_id'
    ];

    public function aktiviti()
    {
     return $this->belongsTo(Aktiviti::class, 'aktiviti_id', 'id');
    }

    public function getImagePathAttribute($value)
    {
     return asset($value);
    }
}

