# Correzione Errore Destinatario Email

## Errore: LogicException - An email must have a "To", "Cc", or "Bcc" header

### Descrizione del Problema
L'errore si verifica quando si tenta di inviare un'email senza specificare un destinatario. L'errore specifico è:

```
Symfony\Component\Mime\Exception\LogicException
An email must have a "To", "Cc", or "Bcc" header.
```

### Analisi del Codice
L'errore viene generato in `Modules\Xot\Actions\Mail\SendMailByRecordAction.php` alla riga 34, dove viene tentato l'invio dell'email senza specificare correttamente il destinatario.

### Soluzione
Per risolvere l'errore, è necessario modificare la classe `SchedaMail` per includere correttamente il destinatario. Ecco come dovrebbe essere strutturata:

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
    protected $to;

    public function __construct($record, $to)
    {
        $this->record = $record;
        $this->to = $to;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->to,
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

E nel codice che invia l'email:

```php
$mail = app($mailClass, [
    'record' => $record,
    'to' => 'marco.sottana@gmail.com'
]);
Mail::send($mail);
```

### Best Practices per la Gestione dei Destinatari
1. **Specificare il Destinatario**: Sempre definire almeno un destinatario nell'envelope
2. **Validazione Email**: Verificare che l'indirizzo email sia valido
3. **Gestione Multipli Destinatari**: Supportare sia singoli che multipli destinatari
4. **CC e BCC**: Implementare supporto per CC e BCC quando necessario
5. **Tipo Hint**: Utilizzare il tipo hint corretto per i parametri

### Note di Implementazione
- Utilizzare il metodo `envelope()` per definire i destinatari
- Supportare sia stringhe che array di indirizzi email
- Implementare la validazione degli indirizzi email
- Gestire correttamente i casi di errore

### Esempio di Implementazione Completa
```php
namespace Modules\Performance\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Validator;

class SchedaMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $record;
    protected $to;
    protected $cc;
    protected $bcc;

    public function __construct($record, $to, $cc = [], $bcc = [])
    {
        $this->validateEmail($to);
        $this->validateEmails($cc);
        $this->validateEmails($bcc);
        
        $this->record = $record;
        $this->to = $to;
        $this->cc = $cc;
        $this->bcc = $bcc;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->to,
            cc: $this->cc,
            bcc: $this->bcc,
            subject: 'Scheda di Valutazione',
        );
    }

    protected function validateEmail($email)
    {
        Validator::make(['email' => $email], [
            'email' => 'required|email'
        ])->validate();
    }

    protected function validateEmails($emails)
    {
        if (empty($emails)) {
            return;
        }

        foreach ($emails as $email) {
            $this->validateEmail($email);
        }
    }
}
```

### Troubleshooting
Se l'errore persiste, verificare:
1. Che il destinatario sia stato passato correttamente al costruttore
2. Che l'indirizzo email sia nel formato corretto
3. Che il metodo `envelope()` restituisca un oggetto `Envelope` valido
4. Che non ci siano errori di validazione degli indirizzi email

### Validazione
Per verificare che l'implementazione sia corretta, è possibile utilizzare il seguente codice di test:

```php
use Modules\Performance\Mail\SchedaMail;

// Test con singolo destinatario
$mail = new SchedaMail($record, 'test@example.com');
assert($mail->envelope()->getTo() !== null);

// Test con multipli destinatari
$mail = new SchedaMail($record, ['test1@example.com', 'test2@example.com']);
assert(count($mail->envelope()->getTo()) > 0);
``` 