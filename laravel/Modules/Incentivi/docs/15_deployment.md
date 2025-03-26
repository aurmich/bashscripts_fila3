# Guida al Deployment Modulo Incentivi

## 1. Requisiti di Sistema

### 1.1 Requisiti Hardware
- CPU: 2 core minimo
- RAM: 4GB minimo
- Disco: 50GB minimo
- Rete: 100Mbps minimo

### 1.2 Requisiti Software
- PHP 8.1 o superiore
- MySQL 8.0 o superiore
- Composer 2.0 o superiore
- Node.js 16.x o superiore
- NPM 8.x o superiore

### 1.3 Estensioni PHP
- BCMath
- Ctype
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML

## 2. Preparazione Ambiente

### 2.1 Configurazione Server
```bash
# Aggiorna il sistema
sudo apt update && sudo apt upgrade -y

# Installa i pacchetti necessari
sudo apt install -y \
    php8.1-fpm \
    php8.1-mysql \
    php8.1-xml \
    php8.1-curl \
    php8.1-mbstring \
    php8.1-zip \
    php8.1-gd \
    nginx \
    mysql-server \
    nodejs \
    npm
```

### 2.2 Configurazione PHP
```ini
# /etc/php/8.1/fpm/php.ini
memory_limit = 256M
upload_max_filesize = 64M
post_max_size = 64M
max_execution_time = 300
max_input_time = 300
```

### 2.3 Configurazione MySQL
```sql
-- Crea il database
CREATE DATABASE incentive_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Crea l'utente
CREATE USER 'incentive_user'@'localhost' IDENTIFIED BY 'password';

-- Assegna i permessi
GRANT ALL PRIVILEGES ON incentive_db.* TO 'incentive_user'@'localhost';
FLUSH PRIVILEGES;
```

## 3. Installazione Modulo

### 3.1 Clonazione Repository
```bash
# Clona il repository
git clone https://github.com/example/incentivi.git

# Entra nella directory
cd incentivi

# Installa le dipendenze PHP
composer install --no-dev --optimize-autoloader

# Installa le dipendenze Node.js
npm install
```

### 3.2 Configurazione Ambiente
```bash
# Copia il file di configurazione
cp .env.example .env

# Genera la chiave dell'applicazione
php artisan key:generate

# Configura le variabili d'ambiente
nano .env
```

### 3.3 Configurazione File
```env
APP_NAME=Incentivi
APP_ENV=production
APP_KEY=base64:...
APP_DEBUG=false
APP_URL=https://example.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=incentive_db
DB_USERNAME=incentive_user
DB_PASSWORD=password

SUA_API_URL=https://api.sua.example.com
SUA_API_KEY=your_api_key
SUA_API_SECRET=your_api_secret
```

## 4. Database

### 4.1 Migrazione
```bash
# Esegui le migrazioni
php artisan migrate --force

# Popola il database con i dati iniziali
php artisan db:seed --force
```

### 4.2 Backup
```bash
# Crea una directory per i backup
mkdir -p /var/backups/incentivi

# Backup del database
mysqldump -u incentive_user -p incentive_db > /var/backups/incentivi/backup_$(date +%Y%m%d).sql
```

## 5. Configurazione Web Server

### 5.1 Nginx
```nginx
# /etc/nginx/sites-available/incentivi
server {
    listen 80;
    server_name example.com;
    root /var/www/incentivi/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 5.2 SSL
```bash
# Installa Certbot
sudo apt install certbot python3-certbot-nginx

# Ottieni il certificato SSL
sudo certbot --nginx -d example.com
```

## 6. Ottimizzazione

### 6.1 Cache
```bash
# Ottimizza la configurazione
php artisan config:cache

# Ottimizza le route
php artisan route:cache

# Ottimizza le viste
php artisan view:cache
```

### 6.2 Assets
```bash
# Compila gli assets
npm run production
```

### 6.3 Permessi
```bash
# Imposta i permessi corretti
sudo chown -R www-data:www-data /var/www/incentivi
sudo chmod -R 755 /var/www/incentivi
sudo chmod -R 775 /var/www/incentivi/storage
sudo chmod -R 775 /var/www/incentivi/bootstrap/cache
```

## 7. Monitoraggio

### 7.1 Log
```bash
# Configura la rotazione dei log
sudo nano /etc/logrotate.d/incentivi
```

```conf
/var/www/incentivi/storage/logs/*.log {
    daily
    missingok
    rotate 14
    compress
    delaycompress
    notifempty
    create 0640 www-data www-data
    sharedscripts
    postrotate
        /usr/bin/sudo -u www-data /usr/bin/php /var/www/incentivi/artisan log:rotate
    endscript
}
```

### 7.2 Monitoraggio Sistema
```bash
# Installa Prometheus
sudo apt install prometheus

# Installa Node Exporter
sudo apt install prometheus-node-exporter

# Configura Prometheus
sudo nano /etc/prometheus/prometheus.yml
```

```yaml
global:
  scrape_interval: 15s
  evaluation_interval: 15s

scrape_configs:
  - job_name: 'node'
    static_configs:
      - targets: ['localhost:9100']
```

## 8. Manutenzione

### 8.1 Aggiornamenti
```bash
# Aggiorna il codice
git pull origin main

# Aggiorna le dipendenze
composer update --no-dev
npm update

# Esegui le migrazioni
php artisan migrate --force

# Pulisci la cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### 8.2 Backup
```bash
# Backup automatico
0 2 * * * /usr/bin/mysqldump -u incentive_user -p incentive_db > /var/backups/incentivi/backup_$(date +\%Y\%m\%d).sql
```

### 8.3 Pulizia
```bash
# Rimuovi i file temporanei
php artisan cache:clear
php artisan view:clear

# Rimuovi i log vecchi
find /var/www/incentivi/storage/logs -type f -name "*.log" -mtime +30 -delete
```

## 9. Troubleshooting

### 9.1 Log
```bash
# Visualizza i log di Laravel
tail -f /var/www/incentivi/storage/logs/laravel.log

# Visualizza i log di Nginx
tail -f /var/log/nginx/error.log
tail -f /var/log/nginx/access.log

# Visualizza i log di PHP
tail -f /var/log/php8.1-fpm.log
```

### 9.2 Permessi
```bash
# Verifica i permessi
ls -la /var/www/incentivi
ls -la /var/www/incentivi/storage
ls -la /var/www/incentivi/bootstrap/cache

# Ripristina i permessi
sudo chown -R www-data:www-data /var/www/incentivi
sudo chmod -R 755 /var/www/incentivi
sudo chmod -R 775 /var/www/incentivi/storage
sudo chmod -R 775 /var/www/incentivi/bootstrap/cache
```

### 9.3 Database
```bash
# Verifica lo stato del database
php artisan db:monitor

# Verifica le migrazioni
php artisan migrate:status

# Ripara il database
php artisan db:repair
```

## 10. Rollback

### 10.1 Backup
```bash
# Crea un backup prima del rollback
mysqldump -u incentive_user -p incentive_db > /var/backups/incentivi/rollback_$(date +%Y%m%d).sql
```

### 10.2 Ripristino
```bash
# Ripristina il backup
mysql -u incentive_user -p incentive_db < /var/backups/incentivi/rollback_20240320.sql

# Ripristina il codice
git checkout <commit_hash>
```

### 10.3 Verifica
```bash
# Verifica lo stato del sistema
php artisan about

# Verifica i servizi
systemctl status nginx
systemctl status php8.1-fpm
systemctl status mysql
``` 