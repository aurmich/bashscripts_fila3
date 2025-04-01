<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\UploadResource\Pages;

use Filament\Pages\Actions;
use Filament\Tables;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\UploadResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListUploads extends XotBaseListRecords
{
    protected static string $resource = UploadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable()
                ->searchable(),
            'user_id' => Tables\Columns\TextColumn::make('user_id')
                ->label('Utente')
                ->sortable()
                ->searchable(),
            'path' => Tables\Columns\TextColumn::make('path')
                ->label('Percorso File')
                ->limit(50)
                ->searchable(),
            'note' => Tables\Columns\TextColumn::make('note')
                ->label('Note')
                ->limit(100)
                ->searchable(),
            'quadrimestre' => Tables\Columns\TextColumn::make('quadrimestre')
                ->label('Quadrimestre')
                ->sortable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->label('Anno')
                ->sortable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->label('Data Creazione')
                ->dateTime()
                ->sortable(),
            'created_by' => Tables\Columns\TextColumn::make('created_by')
                ->label('Creato da')
                ->searchable(),
        ];
    }
}
