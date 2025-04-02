# Traduzioni

## Gruppi di Menu

### Schede
Il gruppo "Schede" contiene tutte le schede di valutazione del sistema:

- **Schede Dipendenti** (`individuale_dip.php`)
  - Gestione delle schede di valutazione dei dipendenti
  - Icona: `employee-document`
  - Ordinamento: 31

- **Schede PO** (`individuale_po.php`)
  - Gestione delle schede di valutazione delle Posizioni Organizzative
  - Icona: `po-document`
  - Ordinamento: 32

- **Schede Regionali** (`individuale_regionale.php`)
  - Gestione delle schede di valutazione regionali
  - Icona: `region-document`
  - Ordinamento: 33

### Campi Comuni
Tutte le schede condividono i seguenti campi comuni:

- `periodo`: Periodo di valutazione
- `risultati_ottenuti`: Valutazione dei risultati raggiunti
- `qualita_prestazione`: Valutazione della qualità del lavoro
- `arricchimento_professionale`: Valutazione della crescita professionale
- `impegno`: Valutazione dell'impegno profuso
- `esperienza_acquisita`: Valutazione dell'esperienza maturata

### Messaggi
Tutte le schede condividono i seguenti messaggi di sistema:

- Successo:
  - `created`: Scheda creata con successo
  - `updated`: Scheda aggiornata con successo
  - `deleted`: Scheda eliminata con successo

- Errori:
  - `created`: Errore durante la creazione della scheda
  - `updated`: Errore durante l'aggiornamento della scheda
  - `deleted`: Errore durante l'eliminazione della scheda

## Sintassi Array

Per le traduzioni, utilizzare sempre la sintassi breve degli array PHP:

```