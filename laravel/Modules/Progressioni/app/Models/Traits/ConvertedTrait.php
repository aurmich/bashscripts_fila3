<?php

declare(strict_types=1);

namespace Modules\Progressioni\Models\Traits;

// ----- models------
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Progressioni\Models\Schede;

// ----- services -----

// ------ traits ---

trait ConvertedTrait
{
    /**
     * Undocumented function.
     *
     * @return float|int|null
     */
    public function convertedIn(string $field, int $converted_in)
    {
        switch ($converted_in) {
            case '1':// 'max 10 valutatore',
                return $this->rapportatoMax10Valutatore($field);
                // break;
            case '2':// 'se stesso',
                return $this->$field;
                // break;
            case '3':// 'da 4 a 10',
                return $this->$field * 2.5;
                // break;
            case '4':// 'div 10',
                return $this->$field * 0.1;
                // break;
            case '5':// 'fino 10 anni'
                $anni = $this->$field / 365;
                if ($anni > 10) {
                    return 10;
                }

                return $anni;
                // break;
            default:
                dddx(['conversione non riconosciuta']);
                break;
        }

        return null;
    }

    public function avversari(): HasMany
    {
        return $this->hasMany(Schede::class, 'valutatore_id', 'valutatore_id')
            ->where('anno', $this->anno)
            ->where('ha_diritto', 1);
    }

    public function avversariCategoriaEco(): HasMany
    {
        return $this->hasMany(Schede::class, 'valutatore_id', 'valutatore_id')
            ->where('anno', $this->anno)
            ->where('ha_diritto', 1)
            ->where('categoria_eco', $this->categoria_eco);
    }

    public function rapportatoMax10Valutatore(string $field): float
    {
        $max = $this->avversariCategoriaEco->max($field);
        $value = $this->$field;
        if ($max === 0) {
            return 0;
        }

        return $value * 10 / $max;
    }

    public function getGgCatecoPosfunRapportatoMax10ValutatoreAttribute(string $value): float
    {
        $field = 'gg_cateco_posfun';
        $max = $this->avversariCategoriaEco->max($field);
        $value = $this->$field;

        return $value * 10 / $max;
    }
}
