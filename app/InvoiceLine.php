<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    protected $guarded = [];

    public function invoice()
    {
    	return $this->belongsTo(Invoice::class);
    }

    public function material()
    {
    	return $this->morphTo();
    }
}
