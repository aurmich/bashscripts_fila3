# Modulo Performance

## Overview
Il modulo Performance gestisce il sistema di valutazione delle performance, obiettivi e monitoraggio all'interno dell'applicazione.

## Struttura del Modulo

### Models

#### Base Models
- `BaseModel` - Modello base per tutti i modelli del modulo
- Estende `Illuminate\Database\Eloquent\Model`
- Gestisce il type casting comune

#### Core Models
- `Performance` - Gestione performance generali
- `Individuale` - Performance individuali
- `CriteriEsclusione` - Criteri di esclusione
- `CriteriOption` - Opzioni dei criteri
- `IndividualePoPesi` - Pesi per performance individuali

### Traits

#### MutatorTrait
```php
/**
 * @template TModel of Model
 */
trait MutatorTrait
```
Gestisce le mutazioni dei dati per i modelli di performance.

#### FunctionTrait
```php
/**
 * @template TModel of Model
 */
trait FunctionTrait
```
Fornisce funzionalità comuni per i modelli, inclusi:
- Gestione criteri di esclusione
- Gestione opzioni
- Calcolo punteggi

### Actions

#### GetHaDirittoMotivoAction
```php
/**
 * @template TModel of Model
 */
class GetHaDirittoMotivoAction
```
Gestisce la verifica dei diritti e motivi per le performance.

#### TrovaEsclusiAction
Gestisce la ricerca e l'applicazione dei criteri di esclusione.

## Features Principali

### 1. Sistema Valutazioni
- Gestione completa del processo di valutazione
- Criteri personalizzabili
- Periodi di valutazione
- Sistema di feedback
- Stato completamento: 45%

### 2. Sistema Obiettivi
- Definizione e tracking obiettivi
- KPI e metriche
- Milestone
- Monitoraggio progresso
- Stato completamento: 40%

### 3. Sistema Monitoraggio
- Analisi in tempo reale
- Dashboard interattive
- Alerting
- Metriche di performance
- Stato completamento: 35%

## Metriche Tecniche

### Code Quality
- PHPStan Level: 5 (Target: 7)
- Code Coverage: 40-45%
- Test Pass Rate: 35-40%

### Performance
- Response Time Target: < 150ms
- Cache Hit Rate Target: > 95%
- Real-time Update Latency: < 2s

## Dipendenze
- Laravel Framework v10.x
- Laravel WebSockets
- Laravel Horizon
- Redis
- Spatie Data
- Spatie Queryable Actions

## Best Practices

### 1. Modelli
- Tutti i modelli DEVONO estendere `BaseModel`
- Utilizzare type hints e docblock appropriati
- Implementare le interfacce necessarie

### 2. Properties
```php
/** @var list<string> */
protected $fillable = [];

/** @var list<string> */
protected $hidden = [];

/** @var list<string> */
protected $dates = [];
```

### 3. Type Casting
- Gestito centralmente nel BaseModel
- Non implementare type casting nei modelli individuali

### 4. Testing
- Unit test per ogni action
- Integration test per i flussi principali
- Test di performance per operazioni critiche

## Roadmap

### Q2 2025
1. Completare implementazione PHPStan Level 7
2. Aumentare code coverage al 90%
3. Ottimizzare performance del sistema di monitoraggio
4. Implementare nuove dashboard
5. Migliorare sistema di alerting

## Link Correlati
- [Roadmap Dettagliata](./roadmap.md)
- [Sistema Valutazioni](./roadmap/features/valutazioni.md)
- [Sistema Obiettivi](./roadmap/features/obiettivi.md)
- [Sistema Monitoraggio](./roadmap/features/monitoraggio.md)
