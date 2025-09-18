<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\OrganizzativaResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Modules\Performance\Filament\Resources\OrganizzativaResource;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListOrganizzativas extends XotBaseListRecords
{
    protected static string $resource = OrganizzativaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
            \Modules\Ptv\Filament\Actions\Header\PopulateYearAction::make(),
            ExportXlsAction::make(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'ha_diritto' => Tables\Columns\ToggleColumn::make('ha_diritto')
                ->sortable(),
            'motivo' => Tables\Columns\TextColumn::make('motivo')
                ->wrap()
                ->searchable(),
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->sortable()
                ->searchable(),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->sortable()
                ->searchable(),
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->sortable()
                ->searchable(),
            'email' => Tables\Columns\TextColumn::make('email')
                ->sortable()
                ->searchable(),
            'stabi' => Tables\Columns\TextColumn::make('stabi')
                ->sortable()
                ->searchable(),
            'repar' => Tables\Columns\TextColumn::make('repar')
                ->sortable()
                ->searchable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->sortable()
                ->searchable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
