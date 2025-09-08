
# BashScripts - Organizzazione Script

## Regola Fondamentale

**TUTTI gli script** (PHP, Bash, Python, etc.) devono essere posizionati **SEMPRE** in questa cartella `bashscripts`, **MAI** nella directory Laravel o in altre posizioni.

## Struttura Organizzativa

```bashscripts/
├── README.md                    # Questo file
├── database/                    # Script relativi al database
│   ├── seeding/                # Script per popolamento database
│   │   ├── saluteora-1000-records.php        # 🎯 PRINCIPALE: 1000 record per modello
│   │   ├── saluteora-20-studios-66010.php    # 🆕 NUOVO: 20 studi con postal_code 66010 + dottori
│   │   ├── saluteora-mass-seeding.php         # Popolamento massivo SaluteOra
│   │   ├── salutemo-database-seeding.php      # Popolamento SaluteMo
│   │   ├── tinker-commands.php                 # Comandi per Tinker
│   │   ├── tinker-1000-records.php            # Script Tinker per 1000 record
│   │   ├── tinker-20-studios-66010.php        # 🆕 Script Tinker per 20 studi + dottori
│   │   └── QUICK_START.md                     # Guida rapida all'utilizzo
│   ├── migration/              # Script per gestione migrazioni
│   └── backup/                 # Script per backup database
├── maintenance/                 # Script di manutenzione
│   ├── cleanup/                # Script di pulizia
│   └── optimization/           # Script di ottimizzazione
├── deployment/                  # Script di deployment
│   ├── staging/                # Script per ambiente staging
│   └── production/             # Script per ambiente produzione
└── utilities/                   # Script di utilità generale
    ├── monitoring/              # Script di monitoraggio
    └── reporting/               # Script di reporting
```

## Script di Seeding Database

### 🎯 **Script Principale: 1000 Record per Modello**
- **`saluteora-1000-records.php`**: Genera esattamente 1000 doctor, 1000 patients, 1000 studios e 500 appointments
- **`tinker-1000-records.php`**: Versione semplificata per Tinker

### 🆕 **Script Specializzato: 20 Studi con Postal Code 66010**
- **`saluteora-20-studios-66010.php`**: Crea 20 studi medici con postal_code = '66010' e **garantisce che ogni studio abbia almeno un dottore collegato**
- **`tinker-20-studios-66010.php`**: Versione Tinker per 20 studi + dottori

**Caratteristiche principali:**
- 🎯 **20 studi medici** con postal_code fisso 66010 (Chieti, Abruzzo)
- 👨‍⚕️ **Almeno 1 dottore** per ogni studio (garantito)
- 🏥 **Nomi specializzati** per ogni studio (Cardiologico, Ortopedico, etc.)
- 📍 **Indirizzi realistici** nella zona di Chieti
- 🔗 **Relazioni automatiche** tra studi e dottori
- ✅ **Verifica finale** che ogni studio abbia dottori

### **Script Generali**
- **`saluteora-mass-seeding.php`**: Popolamento massivo generale
- **`salutemo-database-seeding.php`**: Popolamento modulo SaluteMo
- **`tinker-commands.php`**: Comandi generali per Tinker

## Utilizzo degli Script

### Esecuzione Diretta (Raccomandata)

```bash
# Dalla root del progetto
cd /var/www/html/_bases/base_saluteora

<<<<<<< HEAD
# Script per 20 studi con dottori (RACCOMANDATO per iniziare)
php bashscripts/database/seeding/saluteora-20-studios-66010.php

# Script per 1000 record per modello
php bashscripts/database/seeding/saluteora-1000-records.php
=======
# Rendi gli script eseguibili
<<<<<<< HEAD
=======
chmod +x *.sh
>>>>>>> 574afe9e (.)
chmod +x scripts/**/*.sh
>>>>>>> 7de7063d (.)
```

### Esecuzione via Tinker

```bash
<<<<<<< HEAD
# Dalla directory Laravel
cd laravel

# Avvia Tinker
php artisan tinker

# Incolla il contenuto dello script desiderato
# Lo script si eseguirà automaticamente
=======
<<<<<<< HEAD
=======
./git_sync_subtree.sh <path> <remote_repo>
>>>>>>> 574afe9e (.)
./scripts/git/git_sync_subtree.sh <path> <remote_repo>
>>>>>>> 7de7063d (.)
```

## Caratteristiche degli Script

### Gestione Relazioni Garantite
- **Studio ↔ Doctor**: Ogni studio ha almeno un dottore
- **Doctor ↔ Appointment**: Appuntamenti collegati ai dottori
- **Patient ↔ Appointment**: Pazienti collegati agli appuntamenti

### Dati Realistici e Specializzati
- **Nomi italiani** per dottori e pazienti
- **Indirizzi reali** nella zona di Chieti (66010)
- **Specializzazioni mediche** specifiche per ogni studio
- **Contatti e orari** realistici per studi medici

### Performance e Sicurezza
- **Creazione in batch** per grandi volumi
- **Disabilitazione foreign key** durante il seeding
- **Transazioni ottimizzate** per consistenza
- **Verifica automatica** dell'integrità dei dati

## Esempi di Output

### Script 20 Studi con Dottori

```bash
🏥 Creazione 20 studi medici con postal_code = 66010 e dottori collegati...
✅ Studio creato: Centro Medico Chieti Centro (ID: 1)
✅ Studio creato: Studio Dentistico Chieti Nord (ID: 2)
...
👨‍⚕️ Dottore creato: Dr. Mario Rossi - Cardiologia per studio Centro Medico Chieti Centro
👨‍⚕️ Dottore creato: Dr. Anna Bianchi - Dermatologia per studio Studio Dentistico Chieti Nord
...
✅ SUCCESSO: Tutti gli studi hanno almeno un dottore collegato!
```

### Script 1000 Record

```bash
<<<<<<< HEAD
🚀 Inizializzazione seeding massivo SaluteOra - 1000 record per modello...
📊 RISULTATO FINALE:
  - Studi creati: 1000
  - Dottori totali: 1000
  - Pazienti totali: 1000
  - Appuntamenti totali: 500
=======
<<<<<<< HEAD
=======

# Sincronizza un modulo specifico
./git_sync_subtree.sh modules/users git@github.com:org/users.git

# Sincronizza con branch specifico
REMOTE_BRANCH=develop ./git_sync_subtree.sh modules/auth git@github.com:org/auth.git
>>>>>>> 574afe9e (.)
# Sincronizza un modulo specifico
./scripts/git/git_sync_subtree.sh modules/users git@github.com:org/users.git

# Sincronizza con branch specifico
REMOTE_BRANCH=develop ./scripts/phpstan/check_before_phpstan.sh

# Genera riassunto PHPStan
./scripts/phpstan/generate_phpstan_summary.sh
>>>>>>> 7de7063d (.)
```

## Documentazione Correlata

- [Database Seeding](../docs/database-seeding.md) - Documentazione completa seeding
- [Organizzazione Script](../docs/script-organization.md) - Regole generali script
- [Quick Start Seeding](database/seeding/QUICK_START.md) - Guida rapida all'utilizzo

## Best Practices

### Prima dell'Esecuzione
- Backup del database esistente
- Verifica spazio disco disponibile
- Controllo configurazione ambiente
- Test su ambiente di sviluppo

### Durante l'Esecuzione
- Monitorare output e progressi
- Verificare statistiche intermedie
- Controllare utilizzo risorse
- Gestire eventuali errori

### Dopo l'Esecuzione
- Verificare integrità relazioni
- Controllare statistiche finali
- Testare funzionalità applicazione
- Documentare modifiche effettuate

## Troubleshooting

### Errori Comuni
1. **Modulo non trovato**: Verificare installazione modulo SaluteOra
2. **Factory non trovato**: Controllare esistenza factory nel modulo
3. **Errore database**: Verificare migrazioni e configurazione
4. **Memoria insufficiente**: Utilizzare script in batch più piccoli

<<<<<<< HEAD
### Soluzioni
1. **Eseguire migrazioni**: `php artisan migrate`
2. **Verificare autoload**: `composer dump-autoload`
3. **Controllare namespace**: Verificare struttura moduli
4. **Testare connessione**: Verificare configurazione database
=======
1. **Prefix Option Mancante**
   ```bash
   fatal: you must provide the --prefix option
   ```
<<<<<<< HEAD
=======
   ✅ **Soluzione:** Verifica il path del subtree

2. **Push Rejected**
   ```bash
   ! [rejected] dev -> dev (non-fast-forward)
   ```
   ✅ **Soluzione:** Esegui prima un pull
>>>>>>> 574afe9e (.)
   **Soluzione**: Verifica che il path del subtree sia corretto
>>>>>>> 7de7063d (.)

## Note Importanti

- **Regola fondamentale**: Script SEMPRE in `bashscripts/`, MAI in `laravel/`
- **Categorizzazione**: Organizzare script per funzionalità e modulo
- **Documentazione**: Aggiornare sempre docs e README
- **Testing**: Testare sempre in ambiente di sviluppo prima della produzione

---

**Ultimo aggiornamento**: Gennaio 2025
**Versione**: 2.0
**Compatibilità**: Laravel 10+, Moduli SaluteOra/SaluteMo
