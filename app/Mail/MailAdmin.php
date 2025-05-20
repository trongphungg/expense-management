<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */


     public $name;
     public $sotien;
     public $flag;
     public $ctcn;
     public $tbtien;
     public $dstiendong;
    public $dskh;

    public function __construct($name,$sotien,$flag,$ctcn,$tbtien,$dstiendong,$dskh)
    {
        $this->name=$name;
        $this->sotien=$sotien;
        $this->flag=$flag;
        $this->ctcn = $ctcn;
        $this->tbtien = $tbtien;
        $this->dstiendong = $dstiendong;
        $this->dskh = $dskh;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông báo Mail dành cho Admin',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.admin',
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
