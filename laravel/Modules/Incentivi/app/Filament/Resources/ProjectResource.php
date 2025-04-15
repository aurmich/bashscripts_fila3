<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Guava\FilamentNestedResources\Concerns\NestedResource;
use Modules\Incentivi\Enums\ProjectStatus;
use Modules\Incentivi\Filament\Resources\ActivityResource\Pages\CreateActivity;
use Modules\Incentivi\Filament\Resources\ProjectResource\Pages;
use Modules\Incentivi\Filament\Resources\ProjectResource\RelationManagers;
use Modules\Incentivi\Models\Project;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ProjectResource extends XotBaseResource
{
    // use NestedResource;

    protected static ?string $model = Project::class;

    // protected static ?string $slug = '/progetti';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'nome';

    protected static ?string $navigationGroup = 'Incentivi';

    protected static ?string $navigationLabel = 'Progetti';

    protected static ?int $navigationSort = 3;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Informazioni')
                        ->schema([
                            Forms\Components\Textarea::make('nome')
                                ->string()
                                ->required()
                                ->columnSpan(4)
                                ->placeholder('Sistemazione e restauro delle coperture laterali del Convitto dell\'ISISS Cerletti di Conegliano.'),
                            Forms\Components\Select::make('tipo')
                                ->options([
                                    'Lavori' => 'Incentivi Lavori',
                                    'Servizi' => 'Incentivi Servizi',
                                    'Misti' => 'Incentivi Misti',
                                ])
                                ->required()
                                ->columnSpan(1),
                            Forms\Components\Select::make('stato')
                                ->options(ProjectStatus::class)
                                ->required()
                                ->default('compilazione')
                                ->columnSpan(1),
                            // Forms\Components\Select::make('settore')
                            //     ->options([
                            //         'Lavori' => 'Incentivi Lavori',
                            //         'Servizi' => 'Incentivi Servizi',
                            //         'Misti' => 'Incentivi Misti',
                            //     ])
                            //     ->required()
                            //     ->columnSpan(1),
                            Forms\Components\Select::make('workgroup_id')
                                ->label('Gruppo di lavoro')
                                ->relationship('workgroup', 'denominazione')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->columnSpan(1),
                            Forms\Components\DatePicker::make('data_aggiudicazione')
                                ->required(),
                            Forms\Components\DatePicker::make('data_inizio_esecuzione')
                                ->required(),
                            Forms\Components\DatePicker::make('data_fine_esecuzione')
                                ->required(),
                            Forms\Components\TextInput::make('ente_finanziatore')
                                ->string()
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(2),
                            Forms\Components\TextInput::make('determina')
                                ->string()
                                ->required()
                                ->columnSpan(2)
                                ->placeholder('NR. 1489/69755 del 29/11/2021')
                                ->maxLength(255),
                            Forms\Components\Textarea::make('oggetto')
                                ->string()
                                ->required()
                                ->rows(3)
                                ->columnSpan(4)
                                ->placeholder('Fondo incentivante. Costituzione gruppo di lavoro per l\'Emergenza Covid - Sistemazione e restauro delle coperture laterali del Convitto - I.S.I.S.S. "G.B Cerletti" di Conegliano.'),
                        ])
                        ->columns(4),
                ])
                ->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Importi e percentuali')
                        ->schema([
                            Forms\Components\TextInput::make('importo_totale')
                                ->required()
                                ->numeric()
                                // ->inputMode('decimal')
                                ->suffix('€')
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                    $amount = floatval($state); // Cast input to float

                                    if ($amount >= 20000 && $amount <= 5382000) {
                                        $set('percentuale_fondo', 2.00);
                                        $set('importo_effettivo_fondo', (float) (2.00 * $amount / 100));
                                        $set('componente_incentivante', (float) (0.80 * floatval($get('importo_effettivo_fondo'))));
                                        $set('componente_innovazione', (float) (0.20 * floatval($get('importo_effettivo_fondo'))));
                                    } elseif ($amount >= 5382000 && $amount <= 15000000) {
                                        $set('percentuale_fondo', 1.90);
                                        $set('importo_effettivo_fondo', (float) (1.90 * $amount / 100));
                                        $set('componente_incentivante', (float) (0.80 * floatval($get('importo_effettivo_fondo'))));
                                        $set('componente_innovazione', (float) (0.20 * floatval($get('importo_effettivo_fondo'))));
                                    } elseif ($amount >= 15000000) {
                                        $set('percentuale_fondo', 1.80);
                                        $set('importo_effettivo_fondo', (float) (1.80 * $amount / 100));
                                        $set('componente_incentivante', (float) (0.80 * floatval($get('importo_effettivo_fondo'))));
                                        $set('componente_innovazione', (float) (0.20 * floatval($get('importo_effettivo_fondo'))));
                                    } else {
                                        $set('percentuale_fondo', 0);
                                        $set('importo_effettivo_fondo', 0);
                                        $set('componente_incentivante', 0);
                                        $set('componente_innovazione', 0);
                                    }
                                }),

                            Forms\Components\TextInput::make('percentuale_fondo')
                                ->required()
                                ->suffix('%')
                                ->disabled()
                                ->dehydrated(),

                            Forms\Components\TextInput::make('importo_effettivo_fondo')
                                ->numeric()->inputMode('decimal')
                                ->suffix('€')
                                ->required()
                                ->disabled()
                                ->dehydrated(),
                            Forms\Components\TextInput::make('componente_incentivante')
                                ->numeric()->inputMode('decimal')
                                ->suffix('€')
                                ->required()
                                ->disabled()
                                ->dehydrated(),
                            Forms\Components\TextInput::make('componente_innovazione')
                                ->numeric()->inputMode('decimal')
                                ->suffix('€')
                                ->required()
                                ->disabled()
                                ->dehydrated(),
                        ])->columns(2),
                ])->columnSpan(['lg' => 2]),
        ];
        // ->columns(4);
    }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             Tables\Columns\TextColumn::make('nome')
    //                 ->searchable()
    //                 ->limit(50)
    //                 ->wrap(),
    //             Tables\Columns\TextColumn::make('tipo')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('tipo_liquidazione')
    //                 ->sortable(),
    //             // Tables\Columns\TextColumn::make('settore')
    //             //     ->sortable(),
    //             Tables\Columns\TextColumn::make('stato')
    //                 ->badge()
    //                 ->sortable(),
    //             Tables\Columns\TextColumn::make('workgroup.denominazione')
    //                 // ->label('Gruppo di lavoro')
    //                 ->searchable()
    //                 ->toggleable()
    //                 ->sortable(),
    //             Tables\Columns\TextColumn::make('data_aggiudicazione')
    //                 ->dateTime('D, d M Y')
    //                 ->sortable()
    //                 ->toggleable(isToggledHiddenByDefault: true),
    //             Tables\Columns\TextColumn::make('data_inizio_esecuzione')
    //                 ->dateTime('D, d M Y')
    //                 ->sortable()
    //                 ->toggleable(isToggledHiddenByDefault: true),
    //             Tables\Columns\TextColumn::make('data_fine_esecuzione')
    //                 ->dateTime('D, d M Y')
    //                 ->sortable()
    //                 ->toggleable(isToggledHiddenByDefault: true),
    //             // Tables\Columns\TextColumn::make('oggetto')
    //             //     ->searchable()
    //             //     ->limit(30),
    //             Tables\Columns\TextColumn::make('determina')
    //                 ->searchable()
    //                 ->toggleable(isToggledHiddenByDefault: true),
    //             Tables\Columns\TextColumn::make('percentuale_fondo')
    //                 ->searchable()
    //                 // ->label('% fondo')
    //                 ,
    //             Tables\Columns\TextColumn::make('importo_totale')
    //                 ->money('EUR')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('importo_effettivo_fondo')
    //                 ->money('EUR')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('componente_incentivante')
    //                 ->money('EUR')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('componente_innovazione')
    //                 ->money('EUR')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('created_at')
    //                 ->dateTime()
    //                 ->sortable()
    //                 ->toggleable(isToggledHiddenByDefault: true),
    //             Tables\Columns\TextColumn::make('updated_at')
    //                 ->dateTime()
    //                 ->sortable()
    //                 ->toggleable(isToggledHiddenByDefault: true),
    //         ])
    //         ->filters([])
    //         ->actions([
    //             Tables\Actions\EditAction::make()
    //                 ->iconButton(),
    //             Tables\Actions\DeleteAction::make()
    //                 ->iconButton(),
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\BulkActionGroup::make([
    //                 Tables\Actions\DeleteBulkAction::make(),
    //             ]),
    //         ])
    //         ->emptyStateActions([
    //             Tables\Actions\CreateAction::make(),
    //         ]);
    // }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\ActivitiesRelationManager::class,
            // RelationManagers\EmployeesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
            'activities' => Pages\ManageProjectActivities::route('/{record}/activities'),
            'activities.create' => CreateActivity::route('/{record}/activities/create'),
            'activities.edit' => CreateActivity::route('/{record}/activities/edit'),
            'employees' => Pages\ManageProjectEmployees::route('/{record}/employees'),
            'settlements' => Pages\ManageProjectSettlements::route('/{record}/settlements'),
            'phases' => Pages\ManageProjectPhases::route('/{record}/phases'),

            // 'view-project-report' => Pages\ViewProjectReport::route('/{record}/report'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Progetto');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Progetti');
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\EditProject::class,
            Pages\ManageProjectActivities::class,
            Pages\ManageProjectEmployees::class,
            Pages\ManageProjectPhases::class,
            // Pages\ManageProjectSettlements::class,
        ]);
    }

    //public static function getNavigationBadge(): ?string
    //{
    //    return (string) static::getModel()::count();
    //}

    // public static function getFormSchema(?string $section = null): array
    // {
    //     if ('activities' === $section) {
    //         return [
    //             Forms\Components\Repeater::make('activities')
    //                 // ->relationship()
    //                 ->schema([
    //                     Forms\Components\TextInput::make('qty')
    //                         ->label('Quantity')
    //                         ->numeric()
    //                         ->default(1)
    //                         ->columnSpan([
    //                             'md' => 2,
    //                         ])
    //                         ->required(),

    //                     Forms\Components\TextInput::make('unit_price')
    //                         ->label('Unit Price')
    //                         ->disabled()
    //                         ->dehydrated()
    //                         ->numeric()
    //                         ->required()
    //                         ->columnSpan([
    //                             'md' => 3,
    //                         ]),
    //                 ])
    //                 // ->grid(2)
    //                 ->addActionLabel('Aggiungi attività')
    //                 ->orderColumn()
    //                 ->defaultItems(1)
    //                 ->hiddenLabel()
    //                 ->columns([
    //                     'md' => 10,
    //                 ])
    //                 ->required(),
    //         ];
    //     } elseif ('workgroup' === $section) {
    //         return [
    //             Forms\Components\Repeater::make('workgroup')
    //                 // ->relationship()
    //                 ->schema([
    //                     Forms\Components\TextInput::make('qty')
    //                         ->label('Quantity')
    //                         ->numeric()
    //                         ->default(1)
    //                         ->columnSpan([
    //                             'md' => 2,
    //                         ])
    //                         ->required(),

    //                     Forms\Components\TextInput::make('unit_price')
    //                         ->label('Unit Price')
    //                         ->disabled()
    //                         ->dehydrated()
    //                         ->numeric()
    //                         ->required()
    //                         ->columnSpan([
    //                             'md' => 3,
    //                         ]),
    //                 ])
    //                 // ->grid(2)
    //                 ->addActionLabel('Aggiungi attività')
    //                 ->orderColumn()
    //                 ->defaultItems(1)
    //                 ->hiddenLabel()
    //                 ->columns([
    //                     'md' => 10,
    //                 ])
    //                 ->required(),
    //         ];
    //     } else {
    //         return [];
    //     }
    // }
}
