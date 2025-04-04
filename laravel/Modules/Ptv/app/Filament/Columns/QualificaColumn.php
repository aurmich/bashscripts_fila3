<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Columns;

use Filament\Tables\Columns\TextColumn;
use Modules\UI\Filament\Tables\Columns\GroupColumn;

class QualificaColumn extends GroupColumn
{
    protected array $extraColumns = [];

    public static function make(?string $name = null): static
    {
        $columns = static::getSchema();
        $searchable = array_keys($columns);
        
        return parent::make($name)
            ->schema($columns)
            ->searchable($searchable);
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
            'propro' => TextColumn::make('propro'),
            'posfun' => TextColumn::make('posfun'),
            'categoria_eco' => TextColumn::make('categoria_eco'),
            'categoria_ecoval' => TextColumn::make('categoria_ecoval'),
            'posfunval' => TextColumn::make('posfunval'),
            //'posiz' => TextColumn::make('posiz'),
            //'posiz_txt' => TextColumn::make('posiz_txt'),
            //'disci1' => TextColumn::make('disci1'),
            //'disci1_txt' => TextColumn::make('disci1_txt'),
        ];
    }
} 