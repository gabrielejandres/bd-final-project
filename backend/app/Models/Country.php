<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    // protected $primaryKey = ['code', 'name', 'media_id'];
    // public $incrementing = false;

    public function media()
    {
        return $this->belongsTo('App\Models\Media', 'media_id');
    }
}
