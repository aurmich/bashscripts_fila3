# Struttura del Modulo Job

## Panoramica
Il modulo Job è responsabile della gestione dei processi in background e delle code nell'applicazione.

## Struttura delle Directory

```
Job/
├── Config/
│   └── config.php           # Configurazione base del modulo
├── Http/
│   └── Controllers/
│       └── JobController.php # Controller principale per la gestione dei job
├── Providers/
│   ├── JobServiceProvider.php    # Service provider principale del modulo
│   └── RouteServiceProvider.php   # Gestione delle route del modulo
└── Routes/
    ├── api.php              # Route API
    └── web.php             # Route web
```

## Service Providers

### JobServiceProvider
Il `JobServiceProvider` è responsabile di:
- Registrazione delle configurazioni
- Registrazione delle viste
- Caricamento delle migrazioni
- Registrazione del RouteServiceProvider

### RouteServiceProvider
Il `RouteServiceProvider` gestisce:
- Route web sotto il prefisso 'job'
- Route API sotto il prefisso 'api/v1'
- Namespace dei controller `Modules\Job\Http\Controllers`

## Collegamenti Bidirezionali
- [Documentazione Generale dei Moduli](/docs/modules.md)
- [Configurazione Job](/docs/module_job.md)
- [Best Practices PHPStan](/docs/phpstan/PHPSTAN_LEVEL10_LINEE_GUIDA.md) 
