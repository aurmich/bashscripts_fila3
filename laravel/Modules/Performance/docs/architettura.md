# Architettura del Modulo Performance

## Overview
Il modulo Performance è strutturato seguendo i principi SOLID e le best practices di Laravel. Utilizza un'architettura modulare con una chiara separazione delle responsabilità.

## Struttura delle Directory
```
Performance/
├── app/
│   ├── Actions/          # Azioni utilizzando Spatie Queryable Actions
│   │   ├── CalculatePerformanceAction.php
│   │   ├── StorePerformanceAction.php
│   │   └── UpdatePerformanceAction.php
│   ├── Console/          # Comandi Artisan
│   │   └── Commands/
│   │       ├── CalculatePerformanceCommand.php
│   │       └── GenerateReportCommand.php
│   ├── Enums/           # Enumerazioni
│   │   ├── PerformanceStatus.php
│   │   └── PerformanceType.php
│   ├── Filament/        # Interfaccia amministrativa
│   │   ├── Resources/
│   │   └── Widgets/
│   ├── Http/            # Controller e Middleware
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Mail/            # Email
│   │   └── PerformanceReportMail.php
│   ├── Models/          # Modelli Eloquent
│   │   ├── Performance.php
│   │   └── PerformanceMetric.php
│   ├── Providers/       # Service Providers
│   │   └── PerformanceServiceProvider.php
│   ├── Rules/           # Regole di validazione
│   │   └── ValidPerformanceScore.php
│   ├── Services/        # Servizi
│   │   └── PerformanceCalculationService.php
│   └── View/            # Viste
│       └── Components/
├── config/              # Configurazioni
│   └── performance.php
├── database/           # Migrazioni e Seeder
│   ├── migrations/
│   └── seeders/
├── docs/              # Documentazione
├── lang/              # Traduzioni
├── resources/         # Assets
├── routes/            # Route
└── tests/             # Test
```

## Componenti Principali

### 1. Actions
Le Actions sono utilizzate per incapsulare la logica di business complessa. Utilizzano Spatie Queryable Actions per una migliore gestione delle query.

```php
class CalculatePerformanceAction extends Action
{
    public function handle(User $user): float
    {
        return $this->performanceService
            ->calculate($user)
            ->getScore();
    }
}
```

### 2. Models
I modelli utilizzano trait e relazioni per gestire la logica del dominio.

```php
class Performance extends Model
{
    use HasFactory;
    use PerformanceTrait;

    protected $fillable = [
        'user_id',
        'score',
        'metrics',
        'status'
    ];

    protected $casts = [
        'metrics' => 'array',
        'score' => 'float'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

### 3. Services
I servizi gestiscono la logica di business complessa e le operazioni di calcolo.

```php
class PerformanceCalculationService
{
    public function calculate(User $user): PerformanceScore
    {
        $metrics = $this->getMetrics($user);
        $weights = $this->getWeights();
        
        return new PerformanceScore(
            $this->calculateScore($metrics, $weights)
        );
    }
}
```

### 4. Controllers
I controller sono snelli e utilizzano Actions per la logica di business.

```php
class PerformanceController extends Controller
{
    public function calculate(User $user)
    {
        $score = CalculatePerformanceAction::run($user);
        
        return response()->json([
            'data' => new PerformanceResource($score)
        ]);
    }
}
```

## Pattern Utilizzati

### 1. Repository Pattern
```php
interface PerformanceRepositoryInterface
{
    public function findById(int $id): ?Performance;
    public function save(Performance $performance): void;
    public function findByUser(User $user): Collection;
}

class PerformanceRepository implements PerformanceRepositoryInterface
{
    public function findById(int $id): ?Performance
    {
        return Performance::find($id);
    }
}
```

### 2. Data Transfer Objects
```php
class PerformanceData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly float $score,
        public readonly array $metrics,
        public readonly string $status
    ) {}
}
```

### 3. Value Objects
```php
class PerformanceScore
{
    public function __construct(
        private readonly float $value
    ) {
        if ($value < 0 || $value > 100) {
            throw new InvalidArgumentException('Score must be between 0 and 100');
        }
    }
}
```

## Flusso dei Dati

1. **Request**
   ```php
   class StorePerformanceRequest extends FormRequest
   {
       public function rules(): array
       {
           return [
               'score' => ['required', 'numeric', 'min:0', 'max:100'],
               'metrics' => ['required', 'array']
           ];
       }
   }
   ```

2. **Controller**
   ```php
   public function store(StorePerformanceRequest $request)
   {
       $performance = StorePerformanceAction::run(
           $request->validated()
       );
       
       return new PerformanceResource($performance);
   }
   ```

3. **Action**
   ```php
   class StorePerformanceAction extends Action
   {
       public function handle(array $data): Performance
       {
           return Performance::create($data);
       }
   }
   ```

4. **Model**
   ```php
   protected static function boot()
   {
       parent::boot();
       
       static::created(function ($performance) {
           event(new PerformanceCreated($performance));
       });
   }
   ```

## Eventi e Listeners

### 1. Eventi
```php
class PerformanceCreated
{
    public function __construct(
        public readonly Performance $performance
    ) {}
}
```

### 2. Listeners
```php
class SendPerformanceNotification
{
    public function handle(PerformanceCreated $event): void
    {
        Mail::to($event->performance->user)
            ->send(new PerformanceReportMail($event->performance));
    }
}
```

## Caching

### 1. Cache Tags
```php
Cache::tags(['performance'])->remember(
    "user_{$user->id}_performance",
    3600,
    fn() => $this->calculate($user)
);
```

### 2. Cache Invalidation
```php
protected static function boot()
{
    parent::boot();
    
    static::saved(function ($performance) {
        Cache::tags(['performance'])->flush();
    });
}
```

## Testing

### 1. Unit Tests
```php
class PerformanceCalculationTest extends TestCase
{
    public function test_calculates_correct_score(): void
    {
        $user = User::factory()->create();
        $score = CalculatePerformanceAction::run($user);
        
        $this->assertIsFloat($score);
        $this->assertGreaterThan(0, $score);
    }
}
```

### 2. Feature Tests
```php
class PerformanceEndpointTest extends TestCase
{
    public function test_returns_performance_data(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->getJson('/api/v1/performance');
        
        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'score',
                    'metrics'
                ]
            ]);
    }
}
```

## Conclusioni
L'architettura del modulo Performance è:
- Modulare e scalabile
- Facile da testare
- Facile da mantenere
- Performante
- Sicura 