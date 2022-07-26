<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class redcontact extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->details->type=='booking_status') {
            return $this->subject(ucfirst($this->details->title))
                ->view('emails.redcontact');
        }
        if($this->details->type=='reminder') {
            return $this->subject(ucfirst($this->details->title))
                ->view('emails.reminder');
        }
    }
}
