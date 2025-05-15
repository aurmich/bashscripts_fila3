<<<<<<< HEAD
<<<<<<< HEAD
# Principio DRY negli Script Bash: NO alla duplicazione di funzioni

## PERCHÉ È FONDAMENTALE

La duplicazione di funzioni negli script bash che importano librerie tramite `source` rappresenta un **errore gravissimo** che causa:

- **Incoerenza del comportamento**: quando una funzione viene aggiornata in una libreria ma non nelle sue duplicazioni
- **Complessità di manutenzione esponenziale**: ogni modifica deve essere replicata in più luoghi
- **Comportamenti imprevedibili**: funzioni con lo stesso nome ma implementazioni diverse
- **Debugging impossibile**: difficoltà nel tracciare quale versione della funzione viene effettivamente eseguita
- **Spreco di risorse di sviluppo**: tempo speso a risolvere problemi evitabili
- **Debito tecnico crescente**: ogni duplicazione aumenta il costo futuro di manutenzione

## COSA FARE (E NON FARE)

### Regola d'oro
**Quando uno script bash incorpora una libreria con `source`, NON DEVE MAI ridefinire le funzioni già presenti nella libreria importata.**

### Principi da seguire
- **Singola fonte di verità**: ogni funzione deve esistere in un solo posto (DRY - Don't Repeat Yourself)
- **Centralizzazione**: tutte le funzioni comuni devono risiedere in librerie dedicate in `bashscripts/lib/`
- **Documentazione**: ogni libreria deve documentare chiaramente le funzioni che fornisce
- **Verifica preventiva**: prima di creare una nuova funzione, verificare se esiste già nelle librerie

## ESEMPI PRATICI

### ✅ CORRETTO
```bash
#!/bin/bash
source ./bashscripts/lib/custom.sh
# Utilizzo le funzioni definite in custom.sh senza ridefinirle
validate_input "$@"
process_files "$1"
```

### ❌ ERRATO
```bash
#!/bin/bash
source ./bashscripts/lib/custom.sh
# GRAVE ERRORE: ridefinire funzioni già presenti in custom.sh
function validate_input() {
  # Implementazione duplicata che potrebbe divergere dall'originale
  if [ $# -ne 2 ]; then
    echo "Usage: $0 <path> <remote_repo>"
    exit 1
  fi
}
```

## COLLEGAMENTI ALLA DOCUMENTAZIONE PRINCIPALE

- [Filosofia della Documentazione](/var/www/html/_bases/base_predict_fila3_mono/docs/DOCUMENTATION_PHILOSOPHY.md) - Principi fondamentali di documentazione
- [Patterns](/var/www/html/_bases/base_predict_fila3_mono/docs/PATTERNS.md) - Pattern di progettazione adottati nel progetto
- [Risoluzione Manuale dei Conflitti](/var/www/html/_bases/base_predict_fila3_mono/docs/CONFLICT_RESOLUTION.md) - Principi generali per la risoluzione dei conflitti
- [Risoluzione Conflitti negli Script Bash](/var/www/html/_bases/base_predict_fila3_mono/bashscripts/docs/CONFLICT_RESOLUTION_BASH.md) - Linee guida specifiche per gli script bash

---

> **NOTA IMPORTANTE**: Questa regola è stata aggiornata a seguito di errori gravi di duplicazione riscontrati in diversi script .sh. Il suo rispetto è considerato **CRITICO** per la manutenibilità del progetto.
=======
=======
>>>>>>> 975498ad (fix: auto resolve conflict)
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
<<<<<<< HEAD
>>>>>>> ce77bf25 (🔄 Aggiornamento subtree)
=======
=======
# Principio DRY negli Script Bash: NO alla duplicazione di funzioni

## PERCHÉ È FONDAMENTALE

La duplicazione di funzioni negli script bash che importano librerie tramite `source` rappresenta un **errore gravissimo** che causa:

- **Incoerenza del comportamento**: quando una funzione viene aggiornata in una libreria ma non nelle sue duplicazioni
- **Complessità di manutenzione esponenziale**: ogni modifica deve essere replicata in più luoghi
- **Comportamenti imprevedibili**: funzioni con lo stesso nome ma implementazioni diverse
- **Debugging impossibile**: difficoltà nel tracciare quale versione della funzione viene effettivamente eseguita
- **Spreco di risorse di sviluppo**: tempo speso a risolvere problemi evitabili
- **Debito tecnico crescente**: ogni duplicazione aumenta il costo futuro di manutenzione

## COSA FARE (E NON FARE)

### Regola d'oro
**Quando uno script bash incorpora una libreria con `source`, NON DEVE MAI ridefinire le funzioni già presenti nella libreria importata.**

### Principi da seguire
- **Singola fonte di verità**: ogni funzione deve esistere in un solo posto (DRY - Don't Repeat Yourself)
- **Centralizzazione**: tutte le funzioni comuni devono risiedere in librerie dedicate in `bashscripts/lib/`
- **Documentazione**: ogni libreria deve documentare chiaramente le funzioni che fornisce
- **Verifica preventiva**: prima di creare una nuova funzione, verificare se esiste già nelle librerie

## ESEMPI PRATICI

### ✅ CORRETTO
```bash
#!/bin/bash
source ./bashscripts/lib/custom.sh
# Utilizzo le funzioni definite in custom.sh senza ridefinirle
validate_input "$@"
process_files "$1"
```

### ❌ ERRATO
```bash
#!/bin/bash
source ./bashscripts/lib/custom.sh
# GRAVE ERRORE: ridefinire funzioni già presenti in custom.sh
function validate_input() {
  # Implementazione duplicata che potrebbe divergere dall'originale
  if [ $# -ne 2 ]; then
    echo "Usage: $0 <path> <remote_repo>"
    exit 1
  fi
}
```

## COLLEGAMENTI ALLA DOCUMENTAZIONE PRINCIPALE

- [Filosofia della Documentazione](/var/www/html/_bases/base_predict_fila3_mono/docs/DOCUMENTATION_PHILOSOPHY.md) - Principi fondamentali di documentazione
- [Patterns](/var/www/html/_bases/base_predict_fila3_mono/docs/PATTERNS.md) - Pattern di progettazione adottati nel progetto
- [Risoluzione Manuale dei Conflitti](/var/www/html/_bases/base_predict_fila3_mono/docs/CONFLICT_RESOLUTION.md) - Principi generali per la risoluzione dei conflitti
- [Risoluzione Conflitti negli Script Bash](/var/www/html/_bases/base_predict_fila3_mono/bashscripts/docs/CONFLICT_RESOLUTION_BASH.md) - Linee guida specifiche per gli script bash

---

> **NOTA IMPORTANTE**: Questa regola è stata aggiornata a seguito di errori gravi di duplicazione riscontrati in diversi script .sh. Il suo rispetto è considerato **CRITICO** per la manutenibilità del progetto.
>>>>>>> 43df3e0 (.)
>>>>>>> 975498ad (fix: auto resolve conflict)
