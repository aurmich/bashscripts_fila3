# Correzione Errore Implementazione Mailable

## Errore: InvalidArgumentException - Expected an implementation of "Illuminate\Mail\Mailable"

### Descrizione del Problema
L'errore si verifica quando si tenta di inviare una mail utilizzando la classe `SchedaMail` che non implementa correttamente l'interfaccia `Illuminate\Mail\Mailable`. L'errore specifico è:

```
Webmozart\Assert\InvalidArgumentException
Expected an implementation of "Illuminate\Mail\Mailable". Got: "Modules\Performance\Mail\SchedaMail"
```

### Analisi del Codice
L'errore viene generato in `Modules\Xot\Actions\Mail\SendMailByRecordAction.php` alla riga 27, dove viene verificato che la classe mail implementi correttamente l'interfaccia `Mailable`.

### Soluzione
Per risolvere l'errore, è necessario assicurarsi che la classe `SchedaMail` estenda correttamente la classe base `Mailable` di Laravel. Ecco come dovrebbe essere strutturata:

```php
namespace Modules\Performance\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SchedaMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $record;

    public function __construct($record)
    {
        $this->record = $record;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Scheda di Valutazione',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'performance::mail.scheda',
            with: [
                'record' => $this->record,
            ],
        );
    }
}
```

### Best Practices per l'Implementazione di Mailable
1. **Namespace Corretto**: Assicurarsi che la classe sia nel namespace corretto
2. **Estensione della Classe Base**: La classe deve estendere `Illuminate\Mail\Mailable`
3. **Traits Necessari**: Includere i traits `Queueable` e `SerializesModels`
4. **Metodi Richiesti**: Implementare i metodi `envelope()` e `content()`
5. **Serializzazione**: Utilizzare `SerializesModels` per gestire correttamente i modelli nei dati

### Note di Implementazione
- Assicurarsi che la vista email esista nel percorso corretto
- Verificare che tutti i dati necessari siano passati correttamente al costruttore
- Utilizzare il tipo hint corretto per i parametri del costruttore
- Implementare la logica di coda se necessario

### Struttura delle Cartelle
```
Modules/
  Performance/
    Mail/
      SchedaMail.php
    resources/
      views/
        mail/
          scheda.blade.php
```

### Validazione
Per verificare che l'implementazione sia corretta, è possibile utilizzare il seguente codice di test:

```php
use Modules\Performance\Mail\SchedaMail;
use Illuminate\Mail\Mailable;

// Verifica che la classe implementi correttamente Mailable
assert(is_subclass_of(SchedaMail::class, Mailable::class));
```

### Troubleshooting
Se l'errore persiste, verificare:
1. Che il namespace sia corretto
2. Che tutti i metodi richiesti siano implementati
3. Che i traits necessari siano inclusi
4. Che la classe base sia importata correttamente 