<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $hidden = ['created_at', 'updated_at'];

    public $timestamps = false;

    public function media()
    {
        return $this->belongsTo('App\Models\Media', 'media_id');
    }
}
