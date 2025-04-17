# Rating Model

Il modello `Rating` rappresenta una valutazione nel sistema.

## Proprietà

### Fillable

- `user_id`: ID dell'utente che ha effettuato la valutazione
- `value`: Valore numerico della valutazione
- `comment`: Commento opzionale associato alla valutazione
- `type`: Tipo di valutazione (es. 'article', 'comment', etc.)
- `extra`: Attributi extra in formato schemaless

### Casts

- `value`: float
- `created_at`: datetime
- `updated_at`: datetime
- `extra`: SchemalessAttributes

## Relazioni

### MorphMany

- `ratingMorphs`: Relazione polimorfa con il modello RatingMorph

## Metodi

### getAverageRating()

```php
public function getAverageRating(): float
```

Calcola la media delle valutazioni per un modello.

### getRatingCount()

```php
public function getRatingCount(): int
```

Conta il numero totale di valutazioni per un modello.

### hasRated()

```php
public function hasRated(Model $model): bool
```

Verifica se un utente ha già valutato un modello.

### rate()

```php
public function rate(Model $model, float $value, ?string $comment = null): Rating
```

Aggiunge una nuova valutazione a un modello.

### updateRating()

```php
public function updateRating(Model $model, float $value, ?string $comment = null): Rating
```

Aggiorna una valutazione esistente per un modello.

### deleteRating()

```php
public function deleteRating(Model $model): bool
```

Elimina una valutazione per un modello.

## Eventi

Il modello emette i seguenti eventi:

- `created`: Quando viene creata una nuova valutazione
- `updated`: Quando viene aggiornata una valutazione
- `deleted`: Quando viene eliminata una valutazione

## Validazione

Le valutazioni devono rispettare i seguenti criteri:

- `value`: Deve essere un numero compreso tra min_rating e max_rating
- `user_id`: Deve essere un ID valido di un utente esistente
- `type`: Deve essere una stringa valida
- `comment`: Opzionale, massimo 1000 caratteri

## Esempio di Utilizzo

```php
// Creare una nuova valutazione
$rating = Rating::create([
    'user_id' => auth()->id(),
    'value' => 5,
    'comment' => 'Ottimo articolo!',
    'type' => 'article'
]);

// Valutare un articolo
$article->rate(5, 'Molto interessante');

// Aggiornare una valutazione
$article->updateRating(4, 'Buono ma potrebbe essere migliore');

// Eliminare una valutazione
$article->deleteRating();

// Ottenere la media delle valutazioni
$average = $article->getAverageRating();

// Contare il numero di valutazioni
$count = $article->getRatingCount();
``` 