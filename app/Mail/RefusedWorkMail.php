<?php

namespace App\Mail;

use App\Models\registrations;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefusedWorkMail extends Mailable
{
    use Queueable, SerializesModels;

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
            ->markdown('emails.refusedWorkMail')
            ->with(['registration' => $this->registration]);
    }
}
