<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class aprobado extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $book;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $book, $order)
    {
        $this->user = $user;
        $this->book = $book;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.respose')
            ->subject('Librando: Respuesta');
    }
}
