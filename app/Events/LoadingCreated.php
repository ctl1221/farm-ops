<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class LoadingCreated
{
    use Dispatchable, SerializesModels;

    public $loading;
    
    public function __construct($loading)
    {
       $this->loading = $loading;
    }

}
