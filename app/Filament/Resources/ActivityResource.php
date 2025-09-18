<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources;

use Filament\Forms;
use Filament\Navigation\NavigationItem;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Modules\Incentivi\Filament\Resources\ActivityResource\Pages;
use Modules\Incentivi\Filament\Resources\ActivityResource\RelationManagers\EmployeesRelationManager;
use Modules\Incentivi\Models\Activity;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ActivityResource extends XotBaseResource
{
    protected static ?string $model = Activity::class;

    protected static ?string $recordTitleAttribute = 'nome';


    /**
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'nome' => Forms\Components\TextInput::make('nome')
                ->string()
                ->required()
                ->maxLength(255),
            'tipo' => Forms\Components\Select::make('tipo')
                ->required()
                ->options([
                    'Lavori' => 'Lavori',
                    'Servizi' => 'Servizi',
                    'Misti' => 'Misti',
                ]),
            'quota_percentuale' => Forms\Components\TextInput::make('quota_percentuale')
                ->required()
                ->suffix('%'),
            'importo' => Forms\Components\TextInput::make('importo')
                ->required()
                ->suffix('€'),
            'anno_competenza' => Forms\Components\TextInput::make('anno_competenza')
                ->required()
                ->maxLength(4),
            'project_id' => Forms\Components\TextInput::make('project_id')
                ->required()
                ->readOnly(),
            'phase_id' => Forms\Components\TextInput::make('phase_id')
                ->required()
                ->readOnly(),
            // 'employees' => Forms\Components\Select::make('employees')
            //     ->multiple()
            //     ->relationship('employees', 'cognome')
            //     ->required(),
        ];
    }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             Tables\Columns\TextColumn::make('nome')
    //                 ->label('Nome')
    //                 ->sortable()
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('tipo')
    //                 ->label('Tipo')
    //                 ->sortable()
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('importo')
    //                 ->label('Importo')
    //                 ->sortable()
    //                 ->formatStateUsing(fn (string $state) => (string) $state),
    //             Tables\Columns\TextColumn::make('created_at')
    //                 ->label('Creato il')
    //                 ->dateTime()
    //                 ->sortable(),
    //         ])
    //         ->filters([
    //             SelectFilter::make('tipo')
    //                 ->options([
    //                     'Lavori' => 'Lavori',
    //                     'Servizi' => 'Servizi',
    //                     'Misti' => 'Misti',
    //                 ]),
    //         ])
    //         ->actions([
    //             Tables\Actions\EditAction::make(),
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\DeleteBulkAction::make(),
    //         ]);
    // }

    // public static function getRelations(): array
    // {
    //     return [
    //         EmployeesRelationManager::class,
    //     ];
    // }

    // public static function getPages(): array
    // {
    //     return [
    //         'index' => Pages\ListActivities::route('/'),
    //         'create' => Pages\CreateActivity::route('/create'),
    //         'edit' => Pages\EditActivity::route('/{record}/edit'),
    //         // 'employees' => Pages\ManageActivityEmployees::route('/{record}/employees'),
    //     ];
    // }

    // public static function getModelLabel(): string
    // {
    //     return __('Attività');
    // }

    // public static function getPluralModelLabel(): string
    // {
    //     return __('Attività');
    // }

    // public static function getNavigationItems(): array
    // {
    //     return [
    //         NavigationItem::make(static::getNavigationLabel())
    //             ->group(static::getNavigationGroup())
    //             ->parentItem(static::getNavigationParentItem())
    //             ->icon(static::getNavigationIcon())
    //             ->activeIcon(static::getActiveNavigationIcon())
    //             ->isActiveWhen(fn () => request()->routeIs('filament.incentivi::admin.resources.activities.index'))
    //             ->badge(static::getNavigationBadge(), color: static::getNavigationBadgeColor())
    //             ->badgeTooltip(static::getNavigationBadgeTooltip())
    //             ->sort(static::getNavigationSort())
    //             ->url(static::getNavigationUrl()),
    //     ];
    // }
}
