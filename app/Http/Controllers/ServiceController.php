<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function sendTestSms(SmsService $smsService)
{
    $mobile = '9088777845';
    $text   = 'This is Test Message.';

    $result = $smsService->sendSms($mobile, $text);

    return response()->json([
        'sms_response' => $result,
    ]);
}
}
