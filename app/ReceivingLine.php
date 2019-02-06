<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivingLine extends Model
{
    protected $guarded = [];

    public function material()
    {
    	return $this->morphTo();
    }

    public function receiving()
    {
    	return $this->belongsTo(Receiving::class);
    }
}
