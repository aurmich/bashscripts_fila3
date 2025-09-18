<?php

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Filament\Resources\CriteriValutazioneResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\CriteriValutazioneResource;
use Modules\Progressioni\Models\CriteriValutazione;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
<<<<<<< HEAD
=======
namespace Modules\Performance\Filament\Resources\CriteriValutazioneResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Enums\WorkerType;
use Modules\Performance\Filament\Resources\CriteriValutazioneResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCriteriValutaziones extends XotBaseListRecords
{
    protected static string $resource = CriteriValutazioneResource::class;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(CriteriValutazione::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'parent_id' => Tables\Columns\TextColumn::make('parent_id')
                ->numeric()
                ->sortable(),
            'name' => Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'label' => Tables\Columns\TextColumn::make('label')
                ->searchable()
                ->sortable(),
            'descr' => Tables\Columns\TextColumn::make('descr')
                ->searchable()
                ->sortable(),
            'post_type' => Tables\Columns\TextColumn::make('post_type')
                ->searchable()
                ->sortable(),
            'posizione' => Tables\Columns\TextColumn::make('posizione')
                ->numeric()
                ->sortable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
<<<<<<< HEAD
=======
    public function getListTableColumns(): array
    {
        return [
            'id_padre' => Columns\TextColumn::make('id_padre')
                ->numeric()
                ->sortable(),
            'nome' => Columns\TextColumn::make('nome')
                ->searchable()
                ->sortable(),
            'label' => Columns\TextColumn::make('label')
                ->searchable()
                ->sortable(),
            'descr' => Columns\TextColumn::make('descr')
                ->searchable(),
            'post_type' => Columns\TextColumn::make('post_type')
                ->searchable()
                ->sortable(),
            'posizione' => Columns\TextColumn::make('posizione')
                ->numeric()
                ->sortable(),
            'anno' => Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'anno' => Filters\SelectFilter::make('anno')
                ->options(function () {
                    $currentYear = (int) date('Y');

                    return [
                        $currentYear => $currentYear,
                        $currentYear - 1 => $currentYear - 1,
                        $currentYear - 2 => $currentYear - 2,
                    ];
                }),
            'post_type' => Filters\SelectFilter::make('post_type')
                ->options(WorkerType::class),
        ];
    }

    public function getTableActions(): array
    {
        return [
            'edit' => Actions\EditAction::make(),
            'delete' => Actions\DeleteAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            'delete' => Actions\DeleteBulkAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'copy' => CopyFromLastYearAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'copy' => CopyFromLastYearAction::make(),
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
        ];
    }
}
