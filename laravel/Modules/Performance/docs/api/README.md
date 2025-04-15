# API Documentation - Modulo Performance

## Overview
Documentazione completa delle API del modulo Performance.

## Versioning
Le API seguono il semantic versioning (MAJOR.MINOR.PATCH).
Versione corrente: v1.0.0

## Base URL
```
/api/v1/performance
```

## Autenticazione
Tutte le richieste richiedono un token Bearer JWT valido nell'header Authorization:
```
Authorization: Bearer <token>
```

## Endpoints

### Performance

#### List Performances
```http
GET /performances
```

Query Parameters:
- `page`: int - Pagina corrente (default: 1)
- `per_page`: int - Items per pagina (default: 15)
- `sort`: string - Campo ordinamento (default: created_at)
- `order`: string - Direzione ordinamento (asc/desc)
- `filters`: object - Filtri di ricerca

Response:
```json
{
    "data": [
        {
            "id": 1,
            "tipo": "individuale",
            "anno": 2025,
            "periodo": "Q2",
            "stato": "in_corso",
            "created_at": "2025-04-01T08:00:00Z",
            "updated_at": "2025-04-01T08:00:00Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "per_page": 15,
        "total": 100
    }
}
```

#### Get Performance
```http
GET /performances/{id}
```

Response:
```json
{
    "data": {
        "id": 1,
        "tipo": "individuale",
        "anno": 2025,
        "periodo": "Q2",
        "stato": "in_corso",
        "valutazioni": [],
        "obiettivi": [],
        "created_at": "2025-04-01T08:00:00Z",
        "updated_at": "2025-04-01T08:00:00Z"
    }
}
```

#### Create Performance
```http
POST /performances
```

Request:
```json
{
    "tipo": "individuale",
    "anno": 2025,
    "periodo": "Q2"
}
```

Response:
```json
{
    "data": {
        "id": 1,
        "tipo": "individuale",
        "anno": 2025,
        "periodo": "Q2",
        "stato": "bozza",
        "created_at": "2025-04-01T08:00:00Z",
        "updated_at": "2025-04-01T08:00:00Z"
    }
}
```

#### Update Performance
```http
PUT /performances/{id}
```

Request:
```json
{
    "stato": "in_corso"
}
```

Response:
```json
{
    "data": {
        "id": 1,
        "tipo": "individuale",
        "anno": 2025,
        "periodo": "Q2",
        "stato": "in_corso",
        "updated_at": "2025-04-01T08:00:00Z"
    }
}
```

### Valutazioni

#### List Valutazioni
```http
GET /performances/{performance_id}/valutazioni
```

Response:
```json
{
    "data": [
        {
            "id": 1,
            "performance_id": 1,
            "tipo": "obiettivi",
            "punteggio": 85,
            "note": "Ottimo lavoro",
            "created_at": "2025-04-01T08:00:00Z",
            "updated_at": "2025-04-01T08:00:00Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "per_page": 15,
        "total": 10
    }
}
```

#### Create Valutazione
```http
POST /performances/{performance_id}/valutazioni
```

Request:
```json
{
    "tipo": "obiettivi",
    "punteggio": 85,
    "note": "Ottimo lavoro"
}
```

Response:
```json
{
    "data": {
        "id": 1,
        "performance_id": 1,
        "tipo": "obiettivi",
        "punteggio": 85,
        "note": "Ottimo lavoro",
        "created_at": "2025-04-01T08:00:00Z",
        "updated_at": "2025-04-01T08:00:00Z"
    }
}
```

### Obiettivi

#### List Obiettivi
```http
GET /performances/{performance_id}/obiettivi
```

Response:
```json
{
    "data": [
        {
            "id": 1,
            "performance_id": 1,
            "descrizione": "Aumentare efficienza",
            "peso": 30,
            "target": 95,
            "progresso": 85,
            "created_at": "2025-04-01T08:00:00Z",
            "updated_at": "2025-04-01T08:00:00Z"
        }
    ],
    "meta": {
        "current_page": 1,
        "per_page": 15,
        "total": 5
    }
}
```

#### Create Obiettivo
```http
POST /performances/{performance_id}/obiettivi
```

Request:
```json
{
    "descrizione": "Aumentare efficienza",
    "peso": 30,
    "target": 95
}
```

Response:
```json
{
    "data": {
        "id": 1,
        "performance_id": 1,
        "descrizione": "Aumentare efficienza",
        "peso": 30,
        "target": 95,
        "progresso": 0,
        "created_at": "2025-04-01T08:00:00Z",
        "updated_at": "2025-04-01T08:00:00Z"
    }
}
```

## Errors

### Error Codes
- 400: Bad Request - Parametri invalidi
- 401: Unauthorized - Token mancante o invalido
- 403: Forbidden - Permessi insufficienti
- 404: Not Found - Risorsa non trovata
- 422: Unprocessable Entity - Validazione fallita
- 429: Too Many Requests - Rate limit superato
- 500: Internal Server Error - Errore server

### Error Response
```json
{
    "error": {
        "code": "validation_failed",
        "message": "I dati forniti non sono validi",
        "details": {
            "tipo": [
                "Il campo tipo è obbligatorio"
            ]
        }
    }
}
```

## Rate Limiting
- 60 richieste/minuto per IP
- 1000 richieste/ora per token

## Webhooks
Endpoint per ricevere notifiche su eventi:
```
POST /api/v1/performance/webhooks
```

Eventi supportati:
- `performance.created`
- `performance.updated`
- `valutazione.created`
- `valutazione.updated`
- `obiettivo.created`
- `obiettivo.updated`

## Best Practices
1. Utilizzare paginazione per liste lunghe
2. Implementare caching lato client
3. Gestire rate limiting
4. Validare input
5. Gestire errori
6. Logging completo
7. Monitorare performance

## Link Correlati
- [Autenticazione](./auth.md)
- [Webhooks](./webhooks.md)
- [Rate Limiting](./rate-limiting.md)
- [Errors](./errors.md)

---
⬅️ [Torna alla Documentazione](../README.md)
