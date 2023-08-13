<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KonbiniMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nextAction;
    public $user;
    public $cash;

    /**
     * Create a new message instance.
     */
    public function __construct($nextAction,$user,$cash)
    {
        $this->nextAction=$nextAction;
        $this->user=$user;
        $this->cash=$cash;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'コンビニ決済のお願い',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'email.konbini',
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
