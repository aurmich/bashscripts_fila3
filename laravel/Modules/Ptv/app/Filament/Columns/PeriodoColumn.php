<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Columns;

use Filament\Tables\Columns\TextColumn;
use Modules\UI\Filament\Tables\Columns\GroupColumn;

class PeriodoColumn extends GroupColumn
{
    protected array $extraColumns = [];

    public static function make(?string $name = null): static
    {
        return parent::make($name)
            ->schema([
                TextColumn::make('dal'),
                TextColumn::make('al'),
                TextColumn::make('anno'),
            ]);
    }

    public function appendColumns(array $columns): static
    {
        $this->extraColumns = array_merge($this->extraColumns, $columns);
        
        $schema = array_merge(
            $this->getSchema(),
            $this->extraColumns
        );

        return $this->schema($schema);
    }

    protected function getSchema(): array
    {
        return [
            TextColumn::make('dal'),
            TextColumn::make('al'),
            TextColumn::make('anno'),
        ];
    }
} 