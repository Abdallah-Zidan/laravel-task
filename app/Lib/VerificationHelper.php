<?php

namespace App\Lib;

use App\Lib\Messages\SMSMessage;
use App\Lib\Providers\EmailProvider;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Log;
use Throwable;

class VerificationHelper
{
    public static function sendVerification($userInfo, $smsProviderClass)
    {
        $smsProvider = new $smsProviderClass();
        $emailProvider = new EmailProvider(new VerificationMail());

        $message = new SMSMessage(
            $smsProvider,
            'welcome to our website',
            'this is your verification code 5867',
            'Abd Allah Zidan'
        );

        try {
            $message->send($userInfo['phone']);
            return (["success" => "check your phone messages for verification code"]);
        } catch (Throwable $e) {

            Log::error($e->getMessage());

            // change provider using property setter
            $message->provider = $emailProvider;
            $message->body = 'this is your verification link https://verify.vom';
            $message->send($userInfo['email']);
            return (["success" => "check your email for verification link"]);
        }
    }
}
