<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\IndividualePesiResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Illuminate\Database\Eloquent\Builder;
use Modules\Performance\Enums\WorkerType;
use Modules\Performance\Filament\Resources\IndividualePesiResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use function Safe\date;

class ListIndividualePesis extends XotBaseListRecords
{
    protected static string $resource = IndividualePesiResource::class;

    /**
     * @return array<string, CreateAction|CopyFromLastYearAction>
     */
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'copy' => CopyFromLastYearAction::make(),
        ];
    }

    /**
     * @return array<string, Columns\TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            'type' => Columns\TextColumn::make('type')
                ->searchable()
                ->sortable()
                ->badge(),
            'lista_propro' => Columns\TextColumn::make('lista_propro')
                ->searchable()
                ->sortable()
                ->wrap(),
            'descr' => Columns\TextColumn::make('descr')
                ->searchable()
                ->sortable(),
            'peso_esperienza_acquisita' => Columns\TextColumn::make('peso_esperienza_acquisita')
                ->numeric()
                ->sortable(),
            'peso_risultati_ottenuti' => Columns\TextColumn::make('peso_risultati_ottenuti')
                ->numeric()
                ->sortable(),
            'peso_arricchimento_professionale' => Columns\TextColumn::make('peso_arricchimento_professionale')
                ->numeric()
                ->sortable(),
            'peso_impegno' => Columns\TextColumn::make('peso_impegno')
                ->numeric()
                ->sortable(),
            'peso_qualita_prestazione' => Columns\TextColumn::make('peso_qualita_prestazione')
                ->numeric()
                ->sortable(),
            'anno' => Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'created_by' => Columns\TextColumn::make('created_by')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_by' => Columns\TextColumn::make('updated_by')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * @return array<string, Filters\Filter>
     */
    public function getTableFilters(): array
    {
        return [
            'anno' => app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)
                ->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
            'type' => Filters\SelectFilter::make('type')
                ->options(WorkerType::class),
            'pesi_non_zero' => Filters\Filter::make('pesi_non_zero')
                ->query(fn (Builder $query): Builder => $query
                    ->where('peso_esperienza_acquisita', '>', 0)
                    ->orWhere('peso_risultati_ottenuti', '>', 0)
                    ->orWhere('peso_arricchimento_professionale', '>', 0)
                    ->orWhere('peso_impegno', '>', 0)
                    ->orWhere('peso_qualita_prestazione', '>', 0)
                ),
            'lista_propro' => Filters\Filter::make('lista_propro')
                ->form([
                    TextInput::make('value')
                        ->label('Cerca nella Lista ProPro')
                        ->placeholder('Inserisci il testo da cercare'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query->when(
                        $data['value'] ?? null,
                        fn (Builder $query, $value): Builder => $query->where('lista_propro', 'like', "%{$value}%")
                    );
                }),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            'delete' => Actions\DeleteBulkAction::make(),
        ];
    }
}
