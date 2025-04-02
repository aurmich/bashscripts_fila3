<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Modules\Ptv\Enums\WorkerType;
use Modules\Performance\Filament\Resources\OrganizzativaResource\Pages;
use Modules\Performance\Models\Organizzativa;
use Modules\UI\Filament\Tables\Columns\GroupColumn;
use Modules\Xot\Actions\Filament\Filter\GetYearFilter;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class OrganizzativaResource extends XotBaseResource
{
    protected static ?string $model = Organizzativa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'id' => TextInput::make('id')->disabled(),

            'diritto_section' => Section::make('diritto')
                ->headerActions([
                    \Filament\Forms\Components\Actions\Action::make('refresh')
                        ->label('')
                        ->tooltip('ricalcola')
                        ->icon('heroicon-o-arrow-path')
                        ->action(function ($record) {
                            dddx($record);
                        }),
                ])
                ->schema([
                    'ha_diritto' => Toggle::make('ha_diritto'),
                    'motivo' => Textarea::make('motivo')->columnSpan(3),
                ])
                ->columns(4),

            'lavoratore_section' => Section::make('lavoratore')->schema([
                'matr' => TextInput::make('matr'),
                'cognome' => TextInput::make('cognome'),
                'nome' => TextInput::make('nome'),
                'email' => TextInput::make('email'),
            ])->columns(4),

            'qua_section' => Section::make('qua')->schema([
                'propro' => TextInput::make('propro'),
                'posfun' => TextInput::make('posfun'),
                'posiz' => TextInput::make('posiz'),
                'posiz_txt' => TextInput::make('posiz_txt'),
                'disci1' => TextInput::make('disci1'),
                'disci1_txt' => TextInput::make('disci1_txt'),
            ])->columns(5),

            'rep_section' => Section::make('rep')->schema([
                'stabi' => TextInput::make('stabi'),
                'stabi_txt' => TextInput::make('stabi_txt'),
                'repar' => TextInput::make('repar'),
                'repar_txt' => TextInput::make('repar_txt'),
            ])->columns(2),

            'periodo_section' => Section::make('periodo')->schema([
                'dal' => TextInput::make('dal'),
                'al' => TextInput::make('al'),
                'anno' => TextInput::make('anno'),
            ])->columns(4),

            'assenze_section' => Section::make('assenze')->schema([
                'gg_assenza_dalal' => TextInput::make('gg_assenza_dalal'),
                'hh_assenza_dalal' => TextInput::make('hh_assenza_dalal'),
            ])->columns(4),
        ];
    }

    

    

    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizzativas::route('/'),
            'create' => Pages\CreateOrganizzativa::route('/create'),
            'view' => Pages\ViewOrganizzativa::route('/{record}'),
            'edit' => Pages\EditOrganizzativa::route('/{record}/edit'),
        ];
    }

    public static function getXlsFields(): array
    {
        return [
            'id',
            'matr',
            'cognome',
            'nome',
            'email',
            'dal',
            'al',
            'anno',
            'ha_diritto',
            'perc_parttimepond_dalal',
            'gg_presenza_dalal',
            'gg_assenza_dalal',
            'hh_assenza_dalal',
            'quota_teorica',
            'budget_assegnato',
            'quota_effettiva',
            'resti',
            'resti_pond',
            'importo_totale',
        ];
    }
}
