<?php

namespace Modules\Incentivi\Filament\Resources\ProjectResource\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Modules\Incentivi\Filament\Resources\ProjectResource;
use Modules\Incentivi\Filament\Resources\ProjectResource\Pages;
use Modules\Xot\Filament\Resources\XotBaseResource\Pages\XotBaseManageRelatedRecords;

class ManageActivityEmployees extends XotBaseManageRelatedRecords
{
    protected static string $resource = ProjectResource::class;

    protected static string $relationship = 'employees';

    // protected static ?string $slug = 'activity/employees';

    public function getHeaderActions(): array
    {
        return [

        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema());
    }

    public function getFormSchema(): array
    {
        return [
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
        ];
    }

    public function getListTableColumns(): array
    {
        return [
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
                ->summarize(
                    Sum::make()->label('TOTALE %')
                ),
            Tables\Columns\TextColumn::make('employees.cognome')
                // ->label('Componenti')
                ->placeholder('Nessun componente.'),
        ];
    }

    /*
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
            //'activities' => Pages\ManageProjectActivities::route('/{record}/activities'),
            //'employees' => Pages\ManageActivityEmployees::route('/{project}/activities/{record}/employees'),

        ];
    }
    */
}
