<?php

declare(strict_types=1);

namespace Modules\Setting\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Sushi\Sushi;
use Webmozart\Assert\Assert;

/**
 * @property int|null    $id
 * @property string|null $name
 * @property string|null $driver
 * @property string|null $database
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseConnection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseConnection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseConnection query()
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseConnection whereDatabase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseConnection whereDriver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseConnection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseConnection whereName($value)
 *
 * @mixin \Eloquent
 */
class DatabaseConnection extends Model
{
    use Sushi;

    /**
     * Model Rows.
     */
    public function getRows(): array
    {
        Assert::isArray($connections = config('database.connections'));

        // $rows = array_filter($connections, fn ($item): bool => 'mysql' === $item['driver']);
        $rows = Arr::map(
            $connections,
            fn (array $value, string $key): array => [
                'id' => $key,
                'name' => $key,
                'driver' => $value['driver'],
                'database' => $value['database'],
            ]
        );

        return array_values($rows);
    }
}
