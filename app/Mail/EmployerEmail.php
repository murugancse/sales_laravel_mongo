<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployerEmail extends Mailable
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
       // dd($this->details);

        return $this->from('muruganaccetcse@gmail.com')
            ->subject('Sales Product Created')
            //->attach('https://sm.pcmag.com/t/pcmag_in/review/g/google-pho/google-photos_bx1k.1920.jpg');
            ->view('mails.employer_email');
    }
}
