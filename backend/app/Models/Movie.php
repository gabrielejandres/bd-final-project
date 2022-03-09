<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public $timestamps = false;

    public $incrementing = false;

    public function media()
    {
        return $this->belongsTo('App\Models\Media', 'media_id');
    }
}
