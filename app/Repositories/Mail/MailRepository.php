<?php

namespace App\Repositories\Mail;

use App\Repositories\BaseRepository;
use App\Repositories\Mail\MailInterface;

use Mail;

class MailRepository implements MailInterface{

    public function __construct() {
        
    }

    public function send($template, $data=[], $from=null, $to, $subject, $fromname=null, $toname=null) {
        Mail::send($template, $data, function($sendmail) use ($from, $to, $subject, $fromname, $toname){
           $sendmail->from($from, $fromname); 
           $sendmail->to($to, $toname)->subject($subject);
        });
    }

    public function create($request) {
        
    }

    public function delete($id) {
        
    }

    public function find($id) {
        
    }

    public function massdel($request) {
        
    }

    public function update($id, $request) {
        
    }

}

