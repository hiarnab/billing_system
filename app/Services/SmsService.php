<?php

namespace App\Services;

class SmsService
{
    /**
     * Create a new class instance.
     */

     protected $host;
     protected $user;
     protected $authKey;
     protected $sender;
     protected $rpt;

    public function __construct()
    {
        $this->host = 'amazesms.in';
        $this->user = 'schooldekho';
        $this->authKey = '9232Gn2qbH0VM';
        $this->sender = 'Support';
        $this->rpt = 0;
    }
    public function sendSms($mobile, $text)
    {
        $url = "http://{$this->host}/api/pushsms?" . http_build_query([
            'usr'     => $this->user,
            'authkey' => $this->authKey,
            'sender'  => urlencode($this->sender),
            'mobile'  => $mobile,
            'text'    => urlencode($text),
            'rpt'     => $this->rpt
        ]);

        try {
            $response = file_get_contents($url);
            return $response;
        } catch (\Exception $e) {
            // Log error or handle accordingly
            return 'Error sending SMS: ' . $e->getMessage();
        }
    }
}
