# RatingMorph Model

## Panoramica
Il modello `RatingMorph` gestisce le relazioni polimorfiche tra i rating e gli elementi valutabili dell'applicazione.

## Struttura Database

### Campi Principali
- `id` - Identificativo univoco
- `model_id` - ID dell'elemento valutato
- `model_type` - Tipo dell'elemento valutato
- `rating_id` - ID del rating associato
- `user_id` - ID dell'utente che ha dato il rating
- `note` - Note opzionali
- `value` - Valore numerico del rating
- `is_winner` - Flag per indicare se è un rating vincente
- `reward` - Premio/ricompensa associata

### Relazioni
```php
public function rating(): BelongsTo
public function user(): BelongsTo
public function profile(): BelongsTo
public function model(): MorphTo
```

## Miglioramenti PHPStan Livello 9
Le seguenti modifiche sono state apportate per soddisfare PHPStan livello 9:

1. Tipizzazione stretta dei parametri e ritorni
2. Documentazione PHPDoc completa
3. Gestione type-safe delle relazioni
4. Definizione esplicita dei tipi per le proprietà
5. Rimozione delle annotazioni duplicate

## Utilizzo

### Creazione di un Rating
```php
$rating = RatingMorph::create([
    'model_id' => $post->id,
    'model_type' => Post::class,
    'rating_id' => $rating->id,
    'user_id' => auth()->id(),
    'value' => 5,
    'note' => 'Ottimo contenuto!'
]);
```

### Query Builder
```php
// Trova tutti i rating di un modello specifico
$ratings = RatingMorph::where('model_type', Post::class)
    ->where('model_id', $post->id)
    ->get();

// Trova i rating vincenti
$winners = RatingMorph::where('is_winner', true)->get();
```

## Best Practices
1. Utilizzare type hints per tutte le proprietà
2. Mantenere le relazioni aggiornate
3. Validare i dati prima del salvataggio
4. Utilizzare le costanti per i valori fissi
5. Implementare i metodi di accesso quando necessario

## Collegamenti
- [Documentazione Modulo Rating](/docs/modules/module_rating.md)
- [Rating Model](rating.md)
- [Gestione Valutazioni](/docs/ratings.md)

[Torna alla documentazione principale](/docs/README.md) 