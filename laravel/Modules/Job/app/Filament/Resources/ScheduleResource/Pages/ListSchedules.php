<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Modules\Job\Filament\Columns\ActionGroup;
use Modules\Job\Filament\Columns\ScheduleArguments;
use Modules\Job\Filament\Columns\ScheduleOptions;
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Job\Models\Schedule;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListSchedules extends XotBaseListRecords
{
    protected static string $resource = ScheduleResource::class;

    public function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('command')
                ->getStateUsing(function ($record) {
                    if ('custom' === $record->command) {
                        return $record->command_custom;
                    }

                    return $record->command;
                })
                ->searchable()
                ->sortable()
                ->wrap(),
            ScheduleArguments::make('params')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('expression')
                ->searchable()
                ->sortable(),
            Tables\Columns\TagsColumn::make('environments')
                ->separator(',')
                ->searchable()
                ->sortable(),
            ScheduleOptions::make('options')
                ->searchable()
                ->sortable(),
            Tables\Columns\BadgeColumn::make('status')
                ->enum([
                    Schedule::STATUS_ACTIVE => static::trans('status.active'),
                    Schedule::STATUS_INACTIVE => static::trans('status.inactive'),
                    Schedule::STATUS_TRASHED => static::trans('status.trashed'),
                ])
                ->colors([
                    'success' => Schedule::STATUS_ACTIVE,
                    'warning' => Schedule::STATUS_INACTIVE,
                    'danger' => Schedule::STATUS_TRASHED,
                ])
                ->icons([
                    'heroicon-o-check-circle' => Schedule::STATUS_ACTIVE,
                    'heroicon-o-document' => Schedule::STATUS_INACTIVE,
                    'heroicon-o-x-circle' => Schedule::STATUS_TRASHED,
                ])
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('updated_at')
                ->getStateUsing(fn ($record) => $record->created_at == $record->updated_at ? static::trans('fields.never') : $record->updated_at)
                ->dateTime()
                ->formatStateUsing(static function (Column $column, $state): ?string {
                    $format ??= config('tables.date_time_format');
                    if (blank($state) || $state == static::trans('fields.never')) {
                        return $state;
                    }

                    return Carbon::parse($state)
                        ->setTimezone($timezone ?? $column->getTimezone())
                        ->translatedFormat($format);
                })
                ->searchable()
                ->sortable(),
        ];
    }

    public function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make()
                ->hidden(fn ($record) => $record->trashed())
                ->tooltip(__('filament-support::actions/edit.single.label')),
            Tables\Actions\RestoreAction::make()
                ->tooltip(__('filament-support::actions/restore.single.label')),
            Tables\Actions\DeleteAction::make()
                ->tooltip(__('filament-support::actions/delete.single.label')),
            Tables\Actions\ForceDeleteAction::make()
                ->tooltip(__('filament-support::actions/force-delete.single.label')),
            Tables\Actions\ViewAction::make()
                ->icon('history')
                ->color('gray')
                ->tooltip(static::trans('buttons.history')),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    protected function getTableRecordUrlUsing(): ?\Closure
    {
        return static fn (): ?string => null;
    }
}
