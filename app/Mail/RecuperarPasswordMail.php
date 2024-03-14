<?php

namespace App\Mail;

use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecuperarPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public Usuario $usuario;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Usuario $usuario, $token)
    {
        $this->usuario = $usuario;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('no-responder@quickourses.com', 'QuicKourses')
            ->subject('Recuperar contraseña')
            ->view('mails.recuperar-password');
    }
}
