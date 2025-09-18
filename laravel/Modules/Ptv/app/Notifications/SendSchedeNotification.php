<?php

declare(strict_types=1);

namespace Modules\Ptv\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSchedeNotification extends Notification
{
    use Queueable;

    public $subject;

    public $body;

    public $pdfContent;

    public $filename;

    public function __construct(string $subject, string $body, string $pdfContent, string $filename)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->pdfContent = $pdfContent;
        $this->filename = $filename;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->line($this->body)
            ->attachData($this->pdfContent, $this->filename, [
                'mime' => 'application/pdf',
            ]);
    }
}
