<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $guarded = [];

    public function receivings()
    {
    	return $this->hasMany(Receiving::class)->orderBy('date', 'desc');
    }

    public function receiving_lines()
    {
        return $this->hasManyThrough(ReceivingLine::class, Receiving::class);
    }

    public function grow()
    {
    	return $this->belongsTo(Grow::class);
    }

    public function buildings()
    {
    	return $this->belongsToMany(Building::class)->withPivot('birds_started', 'supervisor_id','caretaker_id');
    }

    public function loadings()
    {
        return $this->hasMany(Loading::class);
    }

    public function invoices ()
    {
        return $this->hasMany(Invoice::class)->orderBy('date', 'desc');
    }

    public function invoice_lines ()
    {
        return $this->hasManyThrough(InvoiceLine::class, Invoice::class);
    }

    public function mortalities ()
    {
        return $this->hasManyThrough(Mortality::class, Day::class);
    }

    public function feeds_consumptions ()
    {
        return $this->hasManyThrough(FeedsConsumption::class, Day::class);
    }

    public function harvests ()
    {
        return $this->hasMany(Harvest::class);
    }

    public function deliveries ()
    {
        return $this->hasManyThrough(Delivery::class, Harvest::class);
    }
    
}
