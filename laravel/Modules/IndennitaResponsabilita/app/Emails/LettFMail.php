<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Cms\Services\PanelService as Panel;
use Modules\Xot\Datas\PdfData;

// ------ models--------

class LettFMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public mixed $row) {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $panelContract = Panel::make()->get($this->row);
        $msg = $this->row->messages->keyBy('type');
        /*
        $pdf = $panelContract->pdf(
            [
                'pdforientation' => 'P', // Portrait, Landscape
                'out' => 'content_PDF',
                'filename' => 'tmp.pdf',
            ]
        );
        */
        $pdf = PdfData::make()->fromModel($this->row)->getContent();
        $subject = $msg['mail_oggetto_responsabilita_f']->txt.' - '.$this->row->cognome.' '.$this->row->nome;
        $this->row->myLogs()->create(
            [
                'tbl' => $this->row->getTable(),
                'note' => 'sendMailLettF',
                'data' => $this->row->toArray(),
            ]
        );

        return $this->from('personale@provincia.treviso.it')
            ->subject($subject)
            ->view('indennitaresponsabilita::admin.emails.lett_f')->with('msg', $msg)
            ->attachData((string) $pdf, 'scheda.pdf');
        /*
        ->attach('/path/to/file', [
            'as' => 'scheda.pdf',
            'mime' => 'application/pdf',
        ])
        //*/
        /*
        ->attachFromStorage('/path/to/file', 'name.pdf', [
           'mime' => 'application/pdf'
        ])
        */
    }
}
