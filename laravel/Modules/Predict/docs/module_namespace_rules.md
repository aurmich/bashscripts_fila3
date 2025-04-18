# Regole Fondamentali dei Moduli Laravel

## 1. La Regola della Directory `app/`

In TUTTI i moduli Laravel, la directory `app/` è la root del namespace base del modulo. Questa è una regola universale e immutabile che si applica a qualsiasi modulo nel sistema.

### Configurazione Standard

Ogni modulo DEVE avere nel suo `composer.json` la seguente configurazione di autoload:

```json
{
    "autoload": {
        "psr-4": {
            "Modules\\NomeModulo\\": "app/"
        }
    }
}
```

### Esempi per Diversi Moduli

#### Modulo Blog
- Directory: `Modules/Blog/app/Models/Post.php`
- Namespace: `Modules\Blog\Models\Post`
- Configurazione:
  ```json
  "Modules\\Blog\\": "app/"
  ```

#### Modulo Tenant
- Directory: `Modules/Tenant/app/Services/TenantManager.php`
- Namespace: `Modules\Tenant\Services\TenantManager`
- Configurazione:
  ```json
  "Modules\\Tenant\\": "app/"
  ```

#### Modulo Predict
- Directory: `Modules/Predict/app/Actions/CreatePrediction.php`
- Namespace: `Modules\Predict\Actions\CreatePrediction`
- Configurazione:
  ```json
  "Modules\\Predict\\": "app/"
  ```

### Cosa NON Fare

❌ NON includere mai `App` nel namespace:
- ERRATO: `Modules\Blog\App\Models\Post`
- CORRETTO: `Modules\Blog\Models\Post`

❌ NON mettere classi PHP fuori dalla directory `app/`:
- ERRATO: `Modules/Blog/Models/Post.php`
- CORRETTO: `Modules/Blog/app/Models/Post.php`

❌ NON modificare la struttura del namespace base:
- ERRATO: `"Modules\\Blog\\Core\\": "app/"`
- CORRETTO: `"Modules\\Blog\\": "app/"`

## 2. La Regola dei Service Provider

Tutti i moduli DEVONO estendere i service provider base del modulo Xot. Questa è una regola fondamentale per garantire consistenza e funzionalità comuni tra tutti i moduli.

### Service Provider Principali

1. **XotBaseServiceProvider**
   - Classe base per il service provider principale del modulo
   - Proprietà obbligatorie:
     ```php
     public string $name = 'NomeModulo';          // Nome del modulo (PascalCase)
     protected string $module_dir = __DIR__;      // Directory corrente del provider
     protected string $module_ns = __NAMESPACE__; // Namespace corrente del provider
     ```
   - Gestisce automaticamente:
     - Registrazione delle viste
     - Registrazione delle traduzioni
     - Registrazione dei componenti Blade e Livewire
     - Configurazione del modulo
     - Caricamento delle migrazioni

2. **XotBaseEventServiceProvider**
   - Classe base per la gestione degli eventi del modulo
   - Proprietà obbligatorie:
     ```php
     public string $name = 'NomeModulo';          // Nome del modulo (PascalCase)
     protected $listen = [];                      // Array degli eventi e listener
     ```
   - Supporta:
     - Event discovery automatico
     - Registrazione di projectors (per Event Sourcing)
     - Configurazione email verification

3. **XotBaseRouteServiceProvider**
   - Classe base per la gestione delle rotte del modulo
   - Proprietà obbligatorie:
     ```php
     public string $name = 'NomeModulo';          // Nome del modulo (PascalCase)
     protected string $module_dir = __DIR__;      // Directory corrente del provider
     protected string $module_ns = __NAMESPACE__; // Namespace corrente del provider
     protected string $moduleNamespace = 'Modules\NomeModulo\Http\Controllers'; // Namespace dei controller
     ```
   - Gestisce:
     - Registrazione rotte web e API
     - Middleware di default
     - Prefissi delle rotte

### Implementazione Corretta

1. **Service Provider Principale**:
```php
namespace Modules\Predict\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class PredictServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Predict';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
}
```

2. **Event Service Provider**:
```php
namespace Modules\Predict\Providers;

use Modules\Xot\Providers\XotBaseEventServiceProvider;

class EventServiceProvider extends XotBaseEventServiceProvider
{
    public string $name = 'Predict';
    protected $listen = [
        // Eventi e listener
    ];
}
```

3. **Route Service Provider**:
```php
namespace Modules\Predict\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    public string $name = 'Predict';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
    protected string $moduleNamespace = 'Modules\Predict\Http\Controllers';
}
```

### Cosa NON Fare

❌ NON omettere le proprietà obbligatorie:
```php
// ERRATO: mancano le proprietà obbligatorie
class PredictServiceProvider extends XotBaseServiceProvider
{
}
```

❌ NON modificare i valori standard delle proprietà:
```php
// ERRATO: valori non standard
protected string $module_dir = '/path/custom';
protected string $moduleNamespace = 'App\Http\Controllers';
```

❌ NON estendere i provider Laravel di base:
```php
// ERRATO: non usare i provider Laravel di base
use Illuminate\Support\ServiceProvider;
class PredictServiceProvider extends ServiceProvider
```

✅ Implementazione corretta con tutte le proprietà:
```php
class PredictServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Predict';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
}
```

### Ordine di Registrazione

1. Il `PredictServiceProvider` viene registrato per primo
2. Il `PredictServiceProvider` registra automaticamente:
   - `RouteServiceProvider`
   - `EventServiceProvider`
3. I provider vengono caricati nell'ordine corretto per garantire tutte le dipendenze

## 3. Vantaggi Generali

1. **Consistenza**
   - Struttura uniforme tra tutti i moduli
   - Pattern prevedibili per tutti gli sviluppatori
   - Comportamento standardizzato dei service provider

2. **Manutenibilità**
   - Separazione chiara tra codice PHP e risorse
   - Organizzazione standardizzata dei file
   - Riutilizzo del codice attraverso i provider base

3. **Interoperabilità**
   - Facile integrazione tra moduli
   - Namespace prevedibili per l'autoloading
   - Funzionalità comuni già implementate

## 4. Migrazione di Moduli Esistenti

Se hai un modulo che non segue queste convenzioni:

1. Sposta tutto il codice PHP nella directory `app/`
2. Aggiorna il composer.json con la configurazione corretta
3. Aggiorna tutti i namespace per rimuovere eventuali riferimenti ad `App`
4. Estendi i service provider base di Xot
5. Rimuovi le implementazioni duplicate dei metodi dei provider
6. Esegui `composer dump-autoload` dopo le modifiche 