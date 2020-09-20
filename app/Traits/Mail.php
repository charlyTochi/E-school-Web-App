<?php

namespace App\Traits;

trait Mail {

    public function sendMail($email, $data){
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        // dd($beautymail);
        $beautymail->send('mails.register',
        ['url'=>'http://127.0.0.1:8001/api/auth/signup/activate/'.$data->acct_id], 
        function($message)
        {
            $message
                ->from("patrick@efulltech.com")
                // ->to($email, 'Efull Admin')
                ->to("jeffukus@gmail.com", "Efull Admin")
                ->subject('E-School Registration');
        });
    }

}
