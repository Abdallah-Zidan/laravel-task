<?php

namespace App\Lib\Providers;

use App\Lib\Messages\AbstractMessage;

interface ProviderInterface
{
    public function send($receiver, AbstractMessage $message);
}
