# ERRORE GRAVE: Duplicazione di funzioni in presenza di 'source'

## Regola fondamentale per script Bash modulari

Quando in uno script .sh si incorporano altre librerie tramite `source ./bashscripts/lib/custom.sh` (o simili):
- **NON bisogna mai riscrivere le stesse funzioni già definite nelle librerie importate**.
- Ogni funzione deve essere definita una sola volta, nella libreria più adatta.
- La duplicazione di codice rompe il principio DRY, genera bug difficili da tracciare e rende la manutenzione impossibile.
- Prima di scrivere una funzione, controlla se esiste già in una delle librerie importate.
- Aggiorna la documentazione e le rules ogni volta che una funzione viene spostata o centralizzata.

## Motivazione (WHY)
- Garantire la manutenibilità, la chiarezza e la robustezza degli script.
- Evitare conflitti, shadowing e comportamenti inattesi.
- Facilitare l'estensione e il riuso del codice.

## Azione (WHAT)
- Centralizza sempre le funzioni riutilizzabili nelle librerie.
- Importa solo ciò che serve con `source` e NON duplicare mai le funzioni.
- Aggiorna la documentazione e le rules globali su questa regola.

---

> Questa regola è stata aggiornata a seguito di un errore grave di duplicazione in uno script .sh. Va rispettata e diffusa in tutto il progetto.
