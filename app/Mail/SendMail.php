<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
     public $client_email;
     public $client_password_c;

    public function __construct($client_email, $client_password_c)
    {
        $this->client_email =$client_email;
        $this->client_password_c = $client_password_c;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('wms@gmail.com')->subject('New account created')->view('dynamic_email_temp')->with('client_email', $this->client_email, 'client_password_c', $this->client_password_c);
    }
}
