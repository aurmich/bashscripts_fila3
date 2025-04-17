# Modulo Predict

## Struttura Base
Il modulo Predict estende il modulo Blog per la gestione delle previsioni e scommesse. La struttura base del modulo è:

```
laravel/Modules/Predict/
├── app/                    # Directory principale per il codice del modulo
│   ├── Actions/           # Business logic e operazioni complesse
│   ├── Models/            # Modelli Eloquent
│   ├── Events/           # Eventi del dominio
│   ├── Projectors/       # Gestori degli eventi
│   └── Providers/        # Service providers del modulo
├── database/              # Migrazioni e seeders
├── docs/                  # Documentazione del modulo
├── resources/             # Assets e viste
├── routes/                # Definizione delle rotte
└── tests/                 # Test del modulo
```

## Caratteristiche Principali

### Architettura
- Basata su DDD (Domain-Driven Design)
- Event Sourcing per la gestione dello stato
- Code asincrone per operazioni complesse

### Funzionalità Core
- Gestione previsioni e scommesse
- Sistema di rating utenti
- Calcolo punteggi Brier
- Statistiche in tempo reale

### Integrazioni
- Spatie Event Sourcing
- Filament Admin Panel
- Laravel Data
- Queueable Actions

## Configurazione

### Environment
```env
PREDICT_DATABASE_CONNECTION=predict
PREDICT_QUEUE_CONNECTION=database
```

### Requisiti
- PHP 8.3+
- Laravel 11.x
- Redis
- Docker

La documentazione dettagliata del modulo viene mantenuta e aggiornata costantemente nella cartella `docs/` del modulo.

## Convenzioni di Progetto

### Namespace e Struttura dei File
- Il namespace base per ogni modulo è `Modules\NomeModulo`
- Tutte le classi del modulo risiedono nella cartella `app/` del modulo
- Esempi di namespace corretti:
  ```php
  namespace Modules\Predict\Models;        // file in app/Models/User.php
  namespace Modules\Predict\Actions;       // file in app/Actions/CreateUser.php
  namespace Modules\Predict\Events;        // file in app/Events/UserCreated.php
  namespace Modules\Predict\Providers;     // file in app/Providers/PredictServiceProvider.php
  ```

### Struttura delle Directory
- La cartella `app/` contiene tutte le classi PHP del modulo
- Directory standard di Laravel in minuscolo:
  - `resources/` per assets, views, e file di localizzazione
  - `database/` per migrazioni e seeders
  - `routes/` per i file delle rotte
  - `tests/` per i test
  - `docs/` per la documentazione del modulo

### Autoload PSR-4
```json
{
    "autoload": {
        "psr-4": {
            "Modules\\Predict\\": "app/",
            "Modules\\Predict\\Database\\Factories\\": "database/factories/",
            "Modules\\Predict\\Database\\Seeders\\": "database/seeders/"
        }
    }
}
```

### Assets e Vite
- I file JavaScript e CSS devono essere posizionati in `resources/`:
  ```php
  Vite::asset('resources/js/app.js')
  Vite::asset('resources/css/app.css')
  ```
- Non utilizzare mai percorsi con lettere maiuscole (es. `Resources/`)

## Tecnologie Principali
- Laravel 11.x (migrazione a Laravel 12.x in corso)
- PHP 8.3+
- Spatie Event Sourcing
- Spatie Laravel Data
- Spatie QueableActions
- Filament Admin Panel
- PHPStan per analisi statica
- PHPUnit per testing
- Docker per sviluppo

## Struttura del Modulo

### Modelli
- `Predict`: Estende il modello Article e gestisce le previsioni
  - Supporta soft deletes
  - Gestisce relazioni con Rating e Orders
  - Implementa funzionalità di previsione e scommesse
  - Utilizza Spatie Laravel Data per la trasformazione dei dati
  - Compatibile con le nuove funzionalità di Laravel 11/12

### Actions (QueableActions)
- `GetUserRatings`: Recupera le valutazioni dell'utente
- `GetPercsOptionsById`: Calcola le percentuali per le opzioni di previsione
- Implementate come QueableActions per gestione asincrona
- Utilizzano le nuove funzionalità di Laravel 11 per la gestione delle code

### Projectors
- `ArticleProjector`: Gestisce la proiezione degli eventi relativi agli articoli
- Implementa pattern Event Sourcing per la coerenza dei dati
- Ottimizzato per le performance di Laravel 11/12

### Filament Resources
- Gestione delle previsioni tramite pannello amministrativo
- CRUD operations per tutti i modelli
- Filtri e ordinamento personalizzati
- Compatibile con Filament 3.x

## Funzionalità Principali

### Gestione Previsioni
- Creazione e modifica di previsioni
- Calcolo delle percentuali di vittoria
- Gestione delle scommesse
- Sistema di rating integrato
- Utilizzo delle nuove funzionalità di Laravel 11/12

### Sistema di Rating
- Valutazioni degli utenti
- Calcolo dei punteggi Brier
- Gestione del volume di scommesse
- Statistiche in tempo reale
- Ottimizzato per le performance di Laravel 11/12

### Eventi e Projectors
- Utilizzo di Spatie Event Sourcing
- Proiezione degli eventi per mantenere la coerenza dei dati
- Gestione asincrona delle operazioni
- Sistema di replay degli eventi
- Compatibile con il nuovo sistema di eventi di Laravel 11/12

## Best Practices

### Codifica
- Utilizzo di strict_types
- Tipizzazione completa con PHPStan
- Documentazione PHPDoc
- Test unitari e funzionali con PHPUnit
- Code Style con PHP CS Fixer
- Analisi statica con Psalm
- Compatibilità con le nuove funzionalità di Laravel 11/12

### Database
- Migrazioni atomiche
- Indici appropriati
- Relazioni ben definite
- Soft deletes
- Transazioni ACID
- Utilizzo delle nuove funzionalità di query builder di Laravel 11/12

### Eventi
- Eventi atomici
- Projectors idempotenti
- Gestione degli errori
- Logging appropriato
- Sistema di retry per operazioni fallite
- Compatibile con il nuovo sistema di eventi di Laravel 11/12

## Testing
- Test unitari per Actions
- Test funzionali per i flussi di business
- Test di integrazione per gli eventi
- Mocking appropriato
- Test di performance
- Test di sicurezza
- Compatibile con le nuove funzionalità di testing di Laravel 11/12

## Sviluppo

### Requisiti
- PHP 8.3+
- Composer 2.x
- Node.js 18+
- Docker & Docker Compose
- Redis (per cache e sessioni)

### Setup
1. Clonare il repository
# Modulo Predict

## Struttura Base
Il modulo Predict estende il modulo Blog per la gestione delle previsioni e scommesse. La struttura base del modulo è:

```
laravel/Modules/Predict/
├── app/                    # Directory principale per il codice del modulo
│   ├── Actions/           # Business logic e operazioni complesse
│   ├── Models/            # Modelli Eloquent
│   ├── Events/           # Eventi del dominio
│   ├── Projectors/       # Gestori degli eventi
│   └── Providers/        # Service providers del modulo
├── database/              # Migrazioni e seeders
├── docs/                  # Documentazione del modulo
├── resources/             # Assets e viste
├── routes/                # Definizione delle rotte
└── tests/                 # Test del modulo
```

## Caratteristiche Principali

### Architettura
- Basata su DDD (Domain-Driven Design)
- Event Sourcing per la gestione dello stato
- Code asincrone per operazioni complesse

### Funzionalità Core
- Gestione previsioni e scommesse
- Sistema di rating utenti
- Calcolo punteggi Brier
- Statistiche in tempo reale

### Integrazioni
- Spatie Event Sourcing
- Filament Admin Panel
- Laravel Data
- Queueable Actions

## Configurazione

### Environment
```env
PREDICT_DATABASE_CONNECTION=predict
PREDICT_QUEUE_CONNECTION=database
```

### Requisiti
- PHP 8.3+
- Laravel 11.x
- Redis
- Docker

La documentazione dettagliata del modulo viene mantenuta e aggiornata costantemente nella cartella `docs/` del modulo.

## Convenzioni di Progetto

### Namespace e Struttura dei File
- Il namespace base per ogni modulo è `Modules\NomeModulo`
- Tutte le classi del modulo risiedono nella cartella `app/` del modulo
- Esempi di namespace corretti:
  ```php
  namespace Modules\Predict\Models;        // file in app/Models/User.php
  namespace Modules\Predict\Actions;       // file in app/Actions/CreateUser.php
  namespace Modules\Predict\Events;        // file in app/Events/UserCreated.php
  namespace Modules\Predict\Providers;     // file in app/Providers/PredictServiceProvider.php
  ```

### Struttura delle Directory
- La cartella `app/` contiene tutte le classi PHP del modulo
- Directory standard di Laravel in minuscolo:
  - `resources/` per assets, views, e file di localizzazione
  - `database/` per migrazioni e seeders
  - `routes/` per i file delle rotte
  - `tests/` per i test
  - `docs/` per la documentazione del modulo

### Autoload PSR-4
```json
{
    "autoload": {
        "psr-4": {
            "Modules\\Predict\\": "app/",
            "Modules\\Predict\\Database\\Factories\\": "database/factories/",
            "Modules\\Predict\\Database\\Seeders\\": "database/seeders/"
        }
    }
}
```

### Assets e Vite
- I file JavaScript e CSS devono essere posizionati in `resources/`:
  ```php
  Vite::asset('resources/js/app.js')
  Vite::asset('resources/css/app.css')
  ```
- Non utilizzare mai percorsi con lettere maiuscole (es. `Resources/`)

## Tecnologie Principali
- Laravel 11.x (migrazione a Laravel 12.x in corso)
- PHP 8.3+
- Spatie Event Sourcing
- Spatie Laravel Data
- Spatie QueableActions
- Filament Admin Panel
- PHPStan per analisi statica
- PHPUnit per testing
- Docker per sviluppo

## Struttura del Modulo

### Modelli
- `Predict`: Estende il modello Article e gestisce le previsioni
  - Supporta soft deletes
  - Gestisce relazioni con Rating e Orders
  - Implementa funzionalità di previsione e scommesse
  - Utilizza Spatie Laravel Data per la trasformazione dei dati
  - Compatibile con le nuove funzionalità di Laravel 11/12

### Actions (QueableActions)
- `GetUserRatings`: Recupera le valutazioni dell'utente
- `GetPercsOptionsById`: Calcola le percentuali per le opzioni di previsione
- Implementate come QueableActions per gestione asincrona
- Utilizzano le nuove funzionalità di Laravel 11 per la gestione delle code

### Projectors
- `ArticleProjector`: Gestisce la proiezione degli eventi relativi agli articoli
- Implementa pattern Event Sourcing per la coerenza dei dati
- Ottimizzato per le performance di Laravel 11/12

### Filament Resources
- Gestione delle previsioni tramite pannello amministrativo
- CRUD operations per tutti i modelli
- Filtri e ordinamento personalizzati
- Compatibile con Filament 3.x

## Funzionalità Principali

### Gestione Previsioni
- Creazione e modifica di previsioni
- Calcolo delle percentuali di vittoria
- Gestione delle scommesse
- Sistema di rating integrato
- Utilizzo delle nuove funzionalità di Laravel 11/12

### Sistema di Rating
- Valutazioni degli utenti
- Calcolo dei punteggi Brier
- Gestione del volume di scommesse
- Statistiche in tempo reale
- Ottimizzato per le performance di Laravel 11/12

### Eventi e Projectors
- Utilizzo di Spatie Event Sourcing
- Proiezione degli eventi per mantenere la coerenza dei dati
- Gestione asincrona delle operazioni
- Sistema di replay degli eventi
- Compatibile con il nuovo sistema di eventi di Laravel 11/12

## Best Practices

### Codifica
- Utilizzo di strict_types
- Tipizzazione completa con PHPStan
- Documentazione PHPDoc
- Test unitari e funzionali con PHPUnit
- Code Style con PHP CS Fixer
- Analisi statica con Psalm
- Compatibilità con le nuove funzionalità di Laravel 11/12

### Database
- Migrazioni atomiche
- Indici appropriati
- Relazioni ben definite
- Soft deletes
- Transazioni ACID
- Utilizzo delle nuove funzionalità di query builder di Laravel 11/12

### Eventi
- Eventi atomici
- Projectors idempotenti
- Gestione degli errori
- Logging appropriato
- Sistema di retry per operazioni fallite
- Compatibile con il nuovo sistema di eventi di Laravel 11/12

## Testing
- Test unitari per Actions
- Test funzionali per i flussi di business
- Test di integrazione per gli eventi
- Mocking appropriato
- Test di performance
- Test di sicurezza
- Compatibile con le nuove funzionalità di testing di Laravel 11/12

## Sviluppo

### Requisiti
- PHP 8.3+
- Composer 2.x
- Node.js 18+
- Docker & Docker Compose
- Redis (per cache e sessioni)

### Setup
1. Clonare il repository
2. Copiare `.env.example` in `.env`