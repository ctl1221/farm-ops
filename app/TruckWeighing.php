<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckWeighing extends Model
{
    protected $guarded = [];

    public function activity()
    {
        return $this->morphTo();
    }
}
