# Best Practices per la Sicurezza nel Modulo Performance

## Overview
Questo documento descrive le best practices per la sicurezza nel modulo Performance.

## Authentication

### 1. Middleware
```php
/**
 * @property-read int $id
 * @property-read int $user_id
 * @property-read float $score
 * @property-read array $metrics
 * @property-read string $period
 * @property-read DateTimeImmutable $created_at
 * @property-read DateTimeImmutable $updated_at
 */
class PerformanceController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('throttle:60,1');
    }
}
```

### 2. API Authentication
```php
/**
 * @property-read int $id
 * @property-read int $user_id
 * @property-read float $score
 * @property-read array $metrics
 * @property-read string $period
 * @property-read DateTimeImmutable $created_at
 * @property-read DateTimeImmutable $updated_at
 */
class PerformanceApiController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('throttle:60,1');
    }
}
```

### 3. MFA Authentication
```php
/**
 * @property-read int $id
 * @property-read int $user_id
 * @property-read float $score
 * @property-read array $metrics
 * @property-read string $period
 * @property-read DateTimeImmutable $created_at
 * @property-read DateTimeImmutable $updated_at
 */
class PerformanceMfaController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mfa');
        $this->middleware('throttle:60,1');
    }
}
```

## Authorization

### 1. Policies
```php
/**
 * Policy per le performance
 */
class PerformancePolicy
{
    /**
     * Determine if the user can view the performance.
     */
    public function view(User $user, Performance $performance): bool
    {
        return $user->id === $performance->user_id || $user->isAdmin();
    }

    /**
     * Determine if the user can create performance.
     */
    public function create(User $user): bool
    {
        return $user->isActive();
    }

    /**
     * Determine if the user can update the performance.
     */
    public function update(User $user, Performance $performance): bool
    {
        return $user->id === $performance->user_id || $user->isAdmin();
    }

    /**
     * Determine if the user can delete the performance.
     */
    public function delete(User $user, Performance $performance): bool
    {
        return $user->isAdmin();
    }
}
```

### 2. Gates
```php
/**
 * Gates per le performance
 */
class PerformanceGate
{
    /**
     * Register the performance gates.
     */
    public function boot(): void
    {
        Gate::define('view-performance', function (User $user, Performance $performance) {
            return $user->id === $performance->user_id || $user->isAdmin();
        });

        Gate::define('create-performance', function (User $user) {
            return $user->isActive();
        });

        Gate::define('update-performance', function (User $user, Performance $performance) {
            return $user->id === $performance->user_id || $user->isAdmin();
        });

        Gate::define('delete-performance', function (User $user, Performance $performance) {
            return $user->isAdmin();
        });
    }
}
```

### 3. Permissions
```php
/**
 * Permessi per le performance
 */
class PerformancePermission
{
    /**
     * Register the performance permissions.
     */
    public function boot(): void
    {
        Permission::create(['name' => 'view-performance']);
        Permission::create(['name' => 'create-performance']);
        Permission::create(['name' => 'update-performance']);
        Permission::create(['name' => 'delete-performance']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'view-performance',
                'create-performance',
                'update-performance',
                'delete-performance'
            ]);

        Role::create(['name' => 'user'])
            ->givePermissionTo([
                'view-performance',
                'create-performance',
                'update-performance'
            ]);
    }
}
```

## Validation

### 1. Request Validation
```php
/**
 * @property-read int $user_id
 * @property-read array $metrics
 * @property-read string $period
 */
class PerformanceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'metrics' => [
                'required',
                'array',
                'min:3',
                'max:3',
                function ($attribute, $value, $fail) {
                    $required = ['efficiency', 'quality', 'timeliness'];
                    if (count(array_intersect(array_keys($value), $required)) !== 3) {
                        $fail('Le metriche devono includere: ' . implode(', ', $required));
                    }
                }
            ],
            'metrics.efficiency' => ['required', 'numeric', 'min:0', 'max:1'],
            'metrics.quality' => ['required', 'numeric', 'min:0', 'max:1'],
            'metrics.timeliness' => ['required', 'numeric', 'min:0', 'max:1'],
            'period' => ['required', 'string', 'in:daily,weekly,monthly']
        ];
    }
}
```

### 2. Model Validation
```php
/**
 * @property-read int $id
 * @property-read int $user_id
 * @property-read float $score
 * @property-read array $metrics
 * @property-read string $period
 * @property-read DateTimeImmutable $created_at
 * @property-read DateTimeImmutable $updated_at
 */
class Performance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'score',
        'metrics',
        'period'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'metrics' => 'array',
        'score' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_id'
    ];
}
```

### 3. Custom Validation
```php
/**
 * Validazione per le performance
 */
class PerformanceValidator
{
    /**
     * Validate the performance data.
     *
     * @param  array  $data
     * @return bool
     * @throws ValidationException
     */
    public function validate(array $data): bool
    {
        $validator = Validator::make(
            $data,
            Performance::rules(),
            Performance::messages()
        );

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return true;
    }
}
```

## Sanitization

### 1. Input Sanitization
```php
/**
 * Sanitizzazione per le performance
 */
class PerformanceSanitizer
{
    /**
     * Sanitize the input data.
     *
     * @param  array  $data
     * @return array
     */
    public function sanitize(array $data): array
    {
        return [
            'user_id' => (int) $data['user_id'],
            'metrics' => array_map('floatval', $data['metrics']),
            'period' => strtolower(trim($data['period']))
        ];
    }
}
```

### 2. Output Sanitization
```php
/**
 * Presentazione per le performance
 */
class PerformancePresenter
{
    /**
     * Present the performance data.
     *
     * @param  Performance  $performance
     * @return array
     */
    public function present(Performance $performance): array
    {
        return [
            'id' => $performance->id,
            'score' => round($performance->score, 2),
            'metrics' => array_map(function ($value) {
                return round($value, 2);
            }, $performance->metrics),
            'period' => $performance->period,
            'created_at' => $performance->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $performance->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
```

### 3. Data Sanitization
```php
/**
 * DTO per le performance
 */
class PerformanceData extends Data
{
    /**
     * Create a new data instance.
     *
     * @param  array  $data
     * @return static
     */
    public static function from(array $data): static
    {
        return new static(
            user_id: (int) $data['user_id'],
            metrics: array_map('floatval', $data['metrics']),
            period: strtolower(trim($data['period']))
        );
    }
}
```

## Protection

### 1. CSRF Protection
```php
/**
 * @property-read int $id
 * @property-read int $user_id
 * @property-read float $score
 * @property-read array $metrics
 * @property-read string $period
 * @property-read DateTimeImmutable $created_at
 * @property-read DateTimeImmutable $updated_at
 */
class PerformanceController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('csrf');
    }
}
```

### 2. XSS Protection
```php
/**
 * View per le performance
 */
class PerformanceView extends View
{
    /**
     * Render the view.
     *
     * @return string
     */
    public function render(): string
    {
        return view('performance::show', [
            'performance' => $this->performance,
            'metrics' => $this->sanitizeMetrics($this->performance->metrics)
        ]);
    }

    /**
     * Sanitize the metrics.
     *
     * @param  array  $metrics
     * @return array
     */
    private function sanitizeMetrics(array $metrics): array
    {
        return array_map(function ($value) {
            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }, $metrics);
    }
}
```

### 3. SQL Injection Protection
```php
/**
 * Repository per le performance
 */
class PerformanceRepository
{
    /**
     * Find performance by user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function findByUser(User $user): Collection
    {
        return Performance::query()
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
```

## Logging

### 1. Security Logging
```php
/**
 * Logger di sicurezza per le performance
 */
class PerformanceSecurityLogger
{
    /**
     * Log security event.
     *
     * @param  string  $event
     * @param  array  $data
     * @return void
     */
    public function log(string $event, array $data): void
    {
        Log::channel('security')->info($event, [
            'user_id' => auth()->id(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'data' => $data
        ]);
    }
}
```

### 2. Audit Logging
```php
/**
 * Logger di audit per le performance
 */
class PerformanceAuditLogger
{
    /**
     * Log audit event.
     *
     * @param  string  $event
     * @param  array  $data
     * @return void
     */
    public function log(string $event, array $data): void
    {
        Log::channel('audit')->info($event, [
            'user_id' => auth()->id(),
            'action' => $event,
            'data' => $data,
            'timestamp' => now()
        ]);
    }
}
```

### 3. Error Logging
```php
/**
 * Logger di errori per le performance
 */
class PerformanceErrorLogger
{
    /**
     * Log error event.
     *
     * @param  Exception  $exception
     * @param  array  $data
     * @return void
     */
    public function log(Exception $exception, array $data): void
    {
        Log::channel('error')->error($exception->getMessage(), [
            'user_id' => auth()->id(),
            'exception' => $exception,
            'data' => $data,
            'trace' => $exception->getTraceAsString()
        ]);
    }
}
```

## Conclusioni
Le best practices per la sicurezza nel modulo Performance:
- Implementano l'autenticazione
- Implementano l'autorizzazione
- Validano i dati
- Sanitizzano input/output
- Proteggono da vulnerabilità
- Loggano eventi di sicurezza
- Loggano eventi di audit
- Loggano errori 