<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Resources\ReportResource\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\StabiDirigenteResource;

class EditStabiDirigente extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = StabiDirigenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id')->disabled(),
                TextInput::make('valutatore_id'),
                TextInput::make('stabi'),
                TextInput::make('repar'),
                TextInput::make('nome_stabi'),
                // Forms\Components\TextInput::make('ente'),
                // Forms\Components\TextInput::make('matr'),
                TextInput::make('nome_diri'),
                TextInput::make('nome_diri_plus'),
                TextInput::make('anno'),
            ]);
    }
}
