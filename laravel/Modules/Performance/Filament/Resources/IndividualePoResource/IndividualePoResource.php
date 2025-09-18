<?php

declare(strict_types=1);

namespace App\Http\Livewire\Performance\Filament\Resources\IndividualePoResource;

use Filament\Resources\Resource;
use App\Models\IndividualePo;

class IndividualePoResource extends Resource
{
    protected static ?string $model = IndividualePo::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Performance';

    protected static ?int $navigationSort = 1;

    public static function getModelLabel(): string
    {
        return 'Individuale PO';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Individuali PO';
    }
} 