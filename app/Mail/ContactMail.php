<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;


    

    public string $name; //nome del mittente
    public string $email; //email del mittente
    public string $body; //testo del messaggio
    
    public function __construct(string $name, string $email, string $body)
    
    {
        $this->name = $name;
        $this->email = $email;  
        $this->body = $body;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuovo messaggio da ' . $this->name . ' - manga-blog',
            
        );
    }

  
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact', //la vista da usare per il contenuto dell'email
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
