<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Receiving extends Model
{
    protected $guarded = [];

    public function receiving_lines ()
    {
        return $this->hasMany(ReceivingLine::class);
    }

    public function farm ()
    {
     	return $this->belongsTo(Farm::class);
    }

    public function truck_weighings ()
    {
     	return $this->hasMany(TruckWeighing::class);
    }

    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('M d, Y');
    }

    public function total_declared_weight ()
    {
    	$weight = 0;
    	foreach($this->receiving_lines as $x)
    	{
    		$weight += $x->quantity * $x->material->kg_weight;
    	}

    	return $weight;
    }

    public function total_actual_weight ()
    {
    	return $this->truck_weighings->sum('kg_net_weight');
    }
}
