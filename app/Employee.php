<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;

class Employee extends Model
{
    protected $guarded = [];

    public function job()
    {
    	return $this->belongsTo(Job::class);
    }

    public function scopeSupervisor($query)
    {
    	$supervisor_id = Job::where('name','supervisor')->first()->id;

        return $query->where('job_id', '=', $supervisor_id);
    }

}
