<?php

namespace App\Lib\Providers;

use App\Lib\Messages\AbstractMessage;
use Twilio\Rest\Client;

/**
 * configuration for this provider exist in config/sms.php
 * and values can be defined in .env file
 */


class TwilioProvider extends SMSProvider
{
    private $twilioNumber;
    private $client;
    protected function config()
    {
        $configs = config('sms.twilio');
        $accountSid = $configs['account_id'];
        $authToken = $configs['auth_token'];

        $this->twilioNumber = $configs['twilio_number'];
        $this->client = new Client($accountSid, $authToken);
    }

    public function send($toNumber, AbstractMessage $message)
    {
        $this->client->messages->create(
            $toNumber,
            array(
                'from' => $this->twilioNumber,
                'body' => $message
            )
        );
    }
}
