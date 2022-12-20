<?php

namespace App\Services;

use Auth;
use Carbon\CarbonImmutable as Carbon;
use SendGrid;
use SendGrid\Mail\Mail;

class BaseService {

    public function __construct()
    {

    }

    protected function sendMail($mailParams) 
    {
        $email = new Mail();
        $email->setFrom(env('TEST_MAIL_SENDER'), '銀河の森クラウド');
        $email->setSubject($mailParams['subject']);
        // $email->addTo($mailParams['to']);
        $email->addTo('sunanddear@gmail.com');
        $email->addContent(
            "text/plain",
            strval(view($mailParams['template'], compact('mailParams')))
        );
        $sendgrid = new SendGrid(env('SENDGRID_API_KEY'));
        $response = $sendgrid->send($email);
    }

}