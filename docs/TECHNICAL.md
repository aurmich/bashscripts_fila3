# Guida Tecnica Implementativa

## Migrazioni

### Struttura Base
```php
declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\NomeModulo\Models\NomeModel;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = NomeModel::class;

    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->id();
                // ... colonne base ...
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // ... aggiornamenti e controlli ...
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );
    }
};
```

### Best Practices Migrazioni
- Estendere `XotBaseMigration` per funzionalità comuni
- Dichiarare `strict_types=1`
- Specificare il `model_class` associato
- Separare la creazione (`tableCreate`) dagli aggiornamenti (`tableUpdate`)
- Utilizzare metodi helper per timestamps e soft deletes
- Controllare l'esistenza delle colonne prima di aggiungerle
- Supportare attributi schemaless per dati extra flessibili

### Esempio Migrazione Completa
```php
declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Predict\Models\Predict;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = Predict::class;

    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->id();
                $table->string('title');
                $table->string('subtitle')->nullable();
                $table->text('content')->nullable();
                $table->string('status')->default('draft');
                $table->timestamp('published_at')->nullable();
                $table->string('featured_image')->nullable();
                $table->float('rating')->default(0);
                $table->integer('order')->default(0);
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (!$this->hasColumn('slug')) {
                    $table->string('slug')->nullable();
                }
                
                if (!$this->hasColumn('extra')) {
                    $table->schemalessAttributes('extra');
                }

                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );
    }
};
```

### Caratteristiche Chiave
1. **Struttura Base**
   - Estensione di `XotBaseMigration`
   - Dichiarazione del modello associato
   - Separazione create/update

2. **Colonne Standard**
   - `id` come chiave primaria
   - `timestamps` (created_at, updated_at)
   - `softDeletes` (deleted_at)
   - `status` per stati del record
   - `order` per ordinamento
   - `extra` per dati schemaless

3. **Convenzioni**
   - Nomi tabelle in snake_case plurale
   - Foreign keys con `_id` suffix
   - Indici appropriati per performance
   - Nullable per campi opzionali
   - Default values dove appropriato

4. **Sicurezza**
   - Controllo esistenza colonne
   - Validazione tipi dati
   - Gestione constraints
   - Rollback sicuro

## Modelli

### Struttura Base
```php
namespace Modules\Predict\Models;

use Modules\Predict\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Xot\Traits\HasParent;

class Predict extends BaseModel {
    use SoftDeletes;
    use HasParent;

    protected $fillable = [
        'title',
        'predictable_type',
        'predictable_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
```

### Modello Base
```php
namespace Modules\Predict\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model {
    // Funzionalità comuni a tutti i modelli del modulo
    protected $connection = 'predict';
    
    // ... altre configurazioni comuni ...
}
```

### Modello Pivot
```php
namespace Modules\Predict\Models;

use Modules\Predict\Models\BasePivot;

class PredictOption extends BasePivot {
    protected $fillable = [
        'predict_id',
        'option_id',
        'probability',
    ];

    protected $casts = [
        'probability' => 'float',
    ];
}
```

### Base Pivot
```php
namespace Modules\Predict\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

abstract class BasePivot extends Pivot {
    // Funzionalità comuni a tutte le tabelle pivot del modulo
    protected $connection = 'predict';
    
    // ... altre configurazioni comuni ...
}
```

### Relazioni e Trait
```php
// Relazioni polimorfe
public function predictable() {
    return $this->morphTo();
}

// Relazioni standard
public function options() {
    return $this->hasMany(PredictOption::class);
}

// Trait comuni
use HasFactory;
use HasTranslations;
use HasMedia;
```

### Scopes e Accessors
```php
// Local scopes
public function scopeActive($query) {
    return $query->where('is_active', true);
}

// Accessors
public function getProbabilityPercentageAttribute() {
    return $this->probability * 100;
}
```

## Filament Resources

### Struttura Base
```php
namespace Modules\Predict\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Predict\Models\Predict;

class PredictResource extends XotBaseResource {
    protected static ?string $model = Predict::class;

    public static function getFormSchema(): array {
        return [
            'title' => TextInput::make('title')
                ->required()
                ->maxLength(255),
            'predictable_type' => Select::make('predictable_type')
                ->options([
                    'article' => 'Articolo',
                    'event' => 'Evento',
                ])
                ->required(),
            'content' => RichEditor::make('content')
                ->nullable(),
            'status' => Select::make('status')
                ->options([
                    'draft' => 'Bozza',
                    'published' => 'Pubblicato',
                ])
                ->default('draft'),
        ];
    }
}
```

### Resource Pages

```php
namespace Modules\Predict\Filament\Resources\PredictResource\Pages;

use Modules\Xot\Filament\Pages\XotBaseListRecords;
use Modules\Predict\Filament\Resources\PredictResource;

class Index extends XotBaseListRecords {
    protected static string $resource = PredictResource::class;

    protected function getTableColumns(): array {
        return [
            'title' => TextColumn::make('title')
                ->searchable()
                ->sortable(),
            'predictable_type' => TextColumn::make('predictable_type')
                ->sortable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            'status' => TextColumn::make('status')
                ->badge()
                ->colors([
                    'warning' => 'draft',
                    'success' => 'published',
                ]),
        ];
    }
}

class Edit extends XotBaseEditRecord {
    protected static string $resource = PredictResource::class;
}

class Create extends XotBaseCreateRecord {
    protected static string $resource = PredictResource::class;
}
```

### Actions Personalizzate
```php
namespace Modules\Predict\Filament\Resources\PredictResource\Pages;

use Modules\Xot\Filament\Pages\XotBasePage;

class CalculateProbabilities extends XotBasePage {
    protected static string $resource = PredictResource::class;

    public function calculate() {
        // Logica calcolo
    }

    protected function getHeaderActions(): array {
        return [
            Action::make('calculate')
                ->action('calculate')
                ->label('Calcola Probabilità'),
        ];
    }
}
```

### Widgets
```php
namespace Modules\Predict\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget;

class PredictStats extends XotBaseStatsOverviewWidget {
    protected function getStats(): array {
        return [
            Card::make('Previsioni Totali', Predict::count()),
            Card::make('Previsioni Attive', Predict::active()->count()),
            Card::make('Accuratezza Media', $this->getAverageAccuracy()),
        ];
    }
}
```

### Relazioni
```php
namespace Modules\Predict\Filament\Resources\PredictResource\RelationManagers;

use Modules\Xot\Filament\RelationManagers\XotBaseRelationManager;

class OptionsRelationManager extends XotBaseRelationManager {
    protected static string $relationship = 'options';
    
    protected function getTableColumns(): array {
        return [
            TextColumn::make('option')
                ->sortable()
                ->searchable(),
            TextColumn::make('probability')
                ->sortable(),
        ];
    }
}
```

## Actions

### Struttura Base
```php
namespace Modules\Predict\Actions;

use Modules\Xot\Actions\BaseAction;
use Spatie\QueueableAction\QueueableAction;

class CalculatePredictProbability extends BaseAction {
    use QueueableAction;

    public function __construct(
        private readonly PredictService $service
    ) {}

    public function execute(Predict $predict): float {
        return $this->service->calculateProbability($predict);
    }
}
```

### Best Practices Actions
- Una singola responsabilità
- Dependency Injection
- Tipizzazione completa
- Documentazione PHPDoc
- Test unitari
- Gestione errori

## Eventi e Projectors

### Eventi
```php
namespace Modules\Predict\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PredictCreated extends ShouldBeStored {
    public function __construct(
        public readonly string $predictId,
        public readonly array $attributes
    ) {}
}
```

### Projectors
```php
namespace Modules\Predict\Projectors;

use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class PredictProjector extends Projector {
    public function onPredictCreated(PredictCreated $event) {
        Predict::create([
            'id' => $event->predictId,
            ...$event->attributes,
        ]);
    }
}
```

## Service Providers

### XotBaseServiceProvider
```php
namespace Modules\NomeModulo\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class NomeModuloServiceProvider extends XotBaseServiceProvider
{
    /**
     * IMPORTANTE: $name deve essere esattamente uguale al nome del Modulo,
     * rispettando il case originale (non lowercase)
     */
    public string $name = 'NomeModulo';
    
    public string $module_name = 'nomemodulo';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
```

### Regole Fondamentali ServiceProvider
1. **Nome del Modulo ($name)**
   - DEVE essere identico al nome della cartella del modulo
   - DEVE mantenere lo stesso case (maiuscole/minuscole)
   - Esempio corretto: `public string $name = 'Chart';`
   - Esempio errato: `public string $name = 'chart';`

2. **Nome del Modulo Lowercase ($module_name)**
   - DEVE essere la versione lowercase del nome del modulo
   - Esempio corretto: `public string $module_name = 'chart';`

3. **Directory e Namespace**
   - `$module_dir`: sempre `__DIR__`
   - `$module_ns`: sempre `__NAMESPACE__`

### Esempi Corretti

```php
// Per il modulo Chart
class ChartServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Chart';  // Esattamente come la cartella
    public string $module_name = 'chart';
}

// Per il modulo Predict
class PredictServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Predict';  // Esattamente come la cartella
    public string $module_name = 'predict';
}
```

### Errori Comuni da Evitare
```php
// ❌ ERRATO: nome non corrispondente alla cartella
public string $name = 'chart';  // Dovrebbe essere 'Chart'

// ❌ ERRATO: module_name non in lowercase
public string $module_name = 'Chart';  // Dovrebbe essere 'chart'

// ❌ ERRATO: nome non corrispondente
public string $name = 'Charts';  // Dovrebbe essere 'Chart'
```

## Analisi Statica con PHPStan

### Esecuzione
PHPStan è configurato a livello 3 e può essere eseguito dalla cartella `laravel` con il comando:
```bash
./vendor/bin/phpstan analyse Modules --level=3
```

Per analizzare un modulo specifico:
```bash
./vendor/bin/phpstan analyse Modules/NomeModulo --level=3
```

### Configurazione
Il file di configurazione `phpstan.neon` si trova nella cartella `laravel`:

```neon
parameters:
    level: 3
    paths:
        - Modules
    excludePaths:
        - */vendor/*
        - */node_modules/*
    checkMissingIterableValueType: false
    checkGenericClassInNonGenericObjectType: false
```

### Best Practices
- Mantenere sempre il livello 3 di analisi
- Correggere tutti gli errori prima del commit
- Non utilizzare `@phpstan-ignore` se non strettamente necessario
- Documentare i tipi complessi con PHPDoc
- Utilizzare strict_types=1 in tutti i file

### Errori Comuni
1. **Property does not exist**
   ```php
   // Correzione: Dichiarare la proprietà nella classe
   /** @property string $title */
   class MyModel extends BaseModel
   ```

2. **Method return type**
   ```php
   // Correzione: Specificare il tipo di ritorno
   public function getTitle(): ?string
   ```

3. **Parameter type**
   ```php
   // Correzione: Specificare il tipo del parametro
   public function setTitle(string $title): void
   ```

## Regole di Visibilità

### Estensione Classi Base
Quando si estende una classe base, è necessario mantenere o aumentare la visibilità dei metodi sovrascritti.

```php
// Classe Base
class XotBaseListRecords {
    public function getTableHeaderActions(): array {
        return [];
    }
}

// ✅ CORRETTO: Stessa visibilità (public)
class ListItems extends XotBaseListRecords {
    public function getTableHeaderActions(): array {
        return [
            // implementazione
        ];
    }
}

// ❌ ERRATO: Visibilità ridotta (protected)
class ListItems extends XotBaseListRecords {
    protected function getTableHeaderActions(): array {  // Errore: deve essere public
        return [
            // implementazione
        ];
    }
}
```

### Regole Fondamentali
1. **Mantenimento Visibilità**
   - Un metodo che sovrascrive un metodo public deve rimanere public
   - Non è possibile ridurre la visibilità di un metodo ereditato
   - È possibile aumentare la visibilità (da protected a public)

2. **Controlli da Effettuare**
   - Verificare la visibilità del metodo nella classe base
   - Mantenere la stessa visibilità nella classe figlia
   - PHPStan segnalerà errori di visibilità non corretta

3. **Casi Comuni**
   - Metodi di Filament Resources (sempre public)
   - Metodi di configurazione tabelle (public)
   - Metodi di gestione azioni (public)
   - Metodi di rendering (public)

## Autenticazione

### Flusso di Autenticazione
- L'autenticazione utilizza Laravel Volt per i componenti di login
- Supporta autenticazione tradizionale (email/password)
- Supporta autenticazione sociale tramite Google
- Utilizza il middleware 'auth' per proteggere le route

### Route di Autenticazione
- `/it/login` - Pagina di login con prefisso lingua
- `/it/register` - Pagina di registrazione con prefisso lingua
- `/login` - Fallback route senza prefisso lingua
- `/register` - Fallback route senza prefisso lingua

### Componenti
- `LoginComponent` - Gestisce la logica di autenticazione
- `RegisterComponent` - Gestisce la logica di registrazione
- `login_register.blade.php` - Template per il form di login/registrazione

### Socialite
- Supporto per autenticazione Google
- Route: `socialite.oauth.redirect` per l'inizializzazione OAuth
- Gestione callback tramite `ProcessCallbackController`

### Eventi
- `Login` - Triggera `LoginListener` e `CheckLoginListener`
- `Registered` - Triggera `ProfileRegisteredListener`

### Middleware
- `auth` - Protegge le route autenticate
- `guest` - Restringe l'accesso alle route pubbliche
- `web` - Applica sessione e CSRF protection
``` 