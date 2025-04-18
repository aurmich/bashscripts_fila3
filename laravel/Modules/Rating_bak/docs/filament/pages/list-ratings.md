# ListRatings Page Documentation

## Overview
La pagina `ListRatings` è una pagina Filament che gestisce la visualizzazione e la gestione dell'elenco dei rating nel sistema.

## Caratteristiche

### Colonne della Tabella
- `id`: Colonna ordinabile e ricercabile
- `title`: Titolo del rating, ordinabile e ricercabile
- `rule`: Regola del rating, visualizzata come badge
- `is_disabled`: Stato di disabilitazione, visualizzato come icona booleana
- `is_readonly`: Stato di sola lettura, visualizzato come icona booleana

### Azioni
- Visualizza: Azione per visualizzare i dettagli di un rating
- Modifica: Azione per modificare un rating
- Elimina: Azione per eliminare un rating (richiede conferma)

### Azioni Bulk
- Elimina: Permette l'eliminazione di più rating selezionati

### Configurazione Tabella
- Filtri posizionati sopra il contenuto
- Persistenza dei filtri nella sessione
- Azioni posizionate prima delle colonne
- Ordinamento predefinito per data di creazione (DESC)

## Recent Changes
- Rimossi conflitti di merge
- Migliorata la struttura del codice
- Aggiunta documentazione delle funzionalità
- Implementata interfaccia standard Filament 