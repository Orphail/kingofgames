<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    private $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->subject = trans('email.email_password_subject');

    }


    public function build()
    {
        return $this->view('email.reset-password',['token'=>$this->token, 'subject'=>$this->subject]);
    }
}
