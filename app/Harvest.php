<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Harvest extends Model
{
    protected $guarded = [];

    public function getDateAttribute($date)
	{
	    return Carbon::parse($date)->format('m/d/Y');
	}

	public function delivery()
	{
		return $this->hasOne(Delivery::class);
	}

	public function truck_weighings ()
    {
     	return $this->morphMany(TruckWeighing::class, 'activity');
    }
}
