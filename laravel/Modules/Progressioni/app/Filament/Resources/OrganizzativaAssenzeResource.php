<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Performance\Filament\Resources\OrganizzativaAssenzeResource\Pages;
use Modules\Performance\Models\OrganizzativaAssenze;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class OrganizzativaAssenzeResource extends XotBaseResource
{
    protected static ?string $model = OrganizzativaAssenze::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'tipo' => Forms\Components\TextInput::make('tipo')
                ->numeric(),
            'codice' => Forms\Components\TextInput::make('codice')
                ->numeric(),
            'descr' => Forms\Components\Textarea::make('descr')
                ->columnSpanFull(),
            'anno' => Forms\Components\TextInput::make('anno')
                ->numeric(),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'tipo' => Tables\Columns\TextColumn::make('tipo')
                ->numeric()
                ->sortable(),
            'codice' => Tables\Columns\TextColumn::make('codice')
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
            'index' => Pages\ListOrganizzativaAssenzes::route('/'),
            'create' => Pages\CreateOrganizzativaAssenze::route('/create'),
            'edit' => Pages\EditOrganizzativaAssenze::route('/{record}/edit'),
        ];
    }
}
