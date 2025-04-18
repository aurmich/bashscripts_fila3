# Rating Block

Il blocco Rating è un componente Filament che permette di gestire le valutazioni all'interno dell'applicazione.

## Caratteristiche principali

- Gestione del titolo e della descrizione
- Possibilità di abilitare/disabilitare il rating
- Supporto multilingua
- Gestione avanzata con repeater per ratings multipli
- Supporto per il caricamento di media tramite spatie/laravel-medialibrary
- Personalizzazione dei colori

## Utilizzo base

```php
use Modules\Rating\Filament\Blocks\Rating;

Rating::create()
```

## Utilizzo avanzato

```php
Rating::createAdvanced('custom_name', 'custom_context', [
    'view_option_1' => 'View 1',
    'view_option_2' => 'View 2'
])
```

## Miglioramenti implementati

1. Aggiunta validazione stretta dei tipi con `declare(strict_types=1)`
2. Utilizzo di `Assert` per validare i parametri critici
3. Tipizzazione forte dei parametri e dei valori di ritorno
4. Supporto per la localizzazione tramite enum `SupportedLocale`
5. Implementazione del pattern Data Object con `RatingData`

## Best Practices

- Utilizzare sempre il tipo di blocco attraverso la costante `BLOCK_TYPE`
- Validare i parametri critici con `Assert`
- Mantenere la compatibilità con il sistema di localizzazione
- Utilizzare il Data Object pattern per la gestione dei dati 