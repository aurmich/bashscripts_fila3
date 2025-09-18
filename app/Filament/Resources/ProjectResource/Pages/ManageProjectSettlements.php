<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\ProjectResource\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Modules\Incentivi\Filament\Resources\ProjectResource;
use Modules\Incentivi\Filament\Resources\ProjectResource\Actions\GeneratePDFProjectReportActionSpatie;
use Modules\Incentivi\Models\Project;
use Modules\Xot\Filament\Resources\XotBaseResource\Pages\XotBaseManageRelatedRecords;

class ManageProjectSettlements extends XotBaseManageRelatedRecords
{
    protected static string $resource = ProjectResource::class;

    protected static string $relationship = 'settlements';

    protected static ?string $title = 'Liquidazioni';

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema());
    }

    public function getHeaderActions(): array
    {
        return [
            GeneratePDFProjectReportActionSpatie::make(),
        ];
    }

    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('denominazione')
                // ->label('Denominazione')
                ->required()
                ->maxLength(255),
            // Forms\Components\Select::make('tipologia')
            //     // ->label('Tipo di liquidazione')
            //     ->options([
            //         '1-fase' => '1° fase',
            //         '2-fase' => '2° fase',
            //         'unica' => 'Unica',
            //     ])
            //     ->required()
            //     ->default('unica'),
            Forms\Components\TextInput::make('importo')
                ->numeric()
                ->suffix('€'),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('denominazione')
                ->limit(70)
                ->searchable(),
            Tables\Columns\TextColumn::make('importo')
                ->money('EUR'),
            // Tables\Columns\TextColumn::make('tipologia')
            //     ->searchable(),
            Tables\Columns\TextColumn::make('created_at'),
            Tables\Columns\TextColumn::make('updated_at'),
            // Tables\Columns\TextColumn::make('project.nome'),
        ];
    }

    public function getTableActions(): array
    {
        return [
            // ...parent::getTableActions(),
            Tables\Actions\Action::make('download')
                // ->label('Scarica PDF')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->openUrlInNewTab(),
        ];
    }


    public function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make('nuova-liquidazione-unica')
                ->label('Nuova Liquidazione Unica')
                ->disableCreateAnother(),
        ];
    }

    public function get(): array
    {
        return [
            Tables\Actions\DeleteBulkAction::make(),
        ];
    }


    // public function table(Table $table): Table
    // {
    //     return $table
    //         ->heading('Liquidazioni del Progetto')
    //         ->paginated(false)
    //         ->recordTitleAttribute('denominazione')
    //         ->columns([
    //             Tables\Columns\TextColumn::make('denominazione')
    //                 // ->label('Denominazione')
    //                 ->limit(70)
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('tipologia')
    //                 // ->label('Tipo di liquidazione')
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('created_at')
    //                 // ->label('Creata')
    //                 ,
    //             Tables\Columns\TextColumn::make('updated_at')
    //                 // ->label('Aggiornata')
    //                 ,
    //             Tables\Columns\TextColumn::make('project.nome')
    //                 // ->label('Progetto')
    //         ])
    //         ->filters([
    //         ])
    //         ->headerActions([
    //             // Tables\Actions\AttachAction::make(),
    //             Tables\Actions\CreateAction::make('nuova-liquidazione-unica')
    //                 ->label('Nuova Liquidazione Unica')
    //                 ->disableCreateAnother(),
    //             Tables\Actions\CreateAction::make('nuova-liquidazione-a-fasi')
    //                 ->label('Nuova Liquidazione a Fasi')
    //                 ->disableCreateAnother(),
    //         ])
    //         ->actions([
    //             Tables\Actions\EditAction::make()
    //                 ->iconButton(),
    //             Tables\Actions\DeleteAction::make()
    //                 ->iconButton(),
    //             Action::make('download')
    //                 // ->label('Scarica PDF')
    //                 ->icon('heroicon-o-arrow-down-tray')
    //                 ->color('success')
    //                 ->openUrlInNewTab()
    //                 ,
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\BulkActionGroup::make([
    //                 Tables\Actions\DeleteBulkAction::make(),
    //             ]),
    //         ])
    //         ->emptyStateActions([
    //             // Tables\Actions\CreateAction::make(),
    //         ]);
    // }

    protected function getRelatedCount(): int
    {
        return Project::has('settlements')->count();
    }
}
