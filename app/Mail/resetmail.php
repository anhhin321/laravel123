<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class resetmail extends Mailable
{
    use Queueable, SerializesModels;
    public $code;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code,$name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('laylaipass')->subject('Đặt lại mật khẩu')->from('anhhin321@gmail.com','Anh Hin');
    }
}
