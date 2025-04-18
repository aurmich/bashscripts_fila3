# HasRatingContract Interface

L'interfaccia `HasRatingContract` definisce i metodi che devono essere implementati dai modelli che possono essere valutati.

## Metodi

### ratings()

```php
public function ratings(): MorphToMany;
```

Restituisce la relazione MorphToMany con il modello Rating.

### ratingMorphs()

```php
public function ratingMorphs(): MorphMany;
```

Restituisce la relazione MorphMany con il modello RatingMorph.

### getAverageRating()

```php
public function getAverageRating(): float;
```

Calcola la media delle valutazioni per il modello.

### getRatingCount()

```php
public function getRatingCount(): int;
```

Conta il numero totale di valutazioni per il modello.

### hasRated()

```php
public function hasRated(): bool;
```

Verifica se l'utente corrente ha già valutato il modello.

### rate()

```php
public function rate(float $value, ?string $comment = null): Rating;
```

Aggiunge una nuova valutazione al modello.

### updateRating()

```php
public function updateRating(float $value, ?string $comment = null): Rating;
```

Aggiorna la valutazione esistente del modello.

### deleteRating()

```php
public function deleteRating(): bool;
```

Elimina la valutazione del modello.

## Requisiti

I modelli che implementano questa interfaccia devono:

1. Utilizzare il trait `HasRating`
2. Avere una relazione polimorfa con il modello `RatingMorph`
3. Implementare tutti i metodi definiti nell'interfaccia

## Esempio di Implementazione

```php
use Modules\Rating\Models\Contracts\HasRatingContract;
use Modules\Rating\Models\Traits\HasRating;

class Article extends Model implements HasRatingContract
{
    use HasRating;

    // ... resto del codice
}
```

## Note

- L'interfaccia è progettata per essere utilizzata insieme al trait `HasRating`
- I modelli che implementano questa interfaccia possono essere valutati dagli utenti
- Le valutazioni sono gestite attraverso relazioni polimorfe
- Tutti i metodi devono essere implementati correttamente per garantire il funzionamento del sistema di rating 