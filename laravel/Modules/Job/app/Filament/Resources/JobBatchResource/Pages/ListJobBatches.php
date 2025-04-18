<?php

/**
 * @see https://gitlab.com/amvisor/filament-failed-jobs/-/blob/master/src/resources/JobBatchesResource/Pages/ListJobBatches.php?ref_type=heads
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobBatchResource\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Modules\Job\Filament\Resources\JobBatchResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Webmozart\Assert\Assert;

class ListJobBatches extends XotBaseListRecords
{
    protected static string $resource = JobBatchResource::class;

    public function getListTableColumns(): array
    {
        Assert::string($date_format = config('app.date_format'), '['.__LINE__.']['.class_basename(__CLASS__).']');

        return [
            TextColumn::make('id')
                ->searchable()
                ->sortable()
                ->copyable(),
            TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->wrap(),
            TextColumn::make('total_jobs')
                ->numeric()
                ->sortable(),
            TextColumn::make('pending_jobs')
                ->numeric()
                ->sortable(),
            TextColumn::make('failed_jobs')
                ->numeric()
                ->sortable(),
            TextColumn::make('progress')
                ->formatStateUsing(fn ($record) => $record->progress() . '%')
                ->sortable(),
            TextColumn::make('failed_job_ids')
                ->wrap()
                ->limit(50),
            TextColumn::make('created_at')
                ->dateTime($date_format)
                ->sortable(),
            TextColumn::make('cancelled_at')
                ->dateTime($date_format)
                ->sortable(),
            TextColumn::make('finished_at')
                ->dateTime($date_format)
                ->sortable(),
        ];
    }

    public function getTableActions(): array
    {
        return [
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('prune_batches')
                ->requiresConfirmation()
                ->color('danger')
                ->action(
                    static function (): void {
                        Artisan::call('queue:prune-batches');
                        Notification::make()
                            ->title('All batches have been pruned.')
                            ->success()
                            ->send();
                    }
                ),
        ];
    }
}
