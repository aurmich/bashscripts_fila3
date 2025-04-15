<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Performance\Filament\Resources\IndividualeDecurtazioneAssenzeResource\Pages;
use Modules\Performance\Models\IndividualeDecurtazioneAssenze;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class IndividualeDecurtazioneAssenzeResource extends XotBaseResource
{
    protected static ?string $model = IndividualeDecurtazioneAssenze::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'anno' => Forms\Components\TextInput::make('anno')
                ->numeric(),
            'min_perc' => Forms\Components\TextInput::make('min_perc')
                ->numeric(),
            'max_perc' => Forms\Components\TextInput::make('max_perc')
                ->numeric(),
            'min_gg_365' => Forms\Components\TextInput::make('min_gg_365')
                ->numeric(),
            'max_gg_365' => Forms\Components\TextInput::make('max_gg_365')
                ->numeric(),
            'decurtazione_perc' => Forms\Components\TextInput::make('decurtazione_perc')
                ->numeric(),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'min_perc' => Tables\Columns\TextColumn::make('min_perc')
                ->numeric()
                ->sortable(),
            'max_perc' => Tables\Columns\TextColumn::make('max_perc')
                ->numeric()
                ->sortable(),
            'min_gg_365' => Tables\Columns\TextColumn::make('min_gg_365')
                ->numeric()
                ->sortable(),
            'max_gg_365' => Tables\Columns\TextColumn::make('max_gg_365')
                ->numeric()
                ->sortable(),
            'decurtazione_perc' => Tables\Columns\TextColumn::make('decurtazione_perc')
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
            'index' => Pages\ListIndividualeDecurtazioneAssenzes::route('/'),
            'create' => Pages\CreateIndividualeDecurtazioneAssenze::route('/create'),
            'edit' => Pages\EditIndividualeDecurtazioneAssenze::route('/{record}/edit'),
        ];
    }
}
