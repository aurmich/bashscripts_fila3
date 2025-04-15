<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Columns;


use Filament\Tables\Columns\TextColumn;
use Modules\UI\Filament\Tables\Columns\GroupColumn;

class LavoratoreColumn extends GroupColumn
{
    protected array $extraColumns = [];

    public static function getColumns(): array{
        return [
            'cognome' => TextColumn::make('cognome')
                    ->sortable()
                    ->searchable(),
                'nome' => TextColumn::make('nome')
                    ->sortable()
                    ->searchable(),
                'matr' => TextColumn::make('matr')
                    ->sortable()
                    ->searchable(),
                'email' => TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
        ];
    }

    public static function make(?string $name = null): static
    {
        $columns = self::getColumns();
        $searchable = array_keys($columns);
        return parent::make($name)
            ->schema($columns)
            ->searchable($searchable);
    }

    public function appendColumns(array $columns): static
    {
        $this->extraColumns = array_merge($this->extraColumns, $columns);
        
        $schema = array_merge(
            $this->getColumns(),
            $this->extraColumns
        );

        return $this->schema($schema);
    }
   
}
