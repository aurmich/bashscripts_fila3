# Modulo Rating

Il modulo Rating fornisce funzionalità di valutazione per i modelli dell'applicazione. Permette di gestire valutazioni polimorfe con supporto per media e statistiche.

## Struttura

Il modulo è composto dai seguenti componenti principali:

### Modelli

- `Rating`: Il modello principale che rappresenta una valutazione
- `RatingMorph`: Il modello pivot che gestisce le relazioni polimorfe

### Trait

- `HasRating`: Fornisce funzionalità di rating per i modelli che lo utilizzano

## Utilizzo

### Implementazione in un modello

Per aggiungere la funzionalità di rating a un modello, utilizza il trait `HasRating`:

```php
use Modules\Rating\Models\Traits\HasRating;

class Article extends Model
{
    use HasRating;
    
    // ... resto del codice
}
```

### Aggiungere un rating

```php
$article->ratings()->attach($ratingId, [
    'value' => 5,
    'note' => 'Ottimo articolo!'
]);
```

### Ottenere le statistiche

```php
// Ottieni le percentuali di rating per utente
$percentages = $article->getRatingsPercentageByUser();

// Ottieni le opzioni di rating con titoli
$options = $article->getOptionRatingsIdTitle();

// Ottieni i rating con immagini
$ratingsWithImages = $article->getArrayRatingsWithImage();
```

## Eventi

Il modulo emette i seguenti eventi:

- `rating_created`: Quando viene creato un nuovo rating
- `rating_updated`: Quando viene aggiornato un rating esistente
- `rating_deleted`: Quando viene eliminato un rating

## Validazione

I rating devono rispettare le seguenti regole:

- Il valore deve essere un numero compreso tra 1 e 5
- L'utente deve essere autenticato
- Il tipo di rating deve essere valido
- Il commento è opzionale ma non può superare i 1000 caratteri

## Configurazione

Il modulo può essere configurato attraverso il file di configurazione `config/rating.php`:

```php
return [
    'min_value' => 1,
    'max_value' => 5,
    'max_comment_length' => 1000,
    'allowed_types' => ['article', 'comment', 'product'],
];
```

## Migrazioni

Il modulo include le seguenti migrazioni:

- `create_ratings_table`: Crea la tabella principale dei rating
- `create_rating_morphs_table`: Crea la tabella pivot per le relazioni polimorfe

## Dipendenze

- Laravel Framework
- Spatie Media Library
- Spatie Schemaless Attributes 