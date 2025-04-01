<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\IndividualeRegionaleResource\Pages;

use Filament\Actions;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Modules\Performance\Filament\Resources\IndividualeRegionaleResource;
use Modules\Performance\Filament\Resources\IndividualeResource\Pages\ListIndividuales;
use Modules\Ptv\Filament\Actions\Table\FillOutTheFormAction;
use Modules\Ptv\Filament\Filters\StabiReparAnnoHaDirittoFilter;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Actions\Table\PdfAction;
use function Safe\date;

class ListIndividualeRegionales extends ListIndividuales
{
    protected static string $resource = IndividualeRegionaleResource::class;

    /**
     * @return array<string, ExportXlsAction|null>
     */
    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            // \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
            ExportXlsAction::make('export-xls'),
        ];
    }

    public function table(Table $table): Table
    {
        $table = parent::table($table);

        return $table->filtersFormColumns(1);
    }

    /**
     * @return array<string, StabiReparAnnoHaDirittoFilter|null>
     */
    public function getTableFilters(): array
    {
        return [
            StabiReparAnnoHaDirittoFilter::make(),
        ];
    }
}
