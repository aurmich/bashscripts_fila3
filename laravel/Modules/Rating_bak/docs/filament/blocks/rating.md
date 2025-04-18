# Rating Block Documentation

## Overview
Il blocco `Rating` è un componente Filament che gestisce la creazione e la visualizzazione di valutazioni nel sistema.

## Caratteristiche

### Blocco Base
- Titolo (obbligatorio)
- Descrizione (opzionale)
- Toggle per disabilitazione
- Supporto multilingua con etichette localizzate

### Blocco Avanzato
- Selezione vista tramite RadioImage
- Gestione rating multipli tramite Repeater
  - ID (disabilitato)
  - Titolo (obbligatorio)
  - Selezione colore
  - Upload media tramite Spatie Media Library
- Ordinamento tramite drag & drop o pulsanti
- Layout responsive a 4 colonne
- Aggiornamento live dei dati

## Utilizzo

### Creazione Base
```php
Rating::create()
    ->schema([
        // Schema di base
    ]);
```

### Creazione Avanzata
```php
Rating::createAdvanced(
    name: 'rating',
    context: 'form',
    options: [/* opzioni vista */]
);
```

### Gestione Dati
- Conversione dati form in `RatingData` tramite `createFromFormData`
- Supporto per opzioni di visualizzazione personalizzate
- Integrazione con Spatie Media Library per la gestione dei media

## Recent Changes
- Rimossi conflitti di merge
- Migliorata la struttura del codice
- Aggiunto supporto per Spatie Media Library
- Implementato sistema di ordinamento avanzato 