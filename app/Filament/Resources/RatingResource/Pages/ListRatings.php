<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources\RatingResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Rating\Filament\Resources\RatingResource;

class ListRatings extends ListRecords
{
    protected static string $resource = RatingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    /**
     * Ottiene le colonne della tabella.
     *
     * @return array<\Filament\Tables\Columns\Column>
     */
    protected function getTableColumns(): array
    {
        return $this->layoutView->getTableColumns();
    }

    /**
     * Configura le opzioni aggiuntive della tabella.
     *
     * @param Table $table
     * @return array<string, mixed>
     */
    protected function getTableConfiguration(): array
    {
        return [
            'defaultSort' => 'created_at',
            'defaultSortDirection' => 'desc',
            'paginated' => true,
            'recordsPerPage' => 25,
        ];
    }
}
