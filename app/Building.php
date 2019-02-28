<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function farms()
    {
    	return $this->belongsToMany(Farm::class)->withPivot('birds_started', 'supervisor_id','caretaker_id');
    }

    public function pens()
    {
    	return $this->hasMany(Pen::class);
    }
}
