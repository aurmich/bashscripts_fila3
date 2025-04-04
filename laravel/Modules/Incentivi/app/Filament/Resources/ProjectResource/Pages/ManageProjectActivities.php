<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\ProjectResource\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Modules\Incentivi\Filament\Resources\ActivityResource;
use Modules\Incentivi\Filament\Resources\ProjectResource;
use Modules\Xot\Filament\Resources\XotBaseResource\Pages\XotBaseManageRelatedRecords;

class ManageProjectActivities extends XotBaseManageRelatedRecords
{
    protected static string $resource = ProjectResource::class;

    protected static string $relationship = 'activities';

    protected static ?string $title = 'Attività';

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
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('nome')
                ->limit(70)
                ->searchable(),
            // Tables\Columns\TextColumn::make('tipo')
            //     ->searchable(),
            Tables\Columns\TextColumn::make('quota_percentuale')
                ->suffix('%')
                ->searchable(),
            Tables\Columns\TextColumn::make('importo')
                ->money('EUR')
                ->placeholder('DA CALCOLARE'),
            Tables\Columns\TextInputColumn::make('anno_competenza')
                ->type('number')
                ->rules(['required', 'numeric'])
                ->searchable(),
            Tables\Columns\TextColumn::make('quota_percentuale')
                ->summarize(Sum::make()->label('TOTALE %')),
            Tables\Columns\TextColumn::make('employees.full_name')
                ->placeholder('Nessun componente')
                ->badge(),
        ];
    }

    /**
     * Undocumented function.
     *
     * @return array<Tables\Actions\Action|Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('handleEmployees')
                ->label('Gestisci Componenti')
                ->tooltip('Gestisci Componenti')
                ->icon('heroicon-m-user-group')
                ->url(fn (Model $activity): string => ActivityResource::getUrl('edit', ['record' => $activity]),
                    shouldOpenInNewTab: false),
        ];
    }

    // public function getTableHeaderActions(): array
    // {
    //     return [];
    // }

    // public function table2(Table $table): Table
    // {
    //     return $table
    //         ->heading('Attività del Progetto e relativi Componenti')
    //         ->paginated(false)
    //         ->recordTitleAttribute('nome')
    //         ->columns([
    //             Tables\Columns\TextColumn::make('nome')
    //                 ->limit(70)
    //                 ->searchable(),
    //             // Tables\Columns\TextColumn::make('tipo')
    //             //     ->searchable(),
    //             Tables\Columns\TextColumn::make('quota_percentuale')
    //                 ->suffix('%')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('importo')
    //                 ->money('EUR')
    //                 ->placeholder('DA CALCOLARE'),
    //             Tables\Columns\TextInputColumn::make('anno_competenza')
    //                 ->type('number')
    //                 ->rules(['required', 'numeric'])
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('quota_percentuale')
    //                 ->summarize(Sum::make()->label('TOTALE %')),
    //             Tables\Columns\TextColumn::make('employees.full_name')
    //                 // ->label('Componenti')
    //                 ->placeholder('Nessun componente')
    //                 ->badge(),
    //         ])
    //         ->filters([
    //         ])
    //         ->headerActions([
    //             // Tables\Actions\AttachAction::make(),
    //             // Tables\Actions\CreateAction::make(),
    //         ])
    //         ->actions([
    //             // Tables\Actions\EditAction::make()
    //             //     ->iconButton(),
    //             // Tables\Actions\DeleteAction::make()
    //             //     ->iconButton(),
    //             Tables\Actions\Action::make('handleEmployees')
    //                 ->label('Gestisci Componenti')
    //                 ->tooltip('Gestisci Componenti')
    //                 ->icon('heroicon-m-user-group')
    //                 ->url(function (Model $activity): ?string {
    //                     if (! $activity) {
    //                         return null;
    //                     }

    //                     return ActivityResource::getUrl('edit', ['record' => $activity]);
    //                 }, shouldOpenInNewTab: false),
    //         ])
    //         ->bulkActions([
    //             // Tables\Actions\BulkActionGroup::make([
    //             //     Tables\Actions\DeleteBulkAction::make(),
    //             // ]),
    //         ])
    //         ->emptyStateActions([
    //             Tables\Actions\CreateAction::make(),
    //         ]);
    // }
}
