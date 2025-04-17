# Convenzioni di Naming

## Service Providers

### Regola Fondamentale per XotBaseServiceProvider
La proprietà `$name` DEVE corrispondere **esattamente** al nome del modulo come appare nella cartella, incluso il case.

```php
// ✅ CORRETTO
class ChartServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Chart';        // Uguale al nome della cartella Modules/Chart
    public string $module_name = 'chart'; // Versione lowercase
}

// ❌ ERRATO
class ChartServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'chart';        // Case errato
    public string $module_name = 'Chart'; // Non deve essere capitalizzato
}
```

### Struttura dei Nomi
1. **Nome Cartella Modulo**
   - PascalCase
   - Esempio: `Chart`, `Predict`, `User`

2. **ServiceProvider**
   - Nome: `{ModuleName}ServiceProvider`
   - Namespace: `Modules\{ModuleName}\Providers`
   - Proprietà `$name`: Esattamente come il nome del modulo
   - Proprietà `$module_name`: Lowercase del nome del modulo

3. **AdminPanelProvider**
   - Namespace: `Modules\{ModuleName}\Providers\Filament`
   - Proprietà `$module`: Esattamente come il nome del modulo

## Struttura delle Directory

```
Modules/
└── Chart/                 # Nome modulo in PascalCase
    ├── app/              # Lowercase
    │   ├── Providers/    # PascalCase
    │   │   └── ChartServiceProvider.php
    │   └── Filament/     # PascalCase
    │       └── AdminPanelProvider.php
    ├── database/         # Lowercase
    ├── resources/        # Lowercase
    └── routes/           # Lowercase
```

## Regole Generali

1. **Nomi dei Moduli**
   - Sempre in PascalCase
   - Singolare, non plurale
   - Esempio: `Chart` non `Charts`

2. **Directory Standard**
   - Sempre in lowercase
   - Esempi: `app`, `database`, `resources`, `routes`

3. **Directory di Codice**
   - PascalCase per namespace PSR-4
   - Esempi: `Models`, `Controllers`, `Providers`

4. **File di Classe**
   - PascalCase
   - Nome classe e nome file devono corrispondere
   - Esempio: `ChartServiceProvider.php`

## Validazione

Prima di ogni commit, verificare:
1. Nome del modulo in PascalCase
2. ServiceProvider con `$name` corretto
3. Struttura directory conforme
4. Namespace corretti
5. Case corretto per tutti i nomi 