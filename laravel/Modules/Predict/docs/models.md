# Modelli del Modulo Predict

## Predict

Il modello `Predict` estende `Article` dal modulo Blog e rappresenta una previsione nel sistema.

### Connessione e Tabella
- Connessione: `predict`
- Tabella: `predicts`

### Traits
- `HasParent`: Per l'ereditarietà polimorfica da Article
- `SoftDeletes`: Per la cancellazione soft dei record

### Campi
| Campo | Tipo | Descrizione | Nullable |
|-------|------|-------------|----------|
| title | string | Titolo della previsione | No |
| subtitle | string | Sottotitolo | Sì |
| content | text | Contenuto | Sì |
| status | string | Stato (default: 'draft') | No |
| published_at | datetime | Data di pubblicazione | Sì |
| featured_image | string | URL immagine in evidenza | Sì |
| rating | float | Valutazione (default: 0) | No |
| order | integer | Ordine di visualizzazione | No |
| slug | string | Slug SEO-friendly | Sì |
| extra | json | Attributi schemaless | Sì |

### Attributi Castati
```php
protected $casts = [
    'published_at' => 'datetime',
    'rating' => 'float',
    'order' => 'integer',
    'status' => 'string',
    'extra' => SchemalessAttributes::class,
];
```

### Date
- created_at
- updated_at
- deleted_at
- published_at

### Attributi Schemaless
Il modello supporta attributi schemaless tramite il campo `extra`. Questi attributi possono essere:
- Acceduti come array: `$model->extra['key']`
- Interrogati: `Predict::withExtraAttributes()->get()`
- Validati: tramite il Data Object `PredictData`

### Esempio di Utilizzo
```php
// Creazione
$predict = Predict::create([
    'title' => 'Titolo',
    'slug' => Str::slug('Titolo'),
    'status' => 'draft',
]);

// Aggiunta attributi extra
$predict->extra = ['key' => 'value'];
$predict->save();

// Query con attributi extra
$predicts = Predict::withExtraAttributes()
    ->where('extra->key', 'value')
    ->get();
```

## Data Object

Il modello utilizza `PredictData` per la validazione e la trasformazione dei dati:

```php
class PredictData extends Data
{
    public function __construct(
        public string $title,
        public ?string $subtitle,
        public ?string $content,
        public string $status,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?Carbon $published_at,
        public ?string $featured_image,
        public float $rating,
        public int $order,
        public ?string $slug = null,
        public ?array $extra = [],
    ) {}
}
```

## Actions

L'azione `CreatePredictionAction` gestisce la creazione delle previsioni:

```php
class CreatePredictionAction
{
    use QueueableAction;

    public function execute(PredictData $data): Predict
    {
        $predict = Predict::create([
            'title' => $data->title,
            // ... altri campi
            'slug' => $data->slug ?? Str::slug($data->title),
        ]);

        if (!empty($data->extra)) {
            $predict->extra = $data->extra;
            $predict->save();
        }

        return $predict;
    }
}
``` 