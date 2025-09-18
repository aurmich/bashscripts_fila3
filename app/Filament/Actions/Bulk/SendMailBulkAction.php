<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Filament\Actions\Bulk;

use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Modules\Progressioni\Mail\SchedaMail;
<<<<<<< HEAD
=======
namespace Modules\Performance\Filament\Actions\Bulk;

use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Modules\Performance\Mail\SchedaMail;
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
use Modules\Xot\Actions\Mail\SendMailByRecordsAction;

class SendMailBulkAction extends BulkAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel()
            ->label('')
            ->tooltip('send mail')
            ->openUrlInNewTab()
            ->icon('fas-mail-bulk')
            ->action(fn (Collection $records) => app(SendMailByRecordsAction::class)->execute(records: $records, mail_class: SchedaMail::class));
    }
}
