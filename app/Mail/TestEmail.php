<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
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
            $data = array('message' => $this->data['message'],
                          'parent_name'=>$this->data['parent_name'] );

             return $this->view('testmail', ['data' => $data])
                         ->from($this->data['address'], $this->data['name'])
                         ->cc($this->data['address'], $this->data['name'])
                         ->bcc($this->data['address'], $this->data['name'])
                         ->replyTo($this->data['address'], $this->data['name'])
                         ->subject($this->data['subject']);
    }
}
