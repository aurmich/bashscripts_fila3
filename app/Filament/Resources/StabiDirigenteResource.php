<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
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
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Filament\Resources;

use Modules\Progressioni\Filament\Resources\StabiDirigenteResource\Pages;
use Modules\Progressioni\Models\StabiDirigente;
<<<<<<< HEAD
>>>>>>> bcab6efe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
use Modules\Ptv\Filament\Resources\StabiDirigenteResource as PtvStabiDirigenteResource;

class StabiDirigenteResource extends PtvStabiDirigenteResource
{
    protected static ?string $model = StabiDirigente::class;

<<<<<<< HEAD
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

=======
namespace Modules\Ptv\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages;
use Modules\Ptv\Models\StabiDirigente;
use Modules\Xot\Filament\Resources\XotBaseResource;

>>>>>>> dc18abbe (first)
class StabiDirigenteResource extends XotBaseResource
{
    protected static ?string $model = StabiDirigente::class;

<<<<<<< HEAD
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
=======
    
>>>>>>> dc18abbe (first)

    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
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
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStabiDirigentes::route('/'),
            'create' => Pages\CreateStabiDirigente::route('/create'),
            'edit' => Pages\EditStabiDirigente::route('/{record}/edit'),
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
            'id' => Forms\Components\TextInput::make('id')
                ->disabled(),
            'valutatore_id' => Forms\Components\TextInput::make('valutatore_id'),
            'stabi' => Forms\Components\TextInput::make('stabi'),
            'repar' => Forms\Components\TextInput::make('repar'),
            'nome_stabi' => Forms\Components\TextInput::make('nome_stabi'),
            // 'ente' => Forms\Components\TextInput::make('ente'),
            'matr' => Forms\Components\TextInput::make('matr'),
            'nome_diri' => Forms\Components\TextInput::make('nome_diri'),
            'nome_diri_plus' => Forms\Components\TextInput::make('nome_diri_plus'),
            'email' => Forms\Components\TextInput::make('email'),
            'anno' => Forms\Components\TextInput::make('anno'),
        ];
    }
    /*
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('valutatore_id'),
                TextColumn::make('stabi')->searchable(),
                TextColumn::make('repar')->searchable(),
                TextColumn::make('nome_stabi')->searchable(),
                // Tables\Columns\TextColumn::make('ente')->searchable(),
                // Tables\Columns\TextColumn::make('matr')->searchable(),
                TextColumn::make('nome_diri')->searchable(),
                TextColumn::make('nome_diri_plus')->searchable(),
                TextColumn::make('anno'),
            ])
            ->filters([
                SelectFilter::make('anno')
                    ->options([
                        '2021' => '2021',
                        '2022' => '2022',
                        '2023' => '2023',
                    ])->query(static function (Builder $query, array $data): Builder {
                        if (null == $data['value']) {
                            return $query->where('id', 0);
                        }

                        return $query->where('anno', $data['value']);
                    }),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
    */

>>>>>>> dc18abbe (first)
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
<<<<<<< HEAD
            'index' => ListStabiDirigentes::route('/'),
            'create' => CreateStabiDirigente::route('/create'),
            'edit' => EditStabiDirigente::route('/{record}/edit'),
>>>>>>> e0005d7d (first)
=======
>>>>>>> bcab6efe (first)
=======
>>>>>>> 961ad402 (first)
=======
            'index' => Pages\ListStabiDirigentes::route('/'),
            'create' => Pages\CreateStabiDirigente::route('/create'),
            'edit' => Pages\EditStabiDirigente::route('/{record}/edit'),
>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
        ];
    }
}
