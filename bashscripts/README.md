<<<<<<< HEAD
# 🚀 Toolkit di Automazione Git

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com)
[![Bash](https://img.shields.io/badge/Bash-4EAA25?style=for-the-badge&logo=gnu-bash&logoColor=white)](https://www.gnu.org/software/bash/)
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)

> **⚠️ ATTENZIONE: Questo toolkit è stato progettato per sviluppatori esperti che lavorano con repository Git complessi e strutture monorepo.**

## 📋 Panoramica

Questo toolkit è una suite completa di script Bash progettata per automatizzare e semplificare la gestione di repository Git complessi, con particolare attenzione alle strutture monorepo e alla sincronizzazione tra organizzazioni. È stato sviluppato per ottimizzare il flusso di lavoro degli sviluppatori e ridurre gli errori umani nelle operazioni Git complesse.

## 🎯 Caratteristiche Principali

### 🔄 Sincronizzazione Avanzata
- Sincronizzazione automatica tra organizzazioni Git
- Gestione intelligente dei submodule
- Supporto per strutture monorepo complesse
- Risoluzione automatica dei conflitti

### 🛠️ Strumenti di Manutenzione
- Pulizia automatica dei repository
- Gestione avanzata dei branch
- Strumenti per la risoluzione dei conflitti
- Backup automatizzato

### 🔍 Controlli e Validazione
- Verifica dello stato del database MySQL
- Controlli pre-commit
- Validazione della struttura del progetto
- Analisi statica del codice PHP

## 📁 Struttura del Toolkit

```
bashscripts/
├── git/                 # Script per la gestione Git
├── maintenance/         # Script di manutenzione
├── checks/             # Script di verifica
└── prompt/             # Template per prompt personalizzati
```

## 🚀 Script Principali

### Git Sync & Organization
- `git_sync_org.sh`: Sincronizza repository tra organizzazioni
- `git_sync_subtree.sh`: Gestisce la sincronizzazione dei subtree
- `git_change_org.sh`: Cambia l'organizzazione del repository

### Manutenzione
- `fix_directory_structure.sh`: Corregge la struttura delle directory
- `resolve_git_conflict.sh`: Risolve automaticamente i conflitti Git
- `backup.sh`: Esegue backup automatizzati

### Verifica
- `check_before_phpstan.sh`: Esegue controlli pre-phpstan
- `check_mysql.sh`: Verifica lo stato del database MySQL

## 💡 Best Practices

1. **Sicurezza**: Tutti gli script includono controlli di sicurezza e validazione
2. **Logging**: Sistema di logging dettagliato per tracciare le operazioni
3. **Conferma**: Richiesta di conferma per operazioni critiche
4. **Rollback**: Supporto per il ripristino in caso di errori

## 🛠️ Requisiti

- Bash 4.0+
- Git 2.0+
- PHP 8.0+ (per alcuni script)
- MySQL (per gli script di verifica database)

## 📚 Documentazione

Per informazioni dettagliate su ogni script, consulta la documentazione specifica:

- [Roadmap del Progetto](docs/roadmap.md)
- [Documentazione del Progetto](docs/project.md)
- [Fasi della Roadmap](docs/roadmap/)
- [Documentazione in Italiano](docs/it/README.md)

## ⚠️ Avvertenze

- Utilizzare con cautela in ambienti di produzione
- Eseguire sempre backup prima di operazioni critiche
- Verificare le modifiche in ambiente di test

## 🤝 Contribuire

Le contribuzioni sono benvenute! Per favore, leggi le linee guida per i contributori prima di inviare pull request.

## 📄 Licenza

Questo progetto è distribuito sotto la licenza MIT. Vedi il file `LICENSE` per maggiori dettagli.

---

<div align="center">
  <sub>Built with ❤️ by the development team</sub>
</div> 
=======
# 🚀 BashScripts Power Tools

[![Bash Version](https://img.shields.io/badge/Bash-5.0%2B-brightgreen.svg)](https://www.gnu.org/software/bash/)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://github.com/aurmich/bashscripts_fila3)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)](http://makeapullrequest.com)

<div align="center">
  <img src="https://raw.githubusercontent.com/odb/official-bash-logo/master/assets/Logos/Icons/PNG/512x512.png" width="200" alt="Bash Logo"/>
  <br/>
  <strong>Potenti script Bash per la gestione avanzata dei subtree Git 🌳</strong>
</div>

## 🌟 Caratteristiche Principali

- 🔄 **Sincronizzazione Automatica** dei subtree Git
- 🛡️ **Gestione Robusta degli Errori**
- 🔍 **Logging Dettagliato**
- 🚦 **Controlli di Sicurezza** integrati
- 🔧 **Manutenzione Semplificata**

## 📚 Indice

- [Installazione](#-installazione)
- [Utilizzo](#-utilizzo)
- [Script Disponibili](#-script-disponibili)
- [Esempi](#-esempi)
- [Risoluzione Problemi](#-risoluzione-problemi)
- [Contribuire](#-contribuire)

## 💻 Installazione

```bash
# Clona il repository
git clone git@github.com:aurmich/bashscripts_fila3.git

# Rendi gli script eseguibili
chmod +x *.sh
```

## 🚀 Utilizzo

### Sincronizzazione Subtree
```bash
./git_sync_subtree.sh <path> <remote_repo>
```

Esempio:
```bash
./git_sync_subtree.sh modules/auth git@github.com:user/auth-module.git
```

## 📜 Script Disponibili

### 1. git_sync_subtree.sh
> 🎯 Script principale per la sincronizzazione dei subtree

**Caratteristiche:**
- Gestione automatica di push e pull
- Rimozione caratteri CR (^M)
- Gestione permessi automatica

### 2. git_push_subtree.sh
> 🔼 Gestisce le operazioni di push

**Funzionalità:**
- Push intelligente con fallback
- Gestione branch temporanei
- Rebase automatico

### 3. git_pull_subtree.sh
> 🔽 Gestisce le operazioni di pull

**Caratteristiche:**
- Pull con squash opzionale
- Gestione conflitti automatica
- Merge strategy personalizzabile

## 🎯 Esempi

### Sincronizzazione Modulo
```bash
# Sincronizza un modulo specifico
./git_sync_subtree.sh modules/users git@github.com:org/users.git

# Sincronizza con branch specifico
REMOTE_BRANCH=develop ./git_sync_subtree.sh modules/auth git@github.com:org/auth.git
```

## ⚠️ Risoluzione Problemi

### Errori Comuni

1. **Prefix Option Mancante**
   ```bash
   fatal: you must provide the --prefix option
   ```
   ✅ **Soluzione:** Verifica il path del subtree

2. **Push Rejected**
   ```bash
   ! [rejected] dev -> dev (non-fast-forward)
   ```
   ✅ **Soluzione:** Esegui prima un pull

## 🛠️ Best Practices

1. **Prima dell'Esecuzione**
   - ✔️ Commit/stash delle modifiche pendenti
   - ✔️ Verifica branch corrente
   - ✔️ Controllo stato repository

2. **Durante l'Esecuzione**
   - 👀 Monitora l'output
   - ⏳ Non interrompere gli script
   - 📝 Controlla i log

## 🤝 Contribuire

Le contribuzioni sono sempre benvenute! Ecco come puoi aiutare:

1. 🍴 Forka il repository
2. 🔧 Crea un branch per le tue modifiche
3. 💻 Committa le tue migliorie
4. 📤 Pusha al branch
5. 🔄 Apri una Pull Request

## 📝 Note sulla Manutenzione

- 🔄 Aggiornamenti regolari
- 🐛 Fix bug tempestivi
- 📚 Documentazione sempre aggiornata

## 📜 Licenza

Questo progetto è sotto licenza MIT - vedi il file [LICENSE](LICENSE) per i dettagli.

## 👥 Autori

- **Marco Sottana** - *Lavoro Iniziale* - [aurmich](https://github.com/aurmich)

## 🙏 Ringraziamenti

- 🌟 Tutti i contributori
- 📚 La comunità Git
- 🔧 Gli utenti che segnalano bug

---

> **Nota**: Questo README è in continuo aggiornamento. Se trovi errori o hai suggerimenti, apri pure una issue!

<div align="center">
  <sub>Built with ❤️ by the development team</sub>
</div>
>>>>>>> 55edff60 (.)
