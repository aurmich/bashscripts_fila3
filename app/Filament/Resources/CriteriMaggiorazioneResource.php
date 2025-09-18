<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Performance\Filament\Resources\CriteriMaggiorazioneResource\Pages;
use Modules\Performance\Models\CriteriMaggiorazione;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CriteriMaggiorazioneResource extends XotBaseResource
{
    protected static ?string $model = CriteriMaggiorazione::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'anno' => Forms\Components\TextInput::make('anno')
                ->label('Anno')
                ->required()
                ->numeric()
                ->default(date('Y')),
            'min_valutaz_perf_ind' => Forms\Components\TextInput::make('min_valutaz_perf_ind')
                ->label('Valutazione Performance Individuale Minima')
                ->required()
                ->numeric()
                ->minValue(0)
                ->maxValue(100)
                ->step(0.01),
            'maggiorazione_perc' => Forms\Components\TextInput::make('maggiorazione_perc')
                ->label('Percentuale Maggiorazione')
                ->required()
                ->numeric()
                ->minValue(0)
                ->maxValue(100)
                ->step(0.01)
                ->suffix('%'),
            'created_by' => Forms\Components\TextInput::make('created_by')
                ->label('Creato da')
                ->maxLength(50)
                ->disabled()
                ->dehydrated(false)
                ->hiddenOn('create'),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCriteriMaggioraziones::route('/'),
            'create' => Pages\CreateCriteriMaggiorazione::route('/create'),
            'edit' => Pages\EditCriteriMaggiorazione::route('/{record}/edit'),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->label('Anno')
                ->sortable()
                ->searchable(),
            'min_valutaz_perf_ind' => Tables\Columns\TextColumn::make('min_valutaz_perf_ind')
                ->label('Valutazione Performance Individuale Minima')
                ->numeric()
                ->sortable(),
            'maggiorazione_perc' => Tables\Columns\TextColumn::make('maggiorazione_perc')
                ->label('Percentuale Maggiorazione')
                ->numeric()
                ->sortable()
                ->suffix('%'),
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

    public static function getTableFilters(): array
    {
        return [
            'anno' => app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)
                ->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
        ];
    }

    public static function getTableActions(): array
    {
        return [
            'edit' => Tables\Actions\EditAction::make(),
        ];
    }

    public static function getTableBulkActions(): array
    {
        return [
            'delete' => Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    

    
}
