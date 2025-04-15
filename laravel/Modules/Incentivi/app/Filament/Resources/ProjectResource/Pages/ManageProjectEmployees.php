<?php

namespace Modules\Incentivi\Filament\Resources\ProjectResource\Pages;

use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Incentivi\Filament\Resources\ProjectResource;
use Modules\Incentivi\Filament\Resources\ProjectResource\Actions\GeneratePDFProjectReportActionSpatie;
use Modules\Xot\Filament\Resources\XotBaseResource\Pages\XotBaseManageRelatedRecords;

class ManageProjectEmployees extends XotBaseManageRelatedRecords
{
    protected static string $resource = ProjectResource::class;

    protected static string $relationship = 'employees';

    protected static ?string $title = 'Dipendenti';

    public function getHeaderActions(): array
    {
        return [
            // GeneratePDFProjectReportActionSpatie::make(),
        ];
    }

    // public static function sumPerYear(int $year): float
    // {
    //     return fn(Model $record): float =>
    //     (float) ($record->activities->where('anno_competenza', $year)->sum('pivot.importo_attivita_dipendente'));
    // }

    public static function sumPerColumn(int $year, $livewire): float
    {
        $sum = 0;
        $activities = $livewire->getRecord()
            ->activities()->with('employees')->where('anno_competenza', $year)->get();
        foreach ($activities as $activity) {
            foreach ($activity->employees->where('tipologia', 'I') as $employee) {
                $sum += $employee->pivot->importo_attivita_dipendente;
            }
        }

        return $sum;
    }

    public static function sumPerColumnTotal($livewire): float
    {
        $sum = 0;
        $activities = $livewire->getRecord()
            ->activities()->with('employees')->get();
        foreach ($activities as $activity) {
            foreach ($activity->employees->where('tipologia', 'I') as $employee) {
                $sum += $employee->pivot->importo_attivita_dipendente;
            }
        }

        return $sum;
    }

    public function getListTableColumns(): array
    {
        $cols = [
            Tables\Columns\TextColumn::make('matricola')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('cognome')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('nome')
                ->searchable()
                ->sortable(),
            // Tables\Columns\TextColumn::make('sesso'),
            Tables\Columns\TextColumn::make('codice_fiscale'),
            Tables\Columns\TextColumn::make('posizione_inail'),
        ];

        $projectActivities = $this->getRecord()->activities;
        $uniqueYears = $projectActivities->pluck('anno_competenza')->unique()->toArray();

        // foreach ($uniqueYears as $year) {
        //     $cols[] = Tables\Columns\TextColumn::make('sum_'.$year)
        //         ->label('Anno '.$year)
        //         ->default($this->sumPerYear($year))
        //         ->money('EUR')
        //         ->summarize(
        //             Summarizer::make()
        //             ->label('Totale')
        //             ->using(fn($livewire) => $livewire->sumPerColumn($year, $livewire))
        //             ->money('EUR')
        //             ) ;
        // }

        $cols[] = Tables\Columns\TextColumn::make('sum_total_row')
            // ->label('Totale Attività')
            ->default(fn (Model $record) => $record->activities->sum('pivot.importo_attivita_dipendente'))
            ->money('EUR')
            ->summarize(Summarizer::make()
                ->label('Totale')
                ->using(fn ($livewire) => $livewire->sumPerColumnTotal($livewire))
                ->money('EUR')
            );

        return $cols;
    }

    public function table(Table $table): Table
    {
        return $table
            ->striped()
            ->defaultPaginationPageOption(10)
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('tipologia', 'I');
            })
            ->columns($this->getListTableColumns())
            ->filters([
                Tables\Filters\SelectFilter::make('anno_competenza')
                    ->relationship('activities', 'anno_competenza', fn (Builder $query) => $query->groupBy('anno_competenza'))
                    ->label('Anno di competenza'),
            ])
            ->filtersTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->label('Filtra'),
            )
            ->actions([
                // Tables\Actions\EditAction::make()
                //     ->iconButton(),
                // Tables\Actions\DeleteAction::make()
                //     ->iconButton(),
            ])
            ->headerActions([

            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->emptyStateActions([
                // Tables\Actions\CreateAction::make(),
            ]);
    }
}
