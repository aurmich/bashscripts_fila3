<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\IndividualeDipResource\Pages;

use Filament\Tables;
use Filament\Actions;
use function Safe\date;
use Illuminate\Support\Arr;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Performance\Models\IndividualeDip;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

use Modules\Performance\Filament\Resources\IndividualeDipResource;
use Modules\Performance\Filament\Resources\IndividualeResource\Pages\ListIndividuales;

/**
 * ---.
 */
class ListIndividualeDips extends ListIndividuales
{
    protected static string $resource = IndividualeDipResource::class;

  

    
}
