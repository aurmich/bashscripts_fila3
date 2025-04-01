# Best Practices per la Validazione nel Modulo Performance

## Overview
Questo documento descrive le best practices per la validazione nel modulo Performance.

## Request Validation

### 1. Form Request
```php
/**
 * Form request per la validazione dei dati delle performance
 *
 * @package App\Modules\Performance\Http\Requests
 */
class PerformanceRequest extends FormRequest
{
    /**
     * Regole di validazione
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'metrics' => ['required', 'array'],
            'metrics.efficiency' => ['required', 'numeric', 'min:0', 'max:1'],
            'metrics.quality' => ['required', 'numeric', 'min:0', 'max:1'],
            'metrics.timeliness' => ['required', 'numeric', 'min:0', 'max:1'],
            'period' => ['required', 'string', 'in:daily,weekly,monthly,quarterly']
        ];
    }

    /**
     * Messaggi di errore personalizzati
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'L\'utente è obbligatorio',
            'user_id.exists' => 'L\'utente non esiste',
            'metrics.required' => 'Le metriche sono obbligatorie',
            'metrics.array' => 'Le metriche devono essere un array',
            'metrics.efficiency.required' => 'L\'efficienza è obbligatoria',
            'metrics.efficiency.numeric' => 'L\'efficienza deve essere un numero',
            'metrics.efficiency.min' => 'L\'efficienza deve essere maggiore o uguale a 0',
            'metrics.efficiency.max' => 'L\'efficienza deve essere minore o uguale a 1',
            'period.required' => 'Il periodo è obbligatorio',
            'period.string' => 'Il periodo deve essere una stringa',
            'period.in' => 'Il periodo deve essere uno tra: daily, weekly, monthly, quarterly'
        ];
    }
}
```

### 2. Data Transfer Object
```php
/**
 * Data Transfer Object per i dati delle performance
 *
 * @package App\Modules\Performance\DataTransferObjects
 */
class PerformanceData extends Data
{
    public function __construct(
        public readonly int $user_id,
        public readonly array $metrics,
        public readonly string $period
    ) {}

    /**
     * Regole di validazione
     *
     * @return array<string, array<int, string>>
     */
    public static function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'metrics' => ['required', 'array'],
            'metrics.efficiency' => ['required', 'numeric', 'min:0', 'max:1'],
            'metrics.quality' => ['required', 'numeric', 'min:0', 'max:1'],
            'metrics.timeliness' => ['required', 'numeric', 'min:0', 'max:1'],
            'period' => ['required', 'string', 'in:daily,weekly,monthly,quarterly']
        ];
    }
}
```

### 3. Value Object
```php
/**
 * Value Object per il punteggio delle performance
 *
 * @package App\Modules\Performance\ValueObjects
 */
class PerformanceScore
{
    public function __construct(
        private readonly float $value
    ) {
        if ($value < 0 || $value > 1) {
            throw new InvalidArgumentException('Il punteggio deve essere compreso tra 0 e 1');
        }
    }

    public function value(): float
    {
        return $this->value;
    }
}
```

## Model Validation

### 1. Model Rules
```php
/**
 * Model Performance
 *
 * @package App\Modules\Performance\Domain
 */
class Performance extends Model
{
    /**
     * Regole di validazione
     *
     * @var array<string, array<int, string>>
     */
    protected $rules = [
        'user_id' => ['required', 'exists:users,id'],
        'metrics' => ['required', 'array'],
        'metrics.efficiency' => ['required', 'numeric', 'min:0', 'max:1'],
        'metrics.quality' => ['required', 'numeric', 'min:0', 'max:1'],
        'metrics.timeliness' => ['required', 'numeric', 'min:0', 'max:1'],
        'period' => ['required', 'string', 'in:daily,weekly,monthly,quarterly'],
        'score' => ['required', 'numeric', 'min:0', 'max:1']
    ];

    /**
     * Attributi fillable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'metrics',
        'period',
        'score'
    ];

    /**
     * Attributi cast
     *
     * @var array<string, string>
     */
    protected $casts = [
        'metrics' => 'array',
        'score' => 'float'
    ];
}
```

### 2. Model Events
```php
/**
 * Model Performance
 *
 * @package App\Modules\Performance\Domain
 */
class Performance extends Model
{
    /**
     * Eventi del modello
     *
     * @var array<string, string>
     */
    protected $dispatchesEvents = [
        'creating' => PerformanceCreating::class,
        'created' => PerformanceCreated::class,
        'updating' => PerformanceUpdating::class,
        'updated' => PerformanceUpdated::class,
        'deleting' => PerformanceDeleting::class,
        'deleted' => PerformanceDeleted::class
    ];

    /**
     * Boot del modello
     *
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($performance) {
            $performance->validate();
        });

        static::updating(function ($performance) {
            $performance->validate();
        });
    }
}
```

### 3. Model Scopes
```php
/**
 * Model Performance
 *
 * @package App\Modules\Performance\Domain
 */
class Performance extends Model
{
    /**
     * Scope per filtrare per punteggio
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  float  $min
     * @param  float  $max
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeScoreBetween($query, float $min, float $max)
    {
        return $query->whereBetween('score', [$min, $max]);
    }

    /**
     * Scope per filtrare per periodo
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $period
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePeriod($query, string $period)
    {
        return $query->where('period', $period);
    }

    /**
     * Scope per filtrare per utente
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }
}
```

## Custom Validation

### 1. Validation Rule
```php
/**
 * Regola di validazione per il punteggio delle performance
 *
 * @package App\Modules\Performance\Rules
 */
class PerformanceScoreRule implements Rule
{
    /**
     * Determina se la regola di validazione passa
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return is_numeric($value) && $value >= 0 && $value <= 1;
    }

    /**
     * Ottiene il messaggio di errore di validazione
     *
     * @return string
     */
    public function message(): string
    {
        return 'Il punteggio deve essere compreso tra 0 e 1';
    }
}
```

### 2. Validation Service
```php
/**
 * Servizio di validazione delle performance
 *
 * @package App\Modules\Performance\Services
 */
class PerformanceValidator
{
    /**
     * Valida i dati delle performance
     *
     * @param  array<string, mixed>  $data
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    public function validate(array $data): bool
    {
        $validator = Validator::make($data, [
            'user_id' => ['required', 'exists:users,id'],
            'metrics' => ['required', 'array'],
            'metrics.efficiency' => ['required', 'numeric', 'min:0', 'max:1'],
            'metrics.quality' => ['required', 'numeric', 'min:0', 'max:1'],
            'metrics.timeliness' => ['required', 'numeric', 'min:0', 'max:1'],
            'period' => ['required', 'string', 'in:daily,weekly,monthly,quarterly']
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return true;
    }

    /**
     * Valida le metriche delle performance
     *
     * @param  array<string, mixed>  $metrics
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    public function validateMetrics(array $metrics): bool
    {
        $validator = Validator::make($metrics, [
            'efficiency' => ['required', 'numeric', 'min:0', 'max:1'],
            'quality' => ['required', 'numeric', 'min:0', 'max:1'],
            'timeliness' => ['required', 'numeric', 'min:0', 'max:1']
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return true;
    }
}
```

### 3. Validation Middleware
```php
/**
 * Middleware per la validazione delle performance
 *
 * @package App\Modules\Performance\Http\Middleware
 */
class ValidatePerformance
{
    /**
     * Handle la richiesta
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = app(PerformanceValidator::class);

        try {
            $validator->validate($request->all());
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 422);
        }

        return $next($request);
    }
}
```

## Conclusioni
Le best practices per la validazione nel modulo Performance:
- Validano i dati in input
- Validano i dati del modello
- Implementano regole di validazione personalizzate
- Forniscono messaggi di errore chiari
- Utilizzano Value Objects per la validazione
- Implementano scopes per il filtraggio
- Gestiscono gli eventi del modello
- Garantiscono l'integrità dei dati 