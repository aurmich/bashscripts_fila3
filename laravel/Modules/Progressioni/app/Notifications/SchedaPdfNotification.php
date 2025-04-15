<?php

declare(strict_types=1);

namespace Modules\Progressioni\Notifications;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Modules\Progressioni\Emails\SchedaPdfMail;

class SchedaPdfNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Model $model) {}

    /**
     * Get the notification's delivery channels.
     */
    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(mixed $notifiable): void
    {
        /*
        return \Illuminate\Notifications\Messages\MailMessage
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
        */
        if (! property_exists($this->model, 'email')) {
            throw new Exception('property [email] not exits in ['.$this->model::class.']');
        }

        Mail::to([$this->model->email])->send(new SchedaPdfMail($this->model));
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(mixed $notifiable): array
    {
        return [
        ];
    }
}
