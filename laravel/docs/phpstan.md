# Guida Completa a PHPStan nel Progetto PTVX

## Introduzione

Questo documento fornisce linee guida complete per l'utilizzo di PHPStan nel progetto PTVX, con particolare attenzione al livello 9 (il più rigoroso).

## Installazione e Configurazione

PHPStan è già installato come dipendenza di sviluppo nel progetto. La configurazione si trova nel file `phpstan.neon` nella directory principale di Laravel.

## Esecuzione di PHPStan

### Comando Base

PHPStan deve **sempre** essere eseguito dalla directory principale di Laravel:

```bash
cd /var/www/html/_bases/base_ptvx_fila3/laravel
./vendor/bin/phpstan analyse -l 9 [percorso/al/modulo]
```

### Esempi di Comandi

1. Analizzare un singolo modulo:
   ```bash
   ./vendor/bin/phpstan analyse -l 9 Modules/Rating
   ```

2. Analizzare più moduli:
   ```bash
   ./vendor/bin/phpstan analyse -l 9 Modules/Rating Modules/User Modules/Notify
   ```

3. Analizzare tutti i moduli con memoria aumentata:
   ```bash
   php -d memory_limit=2G ./vendor/bin/phpstan analyse -l 9 Modules/*
   ```

4. Eseguire analisi con output dettagliato:
   ```bash
   ./vendor/bin/phpstan analyse -l 9 --error-format=table Modules/Rating
   ```

## Opzioni Comuni

- `-l 9` : Imposta il livello di analisi a 9 (massimo rigore)
- `--memory-limit=2G` : Aumenta il limite di memoria (fondamentale per analisi di progetti grandi)
- `--error-format=table` : Formatta l'output in una tabella leggibile
- `--debug` : Mostra informazioni di debug aggiuntive
- `--no-progress` : Disattiva la barra di avanzamento (utile in CI/CD)

## Architettura Modulare e PHPStan

La struttura architetturale del progetto influenza direttamente l'efficacia dell'analisi PHPStan. Una comprensione chiara dei principi organizzativi è fondamentale.

### Il Principio di Separazione Namespace-Directory

Il progetto adotta una distinzione intenzionale tra struttura fisica delle directory e organizzazione dei namespace. Questo dualismo ottimizza sia l'organizzazione del codice che l'analisi statica:

1. **Organizzazione Logica**: Il namespace di una classe riflette la sua posizione nel dominio logico dell'applicazione
2. **Organizzazione Fisica**: La posizione di un file nel filesystem segue convenzioni che facilitano la navigazione e la manutenzione

### La Regola del Namespace

L'aspetto più importante da comprendere è che il segmento `app` è parte della struttura filesystem ma **non** del namespace. Questa distinzione permette una maggiore chiarezza semantica nei riferimenti tra classi.

### Posizionamento di Directory Speciali

| Tipo di File | Posizione Corretta | Note |
|--------------|--------------------|--------------|
| Codice PHP   | `Modules/Rating/app/...` | Tutto il codice PHP va nella directory `app/` |
| Traduzioni   | `Modules/Rating/lang/` | Le traduzioni vanno direttamente nella directory `lang/` a livello root |
| Configurazioni | `Modules/Rating/config/` | I file di configurazione vanno nella directory `config/` a livello root |

Per dettagli completi sull'organizzazione delle directory, consulta il documento `docs/directory_structure.md`.

## Risoluzione dei Problemi

### Errore: "No files found to analyse"

Cause possibili:
- Percorso errato al modulo
- Directory vuota o senza file PHP
- **File PHP posizionati in directory errate** (es. fuori da `app/`)
- Problemi di permessi

Soluzione:
1. Verificare il percorso corretto
2. Verificare che i file PHP siano nella directory `app/` del modulo
3. Verificare che il namespace sia corretto (senza segmento `app`)
4. Controllare i permessi dei file

### Errore: "Memory limit reached"

Questo errore si verifica quando PHPStan esaurisce la memoria allocata.

Soluzione:
```bash
php -d memory_limit=2G ./vendor/bin/phpstan analyse -l 9 Modules/Rating
```

### Errori di Namespace

Se ricevi errori relativi a namespace non trovati:
1. Assicurati che i namespace seguano la convenzione `Modules\NomeModulo\...` (senza segmento `app`)
2. Verifica che tutte le dipendenze siano correttamente importate
3. Controlla la configurazione degli autoload in `composer.json`

## Best Practices per Superare l'Analisi PHPStan Livello 9

### 1. Tipizzazione Rigorosa

- Aggiungi `declare(strict_types=1);` all'inizio di ogni file
- Specifica sempre i tipi di ritorno delle funzioni
- Usa tipi precisi per i parametri
- Evita generics mal specificati

```php
// ❌ Incompleto
function getItems(): array

// ✅ Completo
function getItems(): array<int, Item>
```

### 2. Gestione dei Tipi Mixed

- Mai fare cast diretti di tipi `mixed`
- Usa controlli di tipo espliciti prima di operazioni

```php
// ❌ Errato
$title = (string)$data['title'];

// ✅ Corretto
$title = is_string($data['title'] ?? '') 
    ? $data['title'] 
    : (is_scalar($data['title'] ?? '') ? (string)$data['title'] : '');
```

### 3. Documentazione di Codice

- Fornisci annotazioni PHPDoc complete per proprietà e metodi
- Documenta tutti i parametri generici nelle relazioni Eloquent

```php
/**
 * @return BelongsToMany<User, Role>
 */
public function users(): BelongsToMany
```

### 4. Gestione degli Array

- Usa `list<string>` per array numerici sequenziali
- Usa `array<string, mixed>` per array associativi
- Specifica chiavi stringa negli array Filament

```php
// ✅ Corretto per Filament
public function getFormSchema(): array
{
    return [
        'title' => TextInput::make('title')->required(),
        'body' => Textarea::make('body'),
    ];
}
```

## Automazione e CI/CD

Per integrare PHPStan nei workflow CI/CD:

```yaml
# Esempio per GitHub Actions
phpstan:
  runs-on: ubuntu-latest
  steps:
    - uses: actions/checkout@v2
    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.1'
        tools: composer:v2
    - name: Install dependencies
      run: composer install
    - name: Run PHPStan
      run: php -d memory_limit=2G ./vendor/bin/phpstan analyse -l 9 --no-progress --error-format=github Modules/*
```

## Conclusione

L'utilizzo corretto di PHPStan a livello 9 garantisce un codice più robusto, tipo-sicuro e meno soggetto a errori runtime. Seguendo le linee guida in questo documento, si contribuisce significativamente alla qualità complessiva del codice nel progetto PTVX.
