<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSend extends Mailable
{
    use Queueable, SerializesModels;

    public $form;

    /**
     * Create a new message instance.
     *
     * @param array $form
     */
    public function __construct(Array $form)
    {
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): ContactSend
    {
        return $this->markdown('emails.contact.send');
    }
}
