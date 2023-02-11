<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PriceLimitReached extends Mailable
{
    use Queueable;
    use SerializesModels;

    public string $limit;
    public string $symbol;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($limit, $symbol)
    {
        $this->symbol = $symbol;
        $this->limit = (int)$limit;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'The price of '. $this->symbol . ' has exceeded the limit of ' . $this->limit . ' USD',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.price-alert',
            text: 'emails.price-alert-text'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
