# Job Queue Manager

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 100%**

## Overview
Sistema di gestione code per job asincroni con supporto per priorità, retry e monitoraggio.

## Obiettivi
- [x] Gestione code (100%)
- [x] Gestione retry (100%)
- [x] Gestione errori (100%)
- [x] Monitoraggio (100%)
- [x] Logging (100%)

## Guida Step-by-Step

### 1. Gestione Code (100% completato)
```php
/**
 * Gestisce le code dei job
 */
class QueueManager
{
    /**
     * @param BaseJob $job
     * @param string|null $queue
     * @return void
     */
    public function dispatch(BaseJob $job, ?string $queue = null): void
    {
        $queue = $queue ?? $this->determineQueue($job);
        
        $this->validateJob($job);
        
        dispatch(clone $job)
            ->onQueue($queue)
            ->afterCommit()
            ->delay($this->getJobDelay($job));
    }
    
    /**
     * @param BaseJob $job
     * @return string
     */
    private function determineQueue(BaseJob $job): string
    {
        return match (true) {
            $job instanceof HighPriorityJob => 'high',
            $job instanceof LowPriorityJob => 'low',
            default => 'default'
        };
    }
    
    /**
     * @param BaseJob $job
     * @return array<string, mixed>
     */
    public function getJobStats(BaseJob $job): array
    {
        return Cache::tags(['jobs', 'stats'])
            ->remember(
                "job_stats_{$job->id}",
                now()->addMinutes(5),
                fn() => $this->calculateJobStats($job)
            );
    }
}
```

#### Passi da Seguire
1. Configurare code
2. Implementare priorità
3. Gestire dispatch
4. Implementare monitoring

#### Consigli
- Usare code separate
- Implementare retry
- Documentare priorità
- Monitorare performance

### 2. Gestione Retry (100% completato)
```php
/**
 * Gestisce i retry dei job falliti
 */
class RetryManager
{
    /**
     * @param BaseJob $job
     * @param Throwable $exception
     * @return bool
     */
    public function shouldRetry(
        BaseJob $job,
        Throwable $exception
    ): bool {
        if ($job->attempts() >= $job->maxAttempts()) {
            return false;
        }
        
        return match (true) {
            $exception instanceof RetryableException => true,
            $exception instanceof ConnectionException => true,
            $exception instanceof DeadlockException => true,
            default => false
        };
    }
    
    /**
     * @param BaseJob $job
     * @return int
     */
    public function getBackoff(BaseJob $job): int
    {
        return min(
            pow(2, $job->attempts()) * 60,
            3600
        );
    }
    
    /**
     * @param BaseJob $job
     * @param Throwable $exception
     * @return void
     */
    public function handleFailedJob(
        BaseJob $job,
        Throwable $exception
    ): void {
        if ($this->shouldRetry($job, $exception)) {
            $job->release(
                $this->getBackoff($job)
            );
            
            Log::info('Job rischedulato', [
                'job_id' => $job->id,
                'attempts' => $job->attempts(),
                'exception' => $exception->getMessage()
            ]);
        } else {
            $this->markJobAsFailed($job, $exception);
        }
    }
}
```

#### Passi da Seguire
1. Definire regole retry
2. Implementare backoff
3. Gestire fallimenti
4. Implementare logging

#### Consigli
- Usare exponential backoff
- Limitare tentativi
- Documentare errori
- Implementare notifiche

## Metriche di Successo
- [x] Performance < 200ms
- [x] Retry success > 85%
- [x] Zero job persi
- [x] Logging completo
- [x] Monitoring attivo

## Problemi Comuni e Soluzioni

### 1. Memory Leaks
```php
// ❌ Riferimenti circolari
class Job implements ShouldQueue
{
    private $service;
    
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}

// ✅ Dependency injection
class Job implements ShouldQueue
{
    public function handle(Service $service)
    {
        $service->execute();
    }
}
```

### 2. Queue Blocking
```php
// ❌ Job bloccante
public function handle()
{
    sleep(30);
}

// ✅ Job chunk
public function handle()
{
    $items->chunk(100, function ($chunk) {
        dispatch(new ProcessChunk($chunk));
    });
}
```

## Testing

### Unit Tests
```php
class QueueManagerTest extends TestCase
{
    public function test_determine_queue(): void
    {
        $manager = new QueueManager();
        $job = new HighPriorityJob();
        
        Bus::fake();
        
        $manager->dispatch($job);
        
        Bus::assertDispatched(
            HighPriorityJob::class,
            fn($j) => $j->queue === 'high'
        );
    }
}
```

### Integration Tests
```php
class RetryManagerTest extends TestCase
{
    public function test_retry_logic(): void
    {
        $manager = new RetryManager();
        $job = new RetryableJob();
        
        // Simula fallimento
        try {
            throw new RetryableException();
        } catch (Throwable $e) {
            $shouldRetry = $manager->shouldRetry($job, $e);
            $this->assertTrue($shouldRetry);
            
            $backoff = $manager->getBackoff($job);
            $this->assertEquals(60, $backoff);
        }
    }
}
```

## Dipendenze
- Laravel Framework v10.x
- Laravel Horizon
- Redis
- Laravel Telescope

## Link Correlati
- [Performance Optimization](./performance-optimization.md)
- [Error Handling](./error-handling.md)
- [Monitoring](./monitoring.md)

## Note e Considerazioni
- Monitorare uso memoria
- Implementare circuit breaker
- Documentare errori comuni
- Pianificare manutenzione
- Gestire timeout
- Mantenere audit log
- Implementare alerting
- Gestire picchi carico

---
⬅️ [Torna alla Roadmap](../../roadmap.md)
