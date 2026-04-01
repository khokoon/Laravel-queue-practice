<?php

namespace App\Jobs;

use App\Mail\RegistrationSuccessMail;
use App\Mail\UserReportMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Queueable;
    public $request;
    /**
     * Create a new job instance.
     */
    public function __construct($request)
    {
        //
        $this->request = $request;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->request->email)->send(new RegistrationSuccessMail($this->request));
        Mail::to('mailtrap@example.com')->send(new UserReportMail($this->request));
    }
}
