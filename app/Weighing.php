<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weighing extends Model
{
    protected $guarded = [];

    public function day()
    {
    	return $this->belongsTo(Day::class);
    }

    public function pen_weighings()
    {
    	return $this->hasMany(PenWeighing::class);
    }

}
