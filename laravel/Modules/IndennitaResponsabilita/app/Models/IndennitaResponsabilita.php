<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Modules\IndennitaResponsabilita\Models\Traits\FunctionTrait;
use Modules\IndennitaResponsabilita\Models\Traits\RelationshipTrait;
use Modules\Ptv\Models\Contracts\SchedaContract;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrMutator;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrRelationship;
use Modules\Sigma\Models\Traits\SigmaModelTrait;

// ------ ext models---
// ----- traits
/**
 * Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita.
 *
 * @property int $id
 * @property int|null $ente
 * @property int|null $matr
 * @property string|null $cognome
 * @property string|null $nome
 * @property string|null $email
 * @property int|null $stabi
 * @property int|null $repar
 * @property string|null $stabi_txt
 * @property string|null $repar_txt
 * @property int|null $rep2kd
 * @property int|null $rep2ka
 * @property int|null $propro
 * @property int|null $posfun
 * @property string|null $despro
 * @property int|null $posiz
 * @property int|null $qua2kd
 * @property int|null $qua2ka
 * @property int|null $tipco
 * @property int|null $codqua
 * @property string|null $qualifica
 * @property int|null $dalx
 * @property int|null $alx
 * @property string|null $dalf dal retribuzione
 * @property string|null $alf al retribuzione
 * @property string|null $dali
 * @property string|null $ali
 * @property int|null $anno
 * @property int|null $id_quale
 * @property string|null $posizione_lavoro
 * @property int|null $complessita
 * @property int|null $coordinamento
 * @property int|null $responsabilita
 * @property int|null $tot
 * @property string|null $valore_economico_calcolato
 * @property string|null $valore_economico_attribuito
 * @property string|null $archivista_informatico
 * @property string|null $relazioni_pubblico
 * @property string|null $protezione_civile
 * @property string|null $formatore_professionale
 * @property string|null $ha_diritto
 * @property string|null $motivo_escluso
 * @property string|null $datemod
 * @property string|null $handle
 * @property int|null $last_stato
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $deleted_ip
 * @property string|null $created_ip
 * @property string|null $updated_ip
 * @property string $categoria_eco
 * @property string $posiz_txt
 * @property string $lang
 * @property int|null $disci1
 * @property int|null $valutatore_id
 * @property Carbon|null $dal
 * @property Carbon|null $al
 * @property Collection<int, \Modules\Sigma\Models\Sto00f> $Sto00fYear
 * @property int|null $sto00f_year_count
 * @property Collection<int, \Modules\Sigma\Models\Ana02f> $ana02f
 * @property int|null $ana02f_count
 * @property \Modules\Sigma\Models\Ana10f|null $ana10f
 * @property \Modules\Sigma\Models\Anag|null $anag
 * @property Collection<int, \Modules\Sigma\Models\Asz00f> $asz00f
 * @property int|null $asz00f_count
 * @property Collection<int, \Modules\Sigma\Models\Asz00k1> $asz00k1
 * @property int|null $asz00k1_count
 * @property Collection<int, \Modules\Sigma\Models\Asz00k1> $asz00k1Year
 * @property int|null $asz00k1_year_count
 * @property int|float $gg_p_time_vert_year
 * @property mixed $gg_parttimevert_anno
 * @property int|null $gg_parttimevert
 * @property mixed $last_data_assunz
 * @property int|float $perc_p_time_year
 * @property mixed $perc_parttime_anno
 * @property float|null $perc_parttime
 * @property mixed $titolo_di_studio
 * @property Collection<int, IndennitaResponsabilita> $mails
 * @property int|null $mails_count
 * @property \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \Modules\IndennitaResponsabilita\Models\Message> $messages
 * @property int|null $messages_count
 * @property Collection<int, \Modules\IndennitaResponsabilita\Models\MyLog> $myLogs
 * @property int|null $my_logs_count
 * @property Collection<int, \Modules\Sigma\Models\Qua00f> $qua00f
 * @property int|null $qua00f_count
 * @property Collection<int, \Modules\Sigma\Models\Qua00f> $qua00fYear
 * @property int|null $qua00f_year_count
 * @property Collection<int, \Modules\Sigma\Models\Qua03f> $qua03f
 * @property int|null $qua03f_count
 * @property Collection<int, \Modules\IndennitaResponsabilita\Models\Rating> $ratings
 * @property int|null $ratings_count
 * @property Collection<int, \Modules\Sigma\Models\Rep00f> $rep00f
 * @property int|null $rep00f_count
 * @property StabiDirigente|null $stabiDirigente
 * @property Collection<int, \Modules\Sigma\Models\Sto00f> $sto00f
 * @property int|null $sto00f_count
 * @property StabiDirigente|null $valutatore
 * @property Collection<int, \Modules\Sigma\Models\Wstr01lx> $wstr01lx
 * @property int|null $wstr01lx_count
 * @property Collection<int, \Modules\Sigma\Models\Wstr01lx> $wstr01lxYear
 * @property int|null $wstr01lx_year_count
 *
 * @method static Builder|IndennitaResponsabilita newModelQuery()
 * @method static Builder|IndennitaResponsabilita newQuery()
 * @method static Builder|IndennitaResponsabilita ofDate(int $date)
 * @method static Builder|IndennitaResponsabilita ofEnteYear(int $ente, int $year)
 * @method static Builder|IndennitaResponsabilita ofQuarter(int $quarter, int $year)
 * @method static Builder|IndennitaResponsabilita ofRangeDate(int $date_start, int $date_end)
 * @method static Builder|IndennitaResponsabilita ofYear(int $year)
 * @method static Builder|IndennitaResponsabilita query()
 * @method static Builder|IndennitaResponsabilita whereAl($value)
 * @method static Builder|IndennitaResponsabilita whereAlf($value)
 * @method static Builder|IndennitaResponsabilita whereAli($value)
 * @method static Builder|IndennitaResponsabilita whereAlx($value)
 * @method static Builder|IndennitaResponsabilita whereAnno($value)
 * @method static Builder|IndennitaResponsabilita whereArchivistaInformatico($value)
 * @method static Builder|IndennitaResponsabilita whereCategoriaEco($value)
 * @method static Builder|IndennitaResponsabilita whereCodqua($value)
 * @method static Builder|IndennitaResponsabilita whereCognome($value)
 * @method static Builder|IndennitaResponsabilita whereComplessita($value)
 * @method static Builder|IndennitaResponsabilita whereCoordinamento($value)
 * @method static Builder|IndennitaResponsabilita whereCreatedAt($value)
 * @method static Builder|IndennitaResponsabilita whereCreatedBy($value)
 * @method static Builder|IndennitaResponsabilita whereCreatedIp($value)
 * @method static Builder|IndennitaResponsabilita whereDal($value)
 * @method static Builder|IndennitaResponsabilita whereDalf($value)
 * @method static Builder|IndennitaResponsabilita whereDali($value)
 * @method static Builder|IndennitaResponsabilita whereDalx($value)
 * @method static Builder|IndennitaResponsabilita whereDatemod($value)
 * @method static Builder|IndennitaResponsabilita whereDeletedAt($value)
 * @method static Builder|IndennitaResponsabilita whereDeletedBy($value)
 * @method static Builder|IndennitaResponsabilita whereDeletedIp($value)
 * @method static Builder|IndennitaResponsabilita whereDespro($value)
 * @method static Builder|IndennitaResponsabilita whereDisci1($value)
 * @method static Builder|IndennitaResponsabilita whereEmail($value)
 * @method static Builder|IndennitaResponsabilita whereEnte($value)
 * @method static Builder|IndennitaResponsabilita whereFormatoreProfessionale($value)
 * @method static Builder|IndennitaResponsabilita whereHaDiritto($value)
 * @method static Builder|IndennitaResponsabilita whereHandle($value)
 * @method static Builder|IndennitaResponsabilita whereId($value)
 * @method static Builder|IndennitaResponsabilita whereIdQuale($value)
 * @method static Builder|IndennitaResponsabilita whereLang($value)
 * @method static Builder|IndennitaResponsabilita whereLastStato($value)
 * @method static Builder|IndennitaResponsabilita whereMatr($value)
 * @method static Builder|IndennitaResponsabilita whereMotivoEscluso($value)
 * @method static Builder|IndennitaResponsabilita whereNome($value)
 * @method static Builder|IndennitaResponsabilita wherePosfun($value)
 * @method static Builder|IndennitaResponsabilita wherePosiz($value)
 * @method static Builder|IndennitaResponsabilita wherePosizTxt($value)
 * @method static Builder|IndennitaResponsabilita wherePosizioneLavoro($value)
 * @method static Builder|IndennitaResponsabilita wherePropro($value)
 * @method static Builder|IndennitaResponsabilita whereProtezioneCivile($value)
 * @method static Builder|IndennitaResponsabilita whereQua2ka($value)
 * @method static Builder|IndennitaResponsabilita whereQua2kd($value)
 * @method static Builder|IndennitaResponsabilita whereQualifica($value)
 * @method static Builder|IndennitaResponsabilita whereRelazioniPubblico($value)
 * @method static Builder|IndennitaResponsabilita whereRep2ka($value)
 * @method static Builder|IndennitaResponsabilita whereRep2kd($value)
 * @method static Builder|IndennitaResponsabilita whereRepar($value)
 * @method static Builder|IndennitaResponsabilita whereReparTxt($value)
 * @method static Builder|IndennitaResponsabilita whereResponsabilita($value)
 * @method static Builder|IndennitaResponsabilita whereStabi($value)
 * @method static Builder|IndennitaResponsabilita whereStabiTxt($value)
 * @method static Builder|IndennitaResponsabilita whereTipco($value)
 * @method static Builder|IndennitaResponsabilita whereTot($value)
 * @method static Builder|IndennitaResponsabilita whereUpdatedAt($value)
 * @method static Builder|IndennitaResponsabilita whereUpdatedBy($value)
 * @method static Builder|IndennitaResponsabilita whereUpdatedIp($value)
 * @method static Builder|IndennitaResponsabilita whereValoreEconomicoAttribuito($value)
 * @method static Builder|IndennitaResponsabilita whereValoreEconomicoCalcolato($value)
 * @method static Builder|IndennitaResponsabilita whereValutatoreId($value)
 * @method static Builder|IndennitaResponsabilita withDays(int $date_min, int $date_max)
 *
 * @mixin \Eloquent
 */
class IndennitaResponsabilita extends BaseModel implements SchedaContract
{
    use EnteMatrMutator;
    use EnteMatrRelationship;
    use FunctionTrait;
    use \Modules\Sigma\Models\Traits\Mutators\EnteMatrAnnoMutator;
    use \Modules\Sigma\Models\Traits\Relationships\EnteMatrAnnoRelationship;
    use RelationshipTrait;
    use SigmaModelTrait;

    protected $table = 'indennita_responsabilita';

    protected $fillable = ['id', 'ente', 'matr', 'cognome', 'nome', 'email',
        'stabi', 'repar', 'stabi_txt', 'repar_txt', 'rep2kd', 'rep2ka',
        'propro', 'posfun', 'despro', 'posiz', 'qua2kd', 'qua2ka', 'tipco', 'codqua', 'qualifica',
        'dal', 'al',  'dalf', 'alf', 'dali', 'ali',
        'anno', 'id_quale', 'posizione_lavoro', 'complessita', 'coordinamento', 'responsabilita', 'tot', 'valore_economico_calcolato', 'valore_economico_attribuito', 'archivista_informatico', 'relazioni_pubblico', 'protezione_civile', 'formatore_professionale', 'ha_diritto', 'motivo_escluso', 'datemod', 'handle', 'last_stato', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_at', 'deleted_by', 'deleted_ip', 'created_ip', 'updated_ip', 'categoria_eco', 'posiz_txt', 'disci1',
        'valutatore_id',
    ];

    protected $dates = ['dal', 'al', 'dalf', 'alf', 'dali', 'ali', 'created_at', 'updated_at'];

    protected $casts = [
        // 'dal' => 'datetime:d-Y-m-d', // da verificare
        'dal' => 'date', // da verificare
        'al' => 'date', // da verificare
    ];

    public string $from_field = 'dal';

    public string $to_field = 'al';

    public function stabiDirigente(): HasOne
    {
        return $this->hasOne(StabiDirigente::class, 'stabi', 'stabi')
            ->where('repar', $this->repar)
            ->where('anno', $this->anno);
    }

    public function valutatore(): BelongsTo
    {
        return $this->belongsTo(StabiDirigente::class);
    }

    /* on RelationshipTrait
    public function messages():\Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Message::class, 'anno', 'anno');
    }
    */

    public function scopeIsCompiled(Builder $query): void
    {
        $query->whereHas('ratings', function ($query) {
            $query->havingRaw('SUM(value) > 0');
        });
    }

    public function scopeIsNotCompiled(Builder $query): void
    {
        $query->whereDoesntHave('ratings')
            ->orWhereHas('ratings', function ($query) {
                $query->havingRaw('SUM(value) <= 0');
            });
    }
}
