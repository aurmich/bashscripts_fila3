# Regole per le Traduzioni

## Struttura del Progetto

### 1. Struttura dei Moduli e Namespace
La struttura corretta dei moduli è:
```
Modules/
├── Predict/           
│   ├── app/          # Root namespace: Modules\Predict\
│   │   ├── Models/   # Namespace: Modules\Predict\Models
│   │   ├── Actions/  # Namespace: Modules\Predict\Actions
│   │   └── ...
│   ├── composer.json # Definisce PSR-4: "Modules\\Predict\\": "app/"
│   └── ...
├── Blog/             
│   ├── app/          # Root namespace: Modules\Blog\
│   │   ├── Models/   # Namespace: Modules\Blog\Models
│   │   └── ...
│   ├── composer.json # Definisce PSR-4: "Modules\\Blog\\": "app/"
│   └── ...
└── ...
```

**IMPORTANTE**: 
- Le classi dei moduli DEVONO essere nella directory `app/` (✅ `Modules/Blog/app/Models/`)
- Il namespace è mappato secondo il PSR-4 nel `composer.json` di ogni modulo
- Esempio di configurazione PSR-4:
  ```json
  {
      "autoload": {
          "psr-4": {
              "Modules\\Blog\\": "app/"
          }
      }
  }
  ```

## Contratto e Implementazione

### 1. Esempio di Implementazione Corretta

```php
// File: Modules/Blog/app/Models/Article.php
namespace Modules\Blog\Models;

use Modules\Lang\Models\Traits\HasStrictTranslations;
use Modules\Lang\Models\Contracts\HasTranslationsContract;

class Article extends Model implements HasTranslationsContract
{
    use HasStrictTranslations;
}
```

### 2. Contratto `HasTranslationsContract`

Il contratto `HasTranslationsContract` definisce un'interfaccia stretta per le traduzioni:

```php
interface HasTranslationsContract
{
    public function getTranslation(string $key, string $locale, bool $useFallbackLocale = true): string|array|int|null;
    public function setTranslation(string $key, string $locale, $value): self;
}
```

### 3. Motivazione del Cambiamento

- Il trait originale `HasTranslations` di Spatie ritorna `mixed`
- Il contratto `HasTranslationsContract` richiede tipi specifici
- `HasStrictTranslations` garantisce la compatibilità dei tipi
- Questo permette di passare l'analisi PHPStan a livello 7
- La struttura corretta dei namespace garantisce coerenza nel progetto

## Best Practices

1. **Struttura dei Moduli**
   - Rispettare la struttura PSR-4 definita nel `composer.json`
   - Mantenere tutte le classi nella directory `app/` del modulo
   - Seguire le convenzioni di namespace di Laravel

2. **Namespace**
   - Usare il namespace corretto basato sul PSR-4 del modulo
   - Mantenere coerenza tra namespace e struttura delle directory
   - Rispettare la configurazione del `composer.json`

3. **Documentazione**
   - Documentare gli attributi traducibili
   - Specificare i tipi di ritorno attesi
   - Mantenere PHPDoc aggiornata
   - Documentare la struttura dei namespace

## Modelli Corretti

I seguenti modelli sono stati aggiornati per seguire queste regole:

1. `Article` (Blog)
2. `Category` (Blog)
3. `Page` (CMS)
4. `PageContent` (CMS)

## Verifica

Per verificare la corretta implementazione:

1. Eseguire PHPStan:
   ```bash
   ./vendor/bin/phpstan analyse --level=7
   ```

2. Verificare i test:
   ```bash
   php artisan test --filter=TranslationTest
   ```

## Errori Comuni

1. **Struttura Directory Errata**
   ```
   // ❌ SBAGLIATO
   Modules/Blog/Models/Article.php
   
   // ✅ CORRETTO
   Modules/Blog/app/Models/Article.php
   ```

2. **Namespace Errato**
   ```php
   // ❌ SBAGLIATO
   namespace Modules\Blog\Models;  // se il file non è in app/Models/
   
   // ✅ CORRETTO
   namespace Modules\Blog\Models;  // file in app/Models/
   ```

3. **Mancato Rispetto del PSR-4**
   ```json
   // ❌ SBAGLIATO: file in directory sbagliata
   {
       "autoload": {
           "psr-4": {
               "Modules\\Blog\\": "app/"
           }
       }
   }
   // Ma il file è in: Modules/Blog/Models/
   
   // ✅ CORRETTO: file nella directory corretta
   // File in: Modules/Blog/app/Models/
   ```

4. **Mancata Implementazione del Contratto**
   ```php
   // ❌ SBAGLIATO
   class Model extends BaseModel {
       use HasTranslations;
   }

   // ✅ CORRETTO
   class Model extends BaseModel implements HasTranslationsContract {
       use HasStrictTranslations;
   }
   ```

## Note Importanti

1. La correzione è stata applicata in batch a tutti i modelli
2. Non interrompere mai l'analisi PHPStan prima del livello 7
3. Correggere sempre più errori simili contemporaneamente
4. Mantenere la documentazione aggiornata
5. Rispettare la struttura PSR-4 dei moduli
6. Mantenere tutte le classi nella directory `app/` del modulo
7. Definire sempre `HasTranslationsContract`
8. Usare sempre `HasStrictTranslations`
9. Non usare mai `HasTranslations` direttamente
10. Mantenere la documentazione aggiornata 