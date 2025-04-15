# Analisi PHPStan Livello 7 - Modulo Performance

## Data: 2025-03-26

### Errori Trovati: 237

#### 1. Proprietà Non Definite (property.notFound)
- **File**: `app/Actions/GetHaDirittoMotivoAction.php`
  - Accesso a proprietà non definite su oggetti generici:
    - `$gg_ruolo`
    - `$gg_assenza_anno`
    - `$gg_presenza_anno`
    - `$posiz`
    - `$propro`
    - `$posfun`
  - **Soluzione**: Definire le proprietà con PHPDoc o type hints appropriati

#### 2. Metodi Non Definiti (method.notFound)
- **File**: `app/Models/Traits/MutatorTrait.php`
  - Chiamate a metodo non definito `OfListaTipoCodice()` su `HasMany`
  - Classi interessate:
    - `BaseIndividualeModel`
    - `Organizzativa`
    - `Performance`
  - **Soluzione**: Implementare il metodo `OfListaTipoCodice` o correggere il nome del metodo

#### 3. Parametri Senza Tipo (missingType.parameter)
- **File**: `app/Models/Traits/FunctionTrait.php`
  - Metodo `setValutazioneFunc()` ha parametro `$value` senza tipo specificato
  - **Soluzione**: Aggiungere type hint al parametro

### Correzioni Effettuate

1. **GetHaDirittoMotivoAction.php**:
- Aggiunto PHPDoc per i parametri degli oggetti
- Corretto il problema di concatenazione stringa con oggetti usando `sprintf`
- Migliorata la gestione delle date con Carbon

2. **MutatorTrait.php**:
- Corretto il problema di confronto stretto con valori nulli
- Migliorata la gestione dei valori float e int
- Aggiunta gestione appropriata dei valori vuoti

3. **FunctionTrait.php**:
- Corretto il tipo di ritorno del metodo `check` da void a string
- Sostituito `rowsToSql` con chiamate dirette a `toSql()`
- Aggiunto caching appropriato per i criteri

### Correzioni Rimanenti

1. **ListCriteriEsclusiones.php**:
```php
/**
 * @return array<int, Filament\Actions\Action>
 */
public function getHeaderActions(): array
```

2. **FunctionTrait.php**:
- Correggere i tipi di ritorno per le relazioni BelongsTo
- Implementare gestione sicura della funzione `date`

### Note
- Gli errori rimanenti sono principalmente legati a tipi di ritorno in Filament
- Alcuni problemi riguardano l'uso sicuro di funzioni PHP native
- È necessario un refactoring mirato per i componenti Filament

### Prossimi Passi
1. Correggere i tipi di ritorno nei componenti Filament
2. Implementare l'uso di funzioni sicure dalla libreria Safe
3. Completare la documentazione delle correzioni effettuate
4. Eseguire nuovamente l'analisi PHPStan dopo le correzioni
