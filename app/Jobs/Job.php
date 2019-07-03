<?php

namespace App\Jobs;

use Log;
use Illuminate\Bus\Queueable;

abstract class Job
{
    /*
    |--------------------------------------------------------------------------
    | Queueable Jobs
    |--------------------------------------------------------------------------
    |
    | This job base class provides a central location to place any logic that
    | is shared across all of your jobs. The trait included with the class
    | provides access to the "onQueue" and "delay" queue helper methods.
    |
    */

    use Queueable;
    
    protected function logError($msg='Error no definido'){
        if(env('QUEUE_DRIVER')=='sync')
            flash_alert( $msg, 'danger' );
        Log::error( $msg );
    }
}
