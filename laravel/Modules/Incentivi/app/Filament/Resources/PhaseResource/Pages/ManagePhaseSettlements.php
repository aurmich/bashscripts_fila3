<?php

namespace Modules\Incentivi\Filament\Resources\PhaseResource\Pages;

use Filament\Forms;
use Filament\Tables;
use Filament\Actions;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Model;
use Modules\Incentivi\Filament\Resources\PhaseResource;
use Modules\Xot\Filament\Resources\XotBaseResource\Pages\XotBaseManageRelatedRecords;

class ManagePhaseSettlements extends XotBaseManageRelatedRecords
{
    protected static string $resource = PhaseResource::class;

    protected static string $relationship = 'settlements';

    public function getHeaderActions(): array
    {
        return [

        ];
    }



    public function getFormSchema(): array
    {
        return [
                Forms\Components\TextInput::make('denominazione')
                    ->required()
                    ->maxLength(255),
            ];
    }

    public function getListTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('denominazione'),
        ];
    }

    // public function getTableActions(): array
    // {
    //     return [
    //         Tables\Actions\Action::make('handleSettlement')
    //             ->label('Gestisci Liquidazione')
    //             ->tooltip('Gestisci Liquidazione')
    //             ->icon('heroicon-m-user-group')
    //             ->url(fn (Model $phase): string => PhaseResource::getUrl('edit', ['record' => $phase]),
    //                 shouldOpenInNewTab: false),
    //     ];
    // }


}
