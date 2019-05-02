<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{

	protected $guarded = [];

    public function company() 
    {
    	return $this->belongsTo(Company::class, 'supplier_id');
    }
}
