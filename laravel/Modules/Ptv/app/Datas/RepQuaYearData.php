<?php

declare(strict_types=1);

namespace Modules\Ptv\Datas;

use Livewire\Wireable;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Webmozart\Assert\Assert;

/**
 * Undocumented class.
 */
class RepQuaYearData extends Data implements Wireable
{
    use WireableData;

    public int $ente; // => 90

    public int $matr; // => 21569

    public int $stabi; // => 613

    public int $repar; // => 20

    public ?int $rep2kd; // => 20160101

    public ?int $rep2ka; // => 0

    public ?int $propro; // => 716

    public ?int $posfun; // => 6

    public ?int $qua2kd; // => 20210101

    public ?int $qua2ka; // => 20230331

    public ?int $dal; // => 20230101

    public ?int $al; // => 20230331

    /**
     * ---.
     */
    public static function collection(array $data): DataCollection
    {
        Assert::isInstanceOf($res = self::collect($data, DataCollection::class), DataCollection::class);

        return $res;
    }
}
