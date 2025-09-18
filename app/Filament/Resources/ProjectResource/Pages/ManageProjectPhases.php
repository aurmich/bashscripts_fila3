<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\ProjectResource\Pages;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Component;
use Filament\Tables\Actions\CreateAction;
use Modules\Incentivi\Filament\Resources\PhaseResource;
use Modules\Incentivi\Filament\Resources\ProjectResource;
use Modules\Xot\Filament\Resources\XotBaseResource\Pages\XotBaseManageRelatedRecords;

class ManageProjectPhases extends XotBaseManageRelatedRecords
{
    protected static string $resource = ProjectResource::class;

    protected static string $relationship = 'phases';

    // protected static ?string $navigationIcon = 'heroicon-m-newspaper';

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema());
    }

    /**
     * Define the form schema for managing related records.
     *
     * @return array<Component>
     */
    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('description')
                ->label('Description')
                ->required()
                ->maxLength(255),

            Forms\Components\DatePicker::make('start_date')
                ->label('Start Date')
                ->required(),

            Forms\Components\DatePicker::make('end_date')
                ->label('End Date')
                ->required(),
        ];
    }

    /**
     * Define the table columns for displaying related records.
     *
     * @return array<TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label('Name')
                ->sortable()
                ->searchable(),

            TextColumn::make('description')
                ->label('Description')
                ->sortable()
                ->searchable(),

            TextColumn::make('start_date')
                ->label('Start Date')
                ->dateTime('d/m/Y')
                ->sortable(),

            TextColumn::make('end_date')
                ->label('End Date')
                ->dateTime('d/m/Y')
                ->sortable(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [
            CreateAction::make('nuova-fase')
                ->label('Nuova Fase')
                ->disableCreateAnother(),
        ];
    }


    public function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('handleSettlement')
                ->label('Gestisci Liquidazione')
                ->tooltip('Gestisci Liquidazione')
                ->icon('heroicon-o-document-currency-euro')
                ->url(fn (Model $phase): string => PhaseResource::getUrl('edit', ['record' => $phase]),
                    shouldOpenInNewTab: false),
        ];
    }
}
