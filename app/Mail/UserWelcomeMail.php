<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UserWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    // public $user; // * User modelini kullanabilmek için tanımladık.
    /**
     * Create a new message instance.
     */
    public function __construct(public User $user, public string $token)
    {
        //
        // $this->user = $user; // * User modelini kullanabilmek için tanımladık.
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hoşgeldin!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.auth.welcome',
            with: ['user' => $this->user, 'token' => $this->token],
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
