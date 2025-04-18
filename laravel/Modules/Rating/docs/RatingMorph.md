# RatingMorph Model

Il modello `RatingMorph` gestisce le relazioni polimorfe per le valutazioni nel sistema.

## Proprietà

### Fillable

- `rating_id`: ID della valutazione
- `model_type`: Tipo del modello valutato (es. 'Modules\Blog\Models\Article')
- `model_id`: ID del modello valutato
- `extra`: Attributi extra in formato schemaless

### Casts

- `created_at`: datetime
- `updated_at`: datetime
- `extra`: SchemalessAttributes

## Relazioni

### BelongsTo

- `rating`: Relazione con il modello Rating
- `model`: Relazione polimorfa con il modello valutato

## Metodi

### getModel()

```php
public function getModel(): ?Model
```

Recupera il modello valutato.

### getRating()

```php
public function getRating(): ?Rating
```

Recupera la valutazione associata.

## Eventi

Il modello emette i seguenti eventi:

- `created`: Quando viene creata una nuova relazione
- `updated`: Quando viene aggiornata una relazione
- `deleted`: Quando viene eliminata una relazione

## Validazione

Le relazioni devono rispettare i seguenti criteri:

- `rating_id`: Deve essere un ID valido di una valutazione esistente
- `model_type`: Deve essere una classe valida che implementa HasRatingContract
- `model_id`: Deve essere un ID valido del modello valutato

## Esempio di Utilizzo

```php
// Creare una nuova relazione
$morph = RatingMorph::create([
    'rating_id' => $rating->id,
    'model_type' => Article::class,
    'model_id' => $article->id
]);

// Recuperare il modello valutato
$model = $morph->getModel();

// Recuperare la valutazione
$rating = $morph->getRating();
``` 