# Best Practices per la Sicurezza nel Modulo Performance

## Overview
Questo documento descrive le best practices per l'implementazione della sicurezza nel modulo Performance.

## Autenticazione

### 1. Middleware di Autenticazione
```php
// PerformanceController.php
class PerformanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    
    public function index()
    {
        return $this->user->performance;
    }
}
```

### 2. Autenticazione API
```php
// PerformanceApiController.php
class PerformanceApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('throttle:60,1');
    }
    
    public function show()
    {
        return $this->user->performance;
    }
}
```

### 3. Autenticazione Multi-Factor
```php
// PerformanceMfaController.php
class PerformanceMfaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mfa');
    }
    
    public function show()
    {
        return $this->user->performance;
    }
}
```

## Autorizzazione

### 1. Policy
```php
// PerformancePolicy.php
class PerformancePolicy
{
    public function view(User $user, Performance $performance): bool
    {
        return $user->id === $performance->user_id ||
               $user->hasRole('manager');
    }
    
    public function update(User $user, Performance $performance): bool
    {
        return $user->hasRole('manager') ||
               $user->hasRole('admin');
    }
}
```

### 2. Gate
```php
// PerformanceGate.php
class PerformanceGate
{
    public function boot(): void
    {
        Gate::define('view-performance', function (User $user, Performance $performance) {
            return $user->id === $performance->user_id ||
                   $user->hasRole('manager');
        });
        
        Gate::define('update-performance', function (User $user, Performance $performance) {
            return $user->hasRole('manager') ||
                   $user->hasRole('admin');
        });
    }
}
```

### 3. Permessi
```php
// PerformancePermission.php
class PerformancePermission
{
    public function boot(): void
    {
        Permission::create(['name' => 'view-performance']);
        Permission::create(['name' => 'update-performance']);
        Permission::create(['name' => 'delete-performance']);
        
        Role::findByName('manager')->givePermissionTo([
            'view-performance',
            'update-performance'
        ]);
    }
}
```

## Validazione

### 1. Request Validation
```php
// PerformanceRequest.php
class PerformanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'score' => ['required', 'numeric', 'min:0', 'max:1'],
            'metrics' => ['required', 'array'],
            'metrics.efficiency' => ['required', 'numeric', 'min:0', 'max:1'],
            'metrics.quality' => ['required', 'numeric', 'min:0', 'max:1']
        ];
    }
}
```

### 2. Model Validation
```php
// Performance.php
class Performance extends Model
{
    protected $casts = [
        'score' => 'float',
        'metrics' => 'array'
    ];
    
    protected $rules = [
        'score' => 'required|numeric|min:0|max:1',
        'metrics' => 'required|array'
    ];
}
```

### 3. Custom Validation
```php
// PerformanceValidator.php
class PerformanceValidator
{
    public function validate(Performance $performance): bool
    {
        return $this->validateScore($performance->score) &&
               $this->validateMetrics($performance->metrics);
    }
    
    private function validateScore(float $score): bool
    {
        return $score >= 0 && $score <= 1;
    }
    
    private function validateMetrics(array $metrics): bool
    {
        return isset($metrics['efficiency']) &&
               isset($metrics['quality']) &&
               $metrics['efficiency'] >= 0 &&
               $metrics['efficiency'] <= 1 &&
               $metrics['quality'] >= 0 &&
               $metrics['quality'] <= 1;
    }
}
```

## Sanitizzazione

### 1. Input Sanitization
```php
// PerformanceSanitizer.php
class PerformanceSanitizer
{
    public function sanitize(array $data): array
    {
        return [
            'score' => $this->sanitizeScore($data['score']),
            'metrics' => $this->sanitizeMetrics($data['metrics']),
            'notes' => $this->sanitizeNotes($data['notes'] ?? '')
        ];
    }
    
    private function sanitizeScore($score): float
    {
        return (float) filter_var($score, FILTER_SANITIZE_NUMBER_FLOAT);
    }
    
    private function sanitizeMetrics(array $metrics): array
    {
        return array_map(function ($value) {
            return (float) filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
        }, $metrics);
    }
    
    private function sanitizeNotes(string $notes): string
    {
        return htmlspecialchars(strip_tags($notes));
    }
}
```

### 2. Output Sanitization
```php
// PerformancePresenter.php
class PerformancePresenter
{
    public function present(Performance $performance): array
    {
        return [
            'id' => $performance->id,
            'score' => $this->formatScore($performance->score),
            'metrics' => $this->formatMetrics($performance->metrics),
            'notes' => $this->formatNotes($performance->notes)
        ];
    }
    
    private function formatScore(float $score): string
    {
        return number_format($score * 100, 2) . '%';
    }
    
    private function formatMetrics(array $metrics): array
    {
        return array_map(function ($value) {
            return number_format($value * 100, 2) . '%';
        }, $metrics);
    }
    
    private function formatNotes(string $notes): string
    {
        return nl2br(htmlspecialchars($notes));
    }
}
```

### 3. Data Sanitization
```php
// PerformanceData.php
class PerformanceData extends Data
{
    public function __construct(
        public readonly float $score,
        public readonly array $metrics,
        public readonly ?string $notes = null
    ) {
        $this->validate();
    }
    
    private function validate(): void
    {
        if ($this->score < 0 || $this->score > 1) {
            throw new InvalidArgumentException('Score must be between 0 and 1');
        }
        
        foreach ($this->metrics as $value) {
            if ($value < 0 || $value > 1) {
                throw new InvalidArgumentException('Metrics must be between 0 and 1');
            }
        }
    }
}
```

## Protezione

### 1. CSRF Protection
```php
// PerformanceController.php
class PerformanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('csrf');
    }
    
    public function store(PerformanceRequest $request)
    {
        $performance = Performance::create($request->validated());
        
        return redirect()->route('performance.show', $performance);
    }
}
```

### 2. XSS Protection
```php
// PerformanceView.php
class PerformanceView extends View
{
    public function render(): string
    {
        return view('performance.show', [
            'performance' => $this->performance,
            'metrics' => $this->sanitizeMetrics($this->performance->metrics),
            'notes' => $this->sanitizeNotes($this->performance->notes)
        ]);
    }
    
    private function sanitizeMetrics(array $metrics): array
    {
        return array_map(function ($value) {
            return htmlspecialchars($value);
        }, $metrics);
    }
    
    private function sanitizeNotes(string $notes): string
    {
        return htmlspecialchars($notes);
    }
}
```

### 3. SQL Injection Protection
```php
// PerformanceRepository.php
class PerformanceRepository
{
    public function findByUser(User $user): Collection
    {
        return Performance::query()
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
    
    public function update(Performance $performance, array $data): bool
    {
        return $performance->update($data);
    }
}
```

## Logging

### 1. Security Logging
```php
// PerformanceSecurityLogger.php
class PerformanceSecurityLogger
{
    public function logAccess(User $user, Performance $performance): void
    {
        Log::channel('security')->info('Performance access', [
            'user_id' => $user->id,
            'performance_id' => $performance->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);
    }
    
    public function logUpdate(User $user, Performance $performance): void
    {
        Log::channel('security')->info('Performance update', [
            'user_id' => $user->id,
            'performance_id' => $performance->id,
            'changes' => $performance->getChanges()
        ]);
    }
}
```

### 2. Audit Logging
```php
// PerformanceAuditLogger.php
class PerformanceAuditLogger
{
    public function logAction(User $user, string $action, Performance $performance): void
    {
        Log::channel('audit')->info('Performance action', [
            'user_id' => $user->id,
            'action' => $action,
            'performance_id' => $performance->id,
            'timestamp' => now()
        ]);
    }
}
```

### 3. Error Logging
```php
// PerformanceErrorLogger.php
class PerformanceErrorLogger
{
    public function logError(Throwable $error, ?User $user = null): void
    {
        Log::channel('error')->error('Performance error', [
            'error' => $error->getMessage(),
            'user_id' => $user?->id,
            'trace' => $error->getTraceAsString()
        ]);
    }
}
```

## Conclusioni
Le best practices per la sicurezza nel modulo Performance:
- Implementano autenticazione robusta
- Utilizzano autorizzazione basata su ruoli e permessi
- Validano e sanitizzano tutti gli input
- Proteggono contro CSRF e XSS
- Preveniscono SQL injection
- Loggano eventi di sicurezza
- Mantengono audit trail
- Gestiscono correttamente gli errori 