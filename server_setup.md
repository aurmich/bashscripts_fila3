# Setup del Progetto Laravel

Questo documento contiene la documentazione dettagliata dei comandi utilizzati per il setup di un progetto Laravel, insieme a spiegazioni, consigli e note per migliorare il processo.

## Requisiti di Sistema

### Hardware Minimi
- CPU: 2 core
- RAM: 4GB
- Storage: 20GB SSD
- Network: 100Mbps

### Software Richiesti
- Ubuntu 22.04 LTS o superiore
- PHP 8.2 o superiore
- MySQL 8.0 o superiore
- Apache 2.4 o superiore
- Node.js 18.x o superiore
- Composer 2.x

### Verifica Requisiti
```bash
# Verifica versione PHP
php -v

# Verifica versione MySQL
mysql --version

# Verifica versione Apache
apache2 -v

# Verifica versione Node.js
node -v

# Verifica versione Composer
composer --version
```

## Struttura del Documento

- [Comandi Base](#comandi-base)
- [Configurazione Ambiente](#configurazione-ambiente)
- [Installazione Dipendenze](#installazione-dipendenze)
- [Configurazione Database](#configurazione-database)
- [Note e Consigli](#note-e-consigli)

## Comandi Base

### Installazione Tasksel
```bash
sudo apt install tasksel
```

**Spiegazione:**
- `tasksel` è un tool che permette di installare gruppi di pacchetti predefiniti su sistemi Debian/Ubuntu
- Utile per installare rapidamente ambienti di sviluppo completi
- Richiede privilegi di root (sudo)

**Note:**
- Verificare che il sistema sia aggiornato prima dell'installazione
- Consigliato per sistemi Debian/Ubuntu
- Può essere utilizzato per installare LAMP, LEMP o altri stack di sviluppo

## Configurazione Ambiente

### Aggiunta Repository PHP
```bash
sudo add-apt-repository ppa:ondrej/php
```

**Spiegazione:**
- Aggiunge il repository PPA di Ondřej Surý, che contiene le versioni più recenti e stabili di PHP
- Permette di installare versioni specifiche di PHP (7.4, 8.0, 8.1, 8.2, 8.3)
- Fornisce anche estensioni PHP e pacchetti correlati

**Note:**
- Richiede privilegi di root (sudo)
- Dopo l'aggiunta del repository, è necessario aggiornare la lista dei pacchetti con `sudo apt update`
- Questo repository è considerato uno dei più affidabili per PHP su Ubuntu
- Consigliato per progetti che necessitano di versioni specifiche di PHP

### Configurazione File .env
```bash
# Naviga nella directory del progetto
cd laravel

# Copia il file .env.latest in .env
cp .env.latest .env

# Genera una nuova APP_KEY
php artisan key:generate
```

**Spiegazione:**
- Configura l'ambiente di sviluppo Laravel
- `cp .env.latest .env`: Copia il file di configurazione template in .env
- `php artisan key:generate`: Genera una nuova chiave di applicazione sicura

**Funzionalità:**
- Configurazione base dell'ambiente
- Generazione chiave di crittografia
- Impostazione variabili d'ambiente
- Preparazione per lo sviluppo

**Note:**
- Assicurarsi di essere nella directory corretta del progetto
- Verificare che il file .env.latest esista
- Dopo la generazione della chiave, verificare che sia stata aggiunta al file .env
- Se necessario, configurare manualmente altre variabili d'ambiente:
  ```ini
  APP_NAME=<nome progetto>
  APP_ENV=local
  APP_DEBUG=true
  APP_URL=http://localhost
  ```
- In caso di problemi, verificare i permessi del file .env:
  ```bash
  chmod 644 .env
  ```

## Installazione Dipendenze

### Installazione Stack LAMP
```bash
sudo apt install lamp-server^
```

**Spiegazione:**
- Installa il completo stack LAMP (Linux, Apache, MySQL, PHP)
- Il simbolo `^` alla fine indica che si tratta di un task completo
- Installa automaticamente tutte le dipendenze necessarie

**Componenti Installati:**
- Apache2 (web server)
- MySQL (database server)
- PHP (linguaggio di programmazione)
- Moduli PHP essenziali
- Configurazioni base

**Note:**
- Richiede privilegi di root (sudo)
- Durante l'installazione verrà richiesta la password per MySQL
- Consigliato eseguire `sudo apt update` prima dell'installazione
- Verificare che tutti i servizi siano attivi dopo l'installazione:
  ```bash
  sudo systemctl status apache2
  sudo systemctl status mysql
  ```

### Installazione Strumenti di Sviluppo
```bash
sudo apt install git npm aptitude
```

**Spiegazione:**
- Installa tre strumenti essenziali per lo sviluppo:
  1. `git`: Sistema di controllo versione distribuito
  2. `npm`: Gestore di pacchetti per Node.js
  3. `aptitude`: Interfaccia avanzata per la gestione dei pacchetti

**Componenti Installati:**
- **Git:**
  - Sistema di controllo versione
  - Gestione del codice sorgente
  - Collaborazione in team
- **NPM:**
  - Gestione delle dipendenze JavaScript
  - Installazione di pacchetti Node.js
  - Esecuzione di script
- **Aptitude:**
  - Gestione avanzata dei pacchetti
  - Interfaccia interattiva
  - Risoluzione automatica delle dipendenze

**Note:**
- Richiede privilegi di root (sudo)
- Consigliato eseguire `sudo apt update` prima dell'installazione
- Dopo l'installazione di npm, è consigliabile aggiornarlo:
  ```bash
  sudo npm install -g npm@latest
  ```
- Per Git, configurare l'utente:
  ```bash
  git config --global user.name "Nome Utente"
  git config --global user.email "email@example.com"
  ```

### Installazione Estensioni PHP
```bash
sudo apt-get install -y php libapache2-mod-php php8.*-{cli,bcmath,bz2,intl,gd,mbstring,mysql,zip,common,curl,xml,imap,pdo-sqlite,sqlite3,dom} php-{json,xml,zip,common,tokenizer,mysql,sqlite3} libapache2-mod-php8*
```

**Spiegazione:**
- Installa tutte le estensioni PHP necessarie per lo sviluppo Laravel
- Include moduli per database, manipolazione di stringhe, immagini, ecc.
- Configura automaticamente Apache per utilizzare PHP

**Componenti Installati:**
- Moduli PHP essenziali
- Estensioni per database
- Librerie per manipolazione di stringhe e immagini
- Supporto per JSON, XML e ZIP
- Moduli per SQLite e MySQL

**Note:**
- Richiede privilegi di root (sudo)
- Consigliato eseguire `sudo apt update` prima dell'installazione
- Verificare che tutte le estensioni siano abilitate:
  ```bash
  php -m
  ```
- In caso di problemi, riavviare Apache:
  ```bash
  sudo systemctl restart apache2
  ```

## Configurazione Database

### Creazione Database
```bash
# Accedi a MySQL
sudo mysql

# Crea il database
CREATE DATABASE laravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# Crea l'utente
CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'password';

# Assegna i permessi
GRANT ALL PRIVILEGES ON laravel.* TO 'laravel'@'localhost';

# Applica i cambiamenti
FLUSH PRIVILEGES;

# Esci
EXIT;
```

**Spiegazione:**
- Crea un nuovo database per il progetto Laravel
- Configura un utente dedicato con i permessi necessari
- Imposta il charset e la collation corretti

**Note:**
- Sostituire 'password' con una password sicura
- Verificare che il database sia stato creato correttamente:
  ```bash
  mysql -u laravel -p -e "SHOW DATABASES;"
  ```
- Aggiornare il file .env con le credenziali del database:
  ```ini
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=laravel
  DB_PASSWORD=password
  ```

## Note e Consigli

### Sicurezza
- Utilizzare sempre password complesse
- Limitare i permessi degli utenti al minimo necessario
- Mantenere il sistema aggiornato
- Configurare il firewall (UFW)
- Utilizzare HTTPS

### Performance
- Configurare la cache di OPcache
- Ottimizzare le query del database
- Utilizzare un CDN per i file statici
- Implementare la cache a livello di applicazione
- Monitorare le risorse del server

### Manutenzione
- Eseguire backup regolari
- Monitorare i log
- Aggiornare regolarmente le dipendenze
- Testare le modifiche in ambiente di sviluppo
- Documentare le configurazioni

### Troubleshooting
- Controllare i log di Apache e PHP
- Verificare i permessi dei file
- Testare la connessione al database
- Controllare la configurazione di PHP

## Conclusioni

Questo documento fornisce una guida completa per il setup di un ambiente di sviluppo Laravel. Seguire attentamente le istruzioni e verificare ogni passaggio per garantire un'installazione corretta e sicura.

Per ulteriori informazioni, consultare la [documentazione ufficiale di Laravel](https://laravel.com/docs).
