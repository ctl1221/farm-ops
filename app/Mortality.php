<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mortality extends Model
{
    protected $guarded = [];

    public function day ()
    {
    	return $this->belongsTo(Day::class);
    }
}
