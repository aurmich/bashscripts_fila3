<?php

declare(strict_types=1);

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
}
