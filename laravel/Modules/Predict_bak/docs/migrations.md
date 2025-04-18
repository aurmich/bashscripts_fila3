# Regole per le Migrazioni nel Modulo Predict

## Struttura Base
Tutte le migrazioni devono estendere `XotBaseMigration` e seguire questa struttura:

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Predict\Models\NomeModel;

return new class extends XotBaseMigration
{
    protected ?string $model_class = NomeModel::class;

    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                // Definizione della tabella
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // Aggiornamenti della tabella
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );
    }
};
```

## Metodi Disponibili

### Creazione Tabella
- Usare `tableCreate()` per creare nuove tabelle
- Il metodo verifica automaticamente se la tabella esiste
- Non usare mai `Schema::create()` direttamente

### Aggiornamento Tabella
- Usare `tableUpdate()` per modificare tabelle esistenti
- Verifica sempre l'esistenza delle colonne con `hasColumn()`
- Usa `getColumnType()` per verificare il tipo di una colonna

### Timestamps e SoftDeletes
- Usa `updateTimestamps()` per aggiungere/aggiornare i campi timestamp
- Include `created_at`, `updated_at`, `created_by`, `updated_by`
- Opzionalmente include `deleted_at` con `hasSoftDeletes: true`

### Metodo Down
- NON implementare il metodo `down()` nelle migrazioni
- `XotBaseMigration` già fornisce un'implementazione che elimina la tabella
- L'implementazione usa `dropTableIfExists()` che gestisce in sicurezza l'eliminazione

## Cosa NON Fare

❌ **Non Usare:**
```php
if (!Schema::hasTable($this->getTable())) {
    Schema::create(...);
}
```

✅ **Usa Invece:**
```php
$this->tableCreate(function (Blueprint $table): void {
    // definizione tabella
});
```

❌ **Non Usare:**
```php
Schema::table($this->getTable(), function (Blueprint $table) {
    // modifiche
});
```

✅ **Usa Invece:**
```php
$this->tableUpdate(function (Blueprint $table): void {
    // modifiche
});
```

❌ **Non Implementare:**
```php
public function down(): void
{
    Schema::dropIfExists($this->getTable());
}
```

✅ **Usa Invece:**
La classe base `XotBaseMigration` già implementa il metodo `down()`

## Gestione delle Relazioni

### Foreign Keys
- Usa `foreignIdFor()` per le relazioni con altri modelli
- Specifica sempre `nullable()` se la relazione è opzionale
- Usa `index()` per le colonne usate frequentemente nelle query

### Indici
- Verifica l'esistenza degli indici con `hasIndex()`
- Usa nomi descrittivi per gli indici compositi
- Evita indici su colonne raramente usate nelle query

## Best Practices

1. **Model Class**
   - Specifica sempre `protected ?string $model_class = NomeModel::class;`
   - Il model deve esistere prima di creare la migrazione

2. **Controlli di Sicurezza**
   - Usa `hasColumn()` prima di aggiungere/modificare colonne
   - Verifica i tipi di colonna con `getColumnType()`
   - Gestisci le modifiche dei tipi di colonna con `change()`

3. **Timestamps**
   - Aggiungi sempre `updateTimestamps()` nella sezione UPDATE
   - Specifica `hasSoftDeletes: true` se il modello usa soft deletes

4. **Ordine delle Operazioni**
   - Prima CREATE per la struttura base
   - Poi UPDATE per modifiche e campi aggiuntivi
   - Infine indici e chiavi esterne 