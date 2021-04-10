<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reservation extends Mailable
{
    use Queueable, SerializesModels; 
public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user = [])
    {
        $this-> user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = \Auth::user()->name;
        return $this->markdown('emails.reservation') ->subject('welcom ' . $subject)
            ->with(['user', $this->user]);
    }
}
