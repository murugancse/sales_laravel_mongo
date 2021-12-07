<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\EmployerEmail;
use Mail;

class SendEmployerEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    protected $to_email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
       // dd($details['to_email']);
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $details = $this->details;
        //dd($this->details);
        $email = new EmployerEmail($details);
        $tomail = $details['to_email'];

        // Mail::to($tomail)->send($email, function($message)use($tomail) {
        //            $message->attach('https://sm.pcmag.com/t/pcmag_in/review/g/google-pho/google-photos_bx1k.1920.jpg');
        // });
         Mail::to($tomail)->send($email);
    }
}
