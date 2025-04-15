# Best Practices per le Performance nel Modulo Performance

## Overview
Questo documento descrive le best practices per le performance nel modulo Performance.

## Query Optimization

### 1. Eager Loading
```php
/**
 * Repository per le performance
 */
class PerformanceRepository
{
    /**
     * Find performance by user with relations.
     *
     * @param  User  $user
     * @return Collection
     */
    public function findByUser(User $user): Collection
    {
        return Performance::query()
            ->with(['user', 'metrics'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Find performance by period with relations.
     *
     * @param  string  $period
     * @return Collection
     */
    public function findByPeriod(string $period): Collection
    {
        return Performance::query()
            ->with(['user', 'metrics'])
            ->where('period', $period)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
```

### 2. Query Caching
```php
/**
 * Repository per le performance
 */
class PerformanceRepository
{
    /**
     * Find performance by user with cache.
     *
     * @param  User  $user
     * @return Collection
     */
    public function findByUser(User $user): Collection
    {
        return Cache::tags(['performance', 'user:' . $user->id])
            ->remember('performance.user:' . $user->id, 3600, function () use ($user) {
                return Performance::query()
                    ->with(['user', 'metrics'])
                    ->where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
            });
    }

    /**
     * Find performance by period with cache.
     *
     * @param  string  $period
     * @return Collection
     */
    public function findByPeriod(string $period): Collection
    {
        return Cache::tags(['performance', 'period:' . $period])
            ->remember('performance.period:' . $period, 1800, function () use ($period) {
                return Performance::query()
                    ->with(['user', 'metrics'])
                    ->where('period', $period)
                    ->orderBy('created_at', 'desc')
                    ->get();
            });
    }
}
```

### 3. Query Chunking
```php
/**
 * Repository per le performance
 */
class PerformanceRepository
{
    /**
     * Process performance data in chunks.
     *
     * @param  Closure  $callback
     * @return void
     */
    public function processInChunks(Closure $callback): void
    {
        Performance::query()
            ->orderBy('id')
            ->chunk(100, function ($performances) use ($callback) {
                foreach ($performances as $performance) {
                    $callback($performance);
                }
            });
    }

    /**
     * Process performance data in chunks with cursor.
     *
     * @param  Closure  $callback
     * @return void
     */
    public function processInChunksWithCursor(Closure $callback): void
    {
        Performance::query()
            ->orderBy('id')
            ->cursor()
            ->each(function ($performance) use ($callback) {
                $callback($performance);
            });
    }
}
```

## Cache Management

### 1. Cache Tags
```php
/**
 * Repository per le performance
 */
class PerformanceRepository
{
    /**
     * Find performance by user with cache tags.
     *
     * @param  User  $user
     * @return Collection
     */
    public function findByUser(User $user): Collection
    {
        return Cache::tags(['performance', 'user:' . $user->id])
            ->remember('performance.user:' . $user->id, 3600, function () use ($user) {
                return Performance::query()
                    ->with(['user', 'metrics'])
                    ->where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
            });
    }

    /**
     * Invalidate user performance cache.
     *
     * @param  User  $user
     * @return void
     */
    public function invalidateUserCache(User $user): void
    {
        Cache::tags(['performance', 'user:' . $user->id])->flush();
    }
}
```

### 2. Cache Duration
```php
/**
 * Repository per le performance
 */
class PerformanceRepository
{
    /**
     * Cache durations.
     *
     * @var array<string, int>
     */
    private const CACHE_DURATIONS = [
        'short' => 300,    // 5 minutes
        'medium' => 1800,  // 30 minutes
        'long' => 7200     // 2 hours
    ];

    /**
     * Find performance by user with short cache.
     *
     * @param  User  $user
     * @return Collection
     */
    public function findByUserShort(User $user): Collection
    {
        return Cache::tags(['performance', 'user:' . $user->id])
            ->remember('performance.user:' . $user->id, self::CACHE_DURATIONS['short'], function () use ($user) {
                return Performance::query()
                    ->with(['user', 'metrics'])
                    ->where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
            });
    }

    /**
     * Find performance by user with medium cache.
     *
     * @param  User  $user
     * @return Collection
     */
    public function findByUserMedium(User $user): Collection
    {
        return Cache::tags(['performance', 'user:' . $user->id])
            ->remember('performance.user:' . $user->id, self::CACHE_DURATIONS['medium'], function () use ($user) {
                return Performance::query()
                    ->with(['user', 'metrics'])
                    ->where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
            });
    }

    /**
     * Find performance by user with long cache.
     *
     * @param  User  $user
     * @return Collection
     */
    public function findByUserLong(User $user): Collection
    {
        return Cache::tags(['performance', 'user:' . $user->id])
            ->remember('performance.user:' . $user->id, self::CACHE_DURATIONS['long'], function () use ($user) {
                return Performance::query()
                    ->with(['user', 'metrics'])
                    ->where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
            });
    }
}
```

### 3. Cache Invalidation
```php
/**
 * Repository per le performance
 */
class PerformanceRepository
{
    /**
     * Invalidate performance cache.
     *
     * @param  Performance  $performance
     * @return void
     */
    public function invalidateCache(Performance $performance): void
    {
        Cache::tags(['performance', 'user:' . $performance->user_id])->flush();
        Cache::tags(['performance', 'period:' . $performance->period])->flush();
    }

    /**
     * Invalidate all performance cache.
     *
     * @return void
     */
    public function invalidateAllCache(): void
    {
        Cache::tags(['performance'])->flush();
    }
}
```

## Resource Optimization

### 1. Memory Management
```php
/**
 * Repository per le performance
 */
class PerformanceRepository
{
    /**
     * Process performance data with memory optimization.
     *
     * @param  Closure  $callback
     * @return void
     */
    public function processWithMemoryOptimization(Closure $callback): void
    {
        $memoryLimit = ini_get('memory_limit');
        ini_set('memory_limit', '512M');

        try {
            Performance::query()
                ->orderBy('id')
                ->chunk(100, function ($performances) use ($callback) {
                    foreach ($performances as $performance) {
                        $callback($performance);
                    }
                });
        } finally {
            ini_set('memory_limit', $memoryLimit);
        }
    }
}
```

### 2. Database Optimization
```php
/**
 * Repository per le performance
 */
class PerformanceRepository
{
    /**
     * Optimize performance table.
     *
     * @return void
     */
    public function optimizeTable(): void
    {
        DB::statement('OPTIMIZE TABLE performances');
        DB::statement('ANALYZE TABLE performances');
    }

    /**
     * Rebuild performance indexes.
     *
     * @return void
     */
    public function rebuildIndexes(): void
    {
        DB::statement('ALTER TABLE performances ENGINE = InnoDB');
    }
}
```

### 3. Queue Management
```php
/**
 * Repository per le performance
 */
class PerformanceRepository
{
    /**
     * Process performance data in queue.
     *
     * @param  Closure  $callback
     * @return void
     */
    public function processInQueue(Closure $callback): void
    {
        Performance::query()
            ->orderBy('id')
            ->chunk(100, function ($performances) use ($callback) {
                foreach ($performances as $performance) {
                    ProcessPerformanceJob::dispatch($performance, $callback);
                }
            });
    }
}
```

## Response Optimization

### 1. Response Caching
```php
/**
 * Controller per le performance
 */
class PerformanceController extends Controller
{
    /**
     * Display performance data.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        $performance = Cache::tags(['performance', 'user:' . $user->id])
            ->remember('performance.user:' . $user->id, 3600, function () use ($user) {
                return Performance::query()
                    ->with(['user', 'metrics'])
                    ->where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->first();
            });

        return response()->json($performance);
    }
}
```

### 2. Response Compression
```php
/**
 * Controller per le performance
 */
class PerformanceController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('gzip');
    }

    /**
     * Display performance data.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        $performance = Performance::query()
            ->with(['user', 'metrics'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        return response()->json($performance);
    }
}
```

### 3. Response Pagination
```php
/**
 * Controller per le performance
 */
class PerformanceController extends Controller
{
    /**
     * Display performance list.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $performances = Performance::query()
            ->with(['user', 'metrics'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return response()->json($performances);
    }
}
```

## Monitoring

### 1. Performance Monitoring
```php
/**
 * Monitor per le performance
 */
class PerformanceMonitor
{
    /**
     * Monitor performance calculation.
     *
     * @param  Closure  $callback
     * @return mixed
     */
    public function monitor(Closure $callback)
    {
        $start = microtime(true);
        $memory = memory_get_usage();

        try {
            $result = $callback();
        } finally {
            $duration = microtime(true) - $start;
            $memoryUsed = memory_get_usage() - $memory;

            Log::info('Performance calculation', [
                'duration' => $duration,
                'memory' => $memoryUsed
            ]);
        }

        return $result;
    }
}
```

### 2. Resource Monitoring
```php
/**
 * Monitor per le risorse
 */
class ResourceMonitor
{
    /**
     * Monitor resource usage.
     *
     * @return array
     */
    public function monitor(): array
    {
        return [
            'memory' => memory_get_usage(true),
            'peak_memory' => memory_get_peak_usage(true),
            'cpu' => sys_getloadavg(),
            'disk' => disk_free_space('/')
        ];
    }
}
```

### 3. Alert Monitoring
```php
/**
 * Monitor per gli alert
 */
class AlertMonitor
{
    /**
     * Monitor performance alerts.
     *
     * @param  float  $threshold
     * @return void
     */
    public function monitor(float $threshold): void
    {
        $performances = Performance::query()
            ->where('score', '<', $threshold)
            ->get();

        foreach ($performances as $performance) {
            SendLowPerformanceAlert::dispatch($performance);
        }
    }
}
```

## Conclusioni
Le best practices per le performance nel modulo Performance:
- Ottimizzano le query
- Gestiscono la cache
- Ottimizzano le risorse
- Ottimizzano le risposte
- Monitorano le performance
- Monitorano le risorse
- Monitorano gli alert
- Garantiscono l'efficienza 