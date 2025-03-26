<?php

declare(strict_types=1);

namespace Modules\Progressioni\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Cms\Services\PanelService as Panel;
use Modules\Xot\Datas\PdfData;

// ------ models--------

class SchedaPdfMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Model $model) {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $panelContract = Panel::make()->get($this->model);
        $msg = $this->model->messages->keyBy('type');
        /*
        $pdf = $panelContract->pdf(
            [
                'pdforientation' => 'L',
                'out' => 'content_PDF',
                'filename' => 'tmp.pdf',
            ]
        );
        */
        $pdf = PdfData::make()
            ->fromModel($this->model)
            ->getContent();

        $subject = $msg['mail oggetto']->txt.' - '.$this->model->cognome.' '.$this->model->nome;
        $this->model->myLogs()->create(
            [
                'tbl' => $this->model->getTable(),
                'note' => 'sendMail',
                'data' => $this->model->toArray(),
            ]
        );

        return $this->from('progressioni@provincia.treviso.it')
            ->subject($subject)
            ->view('progressioni::admin.emails.scheda')->with('msg', $msg)
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
