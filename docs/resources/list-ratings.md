# ListRatings Resource Page

La pagina ListRatings è un componente Filament che gestisce la visualizzazione e la manipolazione dell'elenco dei rating nell'applicazione.

## Caratteristiche principali

- Visualizzazione tabulare dei rating
- Ordinamento e ricerca su colonne specifiche
- Azioni bulk per la gestione multipla
- Filtri persistenti
- Layout personalizzabile
- Supporto per azioni CRUD

## Colonne della tabella

- `id`: Identificativo univoco del rating (ordinabile e ricercabile)
- `title`: Titolo del rating (ordinabile e ricercabile)
- `rule`: Regola associata al rating (visualizzata come badge)
- `is_disabled`: Stato di disabilitazione (visualizzato come icona booleana)
- `is_readonly`: Stato di sola lettura (visualizzato come icona booleana)

## Azioni disponibili

### Azioni singole
- Visualizza: Permette di vedere i dettagli di un rating
- Modifica: Permette di modificare un rating esistente
- Elimina: Permette di eliminare un rating (richiede conferma)

### Azioni bulk
- Elimina: Permette di eliminare più rating contemporaneamente

## Configurazione della tabella

- Ordinamento predefinito per data di creazione (decrescente)
- Layout dei filtri sopra il contenuto
- Persistenza dei filtri in sessione
- Posizionamento delle azioni prima delle colonne

## Best Practices

- Utilizzare i metodi dedicati per estendere le funzionalità (`getTableConfiguration`, `getTableActions`, etc.)
- Mantenere la coerenza con il layout view per colonne e grid
- Implementare la conferma per le azioni distruttive
- Utilizzare le costanti di Filament per la configurazione del layout 