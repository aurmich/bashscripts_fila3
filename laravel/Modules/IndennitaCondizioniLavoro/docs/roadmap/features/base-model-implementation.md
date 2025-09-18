# Base Model Implementation

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 100%**

## Overview
Implementazione dell'architettura base dei modelli per il modulo IndennitaCondizioniLavoro, garantendo consistenza e funzionalità comuni a tutti i modelli.

## Obiettivi
- [x] Setup connessione database (100%)
- [x] Implementazione BaseModel (100%)
- [x] Integrazione traits (100%)
- [x] Implementazione type casting (100%)
- [x] Test coverage completo (100%)

## Guida Step-by-Step

### 1. Setup Connessione Database
```php
// ✅ In config/database.php
'connections' => [
    'indennita_condizioni_lavoro' => [
        'driver' => 'mysql',
        'database' => env('ICL_DB_DATABASE'),
        // altre configurazioni...
    ]
];

// ✅ Nel BaseModel
class BaseModel extends Model
{
    protected $connection = 'indennita_condizioni_lavoro';
}
```

#### Passi da Seguire
1. Configurare le variabili d'ambiente
2. Definire la connessione in config/database.php
3. Implementare nel BaseModel

#### Consigli
- Usare nomi descrittivi per le connessioni
- Configurare timeout appropriati
- Implementare retry policies

### 2. Implementazione BaseModel
```php
/**
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class BaseModel extends Model
{
    /** @var list<string> */
    protected $fillable = ['id'];
    
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }
}
```

#### Passi da Seguire
1. Creare la classe BaseModel
2. Implementare proprietà comuni
3. Configurare casting e timestamps
4. Aggiungere PHPDoc completi

#### Consigli
- Seguire le convenzioni Laravel
- Documentare ogni proprietà
- Implementare metodi helper comuni

### 3. Integrazione Traits
```php
/**
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    use Updater;
    use SoftDeletes;
    use HasFactory;
    
    // implementazione...
}
```

#### Passi da Seguire
1. Identificare traits necessari
2. Implementare nell'ordine corretto
3. Configurare ogni trait

#### Consigli
- Documentare l'uso di ogni trait
- Verificare compatibilità
- Testare interazioni

## Metriche di Successo
- [x] Connessione database funzionante
- [x] Tutti i modelli estendono BaseModel
- [x] 100% test coverage
- [x] PHPStan Level 7 compliance

## Problemi Comuni e Soluzioni

### 1. Conflitti tra Traits
```php
// Problema: Metodi duplicati
use TraitA, TraitB {
    TraitA::method insteadof TraitB;
}

// Soluzione: Specificare precedenza
use TraitA, TraitB {
    TraitA::method insteadof TraitB;
    TraitB::method as alternativeMethod;
}
```

### 2. Gestione Soft Deletes
```php
// Implementazione corretta
use SoftDeletes;

/** @var list<string> */
protected $dates = ['deleted_at'];
```

## Testing

### Unit Tests
```php
class BaseModelTest extends TestCase
{
    public function test_connection_config(): void
    {
        $model = new TestModel();
        $this->assertEquals(
            'indennita_condizioni_lavoro',
            $model->getConnectionName()
        );
    }
}
```

### Integration Tests
```php
class ModelIntegrationTest extends TestCase
{
    public function test_timestamps(): void
    {
        $model = TestModel::create(['name' => 'test']);
        $this->assertNotNull($model->created_at);
        $this->assertInstanceOf(Carbon::class, $model->created_at);
    }
}
```

## Dipendenze
- Laravel Framework v10.x
- Laravel Eloquent ORM
- Carbon v2.x

## Link Correlati
- [PHPStan Level 7 Compliance](./phpstan-level7-compliance.md)
- [Model Documentation](./model-documentation.md)
- [Database Schema](./database-schema.md)

## Note e Considerazioni
- Mantenere BaseModel leggero e focalizzato
- Documentare ogni modifica alla classe base
- Considerare l'impatto sui modelli esistenti
- Pianificare migrazioni per cambiamenti breaking

---
⬅️ [Torna alla Roadmap](../../roadmap.md)
