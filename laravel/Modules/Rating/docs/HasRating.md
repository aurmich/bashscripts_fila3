# HasRating Trait

Il trait `HasRating` fornisce la funzionalità di rating per i modelli che lo utilizzano.

## Requisiti

Il modello che utilizza questo trait deve:

1. Implementare l'interfaccia `HasRatingContract`
2. Avere una relazione polimorfa con il modello `RatingMorph`

## Metodi

### ratings()

```php
public function ratings(): MorphToMany
```

Restituisce la relazione MorphToMany con il modello Rating.

### ratingMorphs()

```php
public function ratingMorphs(): MorphMany
```

Restituisce la relazione MorphMany con il modello RatingMorph.

### getAverageRating()

```php
public function getAverageRating(): float
```

Calcola la media delle valutazioni per il modello.

### getRatingCount()

```php
public function getRatingCount(): int
```

Conta il numero totale di valutazioni per il modello.

### hasRated()

```php
public function hasRated(): bool
```

Verifica se l'utente corrente ha già valutato il modello.

### rate()

```php
public function rate(float $value, ?string $comment = null): Rating
```

Aggiunge una nuova valutazione al modello.

### updateRating()

```php
public function updateRating(float $value, ?string $comment = null): Rating
```

Aggiorna la valutazione esistente del modello.

### deleteRating()

```php
public function deleteRating(): bool
```

Elimina la valutazione del modello.

## Eventi

Il trait emette i seguenti eventi:

- `rating_created`: Quando viene creata una nuova valutazione
- `rating_updated`: Quando viene aggiornata una valutazione
- `rating_deleted`: Quando viene eliminata una valutazione

## Esempio di Utilizzo

```php
use Modules\Rating\Models\Contracts\HasRatingContract;
use Modules\Rating\Models\Traits\HasRating;

class Article extends Model implements HasRatingContract
{
    use HasRating;

    // ... resto del codice
}

// Utilizzo
$article = Article::find(1);

// Aggiungere una valutazione
$article->rate(5, 'Ottimo articolo!');

// Aggiornare una valutazione
$article->updateRating(4, 'Buono ma potrebbe essere migliore');

// Eliminare una valutazione
$article->deleteRating();

// Ottenere la media delle valutazioni
$average = $article->getAverageRating();

// Contare il numero di valutazioni
$count = $article->getRatingCount();

// Verificare se l'utente ha già valutato
$hasRated = $article->hasRated();
``` 