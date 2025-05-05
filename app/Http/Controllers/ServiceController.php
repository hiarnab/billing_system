<?php

namespace App\Http\Controllers;

use App\Services\SmsService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function sendTestSms(SmsService $smsService)
{
    $smsService = new SmsService();
    $response = $smsService->sendSms('9088777845', 'This is Test Message.');

    return response()->json(['response' => $response]);
}
}
