<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\WorkgroupResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Incentivi\Models\Employee;
use Modules\Xot\Enums\GenderEnum;

class EmployeesRelationManager extends RelationManager
{
    protected static string $relationship = 'employees';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('cognome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Componenti del Gruppo')
            ->recordTitleAttribute('cognome')
            ->columns([
                Tables\Columns\TextColumn::make('tipologia'),
                Tables\Columns\TextColumn::make('matricola'),
                Tables\Columns\TextColumn::make('cognome'),
                Tables\Columns\TextColumn::make('nome'),
                Tables\Columns\TextColumn::make('codice_fiscale'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tipologia')
                    ->options([
                        'I' => 'Interno',
                        'E' => 'Esterno',
                    ])
                    ->label('Tipologia'),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->label('Collega Dipendente')
                    ->preloadRecordSelect(),
                Tables\Actions\CreateAction::make('newConsulenteEsterno')
                    ->label('Aggiungi nuovo Consulente Esterno')
                    ->color('gray')
                    ->model(Employee::class)
                    ->form([
                        Forms\Components\TextInput::make('cognome')
                            ->required()->string(),
                        Forms\Components\TextInput::make('nome')
                            ->required()->string(),
                        Forms\Components\Select::make('sesso')
                            ->options(GenderEnum::class)
                            ->required(),
                    ])
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['matricola'] = null;
                        $data['codice_fiscale'] = null;
                        $data['posizione_inail'] = null;
                        $data['tipologia'] = 'E';

                        return $data;
                    }),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make()
                    ->visible(fn (Employee $record): bool => $record->tipologia == 'I'),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn (Employee $record): bool => $record->tipologia == 'E'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}
