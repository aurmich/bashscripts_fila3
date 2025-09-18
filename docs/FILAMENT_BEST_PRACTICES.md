<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
# Best Practices per Risorse Filament in Laraxot

Questo documento riassume le migliori pratiche per la creazione e gestione delle risorse Filament all'interno dell'ecosistema Laraxot. Seguire queste linee guida garantirà compatibilità e coerenza in tutto il progetto.

## Estensione delle Classi Base

### Risorse

1. **SEMPRE** estendere `Modules\Xot\Filament\Resources\XotBaseResource`:
   ```php
   // CORRETTO ✅
   class ClienteResource extends XotBaseResource
   
   // ERRATO ❌
   class ClienteResource extends Resource
   ```

2. **SEMPRE** impostare correttamente le proprietà statiche:
   ```php
   protected static ?string $model = Cliente::class;
   protected static ?string $navigationIcon = 'heroicon-o-users';
   protected static ?string $cluster = ClienteCluster::class; // Se applicabile
   ```

### Pagine

1. Per le pagine di **creazione**:
   ```php
   // CORRETTO ✅
   class CreateCliente extends XotBaseCreateRecord
   
   // ERRATO ❌
   class CreateCliente extends CreateRecord
   ```

2. Per le pagine di **modifica**:
   ```php
   // CORRETTO ✅
   class EditCliente extends XotBaseEditRecord
   
   // ERRATO ❌
   class EditCliente extends EditRecord
   ```

3. Per le pagine di **elenco**:
   ```php
   // CORRETTO ✅
   class ListClienti extends XotBaseListRecords
   
   // ERRATO ❌
   class ListClienti extends ListRecords
   ```

## Definizione dei Form

1. **SEMPRE** utilizzare `getFormSchema()` invece di `form()`:
   ```php
   // CORRETTO ✅
   public static function getFormSchema(): array
   {
       return [
           TextInput::make('nome'),
           // altri componenti...
       ];
   }
   
   // ERRATO ❌
   public static function form(Form $form): Form
   {
       return $form->schema([...]);
   }
   ```

2. **MAI** avvolgere i componenti in una chiamata `schema()` nel metodo `getFormSchema()`:
   ```php
   // CORRETTO ✅
   return [
       TextInput::make('nome'),
       // altri componenti...
   ];
   
   // ERRATO ❌
   return $form->schema([
       TextInput::make('nome'),
   ]);
   ```

## Localizzazione e Label

1. **MAI** utilizzare il metodo `->label()` sui campi o colonne:
   ```php
   // CORRETTO ✅
   TextInput::make('nome')
   
   // ERRATO ❌
   TextInput::make('nome')->label('Nome Cliente')
   ```

2. **SEMPRE** aggiungere le traduzioni nei file di lingua appropriati:
   ```php
   // Nel file lang/it/resource.php
   return [
       'fields' => [
           'nome' => [
               'label' => 'Nome Cliente'
           ]
       ]
   ];
   ```

## Ciclo di Vita dei Componenti

1. **SEMPRE** implementare il metodo `fillForm()` nelle pagine di modifica, anche se vuoto:
   ```php
   /**
    * Metodo fillForm per rispettare il ciclo di vita dei componenti Filament
    */
   public function fillForm(): void
   {
       // Può essere vuoto, ma deve essere presente
   }
   ```

2. **SEMPRE** utilizzare il metodo `mount()` appropriato:
   ```php
   public function mount(): void
   {
       parent::mount();
       // Inizializzazione specifica
   }
   ```

## Relazioni con Database 

### Differenze tra Brain e Orisbroker

1. **ATTENZIONE** alle differenze strutturali tra database:
   - In **braindb**:
     - Le tabelle geografiche hanno il campo `nome` ma NON `descrizione`
     - Esempio: `nazione`, `regione`, `provincia`, `comune`
   
   - In **orisbroker**:
     - Le stesse tabelle hanno sia `nome` che `descrizione`

2. **SEMPRE** usare il campo corretto basato sul database:
   ```php
   // Per modelli Brain (CORRETTO ✅)
   ->relationship('nazione_nascita', 'nome')
   
   // Per modelli Orisbroker (CORRETTO ✅)
   ->relationship('nazione', 'descrizione')
   ```

3. **CONSIDERARE** l'uso di accessor per uniformare l'interfaccia:
   ```php
   // Nel modello Brain\Models\Nazione
   public function getDescrizioneAttribute(): string
   {
       return $this->nome;
   }
   ```

## Debug e Sviluppo

1. **MAI** lasciare funzioni di debug nel codice di produzione:
   ```php
   // DA RIMUOVERE PRIMA DEL COMMIT ❌
   dddx($record);
   dd($data);
   ```

2. **SEMPRE** verificare le strutture del database prima di implementare relazioni

## Creazione di ClienteFromBrain

1. **ESATTA SEQUENZA** di campi da mantenere:
   - **Dati anagrafici**: titolo_id, nome, cognome, sesso, data_nascita, etc.
   - **Classificazione professionale**: tipologia_cliente_id, stato_id, etc.
   - **Informazioni professionali**: data_iscrizione_albo, is_socio_andi, etc.
   - **Indirizzo e contatti**: via, cap, regione_id, provincia_id, etc.
   - **Dati bancari**: iban, intestatario, banca, filiale
   - **Modalità di ricezione**: Lista di modalità selezionabili
=======
# Best Practices per Risorse Filament nel Modulo Job

Questo documento descrive le best practices da seguire quando si creano o modificano risorse Filament nel modulo Job.
=======
# Best Practices per Risorse Filament nel Modulo User

Questo documento descrive le best practices da seguire quando si creano o modificano risorse Filament nel modulo User.
>>>>>>> 0d55b583 (first)
=======
# Best Practices per Risorse Filament nel Modulo User

Questo documento descrive le best practices da seguire quando si creano o modificano risorse Filament nel modulo User.
>>>>>>> e83070fd (.)
=======
# Best Practices per Risorse Filament nel Modulo User

Questo documento descrive le best practices da seguire quando si creano o modificano risorse Filament nel modulo User.
>>>>>>> bdeae81f (first)

## Rimozione del metodo `getPages()`

Quando una risorsa estende `XotBaseResource`, il metodo `getPages()` può essere completamente rimosso se:
- Definisce solo le tre pagine standard (index, create, edit)
- Utilizza gli stessi pattern di route standard ('/', '/create', '/{record}/edit')

### Motivazione

La classe base `XotBaseResource` fornisce già un'implementazione predefinita del metodo `getPages()` che definisce queste tre pagine con le stesse route. Rimuovere il metodo nelle classi figlie:
- Riduce la ridondanza del codice
- Semplifica la manutenzione
- Migliora la coerenza del codice
- Segue il principio DRY (Don't Repeat Yourself)

### Esempio: Prima

```php
public static function getPages(): array
{
    return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        'index' => Pages\ListExports::route('/'),
        'create' => Pages\CreateExport::route('/create'),
        'edit' => Pages\EditExport::route('/{record}/edit'),
=======
        'index' => Pages\ListUsers::route('/'),
        'create' => Pages\CreateUser::route('/create'),
        'edit' => Pages\EditUser::route('/{record}/edit'),
>>>>>>> 0d55b583 (first)
=======
        'index' => Pages\ListUsers::route('/'),
        'create' => Pages\CreateUser::route('/create'),
        'edit' => Pages\EditUser::route('/{record}/edit'),
>>>>>>> e83070fd (.)
=======
        'index' => Pages\ListUsers::route('/'),
        'create' => Pages\CreateUser::route('/create'),
        'edit' => Pages\EditUser::route('/{record}/edit'),
>>>>>>> bdeae81f (first)
    ];
}
```

### Esempio: Dopo

Il metodo viene completamente rimosso, lasciando che sia la classe base a fornire l'implementazione predefinita.

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
### Risorse modificate

Le seguenti risorse sono state modificate per rimuovere il metodo `getPages()` ridondante:
- `ExportResource`
- `FailedImportRowResource`
- `ImportResource`

=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
### Quando NON rimuovere il metodo `getPages()`

Il metodo `getPages()` deve essere mantenuto nei seguenti casi:
- Quando si definisce un set diverso di pagine (ad esempio, solo 'index')
- Quando si aggiungono pagine personalizzate (ad esempio, 'board', 'view')
- Quando si utilizzano pattern di route non standard

## Utilizzo di array associativi in `getFormSchema()`

Le risorse Filament richiedono che il metodo `getFormSchema()` restituisca un array associativo con chiavi di tipo stringa: `array<string, Component>`.

### Esempio corretto:

```php
public static function getFormSchema(): array
{
    return [
        'name' => TextInput::make('name')->required(),
        'email' => TextInput::make('email')->email()->required(),
    ];
}
```

### Esempio errato:

```php
public static function getFormSchema(): array
{
    return [
        TextInput::make('name')->required(),
        TextInput::make('email')->email()->required(),
    ];
}
```

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
Questo pattern è stato corretto nelle seguenti risorse:
- `ExportResource`
- `FailedImportRowResource` 
>>>>>>> c088001a (first)
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
## Integrazione con PHPStan

Questa best practice risolve anche errori PHPStan di livello 9 e superiore relativi al tipo di ritorno del metodo `getFormSchema()`:

```
Method Resource::getFormSchema() should return array<string, Filament\Forms\Components\Component> but returns array<int, Component>
```

<<<<<<< HEAD
<<<<<<< HEAD
Seguendo queste best practices si assicura che il codice passi i controlli statici di PHPStan e sia più facile da mantenere. 
>>>>>>> 0d55b583 (first)
=======
Seguendo queste best practices si assicura che il codice passi i controlli statici di PHPStan e sia più facile da mantenere. 
>>>>>>> e83070fd (.)
=======
Seguendo queste best practices si assicura che il codice passi i controlli statici di PHPStan e sia più facile da mantenere. 
>>>>>>> bdeae81f (first)
