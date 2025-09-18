# Roadmap Modulo Incentivi

## Stato Attuale

### Modelli Implementati
- ✅ `Activity`: Gestione delle attività tecniche
- ✅ `ActivityEmployee`: Relazione tra attività e dipendenti
- ✅ `CapitalPercentage`: Gestione delle percentuali di capitale
- ✅ `DefaultActivity`: Attività predefinite
- ✅ `Employee`: Gestione dei dipendenti
- ✅ `EmployeeWorkgroup`: Relazione tra dipendenti e gruppi di lavoro
- ✅ `Phase`: Gestione delle fasi del progetto
- ✅ `Project`: Gestione dei progetti
- ✅ `Settlement`: Gestione dei liquidazioni
- ✅ `Workgroup`: Gestione dei gruppi di lavoro

### Funzionalità Implementate
- ✅ Struttura base del modulo
- ✅ Interfaccia amministrativa con Filament
- ✅ Gestione base dei progetti e delle attività
- ✅ Gestione dei dipendenti e dei gruppi di lavoro

## Cose da Fare

### 1. Implementazione Regolamento
- [ ] Implementare la logica di calcolo degli incentivi secondo il regolamento
  - [ ] Calcolo percentuali in base all'importo del progetto
  - [ ] Gestione delle quote per lavori, servizi e forniture
  - [ ] Implementare la quota del 20% per innovazione
  - [ ] Gestione dei limiti soggettivi degli incentivi

### 2. Gestione Attività Tecniche
- [ ] Implementare tutte le attività tecniche previste dal regolamento:
  - [ ] Programmazione della spesa per investimenti
  - [ ] RUP e responsabili di procedimento
  - [ ] Collaborazione all'attività del RUP
  - [ ] Redazione documenti di fattibilità
  - [ ] Redazione progetti
  - [ ] Coordinamento sicurezza
  - [ ] Verifica progetti
  - [ ] Predisposizione documenti di gara
  - [ ] Direzione lavori
  - [ ] Collaudo

### 3. Sistema di Calcolo
- [ ] Implementare il sistema di calcolo degli incentivi:
  - [ ] Calcolo base percentuale (2% max)
  - [ ] Graduazione in base alla complessità
  - [ ] Gestione delle quote per tipo di contratto
  - [ ] Calcolo delle penalità per ritardi/costi extra

### 4. Gestione Liquidazioni
- [ ] Implementare il sistema di liquidazione:
  - [ ] Gestione delle competenze temporali
  - [ ] Liquidazione parziale per fasi
  - [ ] Gestione delle liquidazioni annuali
  - [ ] Sistema di attestazione delle attività

### 5. Integrazione con SUA
- [ ] Implementare l'integrazione con la Stazione Unica Appaltante:
  - [ ] Gestione della quota del 25%
  - [ ] Calcolo delle quote per attività SUA
  - [ ] Sistema di richiesta e versamento

### 6. Miglioramenti Interfaccia
- [ ] Migliorare l'interfaccia Filament:
  - [ ] Dashboard con statistiche
  - [ ] Report e analisi
  - [ ] Gestione documenti
  - [ ] Workflow di approvazione

### 7. Testing e Validazione
- [ ] Implementare test completi:
  - [ ] Unit test per i calcoli
  - [ ] Test di integrazione
  - [ ] Test di sistema
  - [ ] Validazione regolamento

### 8. Documentazione
- [ ] Completare la documentazione:
  - [ ] Manuale utente
  - [ ] Documentazione tecnica
  - [ ] Guide operative
  - [ ] Esempi di utilizzo

## Priorità di Implementazione

1. Implementazione base del regolamento
2. Sistema di calcolo incentivi
3. Gestione attività tecniche
4. Sistema di liquidazione
5. Integrazione SUA
6. Miglioramenti interfaccia
7. Testing e validazione
8. Documentazione

## Note Tecniche

- Utilizzare Spatie Laravel Data per la gestione dei dati
- Implementare Spatie QueableActions per le operazioni complesse
- Seguire le best practice Laravel e Laraxot
- Mantenere una struttura modulare e testabile
- Implementare logging completo per audit
- Garantire la tracciabilità di tutte le operazioni 