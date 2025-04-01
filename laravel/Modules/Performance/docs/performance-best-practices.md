# Best Practices per le Performance nel Modulo Performance

## Overview
Questo documento descrive le best practices per l'ottimizzazione delle performance nel modulo Performance.

## Query Optimization

### 1. Eager Loading
```php
// PerformanceController.php
class PerformanceController extends Controller
{
    public function index()
    {
        return Performance::with(['user', 'metrics', 'reviews'])
            ->latest()
            ->paginate(20);
    }
}
```

### 2. Query Caching
```php
// PerformanceRepository.php
class PerformanceRepository
{
    public function getTopPerformers(): Collection
    {
        return Cache::tags(['performance', 'top'])
            ->remember('top_performers', now()->addMinutes(30), function () {
                return Performance::with('user')
                    ->orderBy('score', 'desc')
                    ->take(10)
                    ->get();
            });
    }
}
```

### 3. Query Chunking
```php
// PerformanceProcessor.php
class PerformanceProcessor
{
    public function processAll(): void
    {
        Performance::chunk(100, function ($performances) {
            foreach ($performances as $performance) {
                $this->process($performance);
            }
        });
    }
}
```

## Cache Management

### 1. Cache Tags
```php
// PerformanceCache.php
class PerformanceCache
{
    public function get(User $user): array
    {
        $key = "performance:user:{$user->id}";
        
        return Cache::tags(['performance', 'user'])
            ->remember($key, now()->addHours(1), function () use ($user) {
                return $this->calculatePerformance($user);
            });
    }
    
    public function invalidate(User $user): void
    {
        Cache::tags(['performance', 'user'])
            ->forget("performance:user:{$user->id}");
    }
}
```

### 2. Cache Duration
```php
// CacheDurationManager.php
class CacheDurationManager
{
    private const SHORT_TERM = 15; // minutes
    private const MEDIUM_TERM = 60; // minutes
    private const LONG_TERM = 1440; // minutes (24 hours)
    
    public function getShortTermData(): array
    {
        return Cache::tags(['performance', 'short'])
            ->remember('short_term_data', now()->addMinutes(self::SHORT_TERM), function () {
                return $this->fetchData();
            });
    }
    
    public function getMediumTermData(): array
    {
        return Cache::tags(['performance', 'medium'])
            ->remember('medium_term_data', now()->addMinutes(self::MEDIUM_TERM), function () {
                return $this->fetchData();
            });
    }
    
    public function getLongTermData(): array
    {
        return Cache::tags(['performance', 'long'])
            ->remember('long_term_data', now()->addMinutes(self::LONG_TERM), function () {
                return $this->fetchData();
            });
    }
}
```

### 3. Cache Invalidation
```php
// CacheInvalidator.php
class CacheInvalidator
{
    public function invalidateUserCache(User $user): void
    {
        Cache::tags(['user', 'performance'])
            ->forget("user:{$user->id}:performance");
    }
    
    public function invalidateTeamCache(Team $team): void
    {
        Cache::tags(['team', 'performance'])
            ->forget("team:{$team->id}:performance");
    }
    
    public function invalidateAllCache(): void
    {
        Cache::tags(['performance'])->flush();
    }
}
```

## Resource Optimization

### 1. Memory Management
```php
// MemoryManager.php
class MemoryManager
{
    public function processLargeDataset(): void
    {
        $this->startMemoryTracking();
        
        try {
            $this->processData();
        } finally {
            $this->cleanup();
        }
    }
    
    private function startMemoryTracking(): void
    {
        $this->initialMemory = memory_get_usage();
    }
    
    private function cleanup(): void
    {
        gc_collect_cycles();
        
        $finalMemory = memory_get_usage();
        $memoryUsed = $finalMemory - $this->initialMemory;
        
        if ($memoryUsed > 50 * 1024 * 1024) { // 50MB
            Log::warning('High memory usage detected', [
                'memory_used' => $memoryUsed
            ]);
        }
    }
}
```

### 2. Database Optimization
```php
// DatabaseOptimizer.php
class DatabaseOptimizer
{
    public function optimize(): void
    {
        DB::statement('ANALYZE TABLE performances');
        DB::statement('OPTIMIZE TABLE performances');
        
        $this->updateIndexes();
        $this->cleanupOldData();
    }
    
    private function updateIndexes(): void
    {
        Schema::table('performances', function (Blueprint $table) {
            $table->index(['user_id', 'created_at']);
            $table->index(['score', 'created_at']);
        });
    }
    
    private function cleanupOldData(): void
    {
        Performance::where('created_at', '<', now()->subYear())
            ->delete();
    }
}
```

### 3. Queue Management
```php
// QueueManager.php
class QueueManager
{
    public function dispatchJob(Performance $performance): void
    {
        ProcessPerformance::dispatch($performance)
            ->onQueue('performance')
            ->delay(now()->addSeconds(5));
    }
    
    public function handleFailedJob(FailedJob $job): void
    {
        Log::error('Performance job failed', [
            'job_id' => $job->id,
            'error' => $job->exception
        ]);
        
        $this->retryJob($job);
    }
}
```

## Response Optimization

### 1. Response Caching
```php
// ResponseCache.php
class ResponseCache
{
    public function getResponse(string $key): Response
    {
        return Cache::tags(['response', 'performance'])
            ->remember($key, now()->addMinutes(30), function () {
                return $this->generateResponse();
            });
    }
    
    private function generateResponse(): Response
    {
        return response()->json([
            'data' => $this->getData(),
            'meta' => $this->getMeta()
        ]);
    }
}
```

### 2. Response Compression
```php
// ResponseCompressor.php
class ResponseCompressor
{
    public function compress(Response $response): Response
    {
        if ($this->shouldCompress($response)) {
            $response->setContent(gzencode($response->getContent()));
            $response->headers->set('Content-Encoding', 'gzip');
        }
        
        return $response;
    }
    
    private function shouldCompress(Response $response): bool
    {
        return $response->headers->get('Content-Type') === 'application/json' &&
               strlen($response->getContent()) > 1024;
    }
}
```

### 3. Response Pagination
```php
// ResponsePaginator.php
class ResponsePaginator
{
    public function paginate(Collection $items, int $perPage = 20): array
    {
        $page = request()->get('page', 1);
        $items = $items->forPage($page, $perPage);
        
        return [
            'data' => $items,
            'meta' => [
                'current_page' => $page,
                'per_page' => $perPage,
                'total' => $items->count()
            ]
        ];
    }
}
```

## Monitoring

### 1. Performance Monitoring
```php
// PerformanceMonitor.php
class PerformanceMonitor
{
    public function monitor(): void
    {
        $this->monitorQueries();
        $this->monitorMemory();
        $this->monitorResponseTime();
    }
    
    private function monitorQueries(): void
    {
        DB::listen(function ($query) {
            if ($query->time > 100) { // 100ms
                Log::warning('Slow query detected', [
                    'sql' => $query->sql,
                    'time' => $query->time
                ]);
            }
        });
    }
    
    private function monitorMemory(): void
    {
        $memory = memory_get_usage(true);
        if ($memory > 100 * 1024 * 1024) { // 100MB
            Log::warning('High memory usage', [
                'memory' => $memory
            ]);
        }
    }
    
    private function monitorResponseTime(): void
    {
        $start = microtime(true);
        
        $this->handleRequest();
        
        $duration = microtime(true) - $start;
        if ($duration > 1) { // 1 second
            Log::warning('Slow response time', [
                'duration' => $duration
            ]);
        }
    }
}
```

### 2. Resource Monitoring
```php
// ResourceMonitor.php
class ResourceMonitor
{
    public function monitor(): void
    {
        $this->monitorDatabase();
        $this->monitorCache();
        $this->monitorQueue();
    }
    
    private function monitorDatabase(): void
    {
        $connections = DB::getConnections();
        foreach ($connections as $connection) {
            if ($connection->getPdo()->inTransaction()) {
                Log::warning('Long running transaction detected', [
                    'connection' => $connection->getName()
                ]);
            }
        }
    }
    
    private function monitorCache(): void
    {
        $stats = Cache::tags(['performance'])->getStats();
        if ($stats['hits'] < $stats['misses'] * 0.5) {
            Log::warning('Low cache hit rate', [
                'hits' => $stats['hits'],
                'misses' => $stats['misses']
            ]);
        }
    }
    
    private function monitorQueue(): void
    {
        $failed = Queue::failed();
        if ($failed > 100) {
            Log::warning('High queue failure rate', [
                'failed' => $failed
            ]);
        }
    }
}
```

### 3. Alert Monitoring
```php
// AlertMonitor.php
class AlertMonitor
{
    public function check(): void
    {
        $this->checkPerformance();
        $this->checkResources();
        $this->checkErrors();
    }
    
    private function checkPerformance(): void
    {
        if ($this->isPerformanceDegraded()) {
            event(new PerformanceAlert());
        }
    }
    
    private function checkResources(): void
    {
        if ($this->areResourcesExhausted()) {
            event(new ResourceAlert());
        }
    }
    
    private function checkErrors(): void
    {
        if ($this->hasErrorRateIncreased()) {
            event(new ErrorAlert());
        }
    }
}
```

## Conclusioni
Le best practices per le performance nel modulo Performance:
- Ottimizzano le query del database
- Gestiscono efficientemente la cache
- Ottimizzano l'uso delle risorse
- Migliorano i tempi di risposta
- Monitorano le performance
- Gestiscono gli alert
- Mantengono la scalabilità
- Garantiscono la stabilità 