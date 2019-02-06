<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function farms()
    {
    	return $this->belongsToMany(Farm::class);
    }

    public function pens()
    {
    	return $this->hasMany(Pen::class);
    }
}
