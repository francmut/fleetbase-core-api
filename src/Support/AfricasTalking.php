<?php

namespace Fleetbase\Support;

use AfricasTalking\SDK\AfricasTalking as SDKAfricasTalking;
use Illuminate\Support\Facades\Log;

class AfricasTalking
{
    public static function message(string $phone, string $message): void
    {
        $username = env('AT_USERNAME');
        $apikey   = env('AT_APIKEY');
        $sender   = env('AT_SENDER');
        $at       = new SDKAfricasTalking($username, $apikey);

        $sms      = $at->sms();

        $result   = $sms->send([
            'to'      => $phone,
            'message' => $message,
            'from'    => $sender,
            'enqueue' => true,
        ]);

        Log::info('AT SMS', [ $result ]);
    }
}
