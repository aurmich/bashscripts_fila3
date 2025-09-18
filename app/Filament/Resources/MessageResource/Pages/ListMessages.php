<?php

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaResponsabilita\Filament\Resources\MessageResource\Pages;

use Filament\Pages\Actions;
use Modules\IndennitaResponsabilita\Filament\Resources\MessageResource;
use Modules\Ptv\Filament\Resources\MessageResource\Pages\ListMessages as PtvListMessages;

class ListMessages extends PtvListMessages
{
=======
namespace Modules\Ptv\Filament\Resources\MessageResource\Pages;

use Filament\Actions;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\Ptv\Filament\Resources\MessageResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Traits\HasXotTable;

class ListMessages extends XotBaseListRecords
{
    use HasXotTable;

>>>>>>> dc18abbe (first)
    protected static string $resource = MessageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
<<<<<<< HEAD
=======
namespace Modules\Progressioni\Filament\Resources\MessageResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\MessageResource;
use Modules\Progressioni\Models\Message;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListMessages extends XotBaseListRecords
{
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(Message::class, 'anno', $anno),
=======
>>>>>>> dc18abbe (first)
        ];
    }

    public function getListTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'type' => Tables\Columns\TextColumn::make('type')
                ->searchable()
                ->sortable(),
            'title' => Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->sortable(),
            'txt' => Tables\Columns\TextColumn::make('txt')
                ->searchable()
                ->sortable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
>>>>>>> bcab6efe (first)
=======
            TextColumn::make('id'),
            TextColumn::make('parent_id'),
            TextColumn::make('type'),
            TextColumn::make('title'),
            // TextColumn::make('txt'),
            TextColumn::make('anno'),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            SelectFilter::make('anno')
                ->options([
                    '2023' => '2023',
                    '2024' => '2024',
'2025' => '2025',
                ]),
>>>>>>> dc18abbe (first)
        ];
    }
}
