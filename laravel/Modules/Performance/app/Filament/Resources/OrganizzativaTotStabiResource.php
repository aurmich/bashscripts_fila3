<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Performance\Filament\Resources\OrganizzativaTotStabiResource\Pages;
use Modules\Performance\Models\OrganizzativaTotStabi;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class OrganizzativaTotStabiResource extends XotBaseResource
{
    protected static ?string $model = OrganizzativaTotStabi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'stabi' => Forms\Components\TextInput::make('stabi')
                ->numeric(),
            'tot_budget_assegnato' => Forms\Components\TextInput::make('tot_budget_assegnato')
                ->numeric(),
            'tot_budget_assegnato_min_punteggio' => Forms\Components\TextInput::make('tot_budget_assegnato_min_punteggio')
                ->numeric(),
            'tot_quota_effettiva' => Forms\Components\TextInput::make('tot_quota_effettiva')
                ->numeric(),
            'tot_quota_effettiva_min_punteggio' => Forms\Components\TextInput::make('tot_quota_effettiva_min_punteggio')
                ->numeric(),
            'tot_resti' => Forms\Components\TextInput::make('tot_resti')
                ->numeric(),
            'tot_resti_min_punteggio' => Forms\Components\TextInput::make('tot_resti_min_punteggio')
                ->numeric(),
            'delta' => Forms\Components\TextInput::make('delta')
                ->numeric(),
            'delta_min_punteggio' => Forms\Components\TextInput::make('delta_min_punteggio')
                ->numeric(),
            'anno' => Forms\Components\TextInput::make('anno')
                ->numeric(),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->numeric()
                ->sortable(),
            'stabi' => Tables\Columns\TextColumn::make('stabi')
                ->numeric()
                ->sortable(),
            'tot_budget_assegnato' => Tables\Columns\TextColumn::make('tot_budget_assegnato')
                ->numeric()
                ->sortable(),
            'tot_budget_assegnato_min_punteggio' => Tables\Columns\TextColumn::make('tot_budget_assegnato_min_punteggio')
                ->numeric()
                ->sortable(),
            'tot_quota_effettiva' => Tables\Columns\TextColumn::make('tot_quota_effettiva')
                ->numeric()
                ->sortable(),
            'tot_quota_effettiva_min_punteggio' => Tables\Columns\TextColumn::make('tot_quota_effettiva_min_punteggio')
                ->numeric()
                ->sortable(),
            'tot_resti' => Tables\Columns\TextColumn::make('tot_resti')
                ->numeric()
                ->sortable(),
            'tot_resti_min_punteggio' => Tables\Columns\TextColumn::make('tot_resti_min_punteggio')
                ->numeric()
                ->sortable(),
            'delta' => Tables\Columns\TextColumn::make('delta')
                ->numeric()
                ->sortable(),
            'delta_min_punteggio' => Tables\Columns\TextColumn::make('delta_min_punteggio')
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
            'index' => Pages\ListOrganizzativaTotStabis::route('/'),
            'create' => Pages\CreateOrganizzativaTotStabi::route('/create'),
            'edit' => Pages\EditOrganizzativaTotStabi::route('/{record}/edit'),
        ];
    }
}
