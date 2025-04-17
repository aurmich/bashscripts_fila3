# Regole di Namespace

## Namespace Base
Il namespace base per tutti i moduli è `Modules\{ModuleName}`. Non utilizzare mai `Modules\{ModuleName}\App` come namespace base.

## Struttura dei Namespace

### Moduli Standard
```
Modules\
  ├── ModuleName\
  │   ├── Providers\
  │   ├── Http\
  │   ├── Models\
  │   └── Filament\
  │       ├── Resources\
  │       ├── Pages\
  │       └── Widgets\
```

### Modulo Xot
```
Modules\
  └── Xot\
      ├── Providers\
      │   └── XotBaseServiceProvider.php
      ├── Filament\
      │   ├── Resources\
      │   │   └── Pages\
      │   │       └── XotBaseListRecords.php
      │   └── Pages\
      └── Http\
```

## Convenzioni di Naming

### Classi Base
- Tutte le classi base devono avere il prefisso `XotBase`
- Le classi base devono essere nel namespace `Modules\Xot`
- Esempio: `Modules\Xot\Filament\Resources\Pages\XotBaseListRecords`

### Provider
- I provider dei moduli devono estendere i provider base di Xot
- Namespace: `Modules\{ModuleName}\Providers`
- Esempio: `Modules\Chart\Providers\ChartServiceProvider`

### Risorse Filament
- Le risorse devono estendere le classi base di Xot
- Namespace: `Modules\{ModuleName}\Filament\Resources`
- Esempio: `Modules\Chart\Filament\Resources\ChartResource`

## Best Practices

1. **Coerenza dei Namespace**
   - Mantenere la coerenza tra namespace e struttura delle cartelle
   - Non aggiungere `App` nel namespace
   - Seguire sempre il pattern di namespace di Xot

2. **Estensione delle Classi Base**
   - Utilizzare sempre le classi base di Xot per estendere le funzionalità di Filament
   - Non estendere direttamente le classi di Filament
   - Documentare eventuali eccezioni

3. **Documentazione**
   - Documentare eventuali eccezioni alle regole di namespace
   - Mantenere aggiornata la documentazione quando si modificano i namespace
   - Includere esempi di utilizzo corretto

4. **Validazione**
   - Utilizzare PHPStan per validare i namespace
   - Correggere immediatamente gli errori di namespace
   - Mantenere la coerenza in tutto il progetto

## Regole per i Namespace nei Moduli Laraxot

Questo documento definisce le regole ufficiali per l'utilizzo dei namespace all'interno dei moduli Laraxot.

## Struttura Corretta dei Namespace

La struttura corretta dei namespace nei moduli **NON** include il segmento `app` anche se il file è fisicamente posizionato nella directory `app`.

### ✅ CORRETTO

```php
namespace Modules\NomeModulo\Providers;
namespace Modules\NomeModulo\Http\Controllers;
```

### ❌ ERRATO

```php
namespace Modules\NomeModulo\app\Providers;
namespace Modules\NomeModulo\app\Http\Controllers;
```

## Regole per RouteServiceProvider

Il `RouteServiceProvider` di ogni modulo deve seguire questa struttura:

```php
<?php

declare(strict_types=1);

namespace Modules\NomeModulo\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider 
{
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\NomeModulo\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $name = 'NomeModulo';
}
```

## Punti importanti da ricordare

1. I namespace NON devono includere il segmento `app` anche se i file sono fisicamente nella directory `app`
2. I controller devono avere il namespace `Modules\NomeModulo\Http\Controllers`
3. I provider devono avere il namespace `Modules\NomeModulo\Providers`
4. La proprietà `$name` nel RouteServiceProvider è obbligatoria e deve essere impostata al nome del modulo
5. La proprietà `$moduleNamespace` deve puntare a `Modules\NomeModulo\Http\Controllers`

## Motivo di questa regola

Questa struttura di namespace mantiene compatibilità con la convenzione di Laravel e il sistema di moduli Nwidart, anche se i file sono fisicamente organizzati in modo diverso.

## Verifica e correzione

Se incontri errori come `name is empty on [Modules\NomeModulo\Providers\RouteServiceProvider]`, verifica:

1. Che il namespace sia corretto (senza `app`)
2. Che la proprietà `$name` sia definita e valorizzata
3. Che il `$moduleNamespace` punti alla posizione corretta dei controller 