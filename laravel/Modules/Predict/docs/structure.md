# Struttura dei Moduli Laravel

> **REGOLA FONDAMENTALE**: In TUTTI i moduli Laravel, la directory `app/` è la root del namespace base del modulo.
> Esempio: Per il modulo `Blog`, `app/` è la root di `Modules\Blog\`, per `Tenant` è la root di `Modules\Tenant\`, ecc.

## Struttura del Modulo Predict

## Architettura Generale

### 1. Struttura Directory
```
Modules/
  └── Predict/
      ├── app/
      │   ├── Models/
      │   ├── Actions/
      │   ├── Events/
      │   ├── Projectors/
      │   └── Providers/
      ├── config/
      ├── database/
      ├── resources/
      └── routes/
```

### 2. Service Provider
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

## Tecnologie Utilizzate

### 1. Frontend (TALL Stack)
- **Tailwind CSS**: Sistema di design e styling
- **Alpine.js**: Interazioni JavaScript lato client
- **Laravel**: Framework PHP backend
- **Livewire/Volt**: Componenti dinamici e reattivi

### 2. Componenti Aggiuntivi
- Laravel Folio per il routing
- Laravel Breeze per l'autenticazione
- Filament come admin panel
- Plugin Spatie per funzionalità aggiuntive

### 3. Best Practices Laraxot
- Tipizzazione stretta
- Validazione PHPStan livello 3
- Convenzioni PSR-12
- Event Sourcing con Spatie
- Data Objects per strutture complesse
- Iniezione delle dipendenze
- Gestione esplicita dei valori null

## Regole di Implementazione

### 1. Namespace
- Root: `Modules\Predict`
- Models: `Modules\Predict\Models`
- Actions: `Modules\Predict\Actions`
- Events: `Modules\Predict\Events`
- Projectors: `Modules\Predict\Projectors`

### 2. Modelli
- Estendono il modello Article del modulo Blog
- Utilizzano il trait HasParent per l'ereditarietà polimorfica
- Implementano interfacce specifiche
- Supportano soft deletes e timestamps

### 3. Actions
- Utilizzano Actions per la logica di business
- Implementano QueueableAction per operazioni asincrone
- Seguono il pattern Command per le operazioni di modifica

### 4. Eventi e Projectors
- Utilizzano Spatie Event Sourcing
- Implementano Projectors per la proiezione degli eventi
- Mantengono la coerenza dei dati attraverso gli eventi

## Vantaggi dell'Architettura

1. **Manutenibilità**
   - Struttura chiara e prevedibile
   - Codice organizzato e documentato
   - Facile debugging e testing

2. **Scalabilità**
   - Moduli indipendenti e riutilizzabili
   - Facile aggiunta di nuove funzionalità
   - Performance ottimizzate

3. **Interoperabilità**
   - Integrazione semplice tra moduli
   - API consistenti e ben documentate
   - Supporto per event sourcing

4. **Sviluppo**
   - Onboarding rapido per nuovi sviluppatori
   - Pattern prevedibili
   - Documentazione completa

## Directory Structure

```
Modules/Predict/
├── app/                    # Root namespace: Modules\Predict\
│   ├── Models/            # Namespace: Modules\Predict\Models
│   ├── Actions/           # Namespace: Modules\Predict\Actions
│   ├── Http/             # Controllers e Middleware
│   ├── Providers/        # Service Providers
│   ├── Events/           # Eventi del modulo
│   ├── Listeners/        # Listeners per gli eventi
│   └── ...
├── config/               # Configurazioni
├── database/            # Migrations e Seeders
├── resources/          # Views, assets, lang files
├── routes/             # Route definitions
├── tests/             # Test files
└── composer.json      # PSR-4: "Modules\\Predict\\": "app/"
```

## Namespace e Autoloading

Il modulo utilizza PSR-4 autoloading come definito nel `composer.json`:

```json
{
    "autoload": {
        "psr-4": {
            "Modules\\Predict\\": "app/"
        }
    }
}
```

Questo significa che:
- Tutte le classi DEVONO essere nella directory `app/`
- Il namespace base è `Modules\Predict\`
- Esempio: `app/Models/Predict.php` → `Modules\Predict\Models\Predict`

## Convenzioni Importanti

1. **Directory delle Classi**
   - ✅ CORRETTO: `Modules/Predict/app/Models/Predict.php`
   - ❌ SBAGLIATO: `Modules/Predict/Models/Predict.php`

2. **Namespace**
   - ✅ CORRETTO: `namespace Modules\Predict\Models;`
   - ❌ SBAGLIATO: `namespace Modules\Predict;` (per file in app/Models/)

3. **Struttura PSR-4**
   - Rispettare la struttura definita nel composer.json
   - Mantenere la coerenza tra namespace e path dei file
   - Non creare classi fuori dalla directory `app/`

## Modelli e Relazioni

- Il modello `Predict` estende `Article` e si trova in `app/Models/`
- Gestisce relazioni con Rating, Orders e altri modelli correlati
- Supporta soft deletes e timestamps

## Actions

- Le Actions si trovano in `app/Actions/`
- Implementa QueueableAction per operazioni asincrone
- Segue il pattern Command per le operazioni di modifica

## Eventi e Projectors

- Gli eventi si trovano in `app/Events/`
- I projectors in `app/Projectors/`
- Utilizza Spatie Event Sourcing per la gestione degli eventi

## Validazione e Tipizzazione

- Utilizza strict_types=1
- Implementa tipizzazione completa per metodi e proprietà
- Utilizza Webmozart Assert per validazioni runtime
- Rispetta le regole PHPStan livello 3

## Best Practices

- Segue le convenzioni PSR-12
- Utilizza Data Objects per strutture dati complesse
- Implementa interfacce per il disaccoppiamento
- Preferisce l'iniezione delle dipendenze
- Mantiene tutte le classi nella directory `app/`

## Convenzioni

### Namespace e Directory (Regola Universale per Moduli Laravel)
- La directory `app/` è SEMPRE la root del namespace base di ogni modulo
- Configurazione PSR-4 standard in composer.json di ogni modulo:
  ```json
  "autoload": {
      "psr-4": {
          "Modules\\NomeModulo\\": "app/"
      }
  }
  ```
- Esempi per vari moduli:
  - Modulo Blog:
    - Directory: `Modules/Blog/app/Models/Post.php`
    - Namespace: `Modules\Blog\Models\Post`
  - Modulo Tenant:
    - Directory: `Modules/Tenant/app/Services/TenantManager.php`
    - Namespace: `Modules\Tenant\Services\TenantManager`
  - Modulo Predict:
    - Directory: `Modules/Predict/app/Actions/CreatePrediction.php`
    - Namespace: `Modules\Predict\Actions\CreatePrediction`

### Regole Specifiche per il Modulo Predict
- Base namespace: `Modules\Predict`
- Tutte le classi PHP DEVONO essere nella directory `app/`
- NON includere mai `App` nel namespace delle classi
- Esempio per Predict: 
  - File: `app/Models/Post.php` 
  - Namespace CORRETTO: `Modules\Predict\Models`
  - Namespace ERRATO: `Modules\Predict\App\Models`

### Tipizzazione
- Utilizzare strict typing (`declare(strict_types=1)`)
- Specificare sempre i tipi di ritorno
- Utilizzare type hints per i parametri
- Evitare l'uso di `mixed`

### Data Objects
- Utilizzare Spatie Laravel Data per DTO
- Implementare interfacce per il contratto
- Documentare proprietà con PHPDoc

### Actions
- Preferire QueueableAction a Services
- Seguire il pattern Command
- Implementare interfacce per il disaccoppiamento

### Eventi
- Utilizzare Spatie Event Sourcing
- Implementare Projectors per la consistenza
- Documentare payload degli eventi

### Testing
- Test unitari per Actions e Data Objects
- Test di integrazione per Controllers
- Utilizzare factories per i dati di test

## Best Practices

1. **Dependency Injection**
   - Utilizzare constructor injection
   - Evitare service locator
   - Preferire interfacce a implementazioni concrete

2. **Validazione**
   - Utilizzare Form Requests
   - Implementare Webmozart Assert
   - Validare input a livello di dominio

3. **Documentazione**
   - PHPDoc completo per metodi pubblici
   - README aggiornato per nuove funzionalità
   - Esempi di utilizzo nel codice

4. **Performance**
   - Eager loading per relazioni
   - Caching dove appropriato
   - Query optimization

5. **Sicurezza**
   - Validazione input
   - Autorizzazione con Policies
   - Sanitizzazione output 
