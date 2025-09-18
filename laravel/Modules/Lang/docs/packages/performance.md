# Performance

## Pacchetti Utilizzati

### Cache
- [spatie/laravel-translation-loader](https://github.com/spatie/laravel-translation-loader)
  - Cache traduzioni
  - Ottimizzazione query
  - Gestione memoria

### Response Cache
- [spatie/laravel-responsecache](https://github.com/spatie/laravel-responsecache)
  - Cache risposte per lingua
  - Gestione cache utente
  - Invalido cache automatico

## Implementazione

### Cache Traduzioni
```php
use Spatie\TranslationLoader\TranslationLoaderManager;

class TranslationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new TranslationLoaderManager($app['files'], $app['path.lang']);
        });
    }
}
```

### Response Cache
```php
use Spatie\ResponseCache\Middlewares\CacheResponse;

Route::middleware([
    'localeSessionRedirect',
    'localizationRedirect',
    CacheResponse::class
])->group(function () {
    Route::get('/', 'HomeController@index');
});
```

## Best Practices

### Cache
1. Implementare strategie appropriate
2. Gestire invalidazione cache
3. Monitorare hit/miss ratio

### Query
1. Ottimizzare query traduzioni
2. Utilizzare eager loading
3. Implementare indici

## Performance

### Ottimizzazioni
- Implementare CDN per assets
- Utilizzare HTTP/2
- Minificare assets
- Implementare compressione

### Monitoring
- Monitorare utilizzo memoria
- Tracciare query lente
- Analizzare performance cache

## Tools

### Sviluppo
- Laravel Debugbar
- Laravel Telescope
- Blackfire

### Testing
- Test performance query
- Test cache hit/miss
- Test memoria

## Collegamenti

- [Torna a packages.md](../packages.md)
- [Localizzazione](localization.md)
- [Traduzioni](translations.md) 
