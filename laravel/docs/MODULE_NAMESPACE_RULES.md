# Regole di Namespace per i Moduli in Laraxot

Questo documento definisce le regole standard per i namespace in tutti i moduli del progetto Laraxot. Seguire queste regole è cruciale per garantire il corretto funzionamento del framework e evitare errori come `name is empty on [Modules\NomeModulo\Providers\RouteServiceProvider]`.

## Regola Fondamentale

**IMPORTANTE**: I namespace dei moduli **NON** devono includere il segmento `app` anche se i file sono fisicamente posizionati nella directory `app`.

## Struttura Corretta

```
┌───────────────────────────┐
│ Struttura fisica dei file │     │ Namespace corrispondente │
└───────────────────────────┘     └──────────────────────────┘
                             ────▶
  Modules/                          Modules/
  └── NomeModulo/                   └── NomeModulo/
      └── app/                          ┌── (non includere "app" qui)
          ├── Providers/               ├── Providers/
          │   └── RouteServiceProvider    │   └── RouteServiceProvider 
          └── Http/                      └── Http/
              └── Controllers/               └── Controllers/
```

## Esempio di Implementazione Corretta

### RouteServiceProvider.php

```php
<?php

declare(strict_types=1);

namespace Modules\NomeModulo\Providers;  // CORRETTO: senza "app"

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider {
    protected string $moduleNamespace = 'Modules\NomeModulo\Http\Controllers';  // CORRETTO: senza "app"
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
    public string $name = 'NomeModulo';  // IMPORTANTE: deve essere sempre definito
}
```

### Controller

```php
<?php

declare(strict_types=1);

namespace Modules\NomeModulo\Http\Controllers;  // CORRETTO: senza "app"

class MioController extends Controller {
    // ...
}
```

## Errori Comuni da Evitare

```php
// ERRATO: non aggiungere "app" nel namespace
namespace Modules\NomeModulo\app\Providers;

// ERRATO: non aggiungere "app" nel namespace delle proprietà
protected string $moduleNamespace = 'Modules\NomeModulo\app\Http\Controllers';
```

## Perché Questa Regola è Importante

1. Mantiene compatibilità con il sistema di moduli di Nwidart e le convenzioni Laravel
2. Previene errori durante il caricamento del bootstrap
3. Garantisce che il routing funzioni correttamente
4. Assicura che le dipendenze siano risolte correttamente

## Come Verificare i Namespace

Per verificare che i namespace siano corretti, puoi eseguire phpstan sul file specifico:

```bash
cd /var/www/html/_bases/base_ptvx_fila3/laravel && ./vendor/bin/phpstan analyse --memory-limit=2G Modules/NomeModulo/app/Providers/RouteServiceProvider.php
```

Se non ci sono errori, il namespace è configurato correttamente. 