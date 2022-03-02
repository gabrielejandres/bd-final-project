<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $primaryKey = ['code', 'name', 'show_id'];

    public $incrementing = false;

    public function show()
    {
        return this->belongsTo('App\Models\Show', 'show_id');
    }
}
