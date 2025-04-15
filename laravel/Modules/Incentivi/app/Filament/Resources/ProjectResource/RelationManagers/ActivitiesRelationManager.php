<?php

namespace Modules\Incentivi\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Table;

class ActivitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'activities';

    protected static ?string $recordTitleAttribute = 'nome';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tipo')
                    ->required()
                    ->options([
                        'Lavori' => 'Lavori',
                        'Servizi' => 'Servizi',
                        'Misti' => 'Misti',
                    ]),
                Forms\Components\TextInput::make('quota_percentuale')
                    ->required()
                    ->suffix('%'),
                Forms\Components\TextInput::make('importo')
                    ->required()
                    ->suffix('€')
                    ->default(0),
                Forms\Components\TextInput::make('anno_competenza')
                    ->required()
                    ->maxLength(4),
                Forms\Components\TextInput::make('project_id')
                    ->required()
                    ->disabled(),
                Forms\Components\Select::make('employees')
                    ->multiple()
                    ->relationship('employees', 'cognome')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Attività del Progetto e relativi Componenti')
            ->paginated(false)
            ->recordTitleAttribute('nome')
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quota_percentuale')
                    ->searchable(),
                Tables\Columns\TextColumn::make('importo')
                    ->money('EUR')
                    ->placeholder('DA CALCOLARE'),
                Tables\Columns\TextColumn::make('anno_competenza')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quota_percentuale')
                    ->summarize(Sum::make()->label('TOTALE %')),
                Tables\Columns\TextColumn::make('employees.cognome')
                    // ->label('Componenti')
                    ->placeholder('Nessun componente.'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\AttachAction::make(),
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
