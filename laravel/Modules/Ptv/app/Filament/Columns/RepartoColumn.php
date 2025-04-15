<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Columns;

use Filament\Tables\Columns\TextColumn;
use Modules\UI\Filament\Tables\Columns\GroupColumn;

class RepartoColumn extends GroupColumn
{
    protected array $extraColumns = [];

    public static function make(?string $name = null): static
    {
        return parent::make($name)
            ->schema(static::getSchema())
            ->searchable(array_keys(static::getSchema()));
    }

    public function appendColumns(array $columns): static
    {
        $this->extraColumns = array_merge($this->extraColumns, $columns);
        
        $schema = array_merge(
            static::getSchema(),
            $this->extraColumns
        );

        return $this->schema($schema);
    }

    protected static function getSchema(): array
    {
        return [
            'stabi' => TextColumn::make('stabi'),
            'stabi_txt' => TextColumn::make('stabi_txt'),
            'repar' => TextColumn::make('repar'),
            'repar_txt' => TextColumn::make('repar_txt'),
        ];
    }
} 