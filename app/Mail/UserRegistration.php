<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            return $this->view('mail.register', ['data' => $data])
                ->from("dadabdulrasheed@gmail.com", "E-school Admin")
                ->replyTo("dadabdulrasheed@gmail.com", "E-school Admin")
                ->subject("$this->data['subject']");
        // return $this->view('view.name');
                // ->cc($this->data['address'], $this->data['name'])
                // ->bcc($this->data['address'], $this->data['name'])
    }
}
