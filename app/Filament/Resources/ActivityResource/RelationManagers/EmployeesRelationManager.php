<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\ActivityResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EmployeesRelationManager extends RelationManager
{
    protected static string $relationship = 'employees';

    protected static ?string $recordTitleAttribute = 'cognome';

    public static function getModelLabel(): string
    {
        return __('Dipendente');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('cognome')
                    ->readOnly()
                    ->required(),
                TextInput::make('percentuale_attivita_dipendente')
                    ->required()
                    ->numeric()
                    ->suffix('%')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state, RelationManager $livewire): void {
                        $ownerRecord = $livewire->getOwnerRecord();
                        if (isset($ownerRecord->importo)) {
                            $percentuale = null !== $state ? (float)$state : 0;
                            $set('importo_attivita_dipendente', ($percentuale * (float)$ownerRecord->importo) / 100);
                        }
                    }),
                TextInput::make('importo_attivita_dipendente')
                    ->numeric()
                    ->required()
                    ->suffix('€')
                    ->disabled()
                    ->dehydrated(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Dipendenti')
            ->recordTitleAttribute('cognome')
            ->columns([
                TextColumn::make('cognome'),
                TextColumn::make('percentuale_attivita_dipendente')
                    // ->label('Percentuale attribuita')
                    ->suffix('%'),
                // ->summarize(Summarizer::make()
                //     ->label('Total')
                //     ->using(fn ($query): string => $query->count())),
                TextColumn::make('importo_attivita_dipendente')
                    // ->label('Importo attribuito')
                    ->suffix('€'),
            ])
            ->filters([
            ])
            ->headerActions([
                AttachAction::make()
                    ->recordSelectOptionsQuery(
                        function (Builder $query) {
                            $ownerRecord = $this->getOwnerRecord();
                            $workgroup_id = null;

                            // Avoid strict comparison with null since $ownerRecord is always an Eloquent model
                            if (property_exists($ownerRecord, 'workgroup_id')) {
                                $workgroup_id = $ownerRecord->workgroup_id;

                                // return $query->ofWorkgroupId($workgroup_id);
                                return $query->whereHas('workgroups', function (Builder $query1) use ($workgroup_id) {
                                    $query1->where('workgroups.id', $workgroup_id);
                                });
                            }

                            return $query; // Return unmodified query if no workgroup_id
                        }
                    )
                    ->preloadRecordSelect()
                    ->recordSelectSearchColumns(['cognome', 'nome'])
                    ->recordTitle(function (Model $record) {
                        $nome = property_exists($record, 'nome') ? $record->nome : '';
                        $cognome = property_exists($record, 'cognome') ? $record->cognome : '';
                        return "{$nome} {$cognome}";
                    })
                    ->form(fn (AttachAction $action): array => [
                        $action->getRecordSelect(),
                        TextInput::make('percentuale_attivita_dipendente')
                            // ->label('Percentuale dell\'attività')
                            ->required()
                            ->numeric()
                            ->inputMode('numeric')
                            ->minValue(1)
                            ->maxValue(100)
                            ->suffix('%')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, ?string $state, RelationManager $livewire): void {
                                $ownerRecord = $livewire->getOwnerRecord();
                                if (isset($ownerRecord->importo)) {
                                    $percentuale = null !== $state ? (float)$state : 0;
                                    $set('importo_attivita_dipendente', ($percentuale * (float)$ownerRecord->importo) / 100);
                                }
                            }),
                        TextInput::make('importo_attivita_dipendente')
                            // ->label('Importo dell\'attività')
                            ->numeric()
                            ->required()
                            ->suffix('€')
                            ->disabled()
                            ->dehydrated(),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}
