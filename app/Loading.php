<?php

namespace App;

use App\Events\LoadingCreated;
use App\Grow;
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
}
