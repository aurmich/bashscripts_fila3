<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\TextWidgetResource\Pages;

use Filament\Pages\Actions;
use Filament\Tables\Columns\TextColumn;
use Modules\Blog\Filament\Resources\TextWidgetResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListTextWidgets extends XotBaseListRecords
{
    // protected static string $resource = TextWidgetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    /**
     * Implementazione richiesta dal contratto XotBaseListRecords.
     * Restituisce la configurazione delle colonne della tabella per i TextWidget.
     * Qui restituisce un array vuoto, da personalizzare secondo le esigenze del dominio.
     *
     * @return array<int, \Filament\Tables\Columns\Column>
     */
    public function getListTableColumns(): array
    {
        // Personalizza le colonne secondo le specifiche di dominio
        // Ad esempio, aggiungiamo una colonna per il titolo del TextWidget
        return [
            TextColumn::make('title')
                ->label('Titolo')
                ->sortable()
                ->searchable(),
        ];
    }
}
