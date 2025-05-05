> **Collegamenti correlati**
> - [README.md documentazione generale SaluteOra](../../docs/README.md)
> - [README.md modulo CMS](../../laravel/Modules/Cms/docs/README.md)
> - [README.md modulo Dental](../../laravel/Modules/Dental/docs/README.md)
> - [README.md modulo GDPR](../../laravel/Modules/Gdpr/docs/README.md)
> - [README.md modulo User](../../laravel/Modules/User/docs/README.md)
> - [README.md tema One](../../laravel/Themes/One/docs/README.md)

# 🚀 Toolkit di Automazione Git per Laraxot PTVX

[![PHPStan](https://img.shields.io/badge/PHPStan-Level%209-brightgreen.svg?style=for-the-badge&logo=php&logoColor=white)](../docs/phpstan/ANALISI_MODULI_PHPSTAN.md)
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

aurmich/dev
# 🚀 Git Automation Toolkit

[![PHPStan](https://img.shields.io/badge/PHPStan-Level%209-brightgreen.svg?style=for-the-badge&logo=php&logoColor=white)](docs/phpstan/ANALISI_MODULI_PHPSTAN.md)

## System Requirements
- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- MySQL 8.0+
- Git

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/project.git
cd project
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node.js Dependencies
```bash
npm install
```

### 4. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure Database
Edit the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run Migrations
```bash
php artisan migrate
```

### 7. Install Modules
```bash
# Install Laravel Modules
composer require nwidart/laravel-modules

# Publish module configuration
php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"

# Add Xot module
git remote add -f xot https://github.com/crud-lab/xot.git
git subtree add --prefix Modules/Xot xot main --squash
```

### 8. Compile Assets
```bash
npm run dev
```

### 9. Start Development Server
```bash
php artisan serve
```

## Project Structure

```
project/
├── app/
├── config/
├── database/
├── Modules/
│   ├── Core/
│   ├── Module1/
│   ├── Module2/
│   └── Xot/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
└── docs/
    ├── roadmap/
    └── packages/
```

## Core Modules

### Core
- User management and authentication
- System configuration
- Base functionality

### Module1
- Module 1 specific features
- Data management
- User interface

### Module2
- Module 2 specific features
- Process management
- Integrations

### Xot
- Base framework for modules
- Reusable components
- Common functionality

## Documentation

Complete documentation is available in the `docs/` directory:
- [Project Roadmap](docs/roadmap/README.md)
- [Packages Documentation](docs/packages/README.md)

## Development

### Useful Commands
```bash
# Create a new module
php artisan module:make ModuleName

# Generate module components
php artisan module:make-controller ControllerName ModuleName
php artisan module:make-model ModelName ModuleName
php artisan module:make-migration create_table ModuleName

# Run tests
php artisan test

# Update dependencies
composer update
npm update
```

### Best Practices
- Follow PSR-4 autoloading conventions
- Use proper namespaces for modules
- Document changes in CHANGELOG.md
- Keep tests updated
- Verify cross-browser compatibility

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com)
[![Bash](https://img.shields.io/badge/Bash-4EAA25?style=for-the-badge&logo=gnu-bash&logoColor=white)](https://www.gnu.org/software/bash/)
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)

> **⚠️ WARNING: This toolkit is designed for experienced developers working with complex Git repositories and monorepo structures.**

## 🤔 Why this toolkit?

Developing a complex modular project presents unique challenges:

- **Managing dozens of interdependent modules** that need to stay synchronized
- **Collaboration needs** between teams distributed across different repositories
- **Maintaining code consistency** across multiple branches and organizations
- **Reducing the risk of manual errors** in complex Git operations
- **Automating repetitive processes** to increase productivity
- **Support for static analysis** with PHPStan Level 9

This toolkit addresses these challenges by providing automated tools that simplify workflow and ensure consistency and quality.

## Translations
- [Italiano](docs/README.it.md)
- [Español](docs/README.es.md)

# Script Bash di il progetto

## Struttura degli Script

```
bashscripts/
├── git/              # Script per la gestione Git
├── setup/           # Script di configurazione e setup
├── maintenance/     # Script di manutenzione
├── utils/           # Utility varie
├── backup/          # Script di backup
└── testing/         # Script per i test
```

## Categorie degli Script

### 1. Git (`git/`)
Script per la gestione di Git, inclusi:
- Gestione dei subtree
- Sincronizzazione dei repository
- Risoluzione dei conflitti
- Gestione dei branch

### 2. Setup (`setup/`)
Script per la configurazione iniziale:
- Installazione delle dipendenze
- Configurazione dell'ambiente
- Setup del database
- Configurazione dei moduli

### 3. Maintenance (`maintenance/`)
Script per la manutenzione:
- Pulizia della cache
- Ottimizzazione del database
- Aggiornamento delle dipendenze
- Manutenzione dei file

### 4. Utils (`utils/`)
Utility varie:
- Script di supporto
- Funzioni comuni
- Helper per lo sviluppo

### 5. Backup (`backup/`)
Script per il backup:
- Backup del database
- Backup dei file
- Rotazione dei backup

### 6. Testing (`testing/`)
Script per i test:
- Esecuzione dei test
- Analisi del codice
- Verifica della qualità

## Utilizzo

### 1. Esecuzione degli Script
```bash
# Rendere lo script eseguibile
chmod +x script.sh

# Eseguire lo script
./script.sh
```

### 2. Permessi
- Tutti gli script devono essere eseguibili
- Utilizzare `chmod +x` per rendere eseguibili
- Verificare i permessi prima dell'esecuzione

### 3. Log
- Gli script generano log in `logs/`
- I log sono nominati con il timestamp
- Mantenere i log per il debugging

## Best Practices

### 1. Nomenclatura
- Utilizzare nomi descrittivi
- Seguire il formato `nome_funzione.sh`
- Evitare spazi nei nomi

### 2. Documentazione
- Includere commenti nel codice
- Documentare i parametri
- Specificare i requisiti

### 3. Sicurezza
- Verificare i permessi
- Validare gli input
- Gestire gli errori

## Collegamenti Bidirezionali

<<<<<<< HEAD
- [backup_disk](backup_disk.md) - Funzione per creare backup su disco esterno
- [restore_disk](restore_disk.md) - Funzione per ripristinare backup da disco esterno
- [bottlenecks](bottlenecks.md) - Analisi delle performance e ottimizzazioni
- [scripts](scripts.md) - Documentazione degli script disponibili
- [structure](structure.md) - Struttura del progetto e organizzazione

## Vedi Anche

- [Libreria custom.sh](../lib/custom.sh) - Libreria di funzioni personalizzate
- [Script sync_to_disk.sh](../utils/sync_to_disk.sh) - Script per il backup su disco
- [Script restore_from_disk.sh](../utils/restore_from_disk.sh) - Script per il ripristino da disco
- [Convenzioni di Naming](../../docs/standards/file_naming_conventions.md) - Standard per la nomenclatura dei file
=======
- [Documentazione Git](git/README.md)
- [Documentazione Setup](setup/README.md)
- [Documentazione Maintenance](maintenance/README.md)
- [Documentazione Utils](utils/README.md)
- [Documentazione Backup](backup/README.md)
- [Documentazione Testing](testing/README.md)

## Collegamenti tra versioni di README.md
* [README.md](bashscripts/docs/README.md)
* [README.md](bashscripts/docs/it/README.md)
* [README.md](docs/laravel-app/phpstan/README.md)
* [README.md](docs/laravel-app/README.md)
* [README.md](docs/moduli/struttura/README.md)
* [README.md](docs/moduli/README.md)
* [README.md](docs/moduli/manutenzione/README.md)
* [README.md](docs/moduli/core/README.md)
* [README.md](docs/moduli/installati/README.md)
* [README.md](docs/moduli/comandi/README.md)
* [README.md](docs/phpstan/README.md)
* [README.md](docs/README.md)
* [README.md](docs/module-links/README.md)
* [README.md](docs/troubleshooting/git-conflicts/README.md)
* [README.md](docs/tecnico/laraxot/README.md)
* [README.md](docs/modules/README.md)
* [README.md](docs/conventions/README.md)
* [README.md](docs/amministrazione/backup/README.md)
* [README.md](docs/amministrazione/monitoraggio/README.md)
* [README.md](docs/amministrazione/deployment/README.md)
* [README.md](docs/translations/README.md)
* [README.md](docs/roadmap/README.md)
* [README.md](docs/ide/cursor/README.md)
* [README.md](docs/implementazione/api/README.md)
* [README.md](docs/implementazione/testing/README.md)
* [README.md](docs/implementazione/pazienti/README.md)
* [README.md](docs/implementazione/ui/README.md)
* [README.md](docs/implementazione/dental/README.md)
* [README.md](docs/implementazione/core/README.md)
* [README.md](docs/implementazione/reporting/README.md)
* [README.md](docs/implementazione/isee/README.md)
* [README.md](docs/it/README.md)
* [README.md](laravel/vendor/mockery/mockery/docs/README.md)
* [README.md](laravel/Modules/Chart/docs/README.md)
* [README.md](laravel/Modules/Reporting/docs/README.md)
* [README.md](laravel/Modules/Gdpr/docs/phpstan/README.md)
* [README.md](laravel/Modules/Gdpr/docs/README.md)
* [README.md](laravel/Modules/Notify/docs/phpstan/README.md)
* [README.md](laravel/Modules/Notify/docs/README.md)
* [README.md](laravel/Modules/Xot/docs/filament/README.md)
* [README.md](laravel/Modules/Xot/docs/phpstan/README.md)
* [README.md](laravel/Modules/Xot/docs/exceptions/README.md)
* [README.md](laravel/Modules/Xot/docs/README.md)
* [README.md](laravel/Modules/Xot/docs/standards/README.md)
* [README.md](laravel/Modules/Xot/docs/conventions/README.md)
* [README.md](laravel/Modules/Xot/docs/development/README.md)
* [README.md](laravel/Modules/Dental/docs/README.md)
* [README.md](laravel/Modules/User/docs/phpstan/README.md)
* [README.md](laravel/Modules/User/docs/README.md)
* [README.md](laravel/Modules/User/resources/views/docs/README.md)
* [README.md](laravel/Modules/UI/docs/phpstan/README.md)
* [README.md](laravel/Modules/UI/docs/README.md)
* [README.md](laravel/Modules/UI/docs/standards/README.md)
* [README.md](laravel/Modules/UI/docs/themes/README.md)
* [README.md](laravel/Modules/UI/docs/components/README.md)
* [README.md](laravel/Modules/Lang/docs/phpstan/README.md)
* [README.md](laravel/Modules/Lang/docs/README.md)
* [README.md](laravel/Modules/Job/docs/phpstan/README.md)
* [README.md](laravel/Modules/Job/docs/README.md)
* [README.md](laravel/Modules/Media/docs/phpstan/README.md)
* [README.md](laravel/Modules/Media/docs/README.md)
* [README.md](laravel/Modules/Tenant/docs/phpstan/README.md)
* [README.md](laravel/Modules/Tenant/docs/README.md)
* [README.md](laravel/Modules/Activity/docs/phpstan/README.md)
* [README.md](laravel/Modules/Activity/docs/README.md)
* [README.md](laravel/Modules/Patient/docs/README.md)
* [README.md](laravel/Modules/Patient/docs/standards/README.md)
* [README.md](laravel/Modules/Patient/docs/value-objects/README.md)
* [README.md](laravel/Modules/Cms/docs/blocks/README.md)
* [README.md](laravel/Modules/Cms/docs/README.md)
* [README.md](laravel/Modules/Cms/docs/standards/README.md)
* [README.md](laravel/Modules/Cms/docs/content/README.md)
* [README.md](laravel/Modules/Cms/docs/frontoffice/README.md)
* [README.md](laravel/Modules/Cms/docs/components/README.md)
* [README.md](laravel/Themes/Two/docs/README.md)
* [README.md](laravel/Themes/One/docs/README.md)

>>>>>>> 8244aa81a (,)
