<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Harvest extends Model
{
    protected $guarded = [];

    public function getDateAttribute($date)
	{
	    return Carbon::parse($date)->format('M d, Y');
	}
}
