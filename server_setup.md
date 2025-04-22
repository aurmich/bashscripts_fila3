# Setup del Progetto Laravel

Questo documento contiene la documentazione dettagliata dei comandi utilizzati per il setup di un progetto Laravel, insieme a spiegazioni, consigli e note per migliorare il processo.

## Perché questo documento?
Questo documento serve come guida completa per il setup di un ambiente di sviluppo Laravel, con particolare attenzione a:
- Standardizzazione del processo di setup
- Documentazione delle best practices
- Gestione delle dipendenze comuni
- Configurazione ottimale dell'ambiente

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

**Perché?**
- `tasksel` permette di installare rapidamente gruppi di pacchetti predefiniti
- Standardizza l'installazione degli ambienti di sviluppo
- Riduce la possibilità di errori durante il setup

**Note:**
- Verificare che il sistema sia aggiornato prima dell'installazione
- Consigliato per sistemi Debian/Ubuntu
- Può essere utilizzato per installare LAMP, LEMP o altri stack di sviluppo

## Configurazione Ambiente

### Aggiunta Repository PHP
```bash
sudo add-apt-repository ppa:ondrej/php
```

**Perché?**
- Fornisce accesso alle versioni più recenti e stabili di PHP
- Permette di installare versioni specifiche di PHP
- Include estensioni PHP e pacchetti correlati

**Note:**
- Richiede privilegi di root (sudo)
- Dopo l'aggiunta, eseguire `sudo apt update`
- Repository affidabile per PHP su Ubuntu

### Configurazione File .env
```bash
# Naviga nella directory del progetto
cd laravel

# Copia il file .env.latest in .env
cp .env.latest .env

# Genera una nuova APP_KEY
php artisan key:generate
```

**Perché?**
- Configura l'ambiente di sviluppo Laravel
- Genera una chiave di crittografia sicura
- Imposta le variabili d'ambiente necessarie

**Note:**
- Assicurarsi di essere nella directory corretta
- Verificare l'esistenza di .env.latest
- Configurare manualmente altre variabili se necessario:
  ```ini
  APP_NAME=SaluteOra
  APP_ENV=local
  APP_DEBUG=true
  APP_URL=http://localhost
  ```

## Installazione Dipendenze

### Installazione Stack LAMP
```bash
sudo apt install lamp-server^
```

**Perché?**
- Installa il completo stack LAMP in un unico comando
- Garantisce la compatibilità tra i componenti
- Riduce la possibilità di errori di configurazione

**Componenti Installati:**
- Apache2
- MySQL
- PHP
- Moduli PHP essenziali

**Note:**
- Richiede privilegi di root
- Durante l'installazione verrà richiesta la password per MySQL
- Verificare lo stato dei servizi:
  ```bash
  sudo systemctl status apache2
  sudo systemctl status mysql
  ```

### Installazione Strumenti di Sviluppo
```bash
sudo apt install git npm aptitude
```

**Perché?**
- Fornisce gli strumenti essenziali per lo sviluppo
- Facilita la gestione del codice e delle dipendenze
- Migliora la produttività dello sviluppatore

**Componenti:**
- Git: Controllo versione
- NPM: Gestione pacchetti Node.js
- Aptitude: Gestione avanzata pacchetti

**Note:**
- Dopo l'installazione:
  ```bash
  # Aggiorna npm
  sudo npm install -g npm@latest
  
  # Configura Git
  git config --global user.name "Nome Utente"
  git config --global user.email "email@example.com"
  ```

## Configurazione Database

### Creazione Database
```bash
# Accedi a MySQL
mysql -u root -p

# Crea il database
CREATE DATABASE laravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# Crea l'utente
CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'password';

# Concedi i privilegi
GRANT ALL PRIVILEGES ON laravel.* TO 'laravel'@'localhost';

# Applica i cambiamenti
FLUSH PRIVILEGES;
```

**Perché?**
- Crea un ambiente database sicuro e ottimizzato
- Separa i privilegi per motivi di sicurezza
- Utilizza il set di caratteri corretto per il supporto multilingua

**Note:**
- Sostituire 'password' con una password sicura
- Verificare la connessione:
  ```bash
  mysql -u laravel -p laravel
  ```

## Note e Consigli

### Best Practices
1. **Sicurezza:**
   - Utilizzare password complesse
   - Limitare i privilegi degli utenti
   - Mantenere il sistema aggiornato

2. **Performance:**
   - Configurare correttamente PHP-FPM
   - Ottimizzare le impostazioni di MySQL
   - Utilizzare la cache quando possibile

3. **Manutenzione:**
   - Eseguire backup regolari
   - Monitorare i log
   - Aggiornare regolarmente le dipendenze

### Troubleshooting
1. **Problemi di Connessione:**
   - Verificare i permessi del database
   - Controllare le impostazioni di rete
   - Verificare i log di errore

2. **Problemi di Performance:**
   - Ottimizzare le query
   - Configurare la cache
   - Monitorare l'utilizzo delle risorse

### Collegamenti Utili
- [[docs/index|Indice Documentazione]]
- [[docs/architecture/README|Architettura]]
- [[docs/development/README|Guide Sviluppo]]
