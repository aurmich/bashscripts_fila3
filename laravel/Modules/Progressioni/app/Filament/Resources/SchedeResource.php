<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\SchedeResource\Pages;
use Modules\Progressioni\Filament\Resources\SchedeResource\RelationManagers;
use Modules\Progressioni\Models\SchedaCriteri;
use Modules\Progressioni\Models\Schede;
use Modules\Xot\Filament\Resources\XotBaseResource;

class SchedeResource extends XotBaseResource
{
    protected static ?string $model = Schede::class;

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
            'gg_no_asz',
            'gg_cateco_posfun_no_asz',
            'gg_cateco_no_posfun_no_asz',
        ];

        $year = Arr::get($filters, 'anno/valutatore.anno');
        $rows = SchedaCriteri::where('anno', $year)->get();
        foreach ($rows as $row) {
            $fields[] = $row->field_name;
        }

        array_unique($fields);

        return $fields;
    }

    public static function getFormSchema(): array
{
    return [
                TextInput::make('id')->disabled(),
                TextInput::make('ente'),
                TextInput::make('matr'),
                TextInput::make('stabi'),
                TextInput::make('repar'),
                TextInput::make('anno'),
                TextInput::make('cognome'),
                TextInput::make('nome'),
                TextInput::make('categoria_eco'),
                TextInput::make('categoria_ecoval'),
                TextInput::make('email'),
                TextInput::make('esperienza_acquisita'),
                TextInput::make('risultati_ottenuti'),
                TextInput::make('arricchimento_professionale'),
                TextInput::make('impegno'),
                TextInput::make('qualita_prestazione'),
                TextInput::make('totale'),
                TextInput::make('totale_pond'),
                TextInput::make('vincitore'),
                TextInput::make('gg_cateco_posfun'),
                TextInput::make('gg_cateco_posfun_no_asz'),
                TextInput::make('gg_in_sede'),
                TextInput::make('gg_presenza_anno'),
                TextInput::make('gg_assenza_anno'),
                TextInput::make('gg_fuori_sede'),
                TextInput::make('gg_posiz_1_in_sede'),
                TextInput::make('gg_cateco_fuori_sede'),
                TextInput::make('gg_cateco_in_sede'),
                TextInput::make('gg_cateco_posfun_fuori_sede'),
                TextInput::make('gg_cateco_posfun_in_sede'),
                TextInput::make('gg_cateco_posfun_in_sede_no_asz'),
                TextInput::make('gg_asz_cateco_posfun_fuori_sede'),
                TextInput::make('gg_asz_cateco_posfun_in_sede'),
                TextInput::make('gg_cateco_posfun_fuori_sede'),
                TextInput::make('gg_cateco_fuori_sede'),
                TextInput::make('gg_anno'),
                TextInput::make('gg_asz_tip_cod_escluso_subito'),
                TextInput::make('gg_aspettative_pond_fuori_sede'),
                TextInput::make('gg_aspettative_pond_in_sede'),
                TextInput::make('ptime'), // aggiunto
                TextInput::make('costo_fascia_up'), // da ced03f

                TextInput::make('peso_perf_ind_media'),
                TextInput::make('perf_ind_media'),
                TextInput::make('titolo_di_studio'),
                TextInput::make('costo_fascia_up'),
                TextInput::make('punt_progressione'), // punteggio progressione da 1 a 4
                TextInput::make('punt_progressione_finale'), // somma(moltiplicazione dei criteri * peso)
                TextInput::make('valutatore_id'),
                TextInput::make('benificiario_progressione'),
                TextInput::make('rep2kd'),
                TextInput::make('rep2ka'),
                TextInput::make('propro'),
                TextInput::make('posfun'),
                TextInput::make('posiz'),
                TextInput::make('disci1'),
                TextInput::make('qua2kd'),
                TextInput::make('qua2ka'),
                TextInput::make('dal'),
                TextInput::make('al'),
                TextInput::make('excellences_count_last_3_years'),
                TextInput::make('valore_differenziale_rapportato_pt'),
            ];
    }

    /**
     * @return array<RelationManagers>
     */
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchedes::route('/'),
            'create' => Pages\CreateSchede::route('/create'),
            'edit' => Pages\EditSchede::route('/{record}/edit'),
            'compila' => Pages\CompilaScheda::route('/{record}/compila'),
        ];
    }
}
