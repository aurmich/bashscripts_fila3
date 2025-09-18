<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Performance\Filament\Resources\OrganizzativaCatCoeffResource\Pages;
use Modules\Performance\Models\OrganizzativaCatCoeff;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class OrganizzativaCatCoeffResource extends XotBaseResource
{
    protected static ?string $model = OrganizzativaCatCoeff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'lista_propro' => Forms\Components\TextInput::make('lista_propro')
                ->maxLength(250),
            'coeff' => Forms\Components\TextInput::make('coeff')
                ->numeric(),
            'descr' => Forms\Components\Textarea::make('descr')
                ->columnSpanFull(),
            'tot_giorni' => Forms\Components\TextInput::make('tot_giorni')
                ->numeric(),
            'tot_giorni_pt' => Forms\Components\TextInput::make('tot_giorni_pt')
                ->numeric(),
            'tot_giorni_pt_coeff' => Forms\Components\TextInput::make('tot_giorni_pt_coeff')
                ->numeric(),
            'quota_teorica' => Forms\Components\TextInput::make('quota_teorica')
                ->numeric(),
            'anno' => Forms\Components\TextInput::make('anno')
                ->numeric(),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'lista_propro' => Tables\Columns\TextColumn::make('lista_propro')
                ->searchable(),
            'coeff' => Tables\Columns\TextColumn::make('coeff')
                ->numeric()
                ->sortable(),
            'tot_giorni' => Tables\Columns\TextColumn::make('tot_giorni')
                ->numeric()
                ->sortable(),
            'tot_giorni_pt' => Tables\Columns\TextColumn::make('tot_giorni_pt')
                ->numeric()
                ->sortable(),
            'tot_giorni_pt_coeff' => Tables\Columns\TextColumn::make('tot_giorni_pt_coeff')
                ->numeric()
                ->sortable(),
            'quota_teorica' => Tables\Columns\TextColumn::make('quota_teorica')
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
            'index' => Pages\ListOrganizzativaCatCoeffs::route('/'),
            'create' => Pages\CreateOrganizzativaCatCoeff::route('/create'),
            'edit' => Pages\EditOrganizzativaCatCoeff::route('/{record}/edit'),
        ];
    }
}
