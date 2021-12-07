<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SalesApiEmail extends Mailable
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
        return $this->from('muruganaccetcse@gmail.com')
            ->subject('Sales Products List')
            ->view('mails.sales_email');
            //->attach('https://sm.pcmag.com/t/pcmag_in/review/g/google-pho/google-photos_bx1k.1920.jpg');
    }
}
