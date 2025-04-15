<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Columns\ColumnGroup;
use Modules\Performance\Filament\Actions\Table\IndividualeSpreadMoneyAction;
use Modules\Performance\Filament\Actions\Table\OrganizzativaSpreadMoneyAction;
use Modules\Performance\Filament\Resources\PerformanceFondoResource\Pages;
use Modules\Performance\Models\PerformanceFondo;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class PerformanceFondoResource extends XotBaseResource
{
    protected static ?string $model = PerformanceFondo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'quota_individuale' => Forms\Components\TextInput::make('quota_individuale')
                ->numeric(),
            'quota_organizzativa' => Forms\Components\TextInput::make('quota_organizzativa')
                ->numeric(),
            'anno' => Forms\Components\TextInput::make('anno')
                ->numeric(),
            'note' => Forms\Components\Textarea::make('note')
                ->columnSpanFull(),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'quota_group' => ColumnGroup::make('Quota')
                ->columns([
                    'quota_individuale' => Tables\Columns\TextColumn::make('quota_individuale')
                        ->numeric()
                        ->sortable(),
                    'quota_organizzativa' => Tables\Columns\TextColumn::make('quota_organizzativa')
                        ->numeric()
                        ->sortable(),
                ])
                ->alignment(Alignment::Center)
                ->wrapHeader(),
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
            'edit' => Tables\Actions\EditAction::make()
                ->label('')
                ->tooltip('Modifica'),
            'organizzativa' => OrganizzativaSpreadMoneyAction::make(),
            'individuale' => IndividualeSpreadMoneyAction::make(),
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
            'index' => Pages\ListPerformanceFondos::route('/'),
            'create' => Pages\CreatePerformanceFondo::route('/create'),
            'edit' => Pages\EditPerformanceFondo::route('/{record}/edit'),
            'organizzativa-money' => Pages\OrganizzativaMoney::route('/{record}/organizzativa-money'),
            'individuale-money' => Pages\IndividualeMoney::route('/{record}/individuale-money'),
        ];
    }
}
