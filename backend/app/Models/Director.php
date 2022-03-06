<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function medias()
    {
        return $this->belongsToMany('App\Models\Media');
    }
}
