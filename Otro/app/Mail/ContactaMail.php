<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactaMail extends Mailable
{
    public $contacto;//PARA ALMACENAR LOS ATRIBUTOS name DE LOS INPUTS
    use Queueable, SerializesModels;
   
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contacto){ 
    $this->contacto=$contacto;//LE PASO LOS VALORES AL CONTRUCTOR
    }
    
        //
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()  
    {
        return $this->view('emails.contacta');//DEVUELVE LO QUE SE ENVIARA AL CORREO
    }
}
