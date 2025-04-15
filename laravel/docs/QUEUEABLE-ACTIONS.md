# Utilizzo di QueueableAction in Laraxot PTVX

## Introduzione

In Laraxot PTVX, preferiamo l'utilizzo di Actions invece dei Services tradizionali, sfruttando il pacchetto `spatie/laravel-queueable-action`. Questo approccio offre diversi vantaggi:

1. **Dependency Injection** nei costruttori delle Actions
2. **Code più organizzato** e facile da testare
3. **Possibilità di esecuzione asincrona** quando necessario
4. **Migliore separazione delle responsabilità**

## Struttura delle Actions

Le Actions devono essere create nella cartella `app/Actions` di ogni modulo e seguire questa struttura:

```php
namespace Modules\NomeModulo\Actions;

use Spatie\QueueableAction\QueueableAction;

class MiaAction
{
    use QueueableAction;

    public function __construct(
        // Dipendenze dal container
    ) {
        // Inizializzazione
    }

    public function execute(...$parameters)
    {
        // Logica dell'action
    }
}
```

## Esecuzione delle Actions

### Esecuzione Sincrona
```php
app(MiaAction::class)->execute($param1, $param2);
```

### Esecuzione Asincrona
```php
app(MiaAction::class)->onQueue()->execute($param1, $param2);
```

### Esecuzione su una Coda Specifica
```php
app(MiaAction::class)->onQueue('nome-coda')->execute($param1, $param2);
```

## Migrazione da Services ad Actions

Quando si converte un Service in Action:

1. Spostare la logica dal metodo del service al metodo `execute()` dell'Action
2. Convertire le dipendenze del costruttore
3. Rimuovere il suffisso "Service" e aggiungere il suffisso "Action"
4. Aggiungere il trait `QueueableAction`

### Esempio di Conversione

Da:
```php
class PerformanceService
{
    public function generatePdf(object $model, array $options): string
    {
        // ...
    }
}
```

A:
```php
class GeneratePdfAction
{
    use QueueableAction;

    public function execute(object $model, array $options): string
    {
        // ...
    }
}
```

## Best Practices

1. **Una Action, Una Responsabilità**: Ogni action dovrebbe avere una singola responsabilità ben definita
2. **Naming Chiaro**: Il nome dell'action deve descrivere chiaramente cosa fa (verbo + sostantivo)
3. **Type Hinting**: Utilizzare sempre i type hints per parametri e return type
4. **Documentazione**: Documentare i parametri e il comportamento dell'action con DocBlocks
5. **Testing**: Creare test unitari per ogni action

## Testing delle Actions

```php
use Spatie\QueueableAction\Testing\QueueableActionFake;

/** @test */
public function it_generates_pdf()
{
    Queue::fake();

    app(GeneratePdfAction::class)->onQueue()->execute($model, $options);

    QueueableActionFake::assertPushed(GeneratePdfAction::class);
} 