<?php

namespace App\Mail\Dashboard\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $token;
    public string $resetLink;

    /**
     * Create a new message instance.
     *
     * @param string $token
    //  * @param string $resetLink
     */
    public function __construct(string $token, /* string $resetLink */)
    {
        $this->token = $token;
        // $this->resetLink = $resetLink;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset Password Link Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'dashboard.auth.mail.reset-password-link',
            with: [
                'token' => $this->token,
            ],
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
