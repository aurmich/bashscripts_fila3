<?php

<<<<<<< HEAD
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

=======
/**
 * Activity Resource Class.
 *
 * This class manages the Activity model in the Filament admin panel.
 * It provides functionality for listing, creating, and editing activity records.
 */

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Activity\Models\Activity;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Activity Resource Class.
 *
 * This resource class is responsible for configuring the Activity model in the Filament admin panel.
 * It defines the form schema, relations, and pages for managing activity records.
 *
 * @property ActivityResource $resource
 */
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
class ActivityResource extends XotBaseResource
{
    protected static ?string $model = Activity::class;

<<<<<<< HEAD
    protected static ?string $recordTitleAttribute = 'nome';


    /**
     * @return array<string, \Filament\Forms\Components\Component>
=======
    /**
     * Define the form schema for the Activity resource.
     *
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
     */
    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
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
=======
            'log_name' => TextInput::make('log_name')
                ->required()
                ->maxLength(255),

            'description' => TextInput::make('description')
                ->required()
                ->maxLength(255),

            'subject_type' => TextInput::make('subject_type')
                ->required()
                ->maxLength(255),

            'subject_id' => TextInput::make('subject_id')
                ->numeric()
                ->required(),

            'causer_type' => TextInput::make('causer_type')
                ->maxLength(255),

            'causer_id' => TextInput::make('causer_id')
                ->numeric(),

            'properties' => KeyValue::make('properties')
                ->columnSpanFull(),

            'batch_uuid' => TextInput::make('batch_uuid')
                ->maxLength(36),
        ];
    }
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
}
