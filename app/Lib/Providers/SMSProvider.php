<?php


namespace App\Lib\Providers;

use App\Lib\Messages\AbstractMessage;


abstract class  SMSProvider  implements ProviderInterface
{
    function __construct()
    {
        $this->config();
    }

    protected abstract function config();    // to force who extends the class to implement config function
}
