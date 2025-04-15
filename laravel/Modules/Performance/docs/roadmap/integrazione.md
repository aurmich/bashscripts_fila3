# Sistema Integrazione

⬅️ [Torna alla Roadmap](../roadmap.md)

## Stato Attuale
**Completamento: 35%**

## Overview
Sistema di integrazione del modulo Performance con altri moduli e sistemi esterni.

## Componenti Principali

### 1. API Interne (40% completato)
- Integrazione con modulo User
- Integrazione con modulo Job
- Integrazione con modulo Incentivi
- Integrazione con modulo IndennitaResponsabilita

### 2. API Esterne (30% completato)
- Endpoint REST per sistemi esterni
- Webhook per notifiche
- Sistema di autenticazione API
- Rate limiting e throttling

### 3. Eventi e Code (35% completato)
- Eventi per aggiornamenti performance
- Code per elaborazioni asincrone
- Gestione fallimenti
- Retry policy

## Implementazioni Chiave

### 1. Service Layer
```php
/**
 * @template TModel of Model
 */
interface PerformanceServiceInterface
{
    /**
     * @param array<string, mixed> $data
     * @return TModel
     */
    public function createPerformance(array $data): Model;
    
    /**
     * @param array<string, mixed> $criteria
     * @return Collection<int, TModel>
     */
    public function searchPerformance(array $criteria): Collection;
}
```

### 2. Event System
```php
/**
 * @template TModel of Model
 */
class PerformanceUpdatedEvent
{
    /**
     * @param TModel $model
     * @param array<string, mixed> $changes
     */
    public function __construct(
        public Model $model,
        public array $changes
    ) {}
}
```

## Metriche di Successo
- [ ] API Response Time < 100ms (35%)
- [ ] Event Processing Time < 500ms (30%)
- [ ] Zero Event Loss (100%)
- [ ] API Documentation Coverage (40%)
- [ ] Integration Test Coverage (35%)

## Best Practices

### 1. API Design
```php
// ✅ Versioned API endpoints
Route::prefix('api/v1')->group(function () {
    Route::apiResource('performances', PerformanceApiController::class);
});

// ✅ Proper response structure
return response()->json([
    'data' => $data,
    'meta' => [
        'total' => $total,
        'page' => $page
    ]
]);
```

### 2. Event Handling
```php
// ✅ Reliable event processing
class PerformanceEventSubscriber
{
    public function handlePerformanceUpdated(PerformanceUpdatedEvent $event): void
    {
        Cache::tags(['performance'])->flush();
        Log::info('Performance updated', ['id' => $event->model->id]);
        
        // Notify other systems
        $this->notifyExternalSystems($event);
    }
}
```

## Testing

### Integration Tests
```php
class PerformanceApiTest extends TestCase
{
    public function test_api_create_performance(): void
    {
        $response = $this->postJson('/api/v1/performances', [
            'tipo' => 'individuale',
            'anno' => 2025,
            'periodo' => 'Q2'
        ]);
        
        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'tipo',
                    'anno',
                    'periodo'
                ]
            ]);
    }
}
```

## Dipendenze
- Laravel Framework v10.x
- Laravel Sanctum
- Laravel WebSockets
- Redis

## Link Correlati
- [API Documentation](../api/README.md)
- [Eventi](../events.md)
- [Testing](./testing.md)
- [Performance](./performance.md)

## Note e Considerazioni
- Mantenere retrocompatibilità
- Documentare breaking changes
- Monitorare performance API
- Gestire rate limiting
- Implementare caching
- Logging completo
- Gestire errori
- Validare input

---
⬅️ [Torna alla Roadmap](../roadmap.md)
