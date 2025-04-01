<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnviarMail extends Mailable
{
    use Queueable, SerializesModels;

    /** le pasamos una variable que va hacer de tipo arreglo */
    public function __construct(public array $data)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
        /** envia el mail con el asunto indicado en la plantilla emails.index */
            subject: $this->data['subject'],
        /** indicamos la direccion y el nombre a traves de las variables de entorno */
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        );
    }

    public function content(): Content
    {
        return new Content(
            /** indicamos donde esta la plantilla que contiene el cuerpo del mail */
            view: 'emails.exampleMail',
            /** le pasamos la variable de tipo arreglo para imprimer los datos variables en el cuerpo del mail */
            with: [
                'content' => $this->data['content'],
            ],
        );
    }

    public function attachments(): array
    {
        /** controlamos que contenga un archivo */
        if (!empty($this->data['file'])) {
            /** si tiene un archivo lo envia */
            return [
                Attachment::fromPath(storage_path('app/pdfs/' . $this->data['file']))
            ];
        }
        
        return [];
    }
}
