<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Models\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Modules\IndennitaCondizioniLavoro\Models\IndennitaTipoDettaglio;
use Modules\IndennitaCondizioniLavoro\Models\StabiDirigente;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrAnnoRelationship;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrDateRangeRelationship;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrRelationship;

// use Laravel\Scout\Searchable;
// ----- models------
// use Modules\IndennitaCondizioniLavoro\Models\IndennitaResponsabilita;
=======
namespace Modules\Performance\Models\Traits;

// use Illuminate\Support\Str;
// ----- models------
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Performance\Models\CriteriEsclusione;
use Modules\Performance\Models\CriteriMaggiorazione;
use Modules\Performance\Models\CriteriOption;
use Modules\Performance\Models\CriteriValutazione;
use Modules\Performance\Models\Individuale;
use Modules\Performance\Models\IndividualeAssenze;
use Modules\Performance\Models\IndividualePesi;
use Modules\Performance\Models\IndividualeTotStabi;
use Modules\Performance\Models\MyLog;
use Modules\Performance\Models\Option;
use Modules\Performance\Models\StabiDirigente;

>>>>>>> 961ad402 (first)
// ------ ext models---

// ----- services -----

// ------ traits ---

<<<<<<< HEAD
trait RelationshipTrait
{
    use EnteMatrAnnoRelationship;
    use EnteMatrDateRangeRelationship;
    use EnteMatrRelationship;

    /*
    public function anag(): HasOne {
        return $this->hasOne(Anag::class, 'matr', 'matr')->where('ente', $this->ente);
    }
    */
    /* --- deprecate
    public function trasferte(): HasMany {
        config(['trasferte_conn' => 'trasferte_dip']);

        return $this->hasMany(FuoriSedeDip::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('last_stato', '!=', 66)
            ->whereRaw('year(data_start)="'.$this->anno.'"')
            ->with(['motivo', 'approvaz', 'giust'])
                ;
    }
    */
    /*
    public function qua00f(): HasMany {
        return $this->hasMany(Qua00f::class, 'matr', 'matr')
            ->where('ente', '90') //$this->ente non ce la fa
            ->whereRaw('quaann=""');
        //->ofRangeDate($this->dal,$this->al)
    }
    */
    public function getIndennitaTipoDettaglioAllAttribute(): Collection
    {
        return IndennitaTipoDettaglio::whereRaw($this->anno.' between dal and al')->get();
=======
/**
 * Modules\Performance\Models\Traits\RelationshipTrait.
 *
 * @property int $ente
 * @property int $matr
 * @property int $propro
 * @property int $posfun
 * @property int $anno
 * @property int $stabi
 * @property int $repar
 */
trait RelationshipTrait
{
    public function criteriOptions(): HasMany
    {
        return $this->hasMany(CriteriOption::class, 'anno', 'anno');
    }

    public function codiciAssenze(): HasMany
    {
        return $this->hasMany(IndividualeAssenze::class, 'anno', 'anno');
    }

    public function criteriMaggiorazione(): HasOne
    {
        return $this->hasOne(CriteriMaggiorazione::class, 'anno', 'anno');
    }

    public function criteriEsclusione(): HasMany
    {
        return $this->hasMany(CriteriEsclusione::class, 'anno', 'anno');
    }

    public function criteriValutazione(): HasMany
    {
        return $this->hasMany(CriteriValutazione::class, 'anno', 'anno')
            ->where('post_type', $this->type)
            ->ordered();

        /*
        ->withDefault(
            [
                'name'=>'no-set',
                'value'=>'andare a mettere in options',
            ]
        );
        */
    }

    public function cards(): HasMany // traduzione di scheda
    {return $this->hasMany(Individuale::class, 'anno', 'anno')
            ->where('ente', $this->ente)
            ->where('matr', $this->matr);
    }

    public function peso(): HasOne
    {
        return $this->hasOne(IndividualePesi::class, 'anno', 'anno')
            ->whereRaw('find_in_set('.$this->propro.',lista_propro)')
            ->where('type', $this->type);
    }

    public function pesoPo(): HasOne
    {
        return $this->hasOne(IndividualePesi::class, 'anno', 'anno')->where('type', 'po');
        // ->whereRaw('find_in_set('.$this->propro.',lista_propro)');
    }

    public function otherWinnerRows(): HasMany
    {
        return $this->hasMany(static::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno)
            ->where('id', '!=', $this->getKey())
            // ->where('ha_diritto', '>', 0)
            ->whereRaw('(ha_diritto>0 or posfun>=100)');
>>>>>>> 961ad402 (first)
    }

    public function stabiDirigente(): HasOne
    {
<<<<<<< HEAD
        return $this->hasOne(StabiDirigente::class, 'stabi', 'stabi')->where('repar', $this->repar);
    }

    /*
    public function asz00k1(): HasMany {
        $sql = $this->anno.' between year(asz2kd) and year(asz2ka)';

        return $this->hasMany(Asz00k1::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw('aszann=""')
            ->whereRaw($sql);
    }
    */

    /*
    public function qua00f(){
        $sql='(
            ('.$this->anno.' between year(qua2kd) and year(qua2ka)) or
            ('.$this->anno.' >= year(qua2kd) and qua2ka=0)
        )';
        return $this->hasMany(Qua00f::class,'matr','matr')
            ->where('ente',$this->ente)
            ->whereRaw('quaann=""')
            ->whereRaw($sql);
    }
    */

    /*
    public function wstr01lx(): HasMany {
        return $this->hasMany(Wstr01lx::class, 'wtmatr', 'matr')
            ->where('enteap', $this->ente)
            ->whereRaw('wtannu=""')
            ->whereRaw('year(wtdata)="'.$this->anno.'"')
                ;
    }
    */
=======
namespace Modules\IndennitaResponsabilita\Models\Traits;

// use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\IndennitaResponsabilita\Models\ImportiCategoria;
use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita;
use Modules\IndennitaResponsabilita\Models\Message;
use Modules\IndennitaResponsabilita\Models\MyLog;
use Modules\IndennitaResponsabilita\Models\Rating;
use Modules\IndennitaResponsabilita\Models\RatingMorph;

use function Safe\date;

/**
 * Trait RelationshipTrait
 */
trait RelationshipTrait
{
    public function mails()
    {
        $stabi = request()->input('stabi', '');
        $repar = request()->input('repar', '');
        $this->anno = request()->input('anno', date('Y'));
        $this->anno = request()->input('year', $this->anno);

        return $this->hasMany(IndennitaResponsabilita::class, 'anno', 'anno')
            ->where('stabi', $stabi)
            ->where('repar', $repar);
        // ->where('ha_diritto',1)
    }

    public function ratings(): MorphToMany
    {
        $pivotClass = RatingMorph::class;
        $pivot = app($pivotClass);
        $pivotTable = $pivot->getTable();
        $pivotFields = $pivot->getFillable();

        return $this->morphToMany(Rating::class, 'model', $pivotTable)
            ->using($pivotClass)
            ->withPivot($pivotFields)
            ->withTimestamps();
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'anno', 'anno');
    }

    public function myLogs(): HasMany
    {
        return $this->hasMany(MyLog::class, 'id_tbl', 'id')
            ->where('tbl', $this->getTable());
=======
        $row = $this->hasOne(StabiDirigente::class, 'stabi', 'stabi')
            ->where('repar', $this->repar)
            ->where('anno', $this->anno);

        if ($row->count() > 0) {
            return $row;
        }

        StabiDirigente::firstOrCreate(
            [
                'stabi' => $this->stabi,
                'repar' => $this->repar,
                'anno' => $this->anno,
            ]
        );

        return $this->hasOne(StabiDirigente::class, 'stabi', 'stabi')
            ->where('repar', $this->repar)
            ->where('anno', $this->anno);
        // dddx('preso');
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class, 'year', 'anno')
            ->where('option_type', $this->type)
            ->orderBy('pos');
        /*
        ->withDefault(
            [
                'name'=>'no-set',
                'value'=>'andare a mettere in options',
            ]
        );
        */
    }

    /*
    public function myLogs(): HasMany {
       return $this->hasMany(MyLog::class, 'id_tbl', 'id')
           ->where('tbl', $this->getTable());
    }
    */

    public function myLogs(): MorphMany
    {
        return $this->morphMany(MyLog::class, 'model');
>>>>>>> 961ad402 (first)
    }

    public function mailInviate(): HasMany
    {
        return $this->hasMany(MyLog::class, 'id_tbl', 'id')
            ->where('tbl', $this->getTable())
            ->where('note', 'sendMail');
    }

<<<<<<< HEAD
    public function importi()
    {
        $row = $this->hasOne(ImportiCategoria::class, 'ente', 'ente')->where('anno', $this->anno)->whereRaw('find_in_set("'.$this->propro.'",lista_propro)');
        if ($row->count() === 0) {
            $rowOld = ImportiCategoria::where('ente', $this->ente)
                ->where('anno', $this->anno - 1)
                ->whereRaw('find_in_set("'.$this->propro.'",lista_propro)');
            if ($rowOld->count() !== 1) {
                if ($this->propro === 0) {
                    // dd('preso ['.__LINE__.']['.__FILE__.']');
                    return;
                }

                echo '<h3>['.$this->anno.']['.$this->propro.']['.__LINE__.']['.__FILE__.']</h3>';

                // dddx([$rowOld->get(), 'qualcosa e\' andato storto ['.__LINE__.']['.__FILE__.']']);
                return;
            }

            $row = $rowOld->first()->replicate();
            $row->anno = $this->anno;
            $row->save();
            $row = $this->hasOne(ImportiCategoria::class, 'ente', 'ente')
                ->where('anno', $this->anno)
                ->whereRaw('find_in_set("'.$this->propro.'",lista_propro)');
        }

        return $row;
    }
>>>>>>> e0005d7d (first)
=======
    public function totStabi(): HasOne
    {
        // dddx(class_basename($this));// IndividualeDip per collegare sia organizzativa che individuale con le loro
        // relazioni

        return $this->hasOne(IndividualeTotStabi::class, 'stabi', 'stabi')
            ->where('anno', $this->anno);
    }
>>>>>>> 961ad402 (first)
}
