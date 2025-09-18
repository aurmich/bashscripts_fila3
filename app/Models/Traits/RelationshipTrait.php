<?php

declare(strict_types=1);

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
// ------ ext models---

// ----- services -----

// ------ traits ---

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
    }

    public function stabiDirigente(): HasOne
    {
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
    }

    public function mailInviate(): HasMany
    {
        return $this->hasMany(MyLog::class, 'id_tbl', 'id')
            ->where('tbl', $this->getTable())
            ->where('note', 'sendMail');
    }

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
}
