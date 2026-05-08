<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // optional (if using queue)
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EhsThankYouMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Email subject & metadata
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank You for Your EHS Assessment Submission',
        );
    }

    /**
     * Email content (Blade view)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.ehs_thankyou',
            with: [
                'data' => $this->data,
            ],
        );
    }

    /**
     * Attachments (optional)
     */
    public function attachments(): array
    {
        return [];
    }
}