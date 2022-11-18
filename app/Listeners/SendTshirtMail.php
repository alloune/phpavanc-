<?php

namespace App\Listeners;

use App\Events\TshirtCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTshirtMail
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
     * @param  \App\Events\TshirtCreated  $event
     * @return void
     */
    public function handle(TshirtCreated $event)
    {

        Mail::to('allan.lelay@le-campus-numerique.fr')->send(new \App\Mail\TshirtCreated($event->tshirt));

    }
}
