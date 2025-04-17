# Filosofia Laraxot

## Principi Fondamentali

### 1. Architettura Modulare
- Ogni modulo è un'entità indipendente
- Namespace standardizzati e prevedibili
- Struttura directory uniforme
- Integrazione con il modulo Xot per funzionalità core

### 2. Service Provider
- Estensione dei service provider base di Xot
- Registrazione automatica di viste, traduzioni e componenti
- Gestione centralizzata delle configurazioni
- Caricamento automatico delle migrazioni

### 3. Best Practices di Codifica
- Tipizzazione stretta
- Validazione PHPStan livello 3
- Convenzioni PSR-12
- Event Sourcing con Spatie
- Data Objects per strutture complesse
- Iniezione delle dipendenze
- Gestione esplicita dei valori null

### 4. Frontend Architecture
- TALL Stack come base
  - Tailwind CSS per lo styling
  - Alpine.js per le interazioni
  - Laravel come backend
  - Livewire/Volt per componenti dinamici
- Laravel Folio per il routing
- Laravel Breeze per l'autenticazione
- Filament come admin panel

## Regole di Implementazione

### 1. Struttura dei Moduli
```
Modules/
  ├── NomeModulo/
  │   ├── app/
  │   │   ├── Models/
  │   │   ├── Actions/
  │   │   ├── Events/
  │   │   ├── Projectors/
  │   │   └── Providers/
  │   ├── config/
  │   ├── database/
  │   ├── resources/
  │   └── routes/
```

### 2. Service Provider
```php
namespace Modules\NomeModulo\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class NomeModuloServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'NomeModulo';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
}
```

### 3. Namespace
- Root: `Modules\NomeModulo`
- Models: `Modules\NomeModulo\Models`
- Actions: `Modules\NomeModulo\Actions`
- Events: `Modules\NomeModulo\Events`
- Projectors: `Modules\NomeModulo\Projectors`

## Vantaggi

1. **Manutenibilità**
   - Struttura chiara e prevedibile
   - Codice organizzato e documentato
   - Facile debugging e testing

2. **Scalabilità**
   - Moduli indipendenti e riutilizzabili
   - Facile aggiunta di nuove funzionalità
   - Performance ottimizzate

3. **Interoperabilità**
   - Integrazione semplice tra moduli
   - API consistenti e ben documentate
   - Supporto per event sourcing

4. **Sviluppo**
   - Onboarding rapido per nuovi sviluppatori
   - Pattern prevedibili
   - Documentazione completa 