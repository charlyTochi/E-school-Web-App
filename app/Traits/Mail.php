<?php

namespace App\Traits;

trait Mail {

    public function sendMail($email, $data){
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('mails.register', ['url'=>'http://127.0.0.1:8000/api/auth/signup/activate/'.$data->acct_id], function($message) use($email)
        {
            $message
                ->from("dadabdulrasheed@gmail.com")
                ->to($email, 'Efull Admin')
                ->subject('E-School Registration');
        });
    }

}
