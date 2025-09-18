<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Mutators;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Modules\Sigma\Models\Codici;

trait EnteMatrMutator
{
    public function getEnteAttribute(?int $value): ?int
    {
        if (null !== $value) {
            return $value;
        }
        $value = 90;
        if (\in_array('ente', $this->getFillable(), false)) {
            $this->ente = $value;
            $this->save();
        }

        return $value;
    }

    public function getCognomeAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }

        $anag = $this->ana10f;
        if (! \is_object($anag)) {
            $this->ana10f()->ddRawSql();

            return '---';
        }

        $value = $anag->cognome;

        if (\in_array('cognome', $this->getFillable(), false)) {
            $this->cognome = $value;
            $this->save();
        }

        return $value.' ';
    }

    public function getEmailAttribute(?string $value): ?string
    {
        if (null != $value) {
            return $value;
        }
        if (null == $this->matr) {
            return null;
        }

        $ana02f = $this->ana02f()->whereRaw('emaind !="" ')->orderBy('datdec', 'desc')->first();
        if (null === $ana02f) {
            return null;
        }

        $value = $ana02f->emaind;
        if (\in_array('email', $this->getFillable(), false)) {
            $this->email = $value;
            $this->save();
        } else {
            // dddx('a');
        }

        return $value;
    }

    public function getSessoAttribute(?string $value): ?string
    {
        if (null != $value) {
            $value = Str::of($value)->lower()->toString();

            return $value;
        }
        if (null == $this->matr) {
            return null;
        }

        $ana02f = $this->ana02f()->whereRaw('sesso !="" ')->orderBy('datdec', 'desc')->first();
        if (null === $ana02f) {
            return null;
        }

        $value = $ana02f->sesso;
        $value = Str::of($value)->lower()->toString();
        if (\in_array('sesso', $this->getFillable(), false)) {
            $this->sesso = $value;
            $this->save();
        } else {
            // dddx('a');
        }

        return $value;
    }

    public function getCodiceFiscaleAttribute(?string $value): ?string
    {
        if (null != $value) {
            return $value;
        }
        if (null == $this->matr) {
            return null;
        }

        $ana02f = $this->ana02f()->whereRaw('codfis !="" ')->orderBy('datdec', 'desc')->first();
        if (null === $ana02f) {
            return null;
        }

        $value = $ana02f->codfis;
        if (\in_array('codfis', $this->getFillable(), false)) {
            $this->codfis = $value;
            $this->save();
        } else {
            // dddx('a');
        }

        return $value;
    }

    public function getInailAttribute(?string $value): ?string
    {
        if (null != $value) {
            return $value;
        }
        if (null == $this->matr) {
            return null;
        }

        $ana02f = $this->ana02f()->whereRaw('inail !="" ')->orderBy('datdec', 'desc')->first();
        if (null === $ana02f) {
            return null;
        }

        $value = $ana02f->inail;
        if (\in_array('inail', $this->getFillable(), false)) {
            $this->inail = $value;
            $this->save();
        } else {
            // dddx('a');
        }

        return $value;
    }

    public function getNomeAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }

        $anag = $this->ana10f;
        if (! \is_object($anag)) {
            return '---';
        }

        $value = $anag->nome;
        if (\in_array('nome', $this->getFillable(), false)) {
            $this->nome = $value;
            $this->save();
        }

        return $value;
    }

    public function getTitoloDiStudioAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }

        $ana02f = $this->ana02f->last();
        if (! \is_object($ana02f)) {
            return null;
        }

        $row = Codici::where('tipo', 10)->where('codice', $ana02f->titstu)->first();
        if (! \is_object($row)) {
            return null;
        }

        $value = $row->desc1;
        $fieldname = 'titolo_di_studio';

        if (! Schema::connection($this->getConnectionName())->hasColumn($this->getTable(), $fieldname)) {
            Schema::connection($this->getConnectionName())->table($this->getTable(), static function ($table) use ($fieldname): void {
                $table->string($fieldname);
            });
        }

        // $this->$fieldname=$value;
        // $this->save();
        // dddx($this->attributes);
        // dddx($this->getFillable());
        $this->update([$fieldname => $value]);

        return $value;
    }

    public function getLastDataAssunzAttribute($value)
    {
        /*
        if (null !== $value) {
            return $value;
        }
        */

        $row = $this->sto00f()->orderBy('st2kas', 'desc')->first();

        if (! \is_object($row)) {
            /*
            echo ('<h3>Aggiornare Tabella [Sto00f]
            e controllare ente [' . $this->ente . '] matr [' . $this->matr . ']</h3>');
            //*/
            return null;
        }

        $value = $row->st2kas;
        // $value = Carbon::parse($value); //meglio usare interi..
        // if ($this->attributes['last_data_assunz'] !== $value && '' !== $value) {
        if (\in_array('last_data_assunz', $this->getFillable(), false)) {
            $res = tap($this)->update(['last_data_assunz' => $value]);
        } else {
            dddx('[last_data_assunz] not in fillable in class ['.static::class.']');
        }

        return $value;
    }
}
