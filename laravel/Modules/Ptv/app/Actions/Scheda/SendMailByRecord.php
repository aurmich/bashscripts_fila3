<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\Scheda;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Notify\Datas\EmailData;
use Modules\Notify\Datas\SmtpData;
use Modules\Ptv\Actions\Pdf\MakePdfByRecord;
use Modules\Ptv\Mail\SchedaMail;
use Modules\Ptv\Models\Contracts\SchedaContract;
use Spatie\QueueableAction\QueueableAction;

class SendMailByRecord
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(SchedaContract $record)
    {
        if (! Auth::user()->can('sendMail', $record)) {
            return false;
        }

        $data = [
            'to' => $record->email,
            // 'to'=>'marco.sottana@gmail.com',
            'subject' => $record->msg('mail_oggetto'),
            'body_html' => $record->msg('mail_testo'),
            'attachments' => [
                app(MakePdfByRecord::class)->execute(record: $record, out: 'path'),
            ],
        ];
        $emailData = EmailData::from($data);
        SmtpData::make()->send($emailData);
        // Mail::to(auth()->user()->email)->send(new YourNotification());

        // Mail::to($to)->send(new SchedaMail($record));
        /*
        MyLog::create([
            'id_tbl'=>$record->id,
            'tbl'=>$record->getTable(),
            'act'=>'sendMail',
            'handle'=>Auth::id(),
        ]);
        */

        return true;
    }
}
