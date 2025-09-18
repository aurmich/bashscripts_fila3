# Struttura Corretta delle Directory nei Moduli Laraxot PTVX

Questo documento definisce la struttura corretta delle directory all'interno dei moduli del framework Laraxot PTVX.

## Regola Fondamentale

**Tutto il codice PHP deve essere posizionato all'interno della directory `app` del modulo.**

## Struttura Corretta di un Modulo

```
Modules/NomeModulo/
├── app/                         # Contiene tutto il codice PHP del modulo
│   ├── Actions/                 # Azioni (QueueableAction)
│   ├── Console/                 # Comandi Artisan
│   │   └── Commands/
│   ├── Datas/                   # Data Objects (Spatie Laravel Data)
│   ├── Enums/                   # Classi Enum
│   ├── Events/                  # Eventi
│   ├── Exceptions/              # Eccezioni personalizzate
│   ├── Filament/               
│   │   ├── Pages/
│   │   └── Resources/
│   ├── Http/                    
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Listeners/               # Ascoltatori di eventi
│   ├── Models/                  # Modelli Eloquent
│   │   └── Traits/              # Traits specifici per i modelli
│   ├── Notifications/           # Notifiche
│   ├── Policies/                # Policies
│   ├── Providers/               # Service Providers
│   └── View/                    # Logica delle viste
│       └── Components/          # View Components
├── config/                      # File di configurazione
├── database/                    # Migrazioni, seeder e factories
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── docs/                        # Documentazione
├── resources/                   # Risorse frontend
│   ├── js/
│   ├── lang/
│   └── views/
└── routes/                      # Route del modulo
    ├── api.php
    └── web.php
```

## ❌ Errori Comuni da Evitare

### 1. Posizionamento diretto nella cartella del modulo

**ERRATO:**
```
Modules/Rating/Enums/SupportedLocale.php
```

**CORRETTO:**
```
Modules/Rating/app/Enums/SupportedLocale.php
```

### 2. Posizionamento diretto dei controller

**ERRATO:**
```
Modules/Rating/Http/Controllers/RatingController.php
```

**CORRETTO:**
```
Modules/Rating/app/Http/Controllers/RatingController.php
```

## Relazione tra Directory Fisica e Namespace

| Directory fisica corretta                  | Namespace                           |
|-------------------------------------------|-------------------------------------|
| `Modules/Rating/app/Models/`              | `Modules\Rating\Models`             |
| `Modules/Rating/app/Http/Controllers/`    | `Modules\Rating\Http\Controllers`   |
| `Modules/Rating/app/Datas/`               | `Modules\Rating\Datas`              |
| `Modules/Rating/app/Actions/`             | `Modules\Rating\Actions`            |
| `Modules/Rating/app/Enums/`               | `Modules\Rating\Enums`              |

## Verifica della Struttura

Prima di eseguire PHPStan, verificare che tutti i file siano nella directory corretta con:

```bash
find Modules/NomeModulo -type f -name "*.php" | grep -v "/app/" | grep -v "/config/" | grep -v "/database/" | grep -v "/routes/" | grep -v "/resources/" | grep -v "/docs/"
```

Qualsiasi file PHP risultante da questo comando è posizionato erroneamente e deve essere spostato nella directory `app` appropriata.

## Correzione Automatica

Per spostare automaticamente i file PHP nella directory corretta, utilizzare il comando:

```bash
#!/bin/bash
MODULE="NomeModulo"
find "Modules/$MODULE" -type f -name "*.php" | grep -v "/app/" | grep -v "/config/" | grep -v "/database/" | grep -v "/routes/" | grep -v "/resources/" | grep -v "/docs/" | while read file; do
    # Estrai il percorso relativo dopo Modules/NomeModulo/
    rel_path=$(echo "$file" | sed "s|Modules/$MODULE/||")
    
    # Ignora config, database, routes, resources e docs
    if [[ "$rel_path" == config/* ]] || [[ "$rel_path" == database/* ]] || [[ "$rel_path" == routes/* ]] || [[ "$rel_path" == resources/* ]] || [[ "$rel_path" == docs/* ]]; then
        continue
    fi
    
    # Crea il nuovo percorso
    new_path="Modules/$MODULE/app/$rel_path"
    
    # Crea la directory se non esiste
    mkdir -p "$(dirname "$new_path")"
    
    # Sposta il file
    mv "$file" "$new_path"
    echo "Spostato: $file -> $new_path"
done
```

## Importanza della Corretta Struttura

1. **Compatibilità con Laravel**: La struttura standard di Laravel prevede che tutto il codice sia nella directory `app`.
2. **Autoloading**: Il PSR-4 autoloading è configurato per cercare le classi nella directory `app`.
3. **Coerenza**: Mantenere tutti i moduli con la stessa struttura facilita la navigazione e la manutenzione.
4. **Compatibilità con PHPStan**: Una struttura coerente facilita l'analisi di PHPStan e riduce gli errori. 