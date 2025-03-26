<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Actions;
use Modules\Performance\Filament\Resources\CriteriOptionResource\Pages;
use Modules\Performance\Models\CriteriOption;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CriteriOptionResource extends XotBaseResource
{
    protected static ?string $model = CriteriOption::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'name' => Forms\Components\TextInput::make('name')
                ->label('Nome')
                ->required()
                ->maxLength(50),
            'value' => Forms\Components\TextInput::make('value')
                ->label('Valore')
                ->required()
                ->maxLength(50),
            'anno' => Forms\Components\TextInput::make('anno')
                ->label('Anno')
                ->required()
                ->numeric()
                ->default(date('Y')),
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
            'index' => Pages\ListCriteriOptions::route('/'),
            'create' => Pages\CreateCriteriOption::route('/create'),
            'edit' => Pages\EditCriteriOption::route('/{record}/edit'),
        ];
    }

    public function getTableColumns(): array
    {
        return [
            'name' => Columns\TextColumn::make('name')
                ->label('Nome')
                ->searchable()
                ->sortable(),
            'field_name' => Columns\TextColumn::make('field_name')
                ->label('Campo')
                ->searchable()
                ->sortable(),
            'op' => Columns\TextColumn::make('op')
                ->label('Operatore')
                ->searchable()
                ->sortable(),
            'value' => Columns\TextColumn::make('value')
                ->label('Valore')
                ->searchable()
                ->sortable(),
            'anno' => Columns\TextColumn::make('anno')
                ->label('Anno')
                ->numeric()
                ->sortable(),
        ];
    }

    public function getTableActions(): array
    {
        return [
            'edit' => Actions\EditAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            'delete' => Actions\DeleteBulkAction::make(),
        ];
    }

    public static function getTableFilters(): array
    {
        return [
            'anno' => app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)
                ->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
        ];
    }
}
