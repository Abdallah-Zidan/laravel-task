<?php

return [
    'twilio' => [
        'account_id' => env('TWILIO_ACCOUNT_ID'), // default values can be added here
        'auth_token' => env('TWILIO_AUTH_TOKEN'),
        'twilio_number'     => env('TWILIO_NUMBER'),
    ],
];
