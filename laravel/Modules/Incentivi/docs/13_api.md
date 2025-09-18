# Documentazione API Modulo Incentivi

## 1. Introduzione

Questa documentazione descrive le API disponibili nel modulo Incentivi. Le API sono progettate per permettere l'integrazione con sistemi esterni e l'automazione dei processi di calcolo e gestione degli incentivi.

## 2. Autenticazione

### 2.1 Token
L'autenticazione avviene tramite token Bearer:
```
Authorization: Bearer <token>
```

### 2.2 Ottenimento Token
```http
POST /api/v1/auth/token
Content-Type: application/json

{
    "email": "user@example.com",
    "password": "password"
}
```

### 2.3 Refresh Token
```http
POST /api/v1/auth/refresh
Authorization: Bearer <token>
```

## 3. Progetti

### 3.1 Lista Progetti
```http
GET /api/v1/projects
Authorization: Bearer <token>
```

Parametri query:
- `page`: numero pagina (default: 1)
- `per_page`: elementi per pagina (default: 15)
- `search`: ricerca testuale
- `status`: stato progetto
- `type`: tipo progetto
- `start_date`: data inizio
- `end_date`: data fine

Risposta:
```json
{
    "data": [
        {
            "id": 1,
            "name": "Progetto A",
            "description": "Descrizione progetto",
            "type": "lavori",
            "status": "active",
            "amount": 100000.00,
            "start_date": "2024-01-01",
            "end_date": "2024-12-31",
            "created_at": "2024-01-01T00:00:00Z",
            "updated_at": "2024-01-01T00:00:00Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "per_page": 15,
        "total": 100
    }
}
```

### 3.2 Dettaglio Progetto
```http
GET /api/v1/projects/{id}
Authorization: Bearer <token>
```

Risposta:
```json
{
    "id": 1,
    "name": "Progetto A",
    "description": "Descrizione progetto",
    "type": "lavori",
    "status": "active",
    "amount": 100000.00,
    "start_date": "2024-01-01",
    "end_date": "2024-12-31",
    "activities": [
        {
            "id": 1,
            "name": "Attività 1",
            "type": "technical",
            "status": "completed"
        }
    ],
    "employees": [
        {
            "id": 1,
            "name": "Mario Rossi",
            "role": "RUP"
        }
    ],
    "created_at": "2024-01-01T00:00:00Z",
    "updated_at": "2024-01-01T00:00:00Z"
}
```

### 3.3 Creazione Progetto
```http
POST /api/v1/projects
Authorization: Bearer <token>
Content-Type: application/json

{
    "name": "Nuovo Progetto",
    "description": "Descrizione progetto",
    "type": "lavori",
    "amount": 100000.00,
    "start_date": "2024-01-01",
    "end_date": "2024-12-31",
    "activities": [
        {
            "name": "Attività 1",
            "type": "technical"
        }
    ],
    "employees": [
        {
            "id": 1,
            "role": "RUP"
        }
    ]
}
```

### 3.4 Modifica Progetto
```http
PUT /api/v1/projects/{id}
Authorization: Bearer <token>
Content-Type: application/json

{
    "name": "Progetto Modificato",
    "description": "Nuova descrizione",
    "amount": 150000.00
}
```

### 3.5 Eliminazione Progetto
```http
DELETE /api/v1/projects/{id}
Authorization: Bearer <token>
```

## 4. Calcolo Incentivi

### 4.1 Calcolo Incentivo
```http
POST /api/v1/incentives/calculate
Authorization: Bearer <token>
Content-Type: application/json

{
    "project_id": 1,
    "activities": [
        {
            "id": 1,
            "percentage": 100
        }
    ],
    "penalties": [
        {
            "type": "delay",
            "value": 10
        }
    ]
}
```

Risposta:
```json
{
    "project_id": 1,
    "base_amount": 100000.00,
    "base_percentage": 2.5,
    "penalties": [
        {
            "type": "delay",
            "value": 10,
            "percentage": 1.0
        }
    ],
    "total_percentage": 1.5,
    "total_amount": 1500.00,
    "innovation_fund": 300.00,
    "employee_share": 1200.00,
    "quotes": [
        {
            "employee_id": 1,
            "role": "RUP",
            "percentage": 40,
            "amount": 480.00
        }
    ]
}
```

### 4.2 Validazione Calcolo
```http
POST /api/v1/incentives/validate
Authorization: Bearer <token>
Content-Type: application/json

{
    "calculation_id": 1,
    "validator_id": 1,
    "notes": "Calcolo validato"
}
```

## 5. Liquidazioni

### 5.1 Lista Liquidazioni
```http
GET /api/v1/settlements
Authorization: Bearer <token>
```

Parametri query:
- `page`: numero pagina
- `per_page`: elementi per pagina
- `status`: stato liquidazione
- `employee_id`: ID dipendente
- `start_date`: data inizio
- `end_date`: data fine

### 5.2 Creazione Liquidazione
```http
POST /api/v1/settlements
Authorization: Bearer <token>
Content-Type: application/json

{
    "calculation_id": 1,
    "employee_id": 1,
    "amount": 480.00,
    "payment_method": "bank_transfer"
}
```

### 5.3 Approvazione Liquidazione
```http
POST /api/v1/settlements/{id}/approve
Authorization: Bearer <token>
Content-Type: application/json

{
    "approver_id": 1,
    "notes": "Liquidazione approvata"
}
```

### 5.4 Processo Pagamento
```http
POST /api/v1/settlements/{id}/process
Authorization: Bearer <token>
Content-Type: application/json

{
    "payment_date": "2024-03-20",
    "payment_method": "bank_transfer",
    "reference": "REF123"
}
```

## 6. Integrazione SUA

### 6.1 Sincronizzazione Progetto
```http
POST /api/v1/sua/sync/project
Authorization: Bearer <token>
Content-Type: application/json

{
    "project_id": 1,
    "force": false
}
```

### 6.2 Sincronizzazione Dipendente
```http
POST /api/v1/sua/sync/employee
Authorization: Bearer <token>
Content-Type: application/json

{
    "employee_id": 1,
    "force": false
}
```

### 6.3 Sincronizzazione Attività
```http
POST /api/v1/sua/sync/activity
Authorization: Bearer <token>
Content-Type: application/json

{
    "activity_id": 1,
    "force": false
}
```

## 7. Report

### 7.1 Report Incentivi
```http
GET /api/v1/reports/incentives
Authorization: Bearer <token>
```

Parametri query:
- `start_date`: data inizio
- `end_date`: data fine
- `type`: tipo report
- `format`: formato output (json/csv/excel)

### 7.2 Report Liquidazioni
```http
GET /api/v1/reports/settlements
Authorization: Bearer <token>
```

Parametri query:
- `start_date`: data inizio
- `end_date`: data fine
- `status`: stato liquidazione
- `format`: formato output

## 8. Errori

### 8.1 Formato Errori
```json
{
    "error": {
        "code": "ERROR_CODE",
        "message": "Descrizione errore",
        "details": {
            "field": "messaggio errore"
        }
    }
}
```

### 8.2 Codici Errore
- `AUTH_001`: Token non valido
- `AUTH_002`: Token scaduto
- `AUTH_003`: Permessi insufficienti
- `PROJ_001`: Progetto non trovato
- `PROJ_002`: Dati progetto non validi
- `CALC_001`: Errore nel calcolo
- `CALC_002`: Dati calcolo non validi
- `SETT_001`: Liquidazione non trovata
- `SETT_002`: Dati liquidazione non validi
- `SYNC_001`: Errore sincronizzazione
- `SYNC_002`: Dati non validi

## 9. Rate Limiting

### 9.1 Limiti
- 60 richieste al minuto per utente
- 1000 richieste al giorno per utente
- 100 richieste al minuto per IP

### 9.2 Headers
```
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
X-RateLimit-Reset: 1616239020
```

## 10. Versionamento

### 10.1 Versioni Supportate
- v1: versione corrente
- v2: in sviluppo

### 10.2 URL Versioning
```
/api/v1/...
/api/v2/...
```

## 11. Supporto

### 11.1 Contatti
- Email: api-support@example.com
- Documentazione: https://api.example.com/docs
- Status: https://status.example.com

### 11.2 Changelog
- Aggiornamenti API
- Modifiche funzionalità
- Bug fix 