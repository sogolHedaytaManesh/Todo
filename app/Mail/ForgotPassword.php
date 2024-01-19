<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private readonly string $url, private readonly User $user)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.forgot_password'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.forgot-password',
            with: [
                'url' => $this->url,
                'full_name' => $this->user->full_name,
            ],
        );
    }
}
