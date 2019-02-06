<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weighing extends Model
{
    protected $guarded = [];

    public function pen_weighings()
    {
    	return $this->hasMany(PenWeighing::class);
    }

}
