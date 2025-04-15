<?php

declare(strict_types=1);

namespace Modules\Setting\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

/**
 * @property string $name
 * @property string $driver
 * @property string $host
 * @property int $port
 * @property string $database
 * @property string $username
 * @property string $password
 * @property string $charset
 * @property string $collation
 * @property string $prefix
 * @property bool $strict
 * @property string $engine
 * @property array $options
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class DatabaseConnection extends Model
{
    protected $fillable = [
        'name',
        'driver',
        'host',
        'port',
        'database',
        'username',
        'password',
        'charset',
        'collation',
        'prefix',
        'strict',
        'engine',
        'options',
        'status',
    ];

    protected $casts = [
        'port' => 'integer',
        'strict' => 'boolean',
        'options' => 'array',
    ];

    public function testConnection(): bool
    {
        try {
            $config = [
                'driver' => $this->driver,
                'host' => $this->host,
                'port' => $this->port,
                'database' => $this->database,
                'username' => $this->username,
                'password' => $this->password,
                'charset' => $this->charset ?? 'utf8mb4',
                'collation' => $this->collation ?? 'utf8mb4_unicode_ci',
                'prefix' => $this->prefix,
                'strict' => $this->strict,
                'engine' => $this->engine,
            ];

            if (! empty($this->options)) {
                $config = array_merge($config, $this->options);
            }

            Config::set('database.connections.test_connection', $config);
            DB::connection('test_connection')->getPdo();

            return true;
        } catch (\Exception $e) {
            report($e);

            return false;
        }
=======
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
>>>>>>> origin/dev
    }
}
