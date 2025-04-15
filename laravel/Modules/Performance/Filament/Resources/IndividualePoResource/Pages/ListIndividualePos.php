<?php

declare(strict_types=1);

namespace App\Http\Livewire\Performance\Filament\Resources\IndividualePoResource\Pages;

use App\Http\Livewire\Performance\Filament\Resources\IndividualePoResource\IndividualePoResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\SelectFilter;

/**
 * @method IndividualePoResource getResource()
 */
class ListIndividualePos extends ListRecords
{
    protected static string $resource = IndividualePoResource::class;

    /**
     * @return array<string, SelectFilter>
     */
    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('stato')
                ->options([
                    'attivo' => 'Attivo',
                    'inattivo' => 'Inattivo',
                ]),
        ];
    }
}
