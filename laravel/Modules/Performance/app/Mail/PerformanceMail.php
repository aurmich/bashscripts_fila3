<?php

declare(strict_types=1);

namespace Modules\Performance\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PerformanceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public mixed $row)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $msg = $this->row->messages->keyBy('type');

        return $this->subject('Performance')
            ->view('performance::emails.performance')
            ->with([
                'row' => $this->row,
                'msg' => $msg,
            ]);
    }
}
