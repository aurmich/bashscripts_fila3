# Documentazione Performance Modulo Incentivi

## 1. Introduzione

Questa documentazione descrive le ottimizzazioni e le best practice per garantire le migliori performance nel modulo Incentivi. Il modulo è progettato per gestire grandi volumi di dati e calcoli complessi in modo efficiente.

## 2. Ottimizzazione Database

### 2.1 Indici
```php
// database/migrations/2024_03_20_create_projects_table.php
Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->decimal('amount', 15, 2);
    $table->date('start_date');
    $table->date('end_date');
    $table->string('status');
    
    // Indici per ottimizzare le query più frequenti
    $table->index(['status', 'start_date']);
    $table->index(['amount']);
    $table->index(['end_date']);
});
```

### 2.2 Query Optimization
```php
// app/Models/Project.php
class Project extends Model
{
    // Eager loading delle relazioni più usate
    protected $with = ['activities'];
    
    // Scope per filtrare progetti attivi
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                    ->where('end_date', '>', now());
    }
    
    // Cache dei calcoli frequenti
    public function getTotalIncentiveAttribute()
    {
        return Cache::remember("project.{$this->id}.total_incentive", 3600, function () {
            return $this->calculateTotalIncentive();
        });
    }
}
```

### 2.3 Database Sharding
```php
// config/database.php
'connections' => [
    'shard1' => [
        'driver' => 'mysql',
        'host' => env('DB_SHARD1_HOST'),
        'database' => env('DB_SHARD1_DATABASE'),
    ],
    'shard2' => [
        'driver' => 'mysql',
        'host' => env('DB_SHARD2_HOST'),
        'database' => env('DB_SHARD2_DATABASE'),
    ]
]
```

## 3. Caching

### 3.1 Cache Configuration
```php
// config/cache.php
'stores' => [
    'redis' => [
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
    ],
    'memcached' => [
        'driver' => 'memcached',
        'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
        'sasl' => [
            env('MEMCACHED_USERNAME'),
            env('MEMCACHED_PASSWORD'),
        ],
        'options' => [
            // Memcached::OPT_CONNECT_TIMEOUT => 2000,
        ],
        'servers' => [
            [
                'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                'port' => env('MEMCACHED_PORT', 11211),
                'weight' => 100,
            ],
        ],
    ],
]
```

### 3.2 Cache Tags
```php
// app/Services/IncentiveCalculationService.php
class IncentiveCalculationService
{
    public function calculateIncentives($projectId)
    {
        return Cache::tags(['incentives', "project.{$projectId}"])->remember(
            "calculation.{$projectId}",
            3600,
            function () use ($projectId) {
                return $this->performCalculation($projectId);
            }
        );
    }
}
```

### 3.3 Cache Invalidation
```php
// app/Models/Project.php
class Project extends Model
{
    protected static function booted()
    {
        static::updated(function ($project) {
            Cache::tags(['incentives', "project.{$project->id}"])->flush();
        });
    }
}
```

## 4. Queue e Jobs

### 4.1 Queue Configuration
```php
// config/queue.php
'connections' => [
    'redis' => [
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => env('REDIS_QUEUE', 'default'),
        'retry_after' => 90,
        'block_for' => null,
        'after_commit' => false,
    ],
]
```

### 4.2 Job Chunking
```php
// app/Jobs/ProcessIncentiveCalculations.php
class ProcessIncentiveCalculations implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public function handle()
    {
        Project::chunk(100, function ($projects) {
            foreach ($projects as $project) {
                CalculateProjectIncentive::dispatch($project);
            }
        });
    }
}
```

### 4.3 Job Batching
```php
// app/Jobs/BatchIncentiveCalculations.php
class BatchIncentiveCalculations implements ShouldQueue
{
    use Batchable;
    
    public function handle()
    {
        $batch = Bus::batch([
            new CalculateProjectIncentive(1),
            new CalculateProjectIncentive(2),
            // ...
        ])->then(function (Batch $batch) {
            // All jobs completed successfully...
        })->catch(function (Batch $batch, Throwable $e) {
            // First batch job failure detected...
        })->finally(function (Batch $batch) {
            // The batch has finished executing...
        })->dispatch();
    }
}
```

## 5. Ottimizzazione Frontend

### 5.1 Asset Compilation
```bash
# Compila assets per produzione
npm run production

# Ottimizza immagini
npm run optimize-images
```

### 5.2 Lazy Loading
```php
// resources/js/components/ProjectList.vue
export default {
    components: {
        ProjectCard: () => import('./ProjectCard.vue'),
        ProjectDetails: () => import('./ProjectDetails.vue')
    }
}
```

### 5.3 API Response Optimization
```php
// app/Http/Controllers/ProjectController.php
class ProjectController extends Controller
{
    public function index()
    {
        return ProjectResource::collection(
            Project::with(['activities', 'employees'])
                  ->paginate(15)
                  ->through(fn ($project) => [
                      'id' => $project->id,
                      'name' => $project->name,
                      'amount' => $project->amount,
                      'status' => $project->status,
                      'incentive' => $project->total_incentive
                  ])
        );
    }
}
```

## 6. Monitoraggio Performance

### 6.1 Metrics Collection
```php
// app/Services/MetricsService.php
class MetricsService
{
    public function collectMetrics()
    {
        return [
            'database_queries' => DB::getQueryLog(),
            'cache_hits' => Cache::get('cache_hits', 0),
            'cache_misses' => Cache::get('cache_misses', 0),
            'queue_size' => Queue::size(),
            'memory_usage' => memory_get_usage(true),
            'execution_time' => microtime(true) - LARAVEL_START
        ];
    }
}
```

### 6.2 Performance Logging
```php
// app/Logging/PerformanceLogger.php
class PerformanceLogger
{
    public function logPerformance($metrics)
    {
        Log::channel('performance')->info('Performance Metrics', [
            'timestamp' => now(),
            'metrics' => $metrics,
            'url' => request()->url(),
            'method' => request()->method()
        ]);
    }
}
```

### 6.3 Alerting
```php
// app/Services/PerformanceAlertService.php
class PerformanceAlertService
{
    public function checkThresholds($metrics)
    {
        if ($metrics['execution_time'] > 2) {
            $this->sendAlert('High execution time detected');
        }
        
        if ($metrics['memory_usage'] > 256 * 1024 * 1024) {
            $this->sendAlert('High memory usage detected');
        }
    }
}
```

## 7. Ottimizzazione Query

### 7.1 Query Builder
```php
// app/Repositories/ProjectRepository.php
class ProjectRepository
{
    public function getActiveProjectsWithIncentives()
    {
        return Project::query()
            ->select(['id', 'name', 'amount', 'status'])
            ->with(['activities' => function ($query) {
                $query->select(['id', 'project_id', 'incentive_amount'])
                      ->where('status', 'completed');
            }])
            ->where('status', 'active')
            ->orderBy('amount', 'desc')
            ->limit(100)
            ->get();
    }
}
```

### 7.2 Raw Queries
```php
// app/Services/IncentiveCalculationService.php
class IncentiveCalculationService
{
    public function calculateTotalIncentives()
    {
        return DB::select("
            SELECT 
                p.id,
                p.name,
                SUM(a.incentive_amount) as total_incentive
            FROM projects p
            JOIN activities a ON p.id = a.project_id
            WHERE p.status = 'active'
            GROUP BY p.id, p.name
            HAVING total_incentive > 0
        ");
    }
}
```

## 8. Ottimizzazione File

### 8.1 File Storage
```php
// config/filesystems.php
'disks' => [
    'documents' => [
        'driver' => 's3',
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION'),
        'bucket' => env('AWS_BUCKET'),
        'url' => env('AWS_URL'),
        'endpoint' => env('AWS_ENDPOINT'),
        'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
    ],
]
```

### 8.2 File Compression
```php
// app/Services/DocumentService.php
class DocumentService
{
    public function compressDocument($file)
    {
        $zip = new ZipArchive();
        $zipName = storage_path("app/documents/{$file->id}.zip");
        
        if ($zip->open($zipName, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($file->path, $file->name);
            $zip->close();
        }
    }
}
```

## 9. Ottimizzazione API

### 9.1 API Response Caching
```php
// app/Http/Controllers/Api/ProjectController.php
class ProjectController extends Controller
{
    public function index()
    {
        return Cache::remember('api.projects', 3600, function () {
            return ProjectResource::collection(
                Project::with(['activities', 'employees'])
                      ->paginate(15)
            );
        });
    }
}
```

### 9.2 API Rate Limiting
```php
// app/Http/Kernel.php
protected $middlewareGroups = [
    'api' => [
        'throttle:api',
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    ],
];
```

## 10. Ottimizzazione Sessioni

### 10.1 Session Driver
```php
// config/session.php
'driver' => env('SESSION_DRIVER', 'redis'),
'connection' => env('SESSION_CONNECTION', 'default'),
```

### 10.2 Session Garbage Collection
```php
// app/Console/Commands/CleanSessions.php
class CleanSessions extends Command
{
    public function handle()
    {
        $lifetime = config('session.lifetime') * 60;
        
        DB::table('sessions')
            ->where('last_activity', '<=', time() - $lifetime)
            ->delete();
    }
}
```

## 11. Ottimizzazione Cache

### 11.1 Cache Tags
```php
// app/Services/CacheService.php
class CacheService
{
    public function rememberWithTags($key, $tags, $ttl, $callback)
    {
        return Cache::tags($tags)->remember($key, $ttl, $callback);
    }
}
```

### 11.2 Cache Warming
```php
// app/Console/Commands/WarmCache.php
class WarmCache extends Command
{
    public function handle()
    {
        // Precarica cache per progetti attivi
        Project::active()->chunk(100, function ($projects) {
            foreach ($projects as $project) {
                Cache::tags(['projects', "project.{$project->id}"])
                    ->remember("project.{$project->id}", 3600, function () use ($project) {
                        return $project->load(['activities', 'employees']);
                    });
            }
        });
    }
}
```

## 12. Monitoraggio e Alerting

### 12.1 Performance Monitoring
```php
// app/Services/MonitoringService.php
class MonitoringService
{
    public function monitorPerformance()
    {
        $metrics = $this->collectMetrics();
        
        if ($this->isPerformanceDegraded($metrics)) {
            $this->sendAlert($metrics);
        }
        
        $this->storeMetrics($metrics);
    }
}
```

### 12.2 Resource Usage
```php
// app/Services/ResourceMonitor.php
class ResourceMonitor
{
    public function checkResources()
    {
        return [
            'cpu_usage' => $this->getCpuUsage(),
            'memory_usage' => $this->getMemoryUsage(),
            'disk_usage' => $this->getDiskUsage(),
            'network_usage' => $this->getNetworkUsage()
        ];
    }
}
```

## 13. Best Practices

### 13.1 Query Optimization
- Utilizzare eager loading per evitare N+1 queries
- Implementare caching per query frequenti
- Utilizzare indici appropriati
- Limitare il numero di record restituiti
- Utilizzare chunking per grandi dataset

### 13.2 Cache Optimization
- Implementare cache tags per invalidazione granulare
- Utilizzare TTL appropriati
- Implementare cache warming
- Monitorare hit/miss ratio
- Utilizzare cache driver appropriati

### 13.3 Frontend Optimization
- Implementare lazy loading
- Ottimizzare assets
- Utilizzare CDN
- Implementare caching lato client
- Minimizzare richieste HTTP

### 13.4 API Optimization
- Implementare rate limiting
- Utilizzare caching per risposte
- Ottimizzare payload
- Implementare compressione
- Utilizzare paginazione 