<?php

namespace App;

use App\Events\LoadingCreated;
use App\Grow;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Loading extends Model
{
    protected $guarded = [];

    // protected $dispatchesEvents = [
    // 	'created' => LoadingCreated::class
    // ];

    protected static function boot()
    {
    	parent::boot();

    	static::created(function ($loading) {
	    	$grow = Grow::find($loading->farm->grow_id);
	        $grow->date_start = $grow->loadings->first()->date;
	        $grow->save();
    	});
    }

    public function farm()
    {
    	return $this->belongsTo(Farm::class);
    }

    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('M d, Y');
    }

    public function getDepHatcheryAttribute($time)
    {
        return Carbon::parse($time)->format('h:i A');
    }

    public function getArrFarmAttribute($time)
    {
        return Carbon::parse($time)->format('h:i A');
    }

    public function getDepFarmAttribute($time)
    {
        return Carbon::parse($time)->format('h:i A');
    }


}
