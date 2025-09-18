<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class NotificationData - Gestisce la configurazione delle notifiche per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
class NotificationData extends Data
{
    /**
     * @param array  $channels        Canali di notifica disponibili
     * @param string $default_channel Canale predefinito
     * @param bool   $queue           Se accodare le notifiche
     * @param array  $mail            Configurazione email di notifica
     * @param array  $broadcast       Configurazione broadcast
     * @param array  $slack           Configurazione Slack
     * @param array  $telegram        Configurazione Telegram
     */
    public function __construct(
        public readonly array $channels = ['mail', 'database'],
        public readonly string $default_channel = 'mail',
        public readonly bool $queue = true,
        public readonly array $mail = [
            'template' => 'mail.notification',
            'from' => [
                'address' => 'noreply@example.com',
                'name' => 'Laraxot App',
            ],
        ],
        public readonly array $broadcast = [
            'driver' => 'pusher',
            'app_id' => '',
            'app_key' => '',
            'app_secret' => '',
            'options' => [
                'cluster' => 'eu',
                'encrypted' => true,
            ],
        ],
        public readonly array $slack = [
            'webhook_url' => '',
        ],
        public readonly array $telegram = [
            'bot_token' => '',
            'chat_id' => '',
        ],
    ) {
    }

    /**
     * Create a new instance of NotificationData with default values.
     *
     * @return static
     */
    public static function make(): static
    {
        return new static();
=======
namespace Modules\Notify\Datas;

use Illuminate\Notifications\Notification;
use Modules\Notify\Models\Notification as NotificationModel;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class NotificationData extends Data
{
    // public string $mobile_phone;
    // public string $token;
    // public int $q;
    public string $from;

    public ?string $from_email = null;

    public string $to;

    public ?string $subject = null;

    public ?string $body_html = null;

    public string $body;

    public array $channels = [];

    /**
     * @var DataCollection<AttachmentData>
     */
    public ?DataCollection $attachments = null;
    // public ?array $attachment_paths = [];

    /**
     * Get the notification routing information for the given driver.
     */
    public function routeNotificationFor(string $driver, Notification $notification): string|NotificationModel
    {
        // dddx(['driver'=>$driver,'a'=>$a]);
        // return $this->routes[$driver] ?? null;
        if ($driver === 'database') {
            return app(NotificationModel::class);
        }

        return $this->to;
    }

    public function getSmsData(): SmsData
    {
        return SmsData::from(
            [
                'from' => $this->from,
                'to' => $this->to,
                'body' => $this->body,
            ]
        );
>>>>>>> d79d9e57 (first)
    }
}
