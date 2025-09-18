<?php

<<<<<<< HEAD
<<<<<<< HEAD
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
=======
declare(strict_types=1);

namespace Modules\Ptv\Mail;
>>>>>>> dc18abbe (first)
=======
namespace Modules\Progressioni\Mail;
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
use Modules\Ptv\Actions\Pdf\MakePdfByRecord;
use Modules\Ptv\Models\Contracts\SchedaContract;
>>>>>>> dc18abbe (first)
=======
use Modules\Progressioni\Actions\MakePdfByRecord;
use Modules\Progressioni\Models\Progressioni;
use Modules\Progressioni\Models\Schede as Scheda;
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

class SchedaMail extends Mailable
{
    use Queueable;
    use SerializesModels;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public Scheda $scheda;
=======
    public Scheda|Progressioni $scheda;
>>>>>>> bcab6efe (first)
=======
    public Scheda $scheda;
>>>>>>> 961ad402 (first)
=======
    public Scheda|Progressioni $scheda;
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

    /**
     * Create a new message instance.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(Scheda $scheda)
=======
    public function __construct(Scheda|Progressioni $scheda)
>>>>>>> bcab6efe (first)
=======
    public function __construct(Scheda $scheda)
>>>>>>> 961ad402 (first)
=======
    public function __construct(Scheda|Progressioni $scheda)
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
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
<<<<<<< HEAD
            subject: strip_tags($this->scheda->msg('mail_oggetto')),
=======
            subject: strip_tags($this->scheda->option('mail_oggetto')),
>>>>>>> 961ad402 (first)
=======
            subject: strip_tags($this->scheda->msg('mail_oggetto')),
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
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
=======
            view: 'progressioni::emails.scheda',
            with: [
                'row' => $this->scheda,
                'html' => $this->scheda->msg('mail_testo'),
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
            ],
            // html: 'testo email',
            // text: 'testo email 1',
        );
    }

    /**
     * Get the attachments for the message.
<<<<<<< HEAD
=======
    public SchedaContract $record;

    /**
     * Crea una nuova istanza del messaggio.
     */
    public function __construct(SchedaContract $record)
    {
        $this->record = $record;
    }

    /**
     * Definisce l'envelope del messaggio.
     */
    public function envelope(): Envelope
    {
        return new Envelope(from: new Address('personale@provincia.treviso.it', 'Ufficio Personale Provincia di Treviso'), subject: strip_tags($this->record->msg('mail_oggetto')));
    }

    /**
     * Definisce il contenuto del messaggio.
     */
    public function content(): Content
    {
        return new Content(view: 'ptv::emails.scheda', with: [
            'row' => $this->record,
            'html' => $this->record->msg('mail_testo'),
        ]);
    }

    /**
     * Definisce gli allegati del messaggio.
>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $path = app(MakePdfByRecord::class)->execute(record: $this->scheda, out: 'path');
=======
        // $path = app(MakePdfByRecord::class)->execute(record: $this->scheda, out: 'path');
        $path = app(PdfByModelAction::class)->execute(model: $this->scheda, out: 'path');
>>>>>>> 961ad402 (first)
=======
        $path = app(MakePdfByRecord::class)->execute(record: $this->scheda, out: 'path');
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

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
<<<<<<< HEAD

=======
>>>>>>> 961ad402 (first)
=======
        $path = app(MakePdfByRecord::class)->execute(record: $this->record, out: 'path');

        return [
            Attachment::fromPath($path)
                ->withMime('application/pdf'),
>>>>>>> dc18abbe (first)
=======

>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
        ];
    }
}
