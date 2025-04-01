# Filament Resources

Questo documento descrive le risorse Filament utilizzate nel modulo Performance.

## Struttura delle Risorse

Ogni risorsa Filament è organizzata secondo la seguente struttura:

```
Resources/
├── CriteriMaggiorazioneResource/
│   ├── Pages/
│   │   ├── CreateCriteriMaggiorazione.php
│   │   ├── EditCriteriMaggiorazione.php
│   │   └── ListCriteriMaggioraziones.php
│   └── CriteriMaggiorazioneResource.php
├── CriteriOptionResource/
└── ...
```

## Componenti Comuni

### Colonne

Le colonne sono definite in `Tables/Columns/` e includono:

- `TextColumn`: Colonna di testo base con supporto per formattazione
- `BooleanColumn`: Colonna per valori booleani
- `DateTimeColumn`: Colonna per date e orari

### Azioni

Le azioni sono definite in `Tables/Actions/` e includono:

- `EditAction`: Azione per modificare un record
- `DeleteAction`: Azione per eliminare un record
- `DeleteBulkAction`: Azione per eliminazione multipla

### Filtri

I filtri sono definiti in `Tables/Filters/` e includono:

- `SelectFilter`: Filtro a selezione singola o multipla

## Tipi di Ritorno

### Actions

```php
array<string, Filament\Tables\Actions\Action|Filament\Tables\Actions\ActionGroup>
```

### BulkActions

```php
array<string, Filament\Tables\Actions\BulkAction>
```

### HeaderActions

```php
array<int, Filament\Actions\Action>
```

## Note sulla Tipizzazione

- Tutte le azioni devono implementare le interfacce appropriate di Filament
- I tipi di ritorno devono essere esplicitamente dichiarati
- Le collezioni devono essere tipizzate correttamente
- I componenti personalizzati devono estendere le classi base di Filament 