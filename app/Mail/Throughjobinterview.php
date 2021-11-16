<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\registrations;

class Throughjobinterview extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $registrations = null;
    public function __construct(registrations $registrations)
    {
        $this->registrations = $registrations;
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
            ->markdown('emails.Throughjobinterview')
            ->with(['registrations' => $this->registrations]);
    }
}
