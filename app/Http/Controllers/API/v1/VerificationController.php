<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationRequest;
use App\Lib\Providers\TwilioProvider;
use App\Lib\VerificationHelper;

class VerificationController extends Controller
{
    public function Verify(VerificationRequest $request)
    {
        $userInfo =  $request->validated();

        return  VerificationHelper::sendVerification($userInfo, TwilioProvider::class);

        // you still can create your custom verification message
        // and send it ... refer to App\Lib\VerificationHelper for usage
    }
}
