<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;


    public function __construct(string $name)
    {
        $this->name = $name;
    }

   
    public function envelope(): Envelope   //oggetto dell email che vede l utente nella sua casella di posta
    {
        return new Envelope(
            subject: 'Abbiamo ricevuto il tuo messaggio',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_confirmation',
        );
    }
     /** 
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
