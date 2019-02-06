<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $guarded = [];

    public function payslips ()
    {
     	return $this->hasMany(PaySlip::class);
    }
}
