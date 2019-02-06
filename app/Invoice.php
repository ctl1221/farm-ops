<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];

    public function invoice_lines ()
    {
    	return $this->hasMany(InvoiceLine::class);
    }

    public function farm()
    {
    	return $this->belongsTo(Farm::class);
    }

    public function total_invoice_amount()
    {
    	$total = 0;
    	foreach ($this->invoice_lines as $x)
    	{
    		$total += $x->price * $x->quantity;
    	}

    	return $total;
    }

}
