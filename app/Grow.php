<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Grow extends Model
{
    protected $guarded = [];

    public function farms ()
    {
    	return $this->hasMany(Farm::class);
    }

    public function receivings ()
    {
    	return $this->hasManyThrough(Receiving::class, Farm::class);
    }

    public function loadings ()
    {
        return $this->hasManyThrough(Loading::class, Farm::class)->orderBy('date_dep_hatchery','desc');
    }

     public function harvests ()
    {
        return $this->hasManyThrough(Harvest::class, Farm::class)->orderBy('date', 'desc');
    }

    public function invoices()
    {
    	return $this->hasManyThrough(Invoice::class, Farm::class);
    }

    public function getDateStartAttribute($date)
    {
        return Carbon::parse($date)->format('M d, Y');
    }

    public function getDateEndAttribute($date)
    {
        return Carbon::parse($date)->format('M d, Y');
    }

    public function sum_of_medicine_expenses()
    {
    	$sum = 0;
    	foreach($this->invoices as $invoice)
    	{
    		foreach($invoice->invoice_lines as $x)
    		{
    			if($x->material_type == 'App\Medicine')
    			{
    				$sum += $x->price * $x->quantity;
    			}
    		}
    	}
    	return $sum;
    }

    public function sum_of_disinfectant_expenses()
    {
        $sum = 0;
        foreach($this->invoices as $invoice)
        {
            foreach($invoice->invoice_lines as $x)
            {
                if($x->material_type == 'App\Disinfectant')
                {
                    $sum += $x->price * $x->quantity;
                }
            }
        }
        return $sum;
    }

    public function sum_of_electrical_expenses()
    {
        $period_start = $this->date_start;
        $period_end = $this->date_end;


        $sql = "(SELECT * FROM utility_bills WHERE period_end >= '". $period_start . "') AS A";
        $table = DB::raw($sql);

        $test = DB::table($table)->where('period_start', '<=', $period_end)->get();

        $sum = 0;
        $grow_start = Carbon::parse($period_start);
        $grow_end = Carbon::parse($period_end);
        foreach($test as $x)
        {

            $current_bill_start = Carbon::parse($x->period_start);
            $current_bill_end = Carbon::parse($x->period_end);
            $current_bill_days = $current_bill_end->diffInDays($current_bill_start) + 1;
            $current_bill_cost_per_day = $x->amount / $current_bill_days;

            if($current_bill_start <= $grow_start && $current_bill_end <= $grow_end)
            {
                $days_calculated = $current_bill_end->diffInDays($grow_start) + 1;
                $sum += $days_calculated * $current_bill_cost_per_day;

            }

            elseif ($current_bill_start >= $grow_start && $current_bill_end >= $grow_end)
            {
                $days_calculated = $grow_end->diffInDays($current_bill_start) + 1;
                $sum += $days_calculated * $current_bill_cost_per_day;
            }

            else
            {
                $sum += $x->amount; 
            }
        }

        return $sum;
    }

    public function sum_of_labor_expenses()
    {
        $period_start = $this->date_start;
        $period_end = $this->date_end;


        $sql = "(SELECT * FROM pay_slips WHERE period_end >= '". $period_start . "') AS A";
        $table = DB::raw($sql);

        $test = DB::table($table)->where('period_start', '<=', $period_end)->get();

        $sum = 0;
        $grow_start = Carbon::parse($period_start);
        $grow_end = Carbon::parse($period_end);
        foreach($test as $x)
        {

            $current_bill_start = Carbon::parse($x->period_start);
            $current_bill_end = Carbon::parse($x->period_end);
            $current_bill_days = $current_bill_end->diffInDays($current_bill_start) + 1;
            $current_bill_cost_per_day = $x->amount / $current_bill_days;

            if($current_bill_start <= $grow_start && $current_bill_end <= $grow_end)
            {
                $days_calculated = $current_bill_end->diffInDays($grow_start) + 1;
                $sum += $days_calculated * $current_bill_cost_per_day;

            }

            elseif ($current_bill_start >= $grow_start && $current_bill_end >= $grow_end)
            {
                $days_calculated = $grow_end->diffInDays($current_bill_start) + 1;
                $sum += $days_calculated * $current_bill_cost_per_day;
            }

            else
            {
                $sum += $x->amount; 
            }
        }

        return $sum;
    }

}
