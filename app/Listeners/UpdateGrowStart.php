<?php

namespace App\Listeners;

use App\Grow as Growee;
use App\Events\LoadingCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateGrowStart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LoadingCreated  $event
     * @return void
     */
    public function handle(LoadingCreated $event)
    {
        $grow = Growee::find(2);

        $grow->date_start = '2017-11-25';

        $grow->save();
    }
}
