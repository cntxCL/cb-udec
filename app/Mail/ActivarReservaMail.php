<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reservas;

class ActivarReservaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reserva;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservas $reserva)
    {
        //
        $this->reserva = $reserva;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                    ->subject('Se ha activado una reserva')
                    ->view('emails.activarreserva')->withRserva($this->reserva);
    }
}
