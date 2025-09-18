<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Modules\Performance\Enums\WorkerType;
use Modules\Performance\Filament\Resources\IndividualePesiResource\Pages;
use Modules\Performance\Models\IndividualePesi;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class IndividualePesiResource extends XotBaseResource
{
    protected static ?string $model = IndividualePesi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'type' => Forms\Components\Select::make('type')
                ->options(WorkerType::class),
            'lista_propro' => Forms\Components\TextInput::make('lista_propro')
                ->maxLength(250),
            'descr' => Forms\Components\TextInput::make('descr')
                ->maxLength(50),
            'peso_esperienza_acquisita' => Forms\Components\TextInput::make('peso_esperienza_acquisita')
                ->numeric(),
            'peso_risultati_ottenuti' => Forms\Components\TextInput::make('peso_risultati_ottenuti')
                ->numeric(),
            'peso_arricchimento_professionale' => Forms\Components\TextInput::make('peso_arricchimento_professionale')
                ->numeric(),
            'peso_impegno' => Forms\Components\TextInput::make('peso_impegno')
                ->numeric(),
            'peso_qualita_prestazione' => Forms\Components\TextInput::make('peso_qualita_prestazione')
                ->numeric(),
            'anno' => Forms\Components\TextInput::make('anno')
                ->numeric(),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'type' => Tables\Columns\TextColumn::make('type')
                ->searchable()
                ->badge(),
            'lista_propro' => Tables\Columns\TextColumn::make('lista_propro')
                ->wrapHeader()
                ->searchable(),
            'descr' => Tables\Columns\TextColumn::make('descr')
                ->searchable(),
            'peso_esperienza_acquisita' => Tables\Columns\TextColumn::make('peso_esperienza_acquisita')
                ->wrapHeader()
                ->numeric()
                ->sortable(),
            'peso_risultati_ottenuti' => Tables\Columns\TextColumn::make('peso_risultati_ottenuti')
                ->wrapHeader()
                ->numeric()
                ->sortable(),
            'peso_arricchimento_professionale' => Tables\Columns\TextColumn::make('peso_arricchimento_professionale')
                ->wrapHeader()
                ->numeric()
                ->sortable(),
            'peso_impegno' => Tables\Columns\TextColumn::make('peso_impegno')
                ->wrapHeader()
                ->numeric()
                ->sortable(),
            'peso_qualita_prestazione' => Tables\Columns\TextColumn::make('peso_qualita_prestazione')
                ->wrapHeader()
                ->numeric()
                ->sortable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
        ];
    }

    public static function getTableFilters(): array
    {
        return [
            'anno' => app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)
                ->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
            'type' => SelectFilter::make('type')
                ->options(WorkerType::class),
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

    

    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndividualePesis::route('/'),
            'create' => Pages\CreateIndividualePesi::route('/create'),
            'edit' => Pages\EditIndividualePesi::route('/{record}/edit'),
        ];
    }
}
