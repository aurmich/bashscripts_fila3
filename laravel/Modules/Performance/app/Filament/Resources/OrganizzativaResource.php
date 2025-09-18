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
use Modules\Performance\Enums\WorkerType;
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

    public static function getListTableColumns(): array
    {
        return [
            'type' => Tables\Columns\TextColumn::make('type')
                ->searchable(),
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            'email' => Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            'ha_diritto' => Tables\Columns\ToggleColumn::make('ha_diritto')
                ->searchable(),
            'motivo' => Tables\Columns\TextColumn::make('motivo')
                ->searchable(),
            'lavoratore_group' => GroupColumn::make('lavoratore')->schema([
                'matr' => Tables\Columns\TextColumn::make('matr')->searchable(),
                'cognome' => Tables\Columns\TextColumn::make('cognome')->searchable(),
                'nome' => Tables\Columns\TextColumn::make('nome'),
                'email' => Tables\Columns\TextColumn::make('email'),
            ]),
            'info_group' => GroupColumn::make('info')->schema([
                'perc_parttimepond_dalal' => Tables\Columns\TextColumn::make('perc_parttimepond_dalal'),
                'gg_presenza_dalal' => Tables\Columns\TextColumn::make('gg_presenza_dalal'),
                'gg_assenza_dalal' => Tables\Columns\TextColumn::make('gg_assenza_dalal'),
                'hh_assenza_dalal' => Tables\Columns\TextColumn::make('hh_assenza_dalal'),
                'quota_teorica' => Tables\Columns\TextColumn::make('quota_teorica'),
                'budget_assegnato' => Tables\Columns\TextColumn::make('budget_assegnato'),
                'quota_effettiva' => Tables\Columns\TextColumn::make('quota_effettiva'),
                'resti' => Tables\Columns\TextColumn::make('resti'),
                'resti_pond' => Tables\Columns\TextColumn::make('resti_pond'),
                'importo_totale' => Tables\Columns\TextColumn::make('importo_totale'),
            ]),
            'qua_group' => GroupColumn::make('qua')->schema([
                'propro' => Tables\Columns\TextColumn::make('propro'),
                'posfun' => Tables\Columns\TextColumn::make('posfun'),
                'categoria_eco' => Tables\Columns\TextColumn::make('categoria_eco'),
                'posiz' => Tables\Columns\TextColumn::make('posiz'),
                'posiz_txt' => Tables\Columns\TextColumn::make('posiz_txt'),
                'disci1' => Tables\Columns\TextColumn::make('disci1'),
                'disci1_txt' => Tables\Columns\TextColumn::make('disci1_txt'),
            ]),
            'rep_group' => GroupColumn::make('rep')->schema([
                'stabi' => Tables\Columns\TextColumn::make('stabi'),
                'stabi_txt' => Tables\Columns\TextColumn::make('stabi_txt'),
                'repar' => Tables\Columns\TextColumn::make('repar'),
                'repar_txt' => Tables\Columns\TextColumn::make('repar_txt'),
            ]),
            'periodo_group' => GroupColumn::make('periodo')->schema([
                'dal' => Tables\Columns\TextColumn::make('dal'),
                'al' => Tables\Columns\TextColumn::make('al'),
                'anno' => Tables\Columns\TextColumn::make('anno'),
            ]),
        ];
    }

    public static function getTableFilters(): array
    {
        return [
            'anno' => app(GetYearFilter::class)->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
            'ha_diritto' => TernaryFilter::make('ha_diritto'),
            'type' => SelectFilter::make('type')
                ->options(WorkerType::class),
        ];
    }

    public static function getTableActions(): array
    {
        return [
            'edit' => Tables\Actions\EditAction::make()
                ->label('')
                ->tooltip('Modifica'),
            'view' => Tables\Actions\ViewAction::make()
                ->label('')
                ->tooltip('Vedi'),
        ];
    }

    public static function getTableBulkActions(): array
    {
        return [
            'delete' => Tables\Actions\DeleteBulkAction::make(),
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
