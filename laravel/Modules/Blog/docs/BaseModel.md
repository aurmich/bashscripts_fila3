# BaseModel

Il `BaseModel` è la classe base per tutti i modelli nel modulo Blog. Estende `Illuminate\Database\Eloquent\Model` e implementa `Spatie\MediaLibrary\HasMedia`.

## Caratteristiche Principali

- Implementa `HasMedia` per la gestione dei media
- Utilizza i seguenti trait:
  - `HasFactory` per la creazione di factory
  - `InteractsWithMedia` per l'interazione con i media
  - `SoftDeletes` per il soft delete
  - `Updater` per la gestione degli aggiornamenti

## Configurazione

```php
public static $snakeAttributes = true;  // Gli attributi sono in formato snake_case
public $incrementing = true;            // ID auto-incrementante
public $timestamps = true;              // Gestione automatica di created_at e updated_at
protected $perPage = 30;                // Numero di elementi per pagina
protected $connection = 'blog';         // Connessione al database
protected $primaryKey = 'id';           // Chiave primaria
protected $keyType = 'string';          // Tipo della chiave primaria
```

## Casting degli Attributi

```php
protected function casts(): array
{
    return [
        'id' => 'string',
        'uuid' => 'string',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
```

## Factory

Il modello include un metodo `newFactory()` che utilizza l'azione `GetFactoryAction` per creare le factory:

```php
protected static function newFactory()
{
    return app(GetFactoryAction::class)->execute(static::class);
}
```

## Utilizzo

Per utilizzare il BaseModel in un nuovo modello:

```php
class YourModel extends BaseModel
{
    protected $fillable = [
        // i tuoi campi fillable
    ];
    
    protected $casts = [
        // i tuoi cast
    ];
}
```

## Note

- Il BaseModel è una classe astratta, quindi non può essere istanziata direttamente
- Tutti i modelli che estendono BaseModel ereditano automaticamente la gestione dei media
- Il soft delete è abilitato di default
- Gli attributi sono automaticamente convertiti in snake_case quando serializzati 