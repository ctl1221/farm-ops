<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UtilityBill extends Model
{
    protected $guarded = [];

    public function utility()
    {
    	return $this->morphTo();
    }

    public function supplier()
    {
    	return $this->belongsTo(Company::class, 'supplier_id');
    }
}
