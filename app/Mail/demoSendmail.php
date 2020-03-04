<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class demoSendmail extends Mailable
{
    use Queueable, SerializesModels;
    public $cd;
    public $tn;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tn)
    {
        // $this->cd =$cd;
        $this->tn =$tn;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('blanks')->subject('Thông báo: Hoàn tiền dịch vụ học qua drive')->from('anhhin321@gmail.com','khắc anh');
    }
}
