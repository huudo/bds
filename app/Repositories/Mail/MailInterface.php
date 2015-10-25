<?php

namespace App\Repositories\Mail;

use App\Repositories\CrudInterface;

interface MailInterface{
    public function send($template, $data=[], $from=null, $to, $subject, $fromname=null, $toname=null);
}
