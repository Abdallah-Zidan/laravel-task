<?php

namespace App\Lib\Messages;

use App\Lib\Providers\ProviderInterface;

abstract class AbstractMessage
{
    protected $title;
    protected $body;
    protected $type;  // email , sms , etc
    protected $signature; // HR , CEO , etc
    protected $provider; // sms provider or mail provider implements provider interface
    public function __construct($type, ProviderInterface $provider, $title, $body, $signature)
    {
        $this->type = $type;
        $this->provider = $provider;
        $this->title = $title;
        $this->body = $body;
        $this->signature = $signature;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
    
    public function send($reciever, $provider = null)
    {
        if ($provider != null)
            $provider->send($this);

        else
            $this->provider->send($reciever, $this);
    }
}
