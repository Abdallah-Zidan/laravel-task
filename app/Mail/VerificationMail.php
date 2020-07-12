<?php

namespace App\Mail;

use App\Lib\Messages\AbstractMessage;
use App\Lib\Messages\EmailMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    private  $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailMessage $message = null)
    {
        $this->message = $message;
    }

    public function setMessage(AbstractMessage $message)
    {
        $this->message = $message;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('verify your account, amigo')
            ->view('emails.verification')
            ->with([
                'title'     => $this->message->title,
                'body'      => $this->message->body,
                'signature' => $this->message->signature
            ]);
    }
}
