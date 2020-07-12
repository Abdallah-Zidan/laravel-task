<?php

namespace App\Lib\Providers;

use App\Lib\Messages\AbstractMessage;
use App\Lib\Messages\EmailMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;


class EmailProvider implements ProviderInterface
{
    private $mail;
    public function __construct(Mailable $mail)
    {
        $this->mail =  $mail;
    }

    public function send($toAddress, AbstractMessage $message)
    {
        $this->mail->setMessage($message);
        Mail::to($toAddress)->send($this->mail);
    }
    public function setMail(Mailable $mail)
    {
        $this->mail = $mail;
    }
}
