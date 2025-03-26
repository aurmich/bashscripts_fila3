<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\DefaultActivityResource\Pages;

use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Incentivi\Filament\Resources\DefaultActivityResource;
use Modules\Incentivi\Filament\Resources\DefaultActivityResource\Actions\DefaultActivitiesSeederAction;
use Modules\Incentivi\Models\DefaultActivity;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListDefaultActivities extends XotBaseListRecords
{
    protected static string $resource = DefaultActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...parent::getHeaderActions(),
            DefaultActivitiesSeederAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Lavori' => \Filament\Resources\Components\Tab::make()
                ->badge(DefaultActivity::query()->where('tipo', 'Lavori')->count())
                ->query(fn (Builder $query) => $query->where('tipo', 'Lavori')),
            'Servizi' => \Filament\Resources\Components\Tab::make()
                ->badge(DefaultActivity::query()->where('tipo', 'Servizi')->count())
                ->query(fn (Builder $query) => $query->where('tipo', 'Servizi')),
            'Misti' => \Filament\Resources\Components\Tab::make()
                ->badge(DefaultActivity::query()->where('tipo', 'Misti')->count())
                ->query(fn (Builder $query) => $query->where('tipo', 'Misti')),
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
            Tables\Columns\IconColumn::make('appartiene_a_liquidazione_a_fasi')
                // ->label('A fasi?')
                ->boolean(),
            Tables\Columns\TextColumn::make('liquidazione_fasi')
                // ->label('Fasi')
                ->searchable(),
            Tables\Columns\TextColumn::make('quota_percentuale')
                ->searchable(),
            Tables\Columns\TextColumn::make('importo')
                ->money('EUR')
                ->placeholder('DA ASSEGNARE'),
            Tables\Columns\TextColumn::make('anno_competenza')
                ->searchable(),
            Tables\Columns\TextColumn::make('quota_percentuale'),
        ];
    }

    public function table(Table $table): Table
    {
        return parent::table($table)->paginated(false);
    }
}
