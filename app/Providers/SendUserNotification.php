<?php

namespace App\Providers;

use Mail;
use App\Mail\redcontact;
use App\Providers\ChangeBookingStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserNotification
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
     * @param  \App\Providers\ChangeBookingStatus  $event
     * @return void
     */
    public function handle(ChangeBookingStatus $event)
    {
        $details=$event->details;
        Mail::to($details->mto)->send(new redcontact($details));
    }
}
