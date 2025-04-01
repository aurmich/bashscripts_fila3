<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Modules\Performance\Filament\Resources\IndividualeAdmResource\Pages;
use Modules\Performance\Models\IndividualeAdm;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class IndividualeAdmResource extends XotBaseResource
{
    protected static ?string $model = IndividualeAdm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'type' => Forms\Components\TextInput::make('type')
                ->maxLength(50),
            'post_type' => Forms\Components\TextInput::make('post_type')
                ->maxLength(50),
            'ente' => Forms\Components\TextInput::make('ente')
                ->required()
                ->numeric()
                ->default(0),
            'matr' => Forms\Components\TextInput::make('matr')
                ->numeric(),
            'cognome' => Forms\Components\TextInput::make('cognome')
                ->maxLength(250),
            'nome' => Forms\Components\TextInput::make('nome')
                ->maxLength(250),
            'email' => Forms\Components\TextInput::make('email')
                ->email()
                ->maxLength(250),
            'stabi' => Forms\Components\TextInput::make('stabi')
                ->numeric(),
            'repar' => Forms\Components\TextInput::make('repar')
                ->numeric(),
            'stabival' => Forms\Components\TextInput::make('stabival')
                ->numeric(),
            'reparval' => Forms\Components\TextInput::make('reparval')
                ->numeric(),
            'stabi_txt' => Forms\Components\TextInput::make('stabi_txt')
                ->maxLength(250),
            'repar_txt' => Forms\Components\TextInput::make('repar_txt')
                ->maxLength(250),
            'disci' => Forms\Components\TextInput::make('disci')
                ->numeric(),
            'disci_txt' => Forms\Components\TextInput::make('disci_txt')
                ->maxLength(100),
            'rep2kd' => Forms\Components\TextInput::make('rep2kd')
                ->numeric(),
            'rep2ka' => Forms\Components\TextInput::make('rep2ka')
                ->numeric(),
            'posiz' => Forms\Components\TextInput::make('posiz')
                ->numeric(),
            'propro' => Forms\Components\TextInput::make('propro')
                ->numeric(),
            'posfun' => Forms\Components\TextInput::make('posfun')
                ->numeric(),
            'categoria_eco' => Forms\Components\TextInput::make('categoria_eco')
                ->maxLength(50),
            'qua2kd' => Forms\Components\TextInput::make('qua2kd')
                ->numeric(),
            'qua2ka' => Forms\Components\TextInput::make('qua2ka')
                ->numeric(),
            'dal' => Forms\Components\TextInput::make('dal')
                ->numeric(),
            'al' => Forms\Components\TextInput::make('al')
                ->numeric(),
            'anno' => Forms\Components\TextInput::make('anno')
                ->numeric()
                ->default(date('Y')),
            'giornitempodet' => Forms\Components\TextInput::make('giornitempodet')
                ->numeric(),
            'ha_diritto' => Forms\Components\TextInput::make('ha_diritto')
                ->numeric(),
            'motivo' => Forms\Components\TextInput::make('motivo')
                ->maxLength(250),
            'esperienza_acquisita' => Forms\Components\TextInput::make('esperienza_acquisita')
                ->numeric(),
            'risultati_ottenuti' => Forms\Components\TextInput::make('risultati_ottenuti')
                ->numeric(),
            'arricchimento_professionale' => Forms\Components\TextInput::make('arricchimento_professionale')
                ->numeric(),
            'impegno' => Forms\Components\TextInput::make('impegno')
                ->numeric(),
            'qualita_prestazione' => Forms\Components\TextInput::make('qualita_prestazione')
                ->numeric(),
            'totale_punteggio' => Forms\Components\TextInput::make('totale_punteggio')
                ->numeric(),
            'lista_auth' => Forms\Components\TextInput::make('lista_auth')
                ->maxLength(250),
            'peso_esperienza_acquisita' => Forms\Components\TextInput::make('peso_esperienza_acquisita')
                ->numeric(),
            'peso_risultati_ottenuti' => Forms\Components\TextInput::make('peso_risultati_ottenuti')
                ->numeric(),
            'peso_arricchimento_professionale' => Forms\Components\TextInput::make('peso_arricchimento_professionale')
                ->numeric(),
            'peso_impegno' => Forms\Components\TextInput::make('peso_impegno')
                ->numeric(),
            'peso_qualita_prestazione' => Forms\Components\TextInput::make('peso_qualita_prestazione')
                ->numeric(),
            'datemod' => Forms\Components\DateTimePicker::make('datemod'),
            'note' => Forms\Components\Textarea::make('note')
                ->columnSpanFull(),
            'oree' => Forms\Components\TextInput::make('oree')
                ->numeric(),
            'oret' => Forms\Components\TextInput::make('oret')
                ->numeric(),
            'perc_parttime' => Forms\Components\TextInput::make('perc_parttime')
                ->numeric(),
            'perc_parttimepond' => Forms\Components\TextInput::make('perc_parttimepond')
                ->numeric(),
            'gg_parttimevert' => Forms\Components\TextInput::make('gg_parttimevert')
                ->numeric(),
            'ore_assenza' => Forms\Components\TextInput::make('ore_assenza')
                ->numeric(),
            'giorni_assenza' => Forms\Components\TextInput::make('giorni_assenza')
                ->numeric(),
            'giorni_presenza' => Forms\Components\TextInput::make('giorni_presenza')
                ->numeric(),
            'categ_coeff' => Forms\Components\TextInput::make('categ_coeff')
                ->numeric(),
            'quota_teorica' => Forms\Components\TextInput::make('quota_teorica')
                ->numeric(),
            'budget_assegnato' => Forms\Components\TextInput::make('budget_assegnato')
                ->numeric(),
            'quota_effettiva' => Forms\Components\TextInput::make('quota_effettiva')
                ->numeric(),
            'resti' => Forms\Components\TextInput::make('resti')
                ->numeric(),
            'resti_pond' => Forms\Components\TextInput::make('resti_pond')
                ->numeric(),
            'importo_totale' => Forms\Components\TextInput::make('importo_totale')
                ->numeric(),
            'gg_totale_sigma' => Forms\Components\TextInput::make('gg_totale_sigma')
                ->numeric(),
            'gg_validi_sigma' => Forms\Components\TextInput::make('gg_validi_sigma')
                ->numeric(),
            'gg_assenz_sigma' => Forms\Components\TextInput::make('gg_assenz_sigma')
                ->numeric(),
            'decurtazione_perc' => Forms\Components\TextInput::make('decurtazione_perc')
                ->numeric(),
            'gg_tempo_determinato' => Forms\Components\TextInput::make('gg_tempo_determinato')
                ->numeric(),
            'gg_posiz_1_in_sede' => Forms\Components\TextInput::make('gg_posiz_1_in_sede')
                ->numeric(),
            'gg_assenza_anno' => Forms\Components\TextInput::make('gg_assenza_anno')
                ->numeric(),
            'gg_presenza_anno' => Forms\Components\TextInput::make('gg_presenza_anno')
                ->numeric(),
            'ore_assenza_anno' => Forms\Components\TextInput::make('ore_assenza_anno')
                ->numeric(),
            'posiz_txt' => Forms\Components\TextInput::make('posiz_txt')
                ->maxLength(255),
            'clafun' => Forms\Components\TextInput::make('clafun')
                ->numeric(),
            'disci1' => Forms\Components\TextInput::make('disci1')
                ->numeric(),
            'disci1_txt' => Forms\Components\TextInput::make('disci1_txt')
                ->maxLength(255),
            'gg_ruolo' => Forms\Components\TextInput::make('gg_ruolo')
                ->numeric(),
            'last_data_assunz' => Forms\Components\TextInput::make('last_data_assunz')
                ->numeric(),
            'perc_parttime_anno' => Forms\Components\TextInput::make('perc_parttime_anno')
                ->numeric(),
            'perc_parttime_dalal' => Forms\Components\TextInput::make('perc_parttime_dalal')
                ->numeric(),
            'gg_parttimevert_anno' => Forms\Components\TextInput::make('gg_parttimevert_anno')
                ->numeric(),
            'gg_parttimevert_dalal' => Forms\Components\TextInput::make('gg_parttimevert_dalal')
                ->numeric(),
            'perc_parttimepond_anno' => Forms\Components\TextInput::make('perc_parttimepond_anno')
                ->numeric(),
            'perc_parttimepond_dalal' => Forms\Components\TextInput::make('perc_parttimepond_dalal')
                ->numeric(),
            'gg_presenza_dalal' => Forms\Components\TextInput::make('gg_presenza_dalal')
                ->numeric(),
            'gg_assenza_dalal' => Forms\Components\TextInput::make('gg_assenza_dalal')
                ->numeric(),
            'hh_assenza_anno' => Forms\Components\TextInput::make('hh_assenza_anno')
                ->numeric(),
            'hh_assenza_dalal' => Forms\Components\TextInput::make('hh_assenza_dalal')
                ->numeric(),
            'lang' => Forms\Components\TextInput::make('lang')
                ->maxLength(3),
            'excellence' => Forms\Components\Toggle::make('excellence'),
            'codqua' => Forms\Components\TextInput::make('codqua')
                ->numeric(),
            'cont' => Forms\Components\TextInput::make('cont')
                ->numeric(),
            'tipco' => Forms\Components\TextInput::make('tipco')
                ->numeric(),
            'posizione_eco' => Forms\Components\TextInput::make('posizione_eco')
                ->maxLength(191),
            'gg_anno' => Forms\Components\TextInput::make('gg_anno')
                ->required()
                ->numeric(),
            'created_by' => Forms\Components\TextInput::make('created_by')
                ->maxLength(50)
                ->disabled()
                ->dehydrated(false)
                ->hiddenOn('create'),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndividualeAdms::route('/'),
            'create' => Pages\CreateIndividualeAdm::route('/create'),
            'edit' => Pages\EditIndividualeAdm::route('/{record}/edit'),
        ];
    }
}
