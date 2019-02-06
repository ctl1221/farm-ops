<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $guarded = [];

    public function mortalities ()
    {
    	return $this->hasMany(Mortality::class);
    }

    public function weighings ()
    {
    	return $this->hasMany(Weighing::class);
    }

    public function feeds_consumption ()
    {
    	return $this->hasOne(FeedsConsumption::class);
    }

    public function pen_weighings ()
    {
        return $this->hasManyThrough(PenWeighing::class, Weighing::class);
    }
}
