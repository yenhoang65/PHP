<?php

namespace App\Mail;

use App\Models\GeneralSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountCreateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $email, $password;
    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $password)
    {
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $generalSetting = GeneralSettings::first();
        return new Envelope(
            subject: 'Welcome To'.$generalSetting->site_name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
