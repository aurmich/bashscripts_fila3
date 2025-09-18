<?php

declare(strict_types=1);

namespace Modules\Progressioni\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class CedDiffImport implements ToCollection
{
    protected array $columns = [];

    public function collection(Collection $rows): void
    {
        $this->columns = $rows->first()->toArray();
    }

    public function getColumns(): array
    {
        $res = array_map(function ($column) {
            $name = Str::of($column)->slug('_')->toString();

            return [
                'name' => $name,
                'type' => 'string',
            ];
        }, $this->columns);

        return $res;
    }
}
