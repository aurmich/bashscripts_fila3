# Pattern e Convenzioni di Codice

## Pattern Comuni

### Repository Pattern
```php
namespace Modules\Predict\Repositories;

class PredictRepository {
    public function __construct(
        private readonly Predict $model
    ) {}

    public function findActive(): Collection {
        return $this->model->active()->get();
    }

    public function findByUser(User $user): Collection {
        return $this->model->whereUserId($user->id)->get();
    }
}
```

### Service Pattern
```php
namespace Modules\Predict\Services;

class PredictService {
    public function __construct(
        private readonly PredictRepository $repository,
        private readonly EventDispatcher $dispatcher
    ) {}

    public function create(array $data): Predict {
        $predict = $this->repository->create($data);
        $this->dispatcher->dispatch(new PredictCreated($predict));
        return $predict;
    }
}
```

### Factory Pattern
```php
namespace Modules\Predict\Factories;

class PredictStrategyFactory {
    public function create(string $type): PredictStrategyInterface {
        return match($type) {
            'simple' => new SimplePredictStrategy(),
            'complex' => new ComplexPredictStrategy(),
            default => throw new InvalidArgumentException(),
        };
    }
}
```

## Convenzioni di Codice

### Naming
```php
// Models - Singolare
class Predict extends Model {}

// Controllers - Plurale + Controller
class PredictsController extends Controller {}

// Actions - Verbo + Sostantivo
class CalculateProbability extends Action {}

// Events - Sostantivo + Verbo al passato
class PredictCreated extends Event {}

// Jobs - Verbo + Sostantivo
class ProcessPrediction extends Job {}
```

### Tipizzazione
```php
declare(strict_types=1);

public function calculate(
    Predict $predict,
    float $probability,
    ?array $options = null
): float {
    // Implementation
}
```

### PHPDoc
```php
/**
 * Calcola la probabilità di una previsione.
 *
 * @param  Predict  $predict      La previsione da calcolare
 * @param  float    $probability  Probabilità base
 * @param  array    $options      Opzioni aggiuntive
 * @throws InvalidArgumentException Se la probabilità non è valida
 * @return float    La probabilità calcolata
 */
public function calculate(
    Predict $predict,
    float $probability,
    array $options = []
): float {
    // Implementation
}
```

## Trait Comuni

### HasParent
```php
trait HasParent {
    public function parent() {
        return $this->morphTo('parent');
    }

    public function setParent(Model $parent) {
        $this->parent()->associate($parent);
    }
}
```

### HasTranslations
```php
trait HasTranslations {
    public function translations(): HasMany {
        return $this->hasMany(Translation::class);
    }

    public function translate(string $field, string $locale): ?string {
        return $this->translations()
            ->where('field', $field)
            ->where('locale', $locale)
            ->value('value');
    }
}
```

## Gestione Errori

### Exception Handling
```php
namespace Modules\Predict\Exceptions;

class PredictException extends Exception {
    public static function invalidProbability(float $value): self {
        return new self("Probabilità non valida: {$value}");
    }

    public static function notFound(string $id): self {
        return new self("Previsione non trovata: {$id}");
    }
}
```

### Validation
```php
namespace Modules\Predict\Requests;

class CreatePredictRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['required', 'string', 'max:255'],
            'probability' => ['required', 'numeric', 'between:0,1'],
            'options' => ['sometimes', 'array'],
            'options.*' => ['required', 'string'],
        ];
    }
}
```

## Testing

### Unit Test
```php
namespace Modules\Predict\Tests\Unit;

class PredictTest extends TestCase {
    /** @test */
    public function it_calculates_probability_correctly(): void {
        $predict = Predict::factory()->create();
        $service = new PredictService();

        $result = $service->calculateProbability($predict);

        $this->assertIsFloat($result);
        $this->assertGreaterThanOrEqual(0, $result);
        $this->assertLessThanOrEqual(1, $result);
    }
}
```

### Feature Test
```php
namespace Modules\Predict\Tests\Feature;

class PredictControllerTest extends TestCase {
    /** @test */
    public function it_creates_predict(): void {
        $this->actingAs(User::factory()->create());

        $response = $this->postJson('/api/predicts', [
            'title' => 'Test Predict',
            'probability' => 0.75,
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('predicts', [
            'title' => 'Test Predict',
        ]);
    }
}
``` 