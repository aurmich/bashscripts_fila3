# Analisi delle Colonne della Tabella IndividualePesi

## Problema Identificato

Nel file `ListIndividualePesis.php` sono presenti i seguenti campi che non esistono nel modello `IndividualePesi`:

1. `name`
2. `field_name`
3. `op`
4. `value`

Questi campi sembrano essere stati erroneamente copiati da un'altra risorsa.

## Campi Effettivi nel Modello

Il modello `IndividualePesi` ha i seguenti campi:

1. `id` (int)
2. `type` (WorkerType)
3. `lista_propro` (string)
4. `descr` (string)
5. `peso_esperienza_acquisita` (float)
6. `peso_risultati_ottenuti` (float)
7. `peso_arricchimento_professionale` (float)
8. `peso_impegno` (float)
9. `peso_qualita_prestazione` (float)
10. `anno` (int)
11. `created_at` (Carbon)
12. `updated_at` (Carbon)
13. `created_by` (string)
14. `updated_by` (string)

## Correzione Proposta

Il metodo `getListTableColumns()` dovrebbe essere aggiornato per mostrare solo i campi effettivamente presenti nel modello. Ecco la correzione:

```php
public function getListTableColumns(): array
{
    return [
        'type' => Columns\TextColumn::make('type')
            ->label('Tipo')
            ->searchable()
            ->sortable()
            ->badge(),
        'lista_propro' => Columns\TextColumn::make('lista_propro')
            ->label('Lista ProPro')
            ->searchable()
            ->sortable()
            ->wrap(),
        'descr' => Columns\TextColumn::make('descr')
            ->label('Descrizione')
            ->searchable()
            ->sortable(),
        'peso_esperienza_acquisita' => Columns\TextColumn::make('peso_esperienza_acquisita')
            ->label('Peso Esperienza Acquisita')
            ->numeric()
            ->sortable(),
        'peso_risultati_ottenuti' => Columns\TextColumn::make('peso_risultati_ottenuti')
            ->label('Peso Risultati Ottenuti')
            ->numeric()
            ->sortable(),
        'peso_arricchimento_professionale' => Columns\TextColumn::make('peso_arricchimento_professionale')
            ->label('Peso Arricchimento Professionale')
            ->numeric()
            ->sortable(),
        'peso_impegno' => Columns\TextColumn::make('peso_impegno')
            ->label('Peso Impegno')
            ->numeric()
            ->sortable(),
        'peso_qualita_prestazione' => Columns\TextColumn::make('peso_qualita_prestazione')
            ->label('Peso Qualità Prestazione')
            ->numeric()
            ->sortable(),
        'anno' => Columns\TextColumn::make('anno')
            ->label('Anno')
            ->numeric()
            ->sortable(),
        'created_at' => Columns\TextColumn::make('created_at')
            ->label('Data Creazione')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
        'updated_at' => Columns\TextColumn::make('updated_at')
            ->label('Ultima Modifica')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
        'created_by' => Columns\TextColumn::make('created_by')
            ->label('Creato da')
            ->searchable()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
        'updated_by' => Columns\TextColumn::make('updated_by')
            ->label('Modificato da')
            ->searchable()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
    ];
}
```

## Note Aggiuntive

1. Tutti i campi numerici sono correttamente tipizzati come `float` nel modello
2. Il campo `type` è correttamente castato all'enum `WorkerType`
3. I campi di timestamp sono correttamente castati a `Carbon`
4. I campi `created_by` e `updated_by` sono correttamente tipizzati come `string`
5. La tabella include tutti i campi necessari per il funzionamento del sistema di performance

# Analisi delle Colonne delle Tabelle Performance

## Metodologia di Analisi

Per ogni classe che estende `XotBaseListRecords`, seguiremo questi passaggi:

1. Identificare il modello associato
2. Analizzare la migrazione del modello
3. Confrontare i campi definiti in `getListTableColumns` con quelli effettivamente presenti
4. Verificare se ci sono più di 3 campi non esistenti
5. Proporre una correzione se necessario

## Classi da Analizzare

### 1. ListIndividualePesis

#### Modello Associato
- `IndividualePesi`
- Tabella: `peso_performance_individuale`

#### Campi nella Migrazione
```sql
- id (bigint)
- type (varchar)
- lista_propro (varchar)
- descr (text)
- peso_esperienza_acquisita (decimal)
- peso_risultati_ottenuti (decimal)
- peso_arricchimento_professionale (decimal)
- peso_impegno (decimal)
- peso_qualita_prestazione (decimal)
- anno (year)
- created_at (timestamp)
- updated_at (timestamp)
- created_by (varchar)
- updated_by (varchar)
```

#### Campi Attualmente Mostrati
```php
- type
- lista_propro
- descr
- peso_esperienza_acquisita
- peso_risultati_ottenuti
- peso_arricchimento_professionale
- peso_impegno
- peso_qualita_prestazione
- anno
- created_at
- updated_at
```

#### Analisi
- Tutti i campi mostrati esistono nel modello
- Non ci sono campi non esistenti
- La visualizzazione è corretta

### 2. ListIndividualePoPesis

#### Modello Associato
- `IndividualePoPesi`
- Tabella: `peso_performance_po`

#### Campi nella Migrazione
```sql
- id (bigint)
- type (varchar)
- lista_propro (varchar)
- descr (text)
- peso_esperienza_acquisita (decimal)
- peso_risultati_ottenuti (decimal)
- peso_arricchimento_professionale (decimal)
- peso_impegno (decimal)
- peso_qualita_prestazione (decimal)
- anno (year)
- created_at (timestamp)
- updated_at (timestamp)
- created_by (varchar)
- updated_by (varchar)
```

#### Campi Attualmente Mostrati
```php
- type
- lista_propro
- descr
- peso_esperienza_acquisita
- peso_risultati_ottenuti
- peso_arricchimento_professionale
- peso_impegno
- peso_qualita_prestazione
- anno
- created_at
- updated_at
```

#### Analisi
- Tutti i campi mostrati esistono nel modello
- Non ci sono campi non esistenti
- La visualizzazione è corretta

### 3. ListIndividualeRegionalePesis

#### Modello Associato
- `IndividualeRegionalePesi`
- Tabella: `peso_performance_regionale`

#### Campi nella Migrazione
```sql
- id (bigint)
- type (varchar)
- lista_propro (varchar)
- descr (text)
- peso_esperienza_acquisita (decimal)
- peso_risultati_ottenuti (decimal)
- peso_arricchimento_professionale (decimal)
- peso_impegno (decimal)
- peso_qualita_prestazione (decimal)
- anno (year)
- created_at (timestamp)
- updated_at (timestamp)
- created_by (varchar)
- updated_by (varchar)
```

#### Campi Attualmente Mostrati
```php
- type
- lista_propro
- descr
- peso_esperienza_acquisita
- peso_risultati_ottenuti
- peso_arricchimento_professionale
- peso_impegno
- peso_qualita_prestazione
- anno
- created_at
- updated_at
```

#### Analisi
- Tutti i campi mostrati esistono nel modello
- Non ci sono campi non esistenti
- La visualizzazione è corretta

### 4. ListIndividualeAdmPesis

#### Modello Associato
- `IndividualeAdmPesi`
- Tabella: `peso_performance_adm`

#### Campi nella Migrazione
```sql
- id (bigint)
- type (varchar)
- lista_propro (varchar)
- descr (text)
- peso_esperienza_acquisita (decimal)
- peso_risultati_ottenuti (decimal)
- peso_arricchimento_professionale (decimal)
- peso_impegno (decimal)
- peso_qualita_prestazione (decimal)
- anno (year)
- created_at (timestamp)
- updated_at (timestamp)
- created_by (varchar)
- updated_by (varchar)
```

#### Campi Attualmente Mostrati
```php
- type
- lista_propro
- descr
- peso_esperienza_acquisita
- peso_risultati_ottenuti
- peso_arricchimento_professionale
- peso_impegno
- peso_qualita_prestazione
- anno
- created_at
- updated_at
```

#### Analisi
- Tutti i campi mostrati esistono nel modello
- Non ci sono campi non esistenti
- La visualizzazione è corretta

## Conclusioni

Dopo l'analisi di tutte le classi che estendono `XotBaseListRecords` nel modulo Performance, possiamo concludere che:

1. Tutte le classi mostrano campi che esistono effettivamente nei modelli associati
2. Non ci sono casi di campi non esistenti che superano la soglia di 3
3. La struttura delle tabelle è coerente tra modelli e migrazioni
4. Le visualizzazioni sono appropriate per il contesto di utilizzo

Non sono necessarie correzioni al metodo `getListTableColumns` in nessuna delle classi analizzate.

# Analisi delle Colonne delle Tabelle nel Modulo Performance

## Metodologia di Analisi

1. Identificazione delle classi che estendono `XotBaseListRecords`
2. Analisi del modello associato per verificare i campi effettivi
3. Confronto tra i campi in `getListTableColumns()` e i campi effettivi del modello
4. Verifica della presenza di campi non esistenti
5. Verifica delle convenzioni di naming e best practices

## Regole e Best Practices

1. **Naming delle Chiavi**:
   - Utilizzare nomi descrittivi e univoci
   - Evitare abbreviazioni non standard
   - Seguire le convenzioni di Laravel per i nomi delle colonne

2. **Gestione delle Traduzioni**:
   - Non utilizzare mai `->label()` esplicitamente
   - I label vengono gestiti automaticamente dal LangServiceProvider
   - Le traduzioni devono essere definite nei file di lingua appropriati

3. **Tipizzazione**:
   - Utilizzare tipi appropriati per ogni colonna (numeric, dateTime, etc.)
   - Specificare correttamente i tipi di ritorno nei metodi

4. **Funzionalità delle Colonne**:
   - Abilitare searchable e sortable solo quando appropriato
   - Utilizzare toggleable per colonne secondarie
   - Implementare wrap per contenuti lunghi

5. **Filtri e Azioni**:
   - Implementare filtri appropriati per i campi principali
   - Utilizzare azioni bulk quando necessario
   - Evitare azioni duplicate o ridondanti

## Analisi delle Classi

### ListIndividualePesis

**Modello Associato**: `IndividualePesi`

**Campi nel Modello**:
- type (WorkerType)
- lista_propro (string)
- descr (string)
- peso_esperienza_acquisita (float)
- peso_risultati_ottenuti (float)
- peso_arricchimento_professionale (float)
- peso_impegno (float)
- peso_qualita_prestazione (float)
- anno (int)
- created_at (Carbon)
- updated_at (Carbon)
- created_by (string)
- updated_by (string)

**Campi Attualmente Visualizzati**:
- type
- lista_propro
- descr
- peso_esperienza_acquisita
- peso_risultati_ottenuti
- peso_arricchimento_professionale
- peso_impegno
- peso_qualita_prestazione
- anno
- created_at
- updated_at
- created_by
- updated_by

**Analisi**:
- Tutti i campi visualizzati esistono nel modello
- I tipi sono correttamente specificati
- Non ci sono campi non esistenti
- Le traduzioni sono gestite correttamente

### ListCriteriValutaziones

**Modello Associato**: `CriteriValutazione`

**Campi nel Modello**:
- id_padre (int)
- nome (string)
- label (string)
- descr (string)
- post_type (string)
- posizione (int)
- anno (int)
- created_at (Carbon)
- updated_at (Carbon)

**Campi Attualmente Visualizzati**:
- id_padre
- nome
- label
- descr
- post_type
- posizione
- anno
- created_at
- updated_at

**Analisi**:
- Tutti i campi visualizzati esistono nel modello
- I tipi sono correttamente specificati
- Non ci sono campi non esistenti
- Le traduzioni sono gestite correttamente

### ListCriteriEsclusiones

**Modello Associato**: `CriteriEsclusione`

**Campi nel Modello**:
- name (string)
- field_name (string)
- op (string)
- value (string)
- anno (int)
- created_at (Carbon)
- updated_at (Carbon)

**Campi Attualmente Visualizzati**:
- name
- field_name
- op
- value
- anno
- created_at
- updated_at

**Analisi**:
- Tutti i campi visualizzati esistono nel modello
- I tipi sono correttamente specificati
- Non ci sono campi non esistenti
- Le traduzioni sono gestite correttamente

### ListIndividualeAdms

**Modello Associato**: `IndividualeAdm`

**Campi nel Modello**:
- matr (string)
- cognome (string)
- nome (string)
- email (string)
- stabi_txt (string)
- repar_txt (string)
- disci_txt (string)
- categoria_eco (string)
- anno (int)
- totale_punteggio (float)
- created_at (Carbon)
- updated_at (Carbon)

**Campi Attualmente Visualizzati**:
- matr
- cognome
- nome
- email
- stabi_txt
- repar_txt
- disci_txt
- categoria_eco
- anno
- totale_punteggio
- created_at
- updated_at

**Analisi**:
- Tutti i campi visualizzati esistono nel modello
- I tipi sono correttamente specificati
- Non ci sono campi non esistenti
- Le traduzioni sono gestite correttamente

## Conclusioni

1. Tutte le classi analizzate seguono correttamente le convenzioni di naming
2. I campi visualizzati corrispondono a quelli effettivamente presenti nei modelli
3. Le traduzioni sono gestite correttamente attraverso il LangServiceProvider
4. Non sono necessarie correzioni per i campi non esistenti
5. Le best practices sono rispettate in tutte le classi analizzate

## Raccomandazioni

1. Mantenere la coerenza nella gestione delle traduzioni
2. Continuare a seguire le convenzioni di naming stabilite
3. Verificare regolarmente la corrispondenza tra campi visualizzati e modello
4. Aggiornare la documentazione quando vengono apportate modifiche significative

## ListMyLogs

### Modello Associato
- **Nome**: `MyLog`
- **Namespace**: `Modules\Performance\Models\MyLog`
- **Campi Effettivi**:
  - `id` (int)
  - `id_tbl` (int)
  - `tbl` (string)
  - `id_approvaz` (int)
  - `note` (string)
  - `data` (string)
  - `datemod` (string)
  - `handle` (string)
  - `created_at` (Carbon)
  - `updated_at` (Carbon)
  - `created_by` (string)
  - `updated_by` (string)

### Analisi
- **Campi Visualizzati**: Tutti i campi visualizzati esistono nel modello
- **Correzioni Effettuate**:
  - Rimossi i campi non esistenti: `name`, `field_name`, `op`, `value`, `anno`
  - Aggiunti i campi mancanti: `id`, `id_tbl`, `tbl`, `id_approvaz`, `note`, `data`, `datemod`, `handle`, `created_by`, `updated_by`
  - Aggiornati i filtri per riflettere i campi effettivi
  - Aggiunto `wrap()` per il campo `note` per gestire testi lunghi
  - Impostato `numeric()` per i campi ID
  - Impostato `dateTime()` per i campi timestamp
  - Impostato `toggleable(isToggledHiddenByDefault: true)` per i campi secondari

### Note
- Il modello è utilizzato per il logging delle azioni in vari moduli
- I campi `created_by` e `updated_by` sono gestiti automaticamente
- Il campo `data` contiene dati serializzati
- I campi timestamp sono gestiti come Carbon

## Best Practices per le Azioni Bulk della Tabella

### Azioni Bulk Standard
- Non è necessario definire il metodo `getTableBulkActions()` quando contiene solo l'azione standard di eliminazione
- L'azione di eliminazione bulk è già gestita automaticamente dalla classe padre `XotBaseListRecords`
- Il metodo `getTableBulkActions()` deve essere definito solo quando:
  - Si aggiungono azioni bulk personalizzate
  - Si modificano le azioni bulk standard
  - Si rimuovono azioni bulk standard

### Esempio di Implementazione
```php
// ❌ Non necessario - contiene solo azione standard di eliminazione
public function getTableBulkActions(): array
{
    return [
        Actions\DeleteBulkAction::make(),
    ];
}

// ✅ Necessario - contiene azioni bulk personalizzate
public function getTableBulkActions(): array
{
    return [
        'custom' => Actions\BulkAction::make('custom')
            ->action(fn () => // ...),
        'delete' => Actions\DeleteBulkAction::make(),
    ];
}
```

## Struttura dei Namespace per le Colonne Personalizzate

### Namespace Corretto
- Le colonne personalizzate devono essere definite nel namespace `Modules\Ptv\Filament\Columns`
- Il namespace NON deve includere `app` anche se il file è fisicamente nella cartella `app`
- Questo segue la convenzione standard di Laravel per i namespace dei moduli

### Esempio di Implementazione
```php
// ❌ Namespace errato
namespace Modules\Ptv\app\Filament\Columns;

// ✅ Namespace corretto
namespace Modules\Ptv\Filament\Columns;

class CustomColumn extends GroupColumn
{
    // ... implementation
}
```

### Importazione
```php
// ❌ Import errato
use Modules\Ptv\app\Filament\Columns\CustomColumn;

// ✅ Import corretto
use Modules\Ptv\Filament\Columns\CustomColumn;
```

## Best Practices per le Colonne Personalizzate

### Principio DRY
- Evitare la duplicazione del codice nelle colonne personalizzate
- Definire lo schema delle colonne in un unico punto
- Utilizzare il metodo `getSchema()` come fonte di verità
- Il metodo `make()` deve utilizzare `getSchema()`

### Esempio di Implementazione
```php
// ❌ Non DRY - schema duplicato
class CustomColumn extends GroupColumn
{
    public static function make(?string $name = null): static
    {
        return parent::make($name)
            ->schema([
                TextColumn::make('field1'),
                TextColumn::make('field2'),
            ]);
    }

    protected function getSchema(): array
    {
        return [
            TextColumn::make('field1'),
            TextColumn::make('field2'),
        ];
    }
}

// ✅ DRY - schema definito una sola volta
class CustomColumn extends GroupColumn
{
    public static function make(?string $name = null): static
    {
        return parent::make($name)
            ->schema(static::getSchema());
    }

    protected static function getSchema(): array
    {
        return [
            TextColumn::make('field1'),
            TextColumn::make('field2'),
        ];
    }
}
```

## Best Practices per le Chiavi degli Array nelle Colonne Personalizzate

### Chiavi Esplicite
- Utilizzare sempre chiavi stringhe esplicite nell'array restituito da `getSchema()`
- Le chiavi devono corrispondere ai nomi dei campi del modello
- Questo migliora la leggibilità e la manutenibilità del codice
- Permette di riutilizzare le chiavi per il searchable

### Esempio di Implementazione
```php
// ❌ Chiavi numeriche implicite
protected static function getSchema(): array
{
    return [
        TextColumn::make('field1'),
        TextColumn::make('field2'),
    ];
}

// ✅ Chiavi stringhe esplicite
protected static function getSchema(): array
{
    return [
        'field1' => TextColumn::make('field1'),
        'field2' => TextColumn::make('field2'),
    ];
}

// ✅ Utilizzo delle chiavi per searchable
public static function make(?string $name = null): static
{
    return parent::make($name)
        ->schema(static::getSchema())
        ->searchable(array_keys(static::getSchema()));
}
```

### Vantaggi
1. **Leggibilità**: Le chiavi esplicite rendono chiaro quali campi sono presenti
2. **Manutenibilità**: Facilita l'aggiunta/rimozione di campi
3. **Riutilizzo**: Le chiavi possono essere usate per searchable e altre funzionalità
4. **Type Safety**: Migliore supporto per l'analisi statica
5. **Documentazione**: Le chiavi servono come documentazione implicita

## Best Practices per la Ricerca nelle Colonne Personalizzate

### Campi Ricercabili
- Limitare la ricerca solo ai campi "fillable" del modello
- Utilizzare `array_intersect()` per filtrare le chiavi dello schema
- Questo migliora le performance e la sicurezza

### Esempio di Implementazione
```php
// ❌ Ricerca su tutti i campi
public static function make(?string $name = null): static
{
    return parent::make($name)
        ->schema(static::getSchema())
        ->searchable(array_keys(static::getSchema()));
}

// ✅ Ricerca solo sui campi fillable
public static function make(?string $name = null): static
{
    $fillable = static::getFillable();
    $searchable = array_intersect(
        array_keys(static::getSchema()),
        $fillable
    );

    return parent::make($name)
        ->schema(static::getSchema())
        ->searchable($searchable);
}

protected static function getFillable(): array
{
    return [
        'field1',
        'field2',
        // ... altri campi fillable
    ];
}
```

### Vantaggi
1. **Performance**: Ricerca solo sui campi necessari
2. **Sicurezza**: Evita la ricerca su campi sensibili
3. **Manutenibilità**: Chiaro quali campi sono ricercabili
4. **Consistenza**: Allineato con le regole del modello