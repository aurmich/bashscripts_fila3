# Best Practices per l'Architettura nel Modulo Performance

## Overview
Questo documento descrive le best practices per l'architettura nel modulo Performance.

## Clean Architecture

### 1. Domain Layer
```php
/**
 * Domain Layer per le performance
 */
namespace App\Modules\Performance\Domain;

/**
 * Entity Performance
 */
class Performance
{
    /**
     * Create a new performance instance.
     *
     * @param  User  $user
     * @param  array  $metrics
     * @param  string  $period
     * @return static
     */
    public static function create(User $user, array $metrics, string $period): static
    {
        $performance = new static();
        $performance->user = $user;
        $performance->metrics = $metrics;
        $performance->period = $period;
        $performance->score = PerformanceCalculator::calculate($metrics);
        $performance->created_at = now();

        return $performance;
    }

    /**
     * Update performance metrics.
     *
     * @param  array  $metrics
     * @return void
     */
    public function updateMetrics(array $metrics): void
    {
        $this->metrics = $metrics;
        $this->score = PerformanceCalculator::calculate($metrics);
        $this->updated_at = now();
    }
}
```

### 2. Application Layer
```php
/**
 * Application Layer per le performance
 */
namespace App\Modules\Performance\Application;

/**
 * Action per calcolare le performance
 */
class CalculatePerformanceAction
{
    /**
     * Execute performance calculation.
     *
     * @param  User  $user
     * @param  array  $metrics
     * @param  string  $period
     * @return Performance
     */
    public function execute(User $user, array $metrics, string $period): Performance
    {
        $performance = Performance::create($user, $metrics, $period);
        $performance->save();

        event(new PerformanceCalculated($performance));

        return $performance;
    }
}
```

### 3. Infrastructure Layer
```php
/**
 * Infrastructure Layer per le performance
 */
namespace App\Modules\Performance\Infrastructure;

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
            ->with(['user', 'metrics'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Find performance by period.
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

## SOLID Principles

### 1. Single Responsibility
```php
/**
 * Calculator per le performance
 */
class PerformanceCalculator
{
    /**
     * Calculate performance score.
     *
     * @param  array  $metrics
     * @return float
     */
    public function calculate(array $metrics): float
    {
        $total = 0;
        $count = 0;

        foreach ($metrics as $metric) {
            $total += $metric->score;
            $count++;
        }

        return $count > 0 ? $total / $count : 0;
    }
}

/**
 * Validator per le performance
 */
class PerformanceValidator
{
    /**
     * Validate performance metrics.
     *
     * @param  array  $metrics
     * @return bool
     */
    public function validate(array $metrics): bool
    {
        foreach ($metrics as $metric) {
            if (!$this->isValidMetric($metric)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if metric is valid.
     *
     * @param  mixed  $metric
     * @return bool
     */
    private function isValidMetric($metric): bool
    {
        return is_object($metric) && 
               method_exists($metric, 'score') && 
               is_numeric($metric->score);
    }
}
```

### 2. Open/Closed
```php
/**
 * Interface per i calculator
 */
interface CalculatorInterface
{
    /**
     * Calculate performance score.
     *
     * @param  array  $metrics
     * @return float
     */
    public function calculate(array $metrics): float;
}

/**
 * Calculator base per le performance
 */
abstract class BaseCalculator implements CalculatorInterface
{
    /**
     * Calculate performance score.
     *
     * @param  array  $metrics
     * @return float
     */
    abstract public function calculate(array $metrics): float;

    /**
     * Get metric score.
     *
     * @param  mixed  $metric
     * @return float
     */
    protected function getMetricScore($metric): float
    {
        return is_object($metric) && method_exists($metric, 'score') 
            ? (float) $metric->score 
            : 0;
    }
}

/**
 * Calculator per le performance
 */
class PerformanceCalculator extends BaseCalculator
{
    /**
     * Calculate performance score.
     *
     * @param  array  $metrics
     * @return float
     */
    public function calculate(array $metrics): float
    {
        $total = 0;
        $count = 0;

        foreach ($metrics as $metric) {
            $total += $this->getMetricScore($metric);
            $count++;
        }

        return $count > 0 ? $total / $count : 0;
    }
}
```

### 3. Liskov Substitution
```php
/**
 * Interface per i repository
 */
interface RepositoryInterface
{
    /**
     * Find performance by user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function findByUser(User $user): Collection;

    /**
     * Find performance by period.
     *
     * @param  string  $period
     * @return Collection
     */
    public function findByPeriod(string $period): Collection;
}

/**
 * Repository base per le performance
 */
abstract class BaseRepository implements RepositoryInterface
{
    /**
     * Find performance by user.
     *
     * @param  User  $user
     * @return Collection
     */
    abstract public function findByUser(User $user): Collection;

    /**
     * Find performance by period.
     *
     * @param  string  $period
     * @return Collection
     */
    abstract public function findByPeriod(string $period): Collection;
}

/**
 * Repository per le performance
 */
class PerformanceRepository extends BaseRepository
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
            ->with(['user', 'metrics'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Find performance by period.
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

## Design Patterns

### 1. Repository Pattern
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
            ->with(['user', 'metrics'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Find performance by period.
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

    /**
     * Save performance.
     *
     * @param  Performance  $performance
     * @return bool
     */
    public function save(Performance $performance): bool
    {
        return $performance->save();
    }

    /**
     * Delete performance.
     *
     * @param  Performance  $performance
     * @return bool
     */
    public function delete(Performance $performance): bool
    {
        return $performance->delete();
    }
}
```

### 2. Factory Pattern
```php
/**
 * Factory per le performance
 */
class PerformanceFactory
{
    /**
     * Create performance instance.
     *
     * @param  User  $user
     * @param  array  $metrics
     * @param  string  $period
     * @return Performance
     */
    public function create(User $user, array $metrics, string $period): Performance
    {
        $performance = new Performance();
        $performance->user = $user;
        $performance->metrics = $metrics;
        $performance->period = $period;
        $performance->score = PerformanceCalculator::calculate($metrics);
        $performance->created_at = now();

        return $performance;
    }

    /**
     * Create performance from array.
     *
     * @param  array  $data
     * @return Performance
     */
    public function createFromArray(array $data): Performance
    {
        return $this->create(
            $data['user'],
            $data['metrics'],
            $data['period']
        );
    }
}
```

### 3. Observer Pattern
```php
/**
 * Observer per le performance
 */
class PerformanceObserver
{
    /**
     * Handle performance created event.
     *
     * @param  Performance  $performance
     * @return void
     */
    public function created(Performance $performance): void
    {
        event(new PerformanceCreated($performance));
    }

    /**
     * Handle performance updated event.
     *
     * @param  Performance  $performance
     * @return void
     */
    public function updated(Performance $performance): void
    {
        event(new PerformanceUpdated($performance));
    }

    /**
     * Handle performance deleted event.
     *
     * @param  Performance  $performance
     * @return void
     */
    public function deleted(Performance $performance): void
    {
        event(new PerformanceDeleted($performance));
    }
}
```

## Dependency Injection

### 1. Constructor Injection
```php
/**
 * Service per le performance
 */
class PerformanceService
{
    /**
     * Create a new service instance.
     *
     * @param  PerformanceRepository  $repository
     * @param  PerformanceCalculator  $calculator
     * @param  PerformanceValidator  $validator
     */
    public function __construct(
        private PerformanceRepository $repository,
        private PerformanceCalculator $calculator,
        private PerformanceValidator $validator
    ) {}

    /**
     * Calculate performance.
     *
     * @param  User  $user
     * @param  array  $metrics
     * @param  string  $period
     * @return Performance
     */
    public function calculate(User $user, array $metrics, string $period): Performance
    {
        if (!$this->validator->validate($metrics)) {
            throw new InvalidMetricsException();
        }

        $score = $this->calculator->calculate($metrics);
        $performance = new Performance($user, $metrics, $period, $score);

        $this->repository->save($performance);

        return $performance;
    }
}
```

### 2. Method Injection
```php
/**
 * Controller per le performance
 */
class PerformanceController extends Controller
{
    /**
     * Display performance data.
     *
     * @param  PerformanceService  $service
     * @param  User  $user
     * @return JsonResponse
     */
    public function show(PerformanceService $service, User $user): JsonResponse
    {
        $performance = $service->findByUser($user);

        return response()->json($performance);
    }
}
```

### 3. Property Injection
```php
/**
 * Action per le performance
 */
class CalculatePerformanceAction
{
    /**
     * Repository per le performance
     *
     * @var PerformanceRepository
     */
    private PerformanceRepository $repository;

    /**
     * Set repository.
     *
     * @param  PerformanceRepository  $repository
     * @return void
     */
    public function setRepository(PerformanceRepository $repository): void
    {
        $this->repository = $repository;
    }

    /**
     * Execute performance calculation.
     *
     * @param  User  $user
     * @param  array  $metrics
     * @param  string  $period
     * @return Performance
     */
    public function execute(User $user, array $metrics, string $period): Performance
    {
        $performance = Performance::create($user, $metrics, $period);
        $this->repository->save($performance);

        return $performance;
    }
}
```

## Service Layer

### 1. Service Implementation
```php
/**
 * Service per le performance
 */
class PerformanceService
{
    /**
     * Create a new service instance.
     *
     * @param  PerformanceRepository  $repository
     * @param  PerformanceCalculator  $calculator
     * @param  PerformanceValidator  $validator
     */
    public function __construct(
        private PerformanceRepository $repository,
        private PerformanceCalculator $calculator,
        private PerformanceValidator $validator
    ) {}

    /**
     * Calculate performance.
     *
     * @param  User  $user
     * @param  array  $metrics
     * @param  string  $period
     * @return Performance
     */
    public function calculate(User $user, array $metrics, string $period): Performance
    {
        if (!$this->validator->validate($metrics)) {
            throw new InvalidMetricsException();
        }

        $score = $this->calculator->calculate($metrics);
        $performance = new Performance($user, $metrics, $period, $score);

        $this->repository->save($performance);

        return $performance;
    }

    /**
     * Find performance by user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function findByUser(User $user): Collection
    {
        return $this->repository->findByUser($user);
    }

    /**
     * Find performance by period.
     *
     * @param  string  $period
     * @return Collection
     */
    public function findByPeriod(string $period): Collection
    {
        return $this->repository->findByPeriod($period);
    }
}
```

### 2. Service Interface
```php
/**
 * Interface per il service
 */
interface PerformanceServiceInterface
{
    /**
     * Calculate performance.
     *
     * @param  User  $user
     * @param  array  $metrics
     * @param  string  $period
     * @return Performance
     */
    public function calculate(User $user, array $metrics, string $period): Performance;

    /**
     * Find performance by user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function findByUser(User $user): Collection;

    /**
     * Find performance by period.
     *
     * @param  string  $period
     * @return Collection
     */
    public function findByPeriod(string $period): Collection;
}
```

### 3. Service Registration
```php
/**
 * Service Provider per le performance
 */
class PerformanceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(PerformanceServiceInterface::class, function ($app) {
            return new PerformanceService(
                $app->make(PerformanceRepository::class),
                $app->make(PerformanceCalculator::class),
                $app->make(PerformanceValidator::class)
            );
        });
    }
}
```

## Data Transfer Objects

### 1. DTO Implementation
```php
/**
 * DTO per le performance
 */
class PerformanceData extends Data
{
    /**
     * Create a new DTO instance.
     *
     * @param  User  $user
     * @param  array  $metrics
     * @param  string  $period
     * @return static
     */
    public static function fromRequest(User $user, array $metrics, string $period): static
    {
        return new static([
            'user_id' => $user->id,
            'metrics' => $metrics,
            'period' => $period,
            'score' => PerformanceCalculator::calculate($metrics),
            'created_at' => now()
        ]);
    }

    /**
     * Get validation rules.
     *
     * @return array
     */
    public static function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'metrics' => ['required', 'array'],
            'period' => ['required', 'string'],
            'score' => ['required', 'numeric', 'min:0', 'max:1'],
            'created_at' => ['required', 'date']
        ];
    }
}
```

### 2. DTO Transformation
```php
/**
 * Transformer per le performance
 */
class PerformanceTransformer
{
    /**
     * Transform performance to DTO.
     *
     * @param  Performance  $performance
     * @return PerformanceData
     */
    public function transform(Performance $performance): PerformanceData
    {
        return PerformanceData::from([
            'id' => $performance->id,
            'user_id' => $performance->user_id,
            'metrics' => $performance->metrics,
            'period' => $performance->period,
            'score' => $performance->score,
            'created_at' => $performance->created_at,
            'updated_at' => $performance->updated_at
        ]);
    }

    /**
     * Transform collection to DTOs.
     *
     * @param  Collection  $performances
     * @return array
     */
    public function transformCollection(Collection $performances): array
    {
        return $performances->map(function ($performance) {
            return $this->transform($performance);
        })->toArray();
    }
}
```

### 3. DTO Usage
```php
/**
 * Controller per le performance
 */
class PerformanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  PerformanceService  $service
     * @param  PerformanceTransformer  $transformer
     */
    public function __construct(
        private PerformanceService $service,
        private PerformanceTransformer $transformer
    ) {}

    /**
     * Display performance data.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        $performance = $this->service->findByUser($user);
        $data = $this->transformer->transform($performance);

        return response()->json($data);
    }

    /**
     * Store performance data.
     *
     * @param  PerformanceRequest  $request
     * @return JsonResponse
     */
    public function store(PerformanceRequest $request): JsonResponse
    {
        $data = PerformanceData::fromRequest(
            $request->user(),
            $request->metrics,
            $request->period
        );

        $performance = $this->service->calculate(
            $request->user(),
            $data->metrics,
            $data->period
        );

        return response()->json(
            $this->transformer->transform($performance),
            201
        );
    }
}
```

## Conclusioni
Le best practices per l'architettura nel modulo Performance:
- Seguono i principi SOLID
- Implementano Clean Architecture
- Utilizzano Design Patterns
- Gestiscono le dipendenze
- Implementano il Service Layer
- Utilizzano Data Transfer Objects
- Garantiscono la manutenibilità
- Favoriscono la scalabilità 