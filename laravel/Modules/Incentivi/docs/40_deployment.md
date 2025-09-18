# Documentazione Deployment Modulo Incentivi

## 1. Introduzione

Questa documentazione fornisce informazioni e procedure per il deployment del modulo Incentivi. Il modulo è progettato per essere deployato in modo sicuro ed efficiente.

## 2. Requisiti di Sistema

### 2.1 Hardware
```bash
# Requisiti minimi
CPU: 2 core
RAM: 4GB
SSD: 50GB

# Requisiti consigliati
CPU: 4 core
RAM: 8GB
SSD: 100GB
```

### 2.2 Software
```bash
# Versioni richieste
PHP: 8.1+
MySQL: 8.0+
Redis: 6.0+
Nginx: 1.18+
Composer: 2.0+
Node.js: 16+

# Estensioni PHP richieste
php8.1-cli
php8.1-common
php8.1-mysql
php8.1-zip
php8.1-gd
php8.1-mbstring
php8.1-curl
php8.1-xml
php8.1-bcmath
php8.1-json
php8.1-redis
```

## 3. Preparazione Ambiente

### 3.1 Aggiornamento Server
```bash
# Aggiornamento sistema
sudo apt update
sudo apt upgrade -y

# Installazione dipendenze
sudo apt install -y \
    nginx \
    mysql-server \
    redis-server \
    php8.1-fpm \
    php8.1-cli \
    php8.1-mysql \
    php8.1-zip \
    php8.1-gd \
    php8.1-mbstring \
    php8.1-curl \
    php8.1-xml \
    php8.1-bcmath \
    php8.1-json \
    php8.1-redis \
    composer \
    nodejs \
    npm
```

### 3.2 Configurazione PHP-FPM
```ini
# /etc/php/8.1/fpm/php.ini
memory_limit = 256M
upload_max_filesize = 64M
post_max_size = 64M
max_execution_time = 60
max_input_time = 60
```

### 3.3 Configurazione MySQL
```sql
-- Creazione database
CREATE DATABASE incentivi CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Creazione utente
CREATE USER 'incentivi_user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON incentivi.* TO 'incentivi_user'@'localhost';
FLUSH PRIVILEGES;
```

## 4. Installazione Modulo

### 4.1 Clonazione Repository
```bash
# Clonazione repository
git clone https://github.com/your-org/incentivi.git /var/www/html/incentivi

# Impostazione permessi
sudo chown -R www-data:www-data /var/www/html/incentivi
sudo chmod -R 755 /var/www/html/incentivi
```

### 4.2 Installazione Dipendenze
```bash
# Installazione dipendenze PHP
cd /var/www/html/incentivi
composer install --no-dev --optimize-autoloader

# Installazione dipendenze Node.js
npm install
npm run production
```

### 4.3 Configurazione
```bash
# Copia file di configurazione
cp .env.example .env

# Generazione chiave applicazione
php artisan key:generate

# Configurazione ambiente
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 5. Gestione Database

### 5.1 Migrazioni
```bash
# Esecuzione migrazioni
php artisan migrate --force

# Backup database
php artisan backup:run
```

### 5.2 Backup
```bash
# Backup manuale
php artisan backup:run --only-db

# Backup automatico (crontab)
0 0 * * * cd /var/www/html/incentivi && php artisan backup:run --only-db
```

### 5.3 Ripristino
```bash
# Ripristino backup
php artisan backup:restore --path=/path/to/backup.zip
```

## 6. Configurazione Web Server

### 6.1 Nginx
```nginx
# /etc/nginx/sites-available/incentivi
server {
    listen 80;
    server_name incentivi.example.com;
    root /var/www/html/incentivi/public;

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

### 6.2 SSL
```bash
# Installazione Certbot
sudo apt install certbot python3-certbot-nginx

# Installazione certificato SSL
sudo certbot --nginx -d incentivi.example.com
```

## 7. Ottimizzazione

### 7.1 Cache
```bash
# Ottimizzazione cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7.2 Asset
```bash
# Compilazione asset
npm run production
```

### 7.3 Composer
```bash
# Ottimizzazione autoloader
composer dump-autoload --optimize
```

## 8. Monitoraggio

### 8.1 Log
```bash
# Monitoraggio log
tail -f storage/logs/laravel.log

# Rotazione log
php artisan log:rotate
```

### 8.2 Sistema
```bash
# Monitoraggio risorse
htop
iostat
```

### 8.3 Applicazione
```bash
# Monitoraggio code
php artisan queue:monitor

# Monitoraggio cache
php artisan cache:monitor
```

## 9. Manutenzione

### 9.1 Aggiornamenti
```bash
# Aggiornamento codice
git pull origin main

# Aggiornamento dipendenze
composer update --no-dev
npm update

# Aggiornamento database
php artisan migrate --force
```

### 9.2 Backup
```bash
# Backup completo
php artisan backup:run

# Backup database
php artisan backup:run --only-db

# Backup file
php artisan backup:run --only-files
```

### 9.3 Pulizia
```bash
# Pulizia cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Pulizia log
php artisan log:clear
```

### 9.4 Troubleshooting
```bash
# Verifica permessi
sudo chown -R www-data:www-data /var/www/html/incentivi
sudo chmod -R 755 /var/www/html/incentivi

# Verifica log
tail -f storage/logs/laravel.log

# Verifica configurazione
php artisan config:clear
php artisan config:cache
```

## 10. Rollback

### 10.1 Backup
```bash
# Backup prima del rollback
php artisan backup:run
```

### 10.2 Ripristino
```bash
# Ripristino backup
php artisan backup:restore --path=/path/to/backup.zip

# Rollback migrazioni
php artisan migrate:rollback
```

## 11. Checklist Deployment

### 11.1 Pre-deployment
- [ ] Backup database
- [ ] Backup file
- [ ] Verifica requisiti
- [ ] Verifica dipendenze
- [ ] Verifica configurazione
- [ ] Verifica permessi
- [ ] Verifica SSL
- [ ] Verifica firewall

### 11.2 Deployment
- [ ] Aggiornamento codice
- [ ] Installazione dipendenze
- [ ] Esecuzione migrazioni
- [ ] Compilazione asset
- [ ] Ottimizzazione cache
- [ ] Verifica applicazione
- [ ] Verifica performance
- [ ] Verifica sicurezza

### 11.3 Post-deployment
- [ ] Verifica log
- [ ] Verifica monitoraggio
- [ ] Verifica backup
- [ ] Verifica notifiche
- [ ] Verifica utenti
- [ ] Verifica API
- [ ] Verifica integrazioni
- [ ] Verifica report 