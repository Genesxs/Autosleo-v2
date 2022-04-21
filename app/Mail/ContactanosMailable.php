<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactanosMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $email, $asunto, $comentario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $asunto, $comentario)
    {
        $this->email = $email;
        $this->asunto = $asunto;
        $this->comentario = $comentario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.contactenos')
            ->from($this->email)
            ->subject($this->asunto)
            ->with([
                "email" => $this->email,
                "comentario" => $this->comentario,
            ]);
    }
}
