<?php

namespace App\Services;

class SmsService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function sendSms($mobile, $text)
    {
        // $user     = env('SMS_USER');        
        // $authkey  = env('SMS_AUTHKEY');  
        $user = ('schooldekho');
        $authkey = ('9232Gn2qbH0VM');   
        $sender   = 'Support';            
        $rpt      = 0;
        $host     = 'amazesms.in';

        $url = "http://{$host}/api/pushsms";

        $response = Http::get($url, [
            'usr'     => $user,
            'authkey' => $authkey,
            'sender'  => urlencode($sender),
            'mobile'  => $mobile,
            'text'    => urlencode($text),
            'rpt'     => $rpt,
        ]);

        return $response->body();
    }
}
