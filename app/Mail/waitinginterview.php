<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use App\Models\registrations;
use Illuminate\Queue\SerializesModels;

class waitinginterview extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $registration = null;
    public function __construct(registrations $registration)
    {
        $this->registration = $registration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('BKKSOFT - การสมัครงาน')
            ->markdown('emails.waitinginterview')
            ->with(['registration' => $this->registration]);
    }
}
