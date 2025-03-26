# Documentazione Supporto Modulo Incentivi

## 1. Introduzione

Questa documentazione fornisce informazioni e procedure per il supporto tecnico del modulo Incentivi. Il modulo è progettato per essere facilmente supportabile e manutenibile.

## 2. Contatti

### 2.1 Supporto Tecnico
```markdown
# Contatti Supporto Tecnico

## Team di Sviluppo
- Email: sviluppo@example.com
- Telefono: +39 02 1234567
- Orari: Lun-Ven 9:00-18:00

## Team di Manutenzione
- Email: manutenzione@example.com
- Telefono: +39 02 7654321
- Orari: Lun-Ven 8:00-20:00

## Supporto Urgente
- Email: supporto.urgente@example.com
- Telefono: +39 02 9876543
- Orari: 24/7
```

### 2.2 Canali di Comunicazione
```markdown
# Canali di Comunicazione

## Ticket System
- URL: https://support.example.com
- Categoria: Incentivi
- Priorità: Alta/Media/Bassa

## Chat
- Slack: #incentivi-support
- Teams: Incentivi Support

## Email
- supporto@example.com
- bugs@example.com
- feature@example.com
```

## 3. Procedure di Supporto

### 3.1 Apertura Ticket
```markdown
# Procedura Apertura Ticket

1. Accedi al sistema di ticketing
2. Seleziona categoria "Incentivi"
3. Compila i campi richiesti:
   - Titolo
   - Descrizione
   - Priorità
   - Screenshot/Log
4. Invia il ticket
```

### 3.2 Gestione Ticket
```markdown
# Procedura Gestione Ticket

1. Assegnazione
   - Assegna ticket al tecnico appropriato
   - Imposta scadenza
   - Notifica il team

2. Analisi
   - Rivedi log e documentazione
   - Identifica la causa
   - Proponi soluzione

3. Risoluzione
   - Implementa la soluzione
   - Verifica la correzione
   - Aggiorna la documentazione
```

### 3.3 Escalation
```markdown
# Procedura Escalation

## Livelli di Escalation
1. Supporto L1
   - Problemi base
   - Tempo risposta: 4h

2. Supporto L2
   - Problemi tecnici
   - Tempo risposta: 2h

3. Supporto L3
   - Problemi critici
   - Tempo risposta: 1h

## Processo
1. Identifica livello
2. Notifica team appropriato
3. Monitora risoluzione
4. Documenta esito
```

## 4. Troubleshooting

### 4.1 Problemi Comuni
```markdown
# Problemi Comuni e Soluzioni

## Calcolo Incentivi
- Problema: Calcoli non corretti
- Soluzione: Verifica parametri e formule

## Integrazione SUA
- Problema: Sincronizzazione fallita
- Soluzione: Controlla API e credenziali

## Performance
- Problema: Lentezza sistema
- Soluzione: Ottimizza query e cache
```

### 4.2 Log e Diagnostica
```bash
# Comandi Diagnostici

# Verifica log
tail -f storage/logs/laravel.log
tail -f storage/logs/error.log

# Verifica cache
php artisan cache:clear
php artisan config:clear

# Verifica database
php artisan db:monitor
php artisan db:show

# Verifica queue
php artisan queue:monitor
php artisan queue:failed
```

### 4.3 Debug
```php
// Configurazione Debug
APP_DEBUG=true
LOG_LEVEL=debug

// Logging
Log::debug('Messaggio di debug', [
    'context' => 'dettagli'
]);

// Dump
dd($variable);
dump($variable);
```

## 5. Manutenzione

### 5.1 Backup
```bash
# Procedure Backup

## Database
mysqldump -u user -p database > backup.sql

## File
tar -czf storage_backup.tar.gz storage/

## Configurazioni
cp .env .env.backup
```

### 5.2 Aggiornamenti
```bash
# Procedure Aggiornamento

## Codice
git pull origin main
composer update
npm update

## Database
php artisan migrate
php artisan db:seed

## Cache
php artisan cache:clear
php artisan config:cache
```

### 5.3 Monitoraggio
```php
// Configurazione Monitoraggio

// Health Check
Route::get('/health', function () {
    return [
        'status' => 'ok',
        'database' => DB::connection()->getPdo() ? 'ok' : 'error',
        'cache' => Cache::get('test') ? 'ok' : 'error',
        'queue' => Queue::size() < 100 ? 'ok' : 'warning'
    ];
});
```

## 6. Documentazione

### 6.1 Wiki
```markdown
# Wiki del Modulo

## Struttura
- Introduzione
- Architettura
- Configurazione
- API
- Troubleshooting

## Aggiornamento
- Procedure
- Template
- Best Practices
```

### 6.2 API Docs
```php
/**
 * @api {post} /api/incentives/calculate Calcola Incentivo
 * @apiName CalculateIncentive
 * @apiGroup Incentives
 *
 * @apiParam {Number} project_id ID Progetto
 * @apiParam {Number} employee_id ID Dipendente
 * @apiParam {Number} activity_id ID Attività
 *
 * @apiSuccess {Number} incentive_amount Importo Incentivo
 * @apiSuccess {Number} base_percentage Percentuale Base
 * @apiSuccess {Array} penalties Penalità
 */
```

### 6.3 Changelog
```markdown
# Changelog

## v1.0.0
- Implementazione iniziale
- Calcolo incentivi
- Integrazione SUA

## v1.1.0
- Ottimizzazioni performance
- Bug fixes
- Nuove feature
```

## 7. Training

### 7.1 Documenti
```markdown
# Documenti di Training

## Manuali
- Guida Utente
- Guida Amministratore
- Guida Tecnica

## Video
- Tutorial Base
- Tutorial Avanzato
- Troubleshooting
```

### 7.2 Sessioni
```markdown
# Sessioni di Training

## Presenza
- Data: 20/03/2024
- Orario: 14:00-16:00
- Luogo: Sala Riunioni

## Online
- Piattaforma: Teams
- Link: https://teams.example.com
- Orario: 15:00-17:00
```

## 8. SLA

### 8.1 Livelli
```markdown
# Service Level Agreement

## Critico
- Tempo risposta: 1h
- Tempo risoluzione: 4h
- Disponibilità: 99.9%

## Alto
- Tempo risposta: 2h
- Tempo risoluzione: 8h
- Disponibilità: 99%

## Medio
- Tempo risposta: 4h
- Tempo risoluzione: 24h
- Disponibilità: 95%

## Basso
- Tempo risposta: 8h
- Tempo risoluzione: 48h
- Disponibilità: 90%
```

### 8.2 Monitoraggio
```php
// Monitoraggio SLA

class SLAMonitor
{
    public function checkResponseTime($ticket)
    {
        $responseTime = $ticket->response_time;
        $sla = $ticket->priority->sla;
        
        return $responseTime <= $sla;
    }
}
```

## 9. Procedure di Emergenza

### 9.1 Incidenti
```markdown
# Procedure Incidenti

## Critici
1. Notifica team
2. Isolamento problema
3. Ripristino servizio
4. Analisi cause
5. Prevenzione

## Non Critici
1. Log incidente
2. Pianifica risoluzione
3. Implementa soluzione
4. Verifica
```

### 9.2 Rollback
```bash
# Procedure Rollback

## Codice
git checkout v1.0.0
composer install
npm install

## Database
mysql -u user -p database < backup.sql

## Configurazioni
cp .env.backup .env
```

## 10. Feedback

### 10.1 Raccolta
```php
// Sistema Feedback

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        return Feedback::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'content' => $request->content,
            'rating' => $request->rating
        ]);
    }
}
```

### 10.2 Analisi
```php
// Analisi Feedback

class FeedbackAnalyzer
{
    public function analyze()
    {
        return [
            'average_rating' => Feedback::avg('rating'),
            'common_issues' => Feedback::groupBy('type')
                                     ->selectRaw('type, count(*) as count')
                                     ->orderByDesc('count')
                                     ->limit(5)
                                     ->get()
        ];
    }
}
```

## 11. Best Practices

### 11.1 Supporto
```markdown
# Best Practices Supporto

## Comunicazione
- Usa linguaggio chiaro
- Fornisci esempi
- Documenta soluzioni

## Risoluzione
- Verifica cause
- Testa soluzioni
- Prevenisci problemi

## Documentazione
- Aggiorna wiki
- Mantieni changelog
- Archivia soluzioni
```

### 11.2 Manutenzione
```markdown
# Best Practices Manutenzione

## Monitoraggio
- Controlla log
- Verifica performance
- Monitora errori

## Backup
- Esegui backup regolari
- Verifica integrità
- Testa ripristino

## Aggiornamenti
- Pianifica aggiornamenti
- Testa in staging
- Documenta cambiamenti
```

## 12. Checklist Supporto

### 12.1 Ticket
- [ ] Verifica priorità
- [ ] Assegna risorsa
- [ ] Analizza problema
- [ ] Implementa soluzione
- [ ] Verifica risoluzione
- [ ] Documenta esito
- [ ] Notifica utente
- [ ] Archivia ticket

### 12.2 Manutenzione
- [ ] Verifica log
- [ ] Controlla performance
- [ ] Esegui backup
- [ ] Aggiorna sistema
- [ ] Pulisci cache
- [ ] Verifica sicurezza
- [ ] Documenta attività
- [ ] Pianifica prossima manutenzione 