# RatingMorph Model

Il modello RatingMorph gestisce le relazioni polimorfiche dei rating nell'applicazione, permettendo di associare valutazioni a qualsiasi tipo di modello.

## Caratteristiche principali

- Relazioni polimorfiche per rating flessibili
- Gestione di utenti e profili associati
- Supporto per note e valori personalizzati
- Sistema di premi e vincitori

## Attributi

| Attributo | Tipo | Descrizione |
|-----------|------|-------------|
| id | int | Identificativo univoco |
| model_id | int\|null | ID dell'elemento valutato |
| model_type | string\|null | Tipo dell'elemento valutato |
| rating_id | int | ID del rating associato |
| user_id | string\|null | ID dell'utente che ha dato il rating |
| note | string\|null | Note opzionali |
| value | int\|null | Valore numerico del rating |
| is_winner | bool | Flag per indicare se è un rating vincente |
| reward | string\|null | Premio/ricompensa associata |

## Relazioni

- `rating(): BelongsTo` - Relazione con il rating associato
- `user(): BelongsTo` - Relazione con l'utente che ha dato il rating
- `profile(): BelongsTo` - Relazione con il profilo dell'utente
- `model(): MorphTo` - Relazione polimorfica con il modello valutato

## Casting

I seguenti attributi vengono automaticamente castati ai tipi specificati:
- `is_winner` => boolean
- `value` => integer
- `model_id` => integer
- `rating_id` => integer

## Best Practices

- Utilizzare le relazioni definite per accedere ai dati correlati
- Validare sempre i dati prima dell'assegnazione
- Gestire correttamente le relazioni polimorfiche
- Utilizzare i metodi di query disponibili per filtrare i risultati 