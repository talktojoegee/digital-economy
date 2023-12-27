<?php

namespace App\Mail;

use App\Models\EmailVerification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sub;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailVerification $sub)
    {
        $this->sub = $sub;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@digitaleconomy.gov.ng')
            ->subject(config('app.name').' : Email Verification')
            ->markdown('mails.user.verification-email');
    }
}
