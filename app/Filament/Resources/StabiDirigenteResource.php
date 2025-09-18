<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Filament\Resources;

use Modules\IndennitaCondizioniLavoro\Filament\Resources\StabiDirigenteResource\Pages;
use Modules\IndennitaCondizioniLavoro\Models\StabiDirigente;
=======
namespace Modules\IndennitaResponsabilita\Filament\Resources;

use Modules\IndennitaResponsabilita\Filament\Resources\StabiDirigenteResource\Pages\CreateStabiDirigente;
use Modules\IndennitaResponsabilita\Filament\Resources\StabiDirigenteResource\Pages\EditStabiDirigente;
use Modules\IndennitaResponsabilita\Filament\Resources\StabiDirigenteResource\Pages\ListStabiDirigentes;
use Modules\IndennitaResponsabilita\Models\StabiDirigente;
>>>>>>> e0005d7d (first)
=======
namespace Modules\Progressioni\Filament\Resources;

use Modules\Progressioni\Filament\Resources\StabiDirigenteResource\Pages;
use Modules\Progressioni\Models\StabiDirigente;
>>>>>>> bcab6efe (first)
use Modules\Ptv\Filament\Resources\StabiDirigenteResource as PtvStabiDirigenteResource;

class StabiDirigenteResource extends PtvStabiDirigenteResource
{
    protected static ?string $model = StabiDirigente::class;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bcab6efe (first)
=======
namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Performance\Filament\Resources\StabiDirigenteResource\Pages;
use Modules\Performance\Models\StabiDirigente;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class StabiDirigenteResource extends XotBaseResource
{
    protected static ?string $model = StabiDirigente::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'stabi' => Forms\Components\TextInput::make('stabi')
                ->numeric(),
            'repar' => Forms\Components\TextInput::make('repar')
                ->numeric(),
            'nome_stabi' => Forms\Components\TextInput::make('nome_stabi')
                ->maxLength(200),
            'ente' => Forms\Components\TextInput::make('ente')
                ->numeric(),
            'matr' => Forms\Components\TextInput::make('matr')
                ->numeric(),
            'nome_diri' => Forms\Components\TextInput::make('nome_diri')
                ->maxLength(250),
            'anno' => Forms\Components\TextInput::make('anno')
                ->maxLength(250),
            'n_diritto_excellence' => Forms\Components\TextInput::make('n_diritto_excellence')
                ->numeric(),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'stabi' => Tables\Columns\TextColumn::make('stabi')
                ->numeric()
                ->sortable(),
            'repar' => Tables\Columns\TextColumn::make('repar')
                ->numeric()
                ->sortable(),
            'nome_stabi' => Tables\Columns\TextColumn::make('nome_stabi')
                ->searchable(),
            'ente' => Tables\Columns\TextColumn::make('ente')
                ->numeric()
                ->sortable(),
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->numeric()
                ->sortable(),
            'nome_diri' => Tables\Columns\TextColumn::make('nome_diri')
                ->searchable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->searchable(),
            'n_diritto_excellence' => Tables\Columns\TextColumn::make('n_diritto_excellence')
                ->numeric()
                ->sortable(),
        ];
    }

    public static function getTableFilters(): array
    {
        return [
            'anno' => app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)
                ->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
        ];
    }

    public static function getTableActions(): array
    {
        return [
            'edit' => Tables\Actions\EditAction::make(),
        ];
    }

    public static function getTableBulkActions(): array
    {
        return [
            'delete' => Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    

    

>>>>>>> 961ad402 (first)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStabiDirigentes::route('/'),
            'create' => Pages\CreateStabiDirigente::route('/create'),
            'edit' => Pages\EditStabiDirigente::route('/{record}/edit'),
<<<<<<< HEAD
<<<<<<< HEAD
=======
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStabiDirigentes::route('/'),
            'create' => CreateStabiDirigente::route('/create'),
            'edit' => EditStabiDirigente::route('/{record}/edit'),
>>>>>>> e0005d7d (first)
=======
>>>>>>> bcab6efe (first)
=======
>>>>>>> 961ad402 (first)
        ];
    }
}
