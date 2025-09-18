<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources;

// use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource\Pages\EditCondizioniLavoro;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource\Pages\ListCondizioniLavoros;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource\Pages\CreateCondizioniLavoro;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource\Pages\CompilaCondizioniLavoro;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource\Widgets\CondizioniLavoroOverview;

/**
 * @property-read \Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro $record
 *
 * @method \Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro getRecord()
 */
class CondizioniLavoroResource extends XotBaseResource
{
    protected static ?string $model = CondizioniLavoro::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // protected static ?string $recordTitleAttribute = 'name';
    public static ?string $label = 'Condizioni Lavoro/Servizio Esterno ';

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('matr'),
            TextInput::make('cognome'),
            TextInput::make('nome'),
            TextInput::make('stabi'),
            TextInput::make('repar'),
            DatePicker::make('dal'),
            DatePicker::make('al'),
            TextInput::make('anno'),
            Select::make('valutatore_id')
                ->options(fn ($record) => app(\Modules\Ptv\Actions\GetAllValutatoriOptions::class)->execute('IndennitaCondizioniLavoro', $record->anno)),
            Select::make('indennitaTipoDettaglio')
                ->multiple()
                ->relationship('indennitaTipoDettaglio', 'nome',
                    fn (Builder $query, Model $record) => $query->where('dal', '<=', $record->anno)->where('al', '>=', $record->anno)
                )
                ->getOptionLabelFromRecordUsing(fn (Model $record): string => sprintf(' %s] %s %s %s', $record->indennitaTipo?->nome, $record->nome, $record->dal, $record->al)),
        ];
    }

   

   
    public static function getWidgets(): array
    {
        return [
            CondizioniLavoroOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCondizioniLavoros::route('/'),
            'create' => CreateCondizioniLavoro::route('/create'),
            'edit' => EditCondizioniLavoro::route('/{record}/edit'),
            'compila' => CompilaCondizioniLavoro::route('/{record}/compila'),
        ];
    }

   
}
