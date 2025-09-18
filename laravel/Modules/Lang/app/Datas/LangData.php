<?php

declare(strict_types=1);

namespace Modules\Lang\Datas;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

<<<<<<< HEAD
<<<<<<< HEAD
/**
 * Classe che rappresenta i dati relativi a una lingua.
 */
class LangData extends Data
{
    /**
     * Codice identificativo della lingua.
     *
     * @var string
     */
    public string $id;

    /**
     * Nome della lingua.
     *
     * @var string
     */
    public string $name;

    /**
     * HTML della bandiera rappresentativa della lingua.
     *
     * @var string
     */
    public string $flag;

    /**
     * URL per cambiare lingua.
     *
     * @var string
     */
    public string $url;

    /**
     * Crea una collezione di dati di lingua.
     *
     * @param EloquentCollection<int, mixed>|Collection<int, mixed>|array<int, mixed> $data
     * @return DataCollection<LangData>
     */
=======
=======
>>>>>>> 55edff60 (.)
class LangData extends Data
{
    public string $id;

    public string $name;

    public string $flag;

    public string $url;

<<<<<<< HEAD
>>>>>>> 6a0fe737 (.)
=======
>>>>>>> 55edff60 (.)
    public static function collection(EloquentCollection|Collection|array $data): DataCollection
    {
        return self::collect($data, DataCollection::class);
    }
}
