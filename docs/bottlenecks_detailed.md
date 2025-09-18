<<<<<<< HEAD
# Analisi Dettagliata dei Colli di Bottiglia - Modulo Xot

## Panoramica
Il modulo Xot è un modulo core che fornisce funzionalità base per l'intera applicazione. L'analisi ha identificato diverse aree critiche che impattano le performance globali.

## 1. Gestione Model Factory
**Problema**: Creazione inefficiente delle istanze dei modelli
- Impatto: Overhead nella creazione di oggetti model
- Causa: Reflection e lookup ripetitivi
=======
# Analisi Dettagliata dei Colli di Bottiglia - Modulo Job

## Panoramica
Il modulo Job gestisce le code e i processi asincroni dell'applicazione. L'analisi ha identificato diverse aree critiche che impattano le performance.

## 1. Gestione Code
**Problema**: Gestione inefficiente delle code di lavoro
- Impatto: Latenza nell'elaborazione dei job
- Causa: Mancanza di prioritizzazione e code sovraccariche
>>>>>>> c088001a (first)

**Soluzione Proposta**:
```php
declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Xot\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

final class ModelFactoryService
{
    use QueueableAction;

    private array $modelCache = [];

    public function make(string $modelClass): Model
    {
        return Cache::tags(['model_factory'])
            ->remember(
                "model_instance_{$modelClass}",
                now()->addHour(),
                fn() => $this->createModelInstance($modelClass)
            );
    }

    private function createModelInstance(string $modelClass): Model
    {
        if (!isset($this->modelCache[$modelClass])) {
            $this->modelCache[$modelClass] = new $modelClass();
        }

        return clone $this->modelCache[$modelClass];
    }
}
```

## 2. Ottimizzazione Query Builder
**Problema**: Costruzione query inefficiente
- Impatto: Performance degradate nelle operazioni database
- Causa: Query builder non ottimizzato

**Soluzione Proposta**:
```php
declare(strict_types=1);

namespace Modules\Xot\Services;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Spatie\QueueableAction\QueueableAction;

final class QueryBuilderService
{
    use QueueableAction;

    public function buildOptimizedQuery(array $params): Builder
    {
        return DB::query()
            ->select($this->getOptimizedColumns($params))
            ->when(
                $params['with'] ?? null,
                fn($q) => $q->with($this->optimizeEagerLoading($params['with']))
            )
            ->when(
                $params['where'] ?? null,
                fn($q) => $this->applyOptimizedWhere($q, $params['where'])
            );
    }

    private function getOptimizedColumns(array $params): array
    {
        return array_merge(
            ['id'],
            $params['select'] ?? ['*']
        );
    }

    private function optimizeEagerLoading(array $relations): array
    {
        return collect($relations)
            ->mapWithKeys(fn($relation) => [
                $relation => fn($query) => $query->select(['id', 'name'])
            ])
            ->all();
=======
namespace Modules\Job\Services;

use Illuminate\Support\Facades\Queue;
use Spatie\QueueableAction\QueueableAction;

final class QueueManagerService
{
    use QueueableAction;

    private const QUEUE_PRIORITIES = [
        'high' => 100,
        'default' => 50,
        'low' => 10
    ];

    public function dispatch($job, string $priority = 'default'): void
    {
        $queue = $this->determineQueue($priority);
        
        Queue::pushOn(
            $queue,
            $job->onQueue($queue)
                ->delay($this->calculateDelay($priority))
        );
    }

    private function determineQueue(string $priority): string
    {
        return match ($priority) {
            'high' => 'jobs-high',
            'low' => 'jobs-low',
            default => 'jobs-default'
        };
    }

    private function calculateDelay(string $priority): int
    {
        return match ($priority) {
            'high' => 0,
            'low' => 300, // 5 minuti
            default => 60 // 1 minuto
        };
>>>>>>> c088001a (first)
    }
}
```

<<<<<<< HEAD
## 3. Gestione Cache
**Problema**: Strategia di caching non ottimale
- Impatto: Hit rate basso e overhead di memoria
- Causa: Mancanza di politiche di caching intelligenti
=======
## 2. Monitoraggio Job
**Problema**: Monitoraggio insufficiente dei job
- Impatto: Difficoltà nel debugging e ottimizzazione
- Causa: Mancanza di metriche e logging dettagliato
>>>>>>> c088001a (first)

**Soluzione Proposta**:
```php
declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Xot\Services;

use Illuminate\Support\Facades\Cache;
use Psr\SimpleCache\InvalidArgumentException;

final class XotCacheService
{
    private const DEFAULT_TTL = 3600; // 1 ora

    public function remember(string $key, mixed $value, ?int $ttl = null): mixed
    {
        try {
            return Cache::tags($this->determineTags($key))
                ->remember(
                    $key,
                    $ttl ?? $this->determineTTL($key),
                    fn() => $value
                );
        } catch (InvalidArgumentException) {
            return $value;
        }
    }

    private function determineTTL(string $key): int
    {
        return match (true) {
            str_contains($key, 'config') => now()->addDay()->diffInSeconds(),
            str_contains($key, 'menu') => now()->addHours(12)->diffInSeconds(),
            str_contains($key, 'user') => now()->addMinutes(30)->diffInSeconds(),
            default => self::DEFAULT_TTL
        };
    }

    private function determineTags(string $key): array
    {
        $tags = ['xot'];
        
        if (str_contains($key, 'config')) {
            $tags[] = 'config';
        }
        
        if (str_contains($key, 'menu')) {
            $tags[] = 'menu';
        }
        
        return $tags;
=======
namespace Modules\Job\Services;

use Illuminate\Support\Facades\Log;
use Spatie\QueueableAction\QueueableAction;

final class JobMonitoringService
{
    use QueueableAction;

    public function trackJob($job, string $status): void
    {
        $metrics = $this->collectMetrics($job);
        
        // Logging dettagliato
        Log::channel('jobs')
            ->info("Job {$status}", [
                'job_id' => $job->job_id,
                'type' => get_class($job),
                'queue' => $job->queue,
                'attempt' => $job->attempts(),
                'metrics' => $metrics
            ]);
            
        // Metriche per monitoring
        $this->updateMetrics($metrics);
    }

    private function collectMetrics($job): array
    {
        return [
            'memory_usage' => memory_get_usage(true),
            'peak_memory' => memory_get_peak_usage(true),
            'processing_time' => microtime(true) - $job->start_time,
            'queue_wait_time' => $job->start_time - $job->created_at->timestamp
        ];
    }

    private function updateMetrics(array $metrics): void
    {
        foreach ($metrics as $key => $value) {
            app('prometheus')->getOrRegisterGauge('jobs', $key)
                ->set($value);
        }
    }
}
```

## 3. Gestione Fallimenti
**Problema**: Gestione non ottimale dei job falliti
- Impatto: Job persi e retry inefficienti
- Causa: Strategia di retry non ottimizzata

**Soluzione Proposta**:
```php
declare(strict_types=1);

namespace Modules\Job\Services;

use Illuminate\Support\Facades\Redis;
use Spatie\QueueableAction\QueueableAction;

final class JobRetryService
{
    use QueueableAction;

    public function handleFailedJob($job, \Throwable $e): void
    {
        $retryStrategy = $this->determineRetryStrategy($job, $e);
        
        if ($retryStrategy->shouldRetry()) {
            $this->scheduleRetry($job, $retryStrategy->getNextAttempt());
        } else {
            $this->handleFinalFailure($job, $e);
        }
    }

    private function determineRetryStrategy($job, \Throwable $e): RetryStrategy
    {
        return match (true) {
            $e instanceof TemporaryException => new ExponentialBackoffStrategy(),
            $e instanceof NetworkException => new IncrementalBackoffStrategy(),
            default => new NoRetryStrategy()
        };
    }

    private function scheduleRetry($job, int $delay): void
    {
        Redis::zadd(
            'jobs:retry',
            now()->addSeconds($delay)->timestamp,
            serialize([
                'job' => $job,
                'attempts' => $job->attempts() + 1
            ])
        );
>>>>>>> c088001a (first)
    }
}
```

## Metriche di Performance

### Obiettivi
<<<<<<< HEAD
- Tempo creazione model: < 50ms
- Tempo costruzione query: < 100ms
- Cache hit rate: > 95%
- Memoria utilizzata: < 100MB

### Monitoraggio
```php
// In: Providers/XotServiceProvider.php
private function setupPerformanceMonitoring(): void
{
    // Monitoring query
    DB::listen(function($query) {
        if ($query->time > 100) {
            Log::channel('xot_performance')
                ->warning('Query lenta rilevata', [
                    'sql' => $query->sql,
                    'time' => $query->time,
                    'bindings' => $query->bindings
=======
- Tempo in coda: < 30s per job prioritari
- Memoria per job: < 64MB
- Tasso di successo: > 99%
- Retry efficaci: > 80%

### Monitoraggio
```php
// In: Providers/JobServiceProvider.php
private function setupPerformanceMonitoring(): void
{
    // Monitoring code
    Queue::looping(function () {
        $stats = Queue::getRedis()->info();
        
        if ($stats['used_memory'] > 1024 * 1024 * 512) { // 512MB
            Log::channel('job_performance')
                ->warning('Alto utilizzo memoria Redis', [
                    'memory' => $stats['used_memory'],
                    'peak' => $stats['used_memory_peak']
>>>>>>> c088001a (first)
                ]);
        }
    });

<<<<<<< HEAD
    // Monitoring memoria
    $this->app->terminating(function () {
        $memoryUsage = memory_get_peak_usage(true) / 1024 / 1024;
        
        if ($memoryUsage > 100) {
            Log::channel('xot_performance')
                ->warning('Alto utilizzo memoria', [
                    'memory_mb' => $memoryUsage
=======
    // Monitoring job
    Queue::before(function ($job) {
        $job->start_time = microtime(true);
    });

    Queue::after(function ($job) {
        $duration = microtime(true) - $job->start_time;
        
        if ($duration > 30) { // 30 secondi
            Log::channel('job_performance')
                ->warning('Job lento rilevato', [
                    'job' => get_class($job),
                    'duration' => $duration
>>>>>>> c088001a (first)
                ]);
        }
    });
}
```

## Piano di Implementazione

### Fase 1 (Immediata)
<<<<<<< HEAD
- Ottimizzare model factory
- Migliorare query builder
- Implementare caching strategico

### Fase 2 (Medio Termine)
- Ottimizzare gestione memoria
- Migliorare performance I/O
- Implementare monitoring avanzato

### Fase 3 (Lungo Termine)
- Implementare sharding
- Ottimizzare scalabilità
=======
- Implementare code prioritarie
- Migliorare monitoraggio
- Ottimizzare gestione errori

### Fase 2 (Medio Termine)
- Implementare retry intelligente
- Ottimizzare uso memoria
- Migliorare logging

### Fase 3 (Lungo Termine)
- Implementare scaling automatico
- Ottimizzare distribuzione job
>>>>>>> c088001a (first)
- Migliorare resilienza

## Note Tecniche Aggiuntive

<<<<<<< HEAD
### 1. Configurazione Performance
```php
// In: config/xot.php
return [
    'performance' => [
        'model_cache_ttl' => env('XOT_MODEL_CACHE_TTL', 3600),
        'query_timeout' => env('XOT_QUERY_TIMEOUT', 5),
        'memory_limit' => env('XOT_MEMORY_LIMIT', '256M')
    ],
    'monitoring' => [
        'slow_query_threshold' => env('XOT_SLOW_QUERY_MS', 100),
        'memory_threshold_mb' => env('XOT_MEMORY_THRESHOLD', 100)
=======
### 1. Configurazione Code
```php
// In: config/queue.php
return [
    'default' => env('QUEUE_CONNECTION', 'redis'),
    'connections' => [
        'redis' => [
            'driver' => 'redis',
            'connection' => 'queue',
            'queue' => [
                'jobs-high',
                'jobs-default',
                'jobs-low'
            ],
            'retry_after' => 90,
            'block_for' => 5
        ]
    ],
    'batching' => [
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'job_batches'
    ],
    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs'
>>>>>>> c088001a (first)
    ]
];
```

<<<<<<< HEAD
### 2. Ottimizzazione Autoloading
```php
// In: composer.json
{
    "autoload": {
        "classmap": [
            "database"
        ],
        "psr-4": {
            "Modules\\Xot\\": ""
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true
    }
}
```

### 3. Query Optimization
```php
// In: Traits/HasXotOptimizations.php
trait HasXotOptimizations
{
    public function scopeOptimized($query)
    {
        return $query
            ->select($this->getDefaultColumns())
            ->with($this->getDefaultRelations());
    }

    protected function getDefaultColumns(): array
    {
        return [
            'id',
            'name',
            'created_at'
        ];
    }

    protected function getDefaultRelations(): array
    {
        return [
            'creator:id,name',
            'updater:id,name'
        ];
=======
### 2. Ottimizzazione Redis
```php
// In: config/database.php
'redis' => [
    'queue' => [
        'url' => env('REDIS_URL'),
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'password' => env('REDIS_PASSWORD'),
        'port' => env('REDIS_PORT', '6379'),
        'database' => env('REDIS_QUEUE_DB', '1'),
        'read_write_timeout' => 60,
        'persistent' => true,
        'options' => [
            'serializer' => Redis::SERIALIZER_IGBINARY,
            'compression' => Redis::COMPRESSION_LZ4
        ]
    ]
]
```

### 3. Gestione Memoria
```php
// In: Jobs/BaseJob.php
declare(strict_types=1);

namespace Modules\Job\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

abstract class BaseJob
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected function optimizeMemory(): void
    {
        // Impostare limite memoria per job
        ini_set('memory_limit', '64M');
        
        // Garbage collection
        if (gc_enabled()) {
            gc_collect_cycles();
        }
        
        // Clear static properties
        $reflection = new \ReflectionClass(static::class);
        foreach ($reflection->getProperties() as $property) {
            if ($property->isStatic()) {
                $property->setValue(null);
            }
        }
>>>>>>> c088001a (first)
    }
}
``` 