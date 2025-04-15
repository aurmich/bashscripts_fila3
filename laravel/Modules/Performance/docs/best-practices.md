# Best Practices per il Modulo Performance

## Architettura

### 1. Struttura del Codice
- Utilizzare una struttura modulare
- Seguire il pattern Repository
- Implementare DTO per il trasferimento dati
- Utilizzare Actions per la logica di business

### 2. Dependency Injection
```php
// ❌ Non fare
class PerformanceService {
    private $repository;
    
    public function __construct() {
        $this->repository = new PerformanceRepository();
    }
}

// ✅ Fare
class PerformanceService {
    public function __construct(
        private readonly PerformanceRepository $repository
    ) {}
}
```

### 3. Type Hinting
```php
// ❌ Non fare
public function calculatePerformance($user) {
    // ...
}

// ✅ Fare
public function calculatePerformance(User $user): float {
    // ...
}
```

## Performance

### 1. Query Optimization
```php
// ❌ Non fare
$users = User::all()->filter(function($user) {
    return $user->performance > 80;
});

// ✅ Fare
$users = User::where('performance', '>', 80)->get();
```

### 2. Eager Loading
```php
// ❌ Non fare
foreach ($users as $user) {
    $user->load('performance');
}

// ✅ Fare
$users = User::with('performance')->get();
```

### 3. Caching
```php
// ❌ Non fare
$data = $this->calculatePerformance();

// ✅ Fare
$data = Cache::remember('performance_data', 3600, function() {
    return $this->calculatePerformance();
});
```

## Testing

### 1. Unit Testing
```php
// ❌ Non fare
public function testPerformance() {
    $result = $this->service->calculate();
    $this->assertTrue($result > 0);
}

// ✅ Fare
public function test_performance_calculation_returns_valid_score(): void
{
    $user = User::factory()->create();
    $result = $this->service->calculate($user);
    
    $this->assertIsFloat($result);
    $this->assertGreaterThan(0, $result);
    $this->assertLessThanOrEqual(100, $result);
}
```

### 2. Feature Testing
```php
// ❌ Non fare
public function testPerformanceEndpoint() {
    $response = $this->get('/performance');
    $this->assertTrue($response->isOk());
}

// ✅ Fare
public function test_performance_endpoint_returns_valid_data(): void
{
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)
        ->getJson('/api/v1/performance');
    
    $response->assertOk()
        ->assertJsonStructure([
            'data' => [
                'id',
                'score',
                'metrics',
                'timestamp'
            ]
        ]);
}
```

## Validazione

### 1. Request Validation
```php
// ❌ Non fare
public function store(Request $request) {
    if ($request->score < 0 || $request->score > 100) {
        return response()->json(['error' => 'Invalid score']);
    }
}

// ✅ Fare
class StorePerformanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'score' => ['required', 'numeric', 'min:0', 'max:100'],
            'metrics' => ['required', 'array'],
            'timestamp' => ['required', 'date']
        ];
    }
}
```

### 2. Model Validation
```php
// ❌ Non fare
public function save() {
    if ($this->score < 0) {
        throw new Exception('Invalid score');
    }
    parent::save();
}

// ✅ Fare
protected static function boot()
{
    parent::boot();
    
    static::saving(function ($model) {
        if ($model->score < 0) {
            throw new InvalidArgumentException('Score cannot be negative');
        }
    });
}
```

## Sicurezza

### 1. Autorizzazioni
```php
// ❌ Non fare
if ($user->isAdmin()) {
    // Allow access
}

// ✅ Fare
$this->authorize('view-performance', $performance);
```

### 2. Sanitizzazione
```php
// ❌ Non fare
$comment = $request->comment;

// ✅ Fare
$comment = Str::sanitize($request->comment);
```

## Documentazione

### 1. PHPDoc
```php
// ❌ Non fare
public function calculate($user) {
    return $user->score;
}

// ✅ Fare
/**
 * Calculate the performance score for a user.
 *
 * @param User $user The user to calculate performance for
 * @return float The calculated performance score between 0 and 100
 * @throws InvalidArgumentException If user data is invalid
 */
public function calculate(User $user): float
{
    return $user->score;
}
```

### 2. README
```markdown
# Performance Module

## Overview
This module handles performance tracking and evaluation.

## Installation
```bash
composer require your-vendor/performance
```

## Configuration
Publish the configuration file:
```bash
php artisan vendor:publish --tag=performance-config
```

## Usage
```php
use YourVendor\Performance\Actions\CalculatePerformanceAction;

$action = new CalculatePerformanceAction();
$score = $action->handle($user);
```

## Testing
```bash
php artisan test --filter=Performance
```
```

## Gestione Errori

### 1. Exception Handling
```php
// ❌ Non fare
try {
    $result = $this->calculate();
} catch (Exception $e) {
    return response()->json(['error' => 'Calculation failed']);
}

// ✅ Fare
try {
    $result = $this->calculate();
} catch (InvalidArgumentException $e) {
    return response()->json([
        'error' => 'Invalid input',
        'message' => $e->getMessage()
    ], 422);
} catch (CalculationException $e) {
    return response()->json([
        'error' => 'Calculation failed',
        'message' => $e->getMessage()
    ], 500);
}
```

### 2. Logging
```php
// ❌ Non fare
error_log('Performance calculation failed');

// ✅ Fare
Log::error('Performance calculation failed', [
    'user_id' => $user->id,
    'error' => $e->getMessage(),
    'trace' => $e->getTraceAsString()
]);
```

## Performance Monitoring

### 1. Query Logging
```php
// ❌ Non fare
$users = User::all();

// ✅ Fare
DB::enableQueryLog();
$users = User::all();
Log::info('Queries executed', DB::getQueryLog());
```

### 2. Memory Usage
```php
// ❌ Non fare
$data = $this->getLargeDataset();

// ✅ Fare
$memoryBefore = memory_get_usage();
$data = $this->getLargeDataset();
$memoryAfter = memory_get_usage();
Log::info('Memory usage', [
    'before' => $memoryBefore,
    'after' => $memoryAfter,
    'difference' => $memoryAfter - $memoryBefore
]);
```

## Conclusioni
Seguire queste best practices aiuterà a:
- Mantenere il codice pulito e manutenibile
- Migliorare le performance
- Garantire la sicurezza
- Facilitare il testing
- Migliorare la documentazione 