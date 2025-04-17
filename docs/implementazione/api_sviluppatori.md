# Documentazione delle API per Sviluppatori Terzi

## Introduzione

Questo documento fornisce la documentazione completa delle API pubbliche di Futurely.net, che permettono a sviluppatori terzi di integrare i dati e le funzionalità della piattaforma nelle proprie applicazioni. Le API sono progettate seguendo i principi REST e utilizzano JSON come formato di scambio dati.

## Panoramica delle API

### Base URL

Tutte le richieste API devono essere indirizzate al seguente endpoint base:

```
https://api.futurely.net/v1
```

Le API sono versionate per garantire la compatibilità futura. La versione corrente è `v1`.

### Autenticazione

L'accesso alle API richiede un token di autenticazione. I token possono essere ottenuti attraverso il processo di registrazione nel portale sviluppatori di Futurely.net.

Ogni richiesta deve includere il token nell'header HTTP:

```
Authorization: Bearer YOUR_API_TOKEN
```

### Rate Limiting

Per garantire la stabilità del servizio, le API sono soggette a limiti di utilizzo:

- **Piano Base**: 60 richieste al minuto
- **Piano Pro**: 300 richieste al minuto
- **Piano Enterprise**: Limiti personalizzati

Gli header di risposta includono informazioni sul rate limiting:

```
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 58
X-RateLimit-Reset: 1625176800
```

### Formati di Risposta

Tutte le risposte sono in formato JSON. Un esempio di risposta di successo:

```json
{
  "data": {
    "id": 123,
    "title": "Esempio di mercato",
    "description": "Descrizione del mercato",
    "outcomes": ["Sì", "No"],
    "prices": [0.7, 0.3]
  },
  "meta": {
    "timestamp": "2024-06-01T12:00:00Z"
  }
}
```

In caso di errore, la risposta includerà un codice di stato HTTP appropriato e dettagli sull'errore:

```json
{
  "error": {
    "code": "invalid_request",
    "message": "Il parametro 'market_id' è obbligatorio",
    "status": 400
  }
}
```

## Endpoints Disponibili

### Mercati

#### Elenco Mercati

```
GET /markets
```

Restituisce un elenco di mercati predittivi disponibili sulla piattaforma.

**Parametri Query**:

| Parametro | Tipo | Descrizione |
|-----------|------|-------------|
| status | string | Filtra per stato (active, resolved, cancelled) |
| category | string | Filtra per categoria |
| page | integer | Numero di pagina (default: 1) |
| per_page | integer | Elementi per pagina (default: 20, max: 100) |
| sort | string | Campo di ordinamento (created_at, resolution_time, volume) |
| order | string | Direzione ordinamento (asc, desc) |

**Esempio di Risposta**:

```json
{
  "data": [
    {
      "id": 123,
      "title": "L'Italia vincerà gli Europei 2024?",
      "description": "Questo mercato si risolverà positivamente se l'Italia vincerà il campionato europeo di calcio 2024.",
      "status": "active",
      "category": "Sport",
      "resolution_time": "2024-07-14T23:59:59Z",
      "outcomes": ["Sì", "No"],
      "prices": [0.25, 0.75],
      "volume": 15000,
      "created_at": "2024-01-15T10:30:00Z"
    },
    {
      "id": 124,
      "title": "Il Bitcoin supererà i 100.000$ entro fine 2024?",
      "description": "Questo mercato si risolverà positivamente se il prezzo del Bitcoin supererà i 100.000$ su Binance entro il 31 dicembre 2024.",
      "status": "active",
      "category": "Crypto",
      "resolution_time": "2024-12-31T23:59:59Z",
      "outcomes": ["Sì", "No"],
      "prices": [0.65, 0.35],
      "volume": 25000,
      "created_at": "2024-01-20T14:15:00Z"
    }
  ],
  "meta": {
    "current_page": 1,
    "last_page": 5,
    "per_page": 20,
    "total": 98
  }
}
```

#### Dettaglio Mercato

```
GET /markets/{market_id}
```

Restituisce i dettagli completi di un mercato specifico.

**Parametri Path**:

| Parametro | Tipo | Descrizione |
|-----------|------|-------------|
| market_id | integer | ID del mercato |

**Esempio di Risposta**:

```json
{
  "data": {
    "id": 123,
    "title": "L'Italia vincerà gli Europei 2024?",
    "description": "Questo mercato si risolverà positivamente se l'Italia vincerà il campionato europeo di calcio 2024.",
    "status": "active",
    "category": "Sport",
    "resolution_time": "2024-07-14T23:59:59Z",
    "outcomes": ["Sì", "No"],
    "prices": [0.25, 0.75],
    "volume": 15000,
    "created_at": "2024-01-15T10:30:00Z",
    "price_history": [
      {
        "timestamp": "2024-01-15T10:30:00Z",
        "prices": [0.5, 0.5]
      },
      {
        "timestamp": "2024-01-20T12:00:00Z",
        "prices": [0.4, 0.6]
      },
      {
        "timestamp": "2024-01-25T18:30:00Z",
        "prices": [0.3, 0.7]
      },
      {
        "timestamp": "2024-02-01T09:15:00Z",
        "prices": [0.25, 0.75]
      }
    ]
  }
}
```

#### Storico Prezzi

```
GET /markets/{market_id}/price-history
```

Restituisce lo storico dei prezzi per un mercato specifico.

**Parametri Path**:

| Parametro | Tipo | Descrizione |
|-----------|------|-------------|
| market_id | integer | ID del mercato |

**Parametri Query**:

| Parametro | Tipo | Descrizione |
|-----------|------|-------------|
| from | string | Data di inizio (formato ISO 8601) |
| to | string | Data di fine (formato ISO 8601) |
| interval | string | Intervallo di aggregazione (hour, day, week) |

**Esempio di Risposta**:

```json
{
  "data": [
    {
      "timestamp": "2024-01-15T10:30:00Z",
      "prices": [0.5, 0.5]
    },
    {
      "timestamp": "2024-01-16T10:30:00Z",
      "prices": [0.48, 0.52]
    },
    {
      "timestamp": "2024-01-17T10:30:00Z",
      "prices": [0.45, 0.55]
    },
    {
      "timestamp": "2024-01-18T10:30:00Z",
      "prices": [0.42, 0.58]
    },
    {
      "timestamp": "2024-01-19T10:30:00Z",
      "prices": [0.4, 0.6]
    }
  ],
  "meta": {
    "market_id": 123,
    "interval": "day",
    "from": "2024-01-15T00:00:00Z",
    "to": "2024-01-20T00:00:00Z"
  }
}
```

### Transazioni

#### Esecuzione di un Trade

```
POST /trades
```

Permette di eseguire un'operazione di acquisto di azioni per un esito specifico.

**Parametri Body**:

```json
{
  "market_id": 123,
  "outcome_index": 0,
  "amount": 10.5
}
```

| Parametro | Tipo | Descrizione |
|-----------|------|-------------|
| market_id | integer | ID del mercato |
| outcome_index | integer | Indice dell'esito (0-based) |
| amount | number | Quantità di azioni da acquistare |

**Esempio di Risposta**:

```json
{
  "data": {
    "id": 456,
    "market_id": 123,
    "outcome_index": 0,
    "amount": 10.5,
    "cost": 5.25,
    "type": "buy",
    "status": "completed",
    "created_at": "2024-06-01T14:30:00Z"
  }
}
```

#### Elenco Transazioni

```
GET /trades
```

Restituisce l'elenco delle transazioni dell'utente autenticato.

**Parametri Query**:

| Parametro | Tipo | Descrizione |
|-----------|------|-------------|
| market_id | integer | Filtra per ID mercato |
| type | string | Filtra per tipo (buy, reward) |
| status | string | Filtra per stato (completed, pending, failed) |
| page | integer | Numero di pagina (default: 1) |
| per_page | integer | Elementi per pagina (default: 20, max: 100) |

**Esempio di Risposta**:

```json
{
  "data": [
    {
      "id": 456,
      "market_id": 123,
      "market_title": "L'Italia vincerà gli Europei 2024?",
      "outcome_index": 0,
      "outcome": "Sì",
      "amount": 10.5,
      "cost": 5.25,
      "type": "buy",
      "status": "completed",
      "created_at": "2024-06-01T14:30:00Z"
    },
    {
      "id": 455,
      "market_id": 122,
      "market_title": "La Fed alzerà i tassi a luglio 2024?",
      "outcome_index": 1,
      "outcome": "No",
      "amount": 20.0,
      "cost": 12.0,
      "type": "buy",
      "status": "completed",
      "created_at": "2024-05-28T09:15:00Z"
    }
  ],
  "meta": {
    "current_page": 1,
    "last_page": 3,
    "per_page": 20,
    "total": 45
  }
}
```

### Utente

#### Profilo Utente

```
GET /user
```

Restituisce le informazioni del profilo dell'utente autenticato.

**Esempio di Risposta**:

```json
{
  "data": {
    "id": 789,
    "username": "trader123",
    "email": "user@example.com",
    "credits": 250.75,
    "created_at": "2023-12-10T08:45:00Z",
    "stats": {
      "total_trades": 45,
      "active_positions": 12,
      "total_profit": 125.5,
      "accuracy": 0.68
    }
  }
}
```

#### Portafoglio

```
GET /user/portfolio
```

Restituisce il portafoglio dell'utente con le posizioni attive.

**Parametri Query**:

| Parametro | Tipo | Descrizione |
|-----------|------|-------------|
| status | string | Filtra per stato del mercato (active, resolved) |
| page | integer | Numero di pagina (default: 1) |
| per_page | integer | Elementi per pagina (default: 20, max: 100) |

**Esempio di Risposta**:

```json
{
  "data": [
    {
      "market_id": 123,
      "market_title": "L'Italia vincerà gli Europei 2024?",
      "market_status": "active",
      "resolution_time": "2024-07-14T23:59:59Z",
      "positions": [
        {
          "outcome_index": 0,
          "outcome": "Sì",
          "shares": 10.5,
          "average_price": 0.5,
          "current_price": 0.25,
          "value": 2.625,
          "profit_loss": -2.625
        }
      ]
    },
    {
      "market_id": 122,
      "market_title": "La Fed alzerà i tassi a luglio 2024?",
      "market_status": "active",
      "resolution_time": "2024-07-31T23:59:59Z",
      "positions": [
        {
          "outcome_index": 1,
          "outcome": "No",
          "shares": 20.0,
          "average_price": 0.6,
          "current_price": 0.75,
          "value": 15.0,
          "profit_loss": 3.0
        }
      ]
    }
  ],
  "meta": {
    "current_page": 1,
    "last_page": 1,
    "per_page": 20,
    "total": 2,
    "total_value": 17.625,
    "total_profit_loss": 0.375
  }
}
```

## Webhook

Futurely.net offre un sistema di webhook per ricevere notifiche in tempo reale su eventi specifici.

### Registrazione Webhook

```
POST /webhooks
```

Registra un nuovo endpoint webhook.

**Parametri Body**:

```json
{
  "url": "https://example.com/webhook",
  "events": ["market.resolved", "trade.completed"],
  "secret": "your_webhook_secret"
}
```

| Parametro | Tipo | Descrizione |
|-----------|------|-------------|
| url | string | URL dell'endpoint webhook |
| events | array | Eventi da sottoscrivere |
| secret | string | Segreto per la verifica della firma |

**Eventi Disponibili**:

- `market.created`: Nuovo mercato creato
- `market.updated`: Mercato aggiornato
- `market.resolved`: Mercato risolto
- `trade.completed`: Transazione completata
- `price.changed`: Cambio significativo di prezzo

**Esempio di Risposta**:

```json
{
  "data": {
    "id": "wh_123456",
    "url": "https://example.com/webhook",
    "events": ["market.resolved", "trade.completed"],
    "created_at": "2024-06-01T15:00:00Z"
  }
}
```

### Formato Payload Webhook

I webhook inviano un payload JSON con la seguente struttura:

```json
{
  "id": "evt_123456",
  "type": "market.resolved",
  "created_at": "2024-06-01T15:30:00Z",
  "data": {
    "market_id": 123,
    "title": "L'Italia vincerà gli Europei 2024?",
    "winning_outcome_index": 0,
    "winning_outcome": "Sì"
  }
}
```

### Verifica Firma Webhook

Ogni richiesta webhook include un header `X-Futurely-Signature` che contiene una firma HMAC-SHA256 del payload, utilizzando il segreto fornito durante la registrazione. È consigliabile verificare questa firma per garantire l'autenticità della richiesta.

Esempio di verifica in PHP:

```php
$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_FUTURELY_SIGNATURE'];
$secret = 'your_webhook_secret';

$computedSignature = hash_hmac('sha256', $payload, $secret);

if (hash_equals($computedSignature, $signature)) {
    // La richiesta è autentica
    $event = json_decode($payload, true);
    // Processa l'evento
} else {
    // La richiesta non è autentica
    http_response_code(403);
    exit;
}
```

## Widget Integrabili

Futurely.net offre widget JavaScript che possono essere facilmente integrati in siti web esterni.

### Widget Mercato

Questo widget mostra un singolo mercato con i relativi prezzi e permette agli utenti di fare trading direttamente dal sito ospitante.

```html
<div id="futurely-market-widget" data-market-id="123"></div>
<script src="https://widgets.futurely.net/v1/market.js" async></script>
```

**Parametri**:

| Parametro | Tipo | Descrizione |
|-----------|------|-------------|
| data-market-id | string | ID del mercato da visualizzare |
| data-theme | string | Tema del widget (light, dark) |
| data-width | string | Larghezza del widget (default: 100%) |
| data-height | string | Altezza del widget (default: 400px) |
| data-show-trades | boolean | Mostra pulsanti per fare trading (default: true) |

### Widget Lista Mercati

Questo widget mostra una lista di mercati filtrabili.

```html
<div id="futurely-markets-list" data-category="Politics"></div>
<script src="https://widgets.futurely.net/v1/markets-list.js" async></script>
```

**Parametri**:

| Parametro | Tipo | Descrizione |
|-----------|------|-------------|
| data-category | string | Categoria dei mercati da visualizzare |
| data-limit | number | Numero massimo di mercati da visualizzare |
| data-sort | string | Campo di ordinamento (created_at, resolution_time, volume) |
| data-theme | string | Tema del widget (light, dark) |

## Librerie Client

Per semplificare l'integrazione, Futurely.net offre librerie client ufficiali per diversi linguaggi di programmazione.

### JavaScript

```bash
npm install futurely-api-client
```

```javascript
import FuturelyClient from 'futurely-api-client';

const client = new FuturelyClient('YOUR_API_TOKEN');

// Ottieni l'elenco dei mercati
client.markets.list({ category: 'Politics' })
  .then(response => {
    console.log(response.data);
  })
  .catch(error => {
    console.error(error);
  });

// Esegui un trade
client.trades.create({
  market_id: 123,
  outcome_index: 0,
  amount: 10.5
})
  .then(response => {
    console.log(response.data);
  })
  .catch(error => {
    console.error(error);
  });
```

### PHP

```bash
composer require futurely/api-client
```

```php
use Futurely\ApiClient\Client;

$client = new Client('YOUR_API_TOKEN');

// Ottieni l'elenco dei mercati
try {
    $response = $client->markets->list(['category' => 'Politics']);
    $markets = $response->data;
    // Processa i dati
} catch (\Exception $e) {
    echo 'Errore: ' . $e->getMessage();
}

// Esegui un trade
try {
    $response = $client->trades->create([
        'market_id' => 123,
        'outcome_index' => 0,
        'amount' => 10.5
    ]);
    $trade = $response->data;
    // Processa i dati
} catch (\Exception $e) {
    echo 'Errore: ' . $e->getMessage();
}
```

### Python

```bash
pip install futurely-api-client
```

```python
from futurely_api_client import Client

client = Client('YOUR_API_TOKEN')

# Ottieni l'elenco dei mercati
try:
    response = client.markets.list(category='Politics')
    markets = response['data']
    # Processa i dati
except Exception as e:
    print(f'Errore: {str(e)}')

# Esegui un trade
try:
    response = client.trades.create(
        market_id=123,
        outcome_index=0,
        amount=10.5
    )
    trade = response['data']
    # Processa i dati
except Exception as e:
    print(f'Errore: {str(e)}')
```

## Best Practices

### Gestione degli Errori

- Implementare una robusta gestione degli errori per tutte le chiamate API
- Utilizzare i codici di stato HTTP per determinare il tipo di errore
- Implementare tentativi di ripetizione con backoff esponenziale per errori temporanei (429, 503)

### Caching

- Implementare il caching lato client per ridurre il numero di richieste
- Rispettare gli header `Cache-Control` nelle risposte API
- Utilizzare l'header `If-Modified-Since` per le richieste GET

### Sicurezza

- Mantenere i token API al sicuro e non esporli nel codice client
- Utilizzare HTTPS per tutte le richieste
- Implementare la verifica della firma per i webhook
- Ruotare periodicamente i token API

## Supporto e Risorse

### Portale Sviluppatori

Visita il [Portale Sviluppatori](https://developers.futurely.net) per:

- Registrare la tua applicazione
- Ottenere token API
- Accedere alla console di debug
- Visualizzare metriche di utilizzo

### Sandbox

Un ambiente sandbox è disponibile per testare le integrazioni senza utilizzare dati di produzione:

```
https://sandbox-api.futurely.net/v1
```

I token per l'ambiente sandbox possono essere generati nel Portale Sviluppatori.

### Contatti

Per assistenza tecnica, contattare il team di supporto sviluppatori:

- Email: developers@futurely.net
- Discord: [Server Discord Futurely Developers](https://discord.gg/futurely-dev)

## Changelog

### v1.0.0 (2024-06-01)

- Rilascio iniziale delle API pubbliche
- Endpoints per mercati, transazioni e utenti
- Supporto per webhook
- Librerie client per JavaScript, PHP e Python

### v1.1.0 (Pianificato per Q3 2024)

- Supporto per mercati condizionali
- API per la creazione di mercati personalizzati
- Miglioramenti al sistema di webhook
- Nuovi widget integrabili