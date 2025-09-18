<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Incentivi\Filament\Resources\ActivityResource\Pages;

use Filament\Tables;
use Modules\Incentivi\Filament\Resources\ActivityResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

=======
namespace Modules\Activity\Filament\Resources\ActivityResource\Pages;

use Filament\Tables\Columns\TextColumn;
use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * @see ActivityResource
 */
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
class ListActivities extends XotBaseListRecords
{
    protected static string $resource = ActivityResource::class;

<<<<<<< HEAD
    // public static function route(string $path): string
    // {
    //    return $this->$resource::route('/activities' . $path);
    // }

    protected function getHeaderActions(): array
    {
        return [
            ...parent::getHeaderActions(),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    public function getListTableColumns(): array
    {
        return [
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->limit(50)
                ->searchable(),
            'tipo' => Tables\Columns\TextColumn::make('tipo')
                ->searchable(),
            'quota_percentuale' => Tables\Columns\TextColumn::make('quota_percentuale')
                ->searchable(),
            'importo' => Tables\Columns\TextColumn::make('importo')
                ->money('EUR')
                ->placeholder('DA CALCOLARE'),
            'anno_competenza' => Tables\Columns\TextColumn::make('anno_competenza')
                ->searchable(),
            // 'quota_percentuale_sum' => Tables\Columns\TextColumn::make('quota_percentuale')
            //     ->summarize(Sum::make()->label('TOTALE %')),
            'project_nome' => Tables\Columns\TextColumn::make('project.nome')
                // ->label('Progetto')
                ->limit(30),
            'employees_cognome' => Tables\Columns\TextColumn::make('employees.cognome')
                // ->label('Componenti')
                ->placeholder('Nessun componente presente.')
                ->limit(50),
        ];
    }

    /**
     * Undocumented function.
     *
     * @return array<\Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        $acts = [
            ...parent::getTableActions(),
        ];

        return $acts;
=======
    public function getListTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->sortable()
                ->label('ID'),

            'description' => TextColumn::make('description')
                ->searchable()
                ->label('Description'),

            'subject_type' => TextColumn::make('subject_type')
                ->searchable()
                ->label('Subject Type'),

            'subject_id' => TextColumn::make('subject_id')
                ->sortable()
                ->label('Subject ID'),

            'causer_type' => TextColumn::make('causer_type')
                ->searchable()
                ->label('Causer Type'),

            'causer_id' => TextColumn::make('causer_id')
                ->sortable()
                ->label('Causer ID'),

            'created_at' => TextColumn::make('created_at')
                ->sortable()
                ->dateTime()
                ->label('Created At'),

        ];
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
    }
}
