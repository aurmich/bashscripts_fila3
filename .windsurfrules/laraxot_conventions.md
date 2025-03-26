# Convenzioni per lo Sviluppo in Laraxot PTVX

Questo documento definisce le regole e le convenzioni da seguire per lo sviluppo nel framework Laraxot PTVX, con particolare attenzione alla compatibilità con PHPStan livello 9.

## Struttura dei Namespace

### Regola Fondamentale dei Namespace

I namespace nei moduli **NON** devono includere il segmento `app` anche se i file sono fisicamente collocati nella directory `app`.

#### ✅ CORRETTO
```php
namespace Modules\NomeModulo\Models;
namespace Modules\NomeModulo\Http\Controllers;
namespace Modules\NomeModulo\Datas;
namespace Modules\NomeModulo\Actions;
```

#### ❌ ERRATO
```php
namespace Modules\NomeModulo\App\Models;
namespace Modules\NomeModulo\App\Http\Controllers;
namespace Modules\NomeModulo\App\Datas;
```

### Mappatura tra Directory e Namespace

| Directory fisica                             | Namespace corretto                   |
|---------------------------------------------|-------------------------------------|
| `Modules/Rating/app/Models/`                | `Modules\Rating\Models`             |
| `Modules/Rating/app/Http/Controllers/`      | `Modules\Rating\Http\Controllers`   |
| `Modules/Rating/app/Providers/`             | `Modules\Rating\Providers`          |
| `Modules/Rating/app/Datas/`                 | `Modules\Rating\Datas`              |
| `Modules/Rating/app/Actions/`               | `Modules\Rating\Actions`            |
| `Modules/Rating/app/Filament/Resources/`    | `Modules\Rating\Filament\Resources` |

## Data Objects con Spatie Laravel Data

### Posizione e Namespace Corretti

- Directory: `Modules/NomeModulo/app/Datas/`
- Namespace: `Modules\NomeModulo\Datas`

### Implementazione di un Data Object

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Datas;

use Spatie\LaravelData\Data;

class RatingData extends Data
{
    public function __construct(
        public int $value,
        public string $comment,
        public ?string $user_id = null,
    ) {
    }
    
    public static function fromRequest(array $data): self
    {
        return new self(
            value: $data['value'] ?? 0,
            comment: $data['comment'] ?? '',
            user_id: $data['user_id'] ?? null,
        );
    }
}
```

## QueueableActions invece di Services

### Posizione e Namespace Corretti

- Directory: `Modules/NomeModulo/app/Actions/`
- Namespace: `Modules\NomeModulo\Actions`

### Implementazione di una QueueableAction

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Actions;

use Modules\Rating\Datas\RatingData;
use Modules\Rating\Models\Rating;
use Spatie\QueueableAction\QueueableAction;

class CreateRatingAction
{
    use QueueableAction;
    
    public function execute(RatingData $data): Rating
    {
        $rating = new Rating();
        $rating->value = $data->value;
        $rating->comment = $data->comment;
        $rating->user_id = $data->user_id;
        $rating->save();
        
        return $rating;
    }
}
```

### Esecuzione in Background

```php
// Esecuzione sincrona
$rating = $createRatingAction->execute($ratingData);

// Esecuzione in background (coda)
$createRatingAction->onQueue('ratings')->execute($ratingData);
```

## Tipizzazione Corretta per PHPStan Livello 9

### Proprietà nei Modelli

```php
/**
 * @var list<string>  // Usare list<string> invece di array<string> o string[]
 */
protected $fillable = ['id', 'name', 'email'];

/**
 * @var list<string>
 */
protected $hidden = ['password', 'remember_token'];

/**
 * @var array<string, string>
 */
protected $casts = [
    'published_at' => 'datetime',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
```

### Tipo di Ritorno per newFactory()

```php
/**
 * @return \Illuminate\Database\Eloquent\Factories\Factory
 */
protected static function newFactory(): Factory
{
    $factoryNamespace = UserFactory::class;
    
    if (class_exists($factoryNamespace)) {
        return app($factoryNamespace);
    }
    
    return Factory::factoryForModel(static::class);
}
```

### Gestione delle Funzioni che Restituiscono false

```php
// ERRATO - strrpos può restituire false
$namespace = substr(static::class, 0, strrpos(static::class, '\\'));

// CORRETTO
$position = strrpos(static::class, '\\');
if ($position === false) {
    $namespace = '';
} else {
    $namespace = substr(static::class, 0, $position);
}
```

### Tipi Generici nelle Relazioni Eloquent

```php
/**
 * @return BelongsToMany<User, Role>  // Specificare SEMPRE entrambi i tipi
 */
public function users(): BelongsToMany
{
    return $this->belongsToMany(User::class);
}

/**
 * @return MorphMany<Comment, Post>  // Specificare SEMPRE entrambi i tipi
 */
public function comments(): MorphMany
{
    return $this->morphMany(Comment::class, 'commentable');
}
```

## Service Providers

### Struttura Corretta

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class RatingServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Rating';  // IMPORTANTE: Deve coincidere col nome del modulo
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
    
    // Implementazione...
}
```

## Visibilità Corretta nei Metodi

### Trait HasXotTable per Filament

```php
// Visibilità pubblica obbligatoria quando si implementa un'interfaccia
public function getTableHeaderActions(): array
{
    return [
        // Implementazione...
    ];
}
```

## Gestione dei Valori Mixed

```php
// ERRATO
$databaseName = (string) config("database.connections.{$connection}.database");

// CORRETTO
$databaseConfig = config("database.connections.{$connection}.database");
$databaseName = is_string($databaseConfig) ? $databaseConfig : '';
```

## Risoluzione dei Problemi PHPStan

### Approccio Modulare

1. Eseguire PHPStan su ciascun modulo separatamente:
   ```bash
   ./vendor/bin/phpstan analyse --level=9 --memory-limit=2G Modules/NomeModulo
   ```

2. Correggere prima i problemi nei modelli base e nelle tipizzazioni

3. Correggere i namespace errati

4. Correggere i tipi generici nelle relazioni

5. Correggere i metodi di factory nei modelli

6. Documentare le soluzioni nella cartella `docs` del modulo

### Ignorare Temporaneamente gli Errori

```php
/** @phpstan-ignore-next-line */
$value = $data['key'];

/**
 * @phpstan-ignore offsetAccess.nonOffsetAccessible
 */
```

## Documentazione

Ogni modulo dovrebbe avere una cartella `docs` con documentazione specifica:

```
Modules/NomeModulo/
└── docs/
    ├── README.md                  # Panoramica del modulo
    ├── MODELS.md                  # Struttura e relazioni dei modelli
    ├── ENDPOINTS.md               # API e endpoints
    └── PHPSTAN-SOLUTIONS.md       # Soluzioni ai problemi PHPStan
```

## Vantaggi dell'Approccio

1. **Coerenza**: Struttura uniforme in tutto il codebase
2. **Compatibilità PHPStan**: Codice verificabile a livello 9
3. **Tipo di Ritorno Esplicito**: Facilità di comprensione del codice
4. **Forte Tipizzazione**: Riduzione degli errori a runtime
5. **Manutenibilità**: Facilità di manutenzione e evoluzione del codice
6. **Testabilità**: Componenti isolati e facilmente testabili 