<?php

namespace App\Lib\Messages;

use App\Lib\Providers\EmailProvider;

class EmailMessage extends AbstractMessage
{
    public function __construct(EmailProvider $provider, $title = '', $body = '', $signature = '')
    {
        parent::__construct('email', $provider, $title, $body, $signature);
    }
}
