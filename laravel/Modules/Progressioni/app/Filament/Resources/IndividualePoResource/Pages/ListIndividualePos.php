<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\IndividualePoResource\Pages;

use Filament\Actions;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Modules\Performance\Filament\Resources\IndividualePoResource;
use Modules\Performance\Filament\Resources\IndividualeResource\Pages\ListIndividuales;
use Modules\Ptv\Filament\Actions\Table\FillOutTheFormAction;
use Modules\Ptv\Filament\Filters\StabiReparAnnoHaDirittoFilter;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Actions\Table\PdfAction;

class ListIndividualePos extends ListIndividuales
{
    protected static string $resource = IndividualePoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            // \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
            ExportXlsAction::make('export-xls'),
        ];
    }

    public function getTableActions(): array
    {
        return [
            FillOutTheFormAction::make('compila')
                ->visible(fn ($record) => $record->ha_diritto),
            PdfAction::make('pdf')
                ->visible(fn ($record) => $record->ha_diritto),

            // EditAction::make(),
            // Tables\Actions\EditAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        $table = parent::table($table);

        return $table->filtersFormColumns(1);
    }

    public function getTableFilters(): array
    {
        return [
            StabiReparAnnoHaDirittoFilter::make(),
        ];
    }
}
