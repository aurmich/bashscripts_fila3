<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Support\Arr;
use Modules\Performance\Actions\HasExcellenceByYearAction;
use Modules\Progressioni\Filament\Resources\ProgressioniResource\Pages;
use Modules\Progressioni\Filament\Resources\ProgressioniResource\RelationManagers;
use Modules\Progressioni\Models\Progressioni;
use Modules\Progressioni\Models\SchedaCriteri;
use Modules\Ptv\Actions\GetValutatoriOptions;
use Modules\Ptv\Filament\Fields\ValutatoreField;
use Modules\Ptv\Filament\Resources\AnagResource\RelationManagers as PtvRelationManagers;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class ProgressioniResource extends XotBaseResource
{
    protected static ?string $model = Progressioni::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getXlsFields(array $filters): array
    {
        $fields = [
            'id',
            'ha_diritto',
            'motivo',
            // ------------------------------------
            'ente',
            'matr',
            'cognome',
            'nome',
            // ---------------------------------
            'stabi',
            'stabi_txt',
            'repar',
            'repar_txt',
            // --------------------------------
            'qua2kd',
            'qua2ka',
            'propro',
            'posfun',
            'categoria_eco',
            'posiz',
            'posiz_txt',
            'disci1',
            'disci1_txt',
            // -------------------------------------
            'dal',
            'al',
            // 'gg_no_asz',
            // 'gg_cateco_posfun_no_asz',
            // 'gg_cateco_no_posfun_no_asz',
            'gg_in_sede',
            'gg_fuori_sede',
            'gg_cateco_in_sede',
            'gg_cateco_fuori_sede',
            'gg_cateco_posfun_in_sede',
            'gg_cateco_posfun_fuori_sede',
            'gg_asz_in_sede',
            'gg_asz_fuori_sede',
            'gg_asz_cateco_in_sede',
            'gg_asz_cateco_fuori_sede',
            'gg_asz_cateco_posfun_in_sede',
            'gg_asz_cateco_posfun_fuori_sede',
        ];

        /*
        $year = Arr::get($filters, 'anno.value');

        $rows = SchedaCriteri::where('anno', $year)->get();
        foreach ($rows as $row) {
            $fields[] = $row->field_name;
        }
        */

        array_unique($fields);

        return $fields;
    }

    public static function getFormSchema(): array
{
    return [
                TextInput::make('id')->disabled(),

                Section::make('diritto')
                    ->headerActions([
                        /*
                        Action::make('refresh')
                            ->label('')
                            ->tooltip('ricalcola')
                            ->icon('heroicon-o-arrow-path')
                            ->action(function ($record) {
                                // ...
                                // dddx($record);
                            }),
                        */
                    ])
                    ->schema([
                        // TextInput::make('ha_diritto')->columnSpan(1),
                        Toggle::make('ha_diritto'),
                        Textarea::make('motivo')->columnSpan(3),
                    ])
                    ->columns(4),

                Section::make('lavoratore')->schema([
                    TextInput::make('matr'),
                    TextInput::make('cognome'),
                    TextInput::make('nome'),
                    TextInput::make('email'),
                ])->columns(4),
                Section::make('qua')->schema([
                    TextInput::make('propro'),
                    TextInput::make('posfun'),
                    TextInput::make('posiz'),
                    TextInput::make('posiz_txt'),
                    TextInput::make('categoria_eco'),
                    TextInput::make('categoria_ecoval'),
                    TextInput::make('posfunval'),
                    TextInput::make('disci1'),
                    TextInput::make('disci1_txt'),
                ])->columns(5),
                Section::make('rep')->schema([
                    TextInput::make('stabi'),
                    TextInput::make('stabi_txt'),
                    TextInput::make('repar'),
                    TextInput::make('repar_txt'),
                ])->columns(2),
                Section::make('periodo')->schema([
                    TextInput::make('dal'),
                    TextInput::make('al'),
                    TextInput::make('anno'),
                ])->columns(4),
                // ValutatoreField::make('valutatore_id'),
                Select::make('valutatore_id')->options(
                    fn ($record) => app(GetValutatoriOptions::class)->execute('Progressioni', $record->anno)
                ),
                Section::make('excellences')->schema([
                    Toggle::make('excellences_'.(intval(date('Y')) - 0))
                        ->disabled()
                        // ->default(fn ($record) => dddx($record))
                        ->formatStateUsing(fn (?string $state, $record) => app(HasExcellenceByYearAction::class)->execute($record, intval(date('Y')) - 0)),
                    Toggle::make('excellences_'.(intval(date('Y')) - 1))
                        ->disabled()
                        ->formatStateUsing(fn (?string $state, $record) => app(HasExcellenceByYearAction::class)->execute($record, intval(date('Y')) - 1)),
                    Toggle::make('excellences_'.(intval(date('Y')) - 2))
                        ->disabled()
                        ->formatStateUsing(fn (?string $state, $record) => app(HasExcellenceByYearAction::class)->execute($record, intval(date('Y')) - 2)),
                    Toggle::make('excellences_'.(intval(date('Y')) - 3))
                        ->disabled()
                        ->formatStateUsing(fn (?string $state, $record) => app(HasExcellenceByYearAction::class)->execute($record, intval(date('Y')) - 3)),
                    Toggle::make('excellences_'.(intval(date('Y')) - 4))
                        ->disabled()
                        ->formatStateUsing(fn (?string $state, $record) => app(HasExcellenceByYearAction::class)->execute($record, intval(date('Y')) - 4)),
                    Toggle::make('excellences_'.(intval(date('Y')) - 5))
                        ->disabled()
                        ->formatStateUsing(fn (?string $state, $record) => app(HasExcellenceByYearAction::class)->execute($record, intval(date('Y')) - 5)),
                    Toggle::make('excellences_'.(intval(date('Y')) - 6))
                        ->disabled()
                        ->formatStateUsing(fn (?string $state, $record) => app(HasExcellenceByYearAction::class)->execute($record, intval(date('Y')) - 6)),
                    TextInput::make('excellences_count_last_3_years')
                        ->formatStateUsing(fn (?string $state, $record) => $record->excellences_count_last_3_years),
                ])->columns(4),

                Section::make('performance')->schema([
                    TextInput::make('perf_ind_'.(intval(date('Y')) - 0))->numeric(),
                    TextInput::make('perf_ind_'.(intval(date('Y')) - 1))->numeric(),
                    TextInput::make('perf_ind_'.(intval(date('Y')) - 2))->numeric(),
                    TextInput::make('perf_ind_'.(intval(date('Y')) - 3))->numeric(),
                    TextInput::make('perf_ind_'.(intval(date('Y')) - 4))->numeric(),
                    TextInput::make('perf_ind_'.(intval(date('Y')) - 5))->numeric(),
                    TextInput::make('perf_ind_'.(intval(date('Y')) - 6))->numeric(),
                    TextInput::make('perf_ind_media')->numeric(),
                ])->columns(4),

                Section::make('_gg')->schema([
                    TextInput::make('gg_cateco_in_sede'),
                    TextInput::make('gg_cateco_fuori_sede'),
                    TextInput::make('gg_cateco'),
                    // ---------------------------------------------------
                    TextInput::make('gg_cateco_posfun_in_sede'),
                    TextInput::make('gg_cateco_posfun_fuori_sede'),
                    TextInput::make('gg_cateco_posfun'),
                    // -----------------------------------------------------
                    // TextInput::make('gg_cateco_posfun_no_asz_in_sede'),
                    // TextInput::make('gg_cateco_posfun_no_asz_fuori_sede'),
                    TextInput::make('gg_asz_cateco_posfun_in_sede'),
                    TextInput::make('gg_asz_cateco_posfun_fuori_sede'),
                    TextInput::make('gg_cateco_posfun_no_asz'),
                ])->columns(3),
            ];
    }

    /**
     * @return array<RelationManagers>
     */
    public static function getRelations(): array
    {
        return [
            PtvRelationManagers\Qua00fRelationManager::class,
            PtvRelationManagers\Qua03fRelationManager::class,
            PtvRelationManagers\AszEffRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgressionis::route('/'),
            'create' => Pages\CreateProgressioni::route('/create'),
            'edit' => Pages\EditProgressioni::route('/{record}/edit'),
            'view' => Pages\ViewProgressioni::route('/{record}'),
        ];
    }
}
