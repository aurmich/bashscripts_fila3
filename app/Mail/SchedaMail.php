<?php

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaResponsabilita\Mail;
=======
namespace Modules\Progressioni\Mail;
>>>>>>> bcab6efe (first)
=======
declare(strict_types=1);

namespace Modules\Performance\Mail;
>>>>>>> 961ad402 (first)

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\IndennitaResponsabilita\Actions\MakePdfByRecord;
use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita as Scheda;
=======
use Modules\Progressioni\Actions\MakePdfByRecord;
use Modules\Progressioni\Models\Progressioni;
use Modules\Progressioni\Models\Schede as Scheda;
>>>>>>> bcab6efe (first)
=======
use Modules\Performance\Actions\MakePdfByRecord;
use Modules\Performance\Models\Individuale as Scheda;
use Modules\Xot\Actions\Export\PdfByModelAction;
>>>>>>> 961ad402 (first)

class SchedaMail extends Mailable
{
    use Queueable;
    use SerializesModels;

<<<<<<< HEAD
<<<<<<< HEAD
    public Scheda $scheda;
=======
    public Scheda|Progressioni $scheda;
>>>>>>> bcab6efe (first)
=======
    public Scheda $scheda;
>>>>>>> 961ad402 (first)

    /**
     * Create a new message instance.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(Scheda $scheda)
=======
    public function __construct(Scheda|Progressioni $scheda)
>>>>>>> bcab6efe (first)
=======
    public function __construct(Scheda $scheda)
>>>>>>> 961ad402 (first)
    {
        $this->scheda = $scheda;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('personale@provincia.treviso.it', 'Ufficio Personale Provincia di Treviso'),
            // replyTo: [
            //    new Address('taylor@example.com', 'Taylor Otwell'),
            // ],
<<<<<<< HEAD
            subject: strip_tags($this->scheda->msg('mail_oggetto')),
=======
            subject: strip_tags($this->scheda->option('mail_oggetto')),
>>>>>>> 961ad402 (first)
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
<<<<<<< HEAD
<<<<<<< HEAD
            view: 'indennitaresponsabilita::emails.scheda',
=======
            view: 'progressioni::emails.scheda',
>>>>>>> bcab6efe (first)
            with: [
                'row' => $this->scheda,
                'html' => $this->scheda->msg('mail_testo'),
=======
            view: 'performance::emails.scheda',
            with: [
                'row' => $this->scheda,
                'html' => $this->scheda->option('mail_testo'),
>>>>>>> 961ad402 (first)
            ],
            // html: 'testo email',
            // text: 'testo email 1',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
<<<<<<< HEAD
        $path = app(MakePdfByRecord::class)->execute(record: $this->scheda, out: 'path');
=======
        // $path = app(MakePdfByRecord::class)->execute(record: $this->scheda, out: 'path');
        $path = app(PdfByModelAction::class)->execute(model: $this->scheda, out: 'path');
>>>>>>> 961ad402 (first)

        return [
            Attachment::fromPath($path)
                // ->as('name.pdf')
                ->withMime('application/pdf'),

            /*
            Attachment::fromData(fn () => app(MakePdfByRecord::class)->execute($this->scheda),
                'Scheda.pdf')
                ->withMime('application/pdf'),
            */
<<<<<<< HEAD

=======
>>>>>>> 961ad402 (first)
        ];
    }
}
