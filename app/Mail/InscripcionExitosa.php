<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InscripcionExitosa extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $cursoInscripcion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $cursoInscripcion)
    {
        $this->usuario = $usuario;
        $this->cursoInscripcion = $cursoInscripcion;
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
            ->subject('Confirmación de inscripción exitosa')
            ->view('mails.inscripcion-exitosa');
    }
}
