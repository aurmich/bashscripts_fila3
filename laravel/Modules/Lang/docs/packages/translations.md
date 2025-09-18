# Traduzioni

## Pacchetti Utilizzati

### Core
- [spatie/laravel-translatable](https://github.com/spatie/laravel-translatable)
  - Gestione modelli tradotti
  - Supporto multilingua
  - Query builder

## Implementazione

### Modello Tradotto
```php
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasTranslations;

    public $translatable = ['title', 'content'];

    public function toArray()
    {
        $attributes = parent::toArray();
        
        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, app()->getLocale());
        }
        
        return $attributes;
    }
}
```

### Utilizzo
```php
$post = Post::create([
    'title' => [
        'en' => 'Hello World',
        'it' => 'Ciao Mondo'
    ],
    'content' => [
        'en' => 'This is a post',
        'it' => 'Questo è un post'
    ]
]);

echo $post->getTranslation('title', 'it'); // Ciao Mondo
```

## Best Practices

### Database
1. Utilizzare JSON per campi tradotti
2. Implementare indici appropriati
3. Gestire fallback language

### Cache
1. Implementare cache traduzioni
2. Gestire invalidazione cache
3. Ottimizzare query

## Performance

### Ottimizzazioni
- Utilizzare eager loading
- Implementare cache query
- Ottimizzare indici

### Monitoring
- Tracciare query lente
- Monitorare utilizzo memoria
- Analizzare performance

## Tools

### Sviluppo
- Laravel Debugbar
- Laravel Telescope
- Query Monitor

### Testing
- Test traduzioni mancanti
- Test fallback language
- Test performance

## Collegamenti

- [Torna a packages.md](../packages.md)
- [Localizzazione](localization.md)
- [Performance](performance.md) 
