# Struttura delle Directory nel Progetto PTVX

## Principi Architetturali

**IMPORTANTE**: Nel progetto PTVX, l'architettura dei moduli segue principi specifici che bilanciano la modularità con la facilità di manutenzione.

### Il Principio di Separazione Namespace-Filesystem

Esiste una distinzione fondamentale tra **namespace** e **struttura fisica delle directory** che riflette la filosofia di Laravel ma con una personalizzazione specifica per i moduli:

- I **namespace** offrono una vista logica del codice
- La **struttura filesystem** organizza fisicamente i file

Questa separazione permette una migliore organizzazione del codice mantenendo la compatibilità con gli strumenti di analisi statica.

## Struttura Modulare: La Chiave per un Sistema Scalabile

I moduli nel progetto PTVX sono progettati come entità semi-autonome, con una struttura che favorisce la chiarezza e mantiene la separazione delle responsabilità.

### Aree Principali di un Modulo

**1. Core del Modulo (`app/`)**
- Questa è la sede del codice PHP principale che implementa la logica di business
- Contiene classi strutturate secondo il principio di "responsabilità unica"
- Sebbene fisicamente presente nella directory `app/`, concettualmente questi file non portano il prefisso `app` nel loro namespace

**2. Risorse e Configurazione (directory a livello root)**
- `lang/`: Traduzioni e localizzazioni (NOTA: direttamente nella root del modulo, NON in app/)
- `config/`: Configurazioni specifiche del modulo
- `routes/`: Definizioni delle rotte (API e web)
- `docs/`: Documentazione specifica del modulo

**3. Frontend e Templates**
- `resources/`: Assets frontend, stylesheet, e templates
- `resources/views/`: Template Blade
- `resources/js/`: Script JavaScript

**4. Database**
- `database/migrations/`: Evoluzione dello schema database
- `database/factories/`: Creazione di dati fittizi per test
- `database/seeders/`: Popolamento iniziale del database

## Linee Guida Fondamentali

### La Regola del Namespace

Il principio più importante è che **il namespace OMETTE il segmento `app`** quando si riferisce a classi nella directory `app/`. Questo crea una discrepanza intenzionale tra il filesystem e la struttura del namespace:

```php
// Il file si trova in: /Modules/Rating/app/Models/Rating.php
// Ma il namespace è:
namespace Modules\Rating\Models;
```

Questo approccio garantisce:
- Namespace più puliti e leggibili
- Compatibilità con gli strumenti di analisi statica come PHPStan
- Coerenza in tutto il progetto

### Posizionamento delle Risorse di Localizzazione

Le traduzioni devono essere posizionate **direttamente nella cartella del modulo**:

```
/Modules/Rating/lang/    <-- CORRETTO
```

NON in:
```
/Modules/Rating/app/lang/    <-- ERRATO
/Modules/Rating/resources/lang/    <-- ERRATO
```

### Evoluzione Architetturale

- **Pattern Moderni**: Utilizzare Spatie Laravel Data per i DTO e QueueableActions anziché Service classes
- **Superamento dei Pattern Legacy**: Migrare progressivamente da `DataObjects` a `Datas` e da `Services` a `Actions`
- **Type Safety**: Adottare la tipizzazione rigorosa e le enumerazioni PHP 8.1+ per garantire la compatibilità con PHPStan livello 9
