<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class RegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('dmytro@your-cast.dev', 'Dmytro from Your-Cast'),
            subject: 'New registration on Your-Cast',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.registration',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
