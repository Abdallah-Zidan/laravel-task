<?php

namespace App\Lib\Messages;

use App\Lib\Providers\SMSProvider;

class SMSMessage extends AbstractMessage
{
    public function __construct(SMSProvider $provider,  $title = '', $body = '', $signature = '')
    {
        parent::__construct('sms', $provider, $title, $body, $signature);
    }
    
    public function __toString()
    {
        return  $this->title . "\n" . $this->body . " , \n" . $this->signature;
    }
}
