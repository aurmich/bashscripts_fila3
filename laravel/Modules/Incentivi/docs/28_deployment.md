# Documentazione Deployment Modulo Incentivi

## 1. Introduzione

Questa documentazione fornisce informazioni e procedure per il deployment del modulo Incentivi. Il modulo è progettato per essere deployato in modo sicuro e scalabile.

## 2. Requisiti di Sistema

### 2.1 Hardware
```bash
# Requisiti Hardware Minimi
CPU: 2 core
RAM: 4GB
Disco: 50GB SSD
Banda: 10Mbps
```

### 2.2 Software
```bash
# Requisiti Software
PHP: 8.1+
MySQL: 8.0+
Redis: 6.0+
Nginx: 1.18+
Composer: 2.0+
Node.js: 16+
```

### 2.3 Estensioni PHP
```bash
# Estensioni PHP Richieste
php -m | grep -E "bcmath|ctype|fileinfo|json|mbstring|openssl|pdo|tokenizer|xml|zip|redis|mysql"
```

## 3. Preparazione Ambiente

### 3.1 Configurazione Server
```bash
# Aggiornamento Sistema
sudo apt update
sudo apt upgrade -y

# Installazione Dipendenze
sudo apt install -y nginx mysql-server redis-server php8.1-fpm php8.1-mysql php8.1-redis php8.1-xml php8.1-curl php8.1-mbstring php8.1-zip php8.1-gd php8.1-bcmath php8.1-intl php8.1-opcache

# Configurazione PHP
sudo nano /etc/php/8.1/fpm/php.ini
```

### 3.2 Configurazione PHP
```ini
# Configurazione PHP
memory_limit = 256M
max_execution_time = 60
upload_max_filesize = 64M
post_max_size = 64M
max_input_vars = 3000
opcache.enable = 1
opcache.memory_consumption = 128
opcache.interned_strings_buffer = 8
opcache.max_accelerated_files = 4000
opcache.revalidate_freq = 60
opcache.fast_shutdown = 1
opcache.enable_cli = 0
```

### 3.3 Configurazione MySQL
```sql
# Configurazione MySQL
CREATE DATABASE incentivi CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'incentivi_user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON incentivi.* TO 'incentivi_user'@'localhost';
FLUSH PRIVILEGES;
```

## 4. Installazione Modulo

### 4.1 Clonazione Repository
```bash
# Clonazione Repository
git clone https://github.com/your-org/incentivi.git /var/www/html/incentivi
cd /var/www/html/incentivi

# Impostazione Permessi
sudo chown -R www-data:www-data /var/www/html/incentivi
sudo chmod -R 755 /var/www/html/incentivi
sudo chmod -R 775 /var/www/html/incentivi/storage
sudo chmod -R 775 /var/www/html/incentivi/bootstrap/cache
```

### 4.2 Installazione Dipendenze
```bash
# Installazione Dipendenze PHP
composer install --no-dev --optimize-autoloader

# Installazione Dipendenze Node.js
npm install
npm run build
```

### 4.3 Configurazione Ambiente
```bash
# Copia File Ambiente
cp .env.example .env

# Generazione Chiave
php artisan key:generate

# Configurazione Ambiente
nano .env
```

```env
APP_NAME=Incentivi
APP_ENV=production
APP_KEY=base64:your-key
APP_DEBUG=false
APP_URL=https://incentivi.example.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=incentivi
DB_USERNAME=incentivi_user
DB_PASSWORD=password

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

QUEUE_CONNECTION=redis
CACHE_DRIVER=redis
SESSION_DRIVER=redis
```

## 5. Gestione Database

### 5.1 Migrazione Database
```bash
# Esecuzione Migrazioni
php artisan migrate --force

# Esecuzione Seeder
php artisan db:seed --force
```

### 5.2 Backup Database
```bash
# Backup Database
mysqldump -u incentivi_user -p incentivi > backup.sql

# Backup con Compressione
mysqldump -u incentivi_user -p incentivi | gzip > backup.sql.gz
```

### 5.3 Ripristino Database
```bash
# Ripristino Database
mysql -u incentivi_user -p incentivi < backup.sql

# Ripristino da Compressione
gunzip -c backup.sql.gz | mysql -u incentivi_user -p incentivi
```

## 6. Configurazione Web Server

### 6.1 Configurazione Nginx
```nginx
# Configurazione Nginx
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

### 6.2 Configurazione SSL
```bash
# Installazione Certbot
sudo apt install certbot python3-certbot-nginx

# Ottenimento Certificato SSL
sudo certbot --nginx -d incentivi.example.com
```

## 7. Ottimizzazione

### 7.1 Cache
```bash
# Ottimizzazione Cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### 7.2 Asset
```bash
# Compilazione Asset
npm run build
```

### 7.3 Composer
```bash
# Ottimizzazione Composer
composer dump-autoload --optimize
```

## 8. Monitoraggio

### 8.1 Log
```bash
# Configurazione Log
tail -f /var/www/html/incentivi/storage/logs/laravel.log
```

### 8.2 Monitoraggio Sistema
```bash
# Monitoraggio Sistema
htop
iostat
vmstat
```

### 8.3 Monitoraggio Applicazione
```php
// Configurazione Monitoraggio
'providers' => [
    \Laravel\Telescope\TelescopeServiceProvider::class,
],

'aliases' => [
    'Telescope' => \Laravel\Telescope\Facades\Telescope::class,
],
```

## 9. Manutenzione

### 9.1 Aggiornamenti
```bash
# Aggiornamento Codice
git pull origin main

# Aggiornamento Dipendenze
composer update --no-dev
npm update

# Aggiornamento Database
php artisan migrate --force
```

### 9.2 Backup
```bash
# Backup File
tar -czf backup.tar.gz /var/www/html/incentivi

# Backup Database
mysqldump -u incentivi_user -p incentivi > backup.sql
```

### 9.3 Pulizia
```bash
# Pulizia Cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Pulizia Log
find /var/www/html/incentivi/storage/logs -type f -name "*.log" -mtime +30 -delete
```

## 10. Troubleshooting

### 10.1 Log
```bash
# Controllo Log
tail -f /var/www/html/incentivi/storage/logs/laravel.log
tail -f /var/log/nginx/error.log
tail -f /var/log/php8.1-fpm.log
```

### 10.2 Permessi
```bash
# Controllo Permessi
ls -la /var/www/html/incentivi
ls -la /var/www/html/incentivi/storage
ls -la /var/www/html/incentivi/bootstrap/cache
```

### 10.3 Servizi
```bash
# Controllo Servizi
systemctl status nginx
systemctl status php8.1-fpm
systemctl status mysql
systemctl status redis
```

## 11. Procedure di Rollback

### 11.1 Backup
```bash
# Backup File
tar -czf backup.tar.gz /var/www/html/incentivi

# Backup Database
mysqldump -u incentivi_user -p incentivi > backup.sql
```

### 11.2 Ripristino
```bash
# Ripristino File
tar -xzf backup.tar.gz -C /var/www/html/

# Ripristino Database
mysql -u incentivi_user -p incentivi < backup.sql
```

### 11.3 Verifica
```bash
# Verifica Ripristino
php artisan migrate:status
php artisan route:list
php artisan config:clear
php artisan cache:clear
```

## 12. Checklist Deployment

### 12.1 Pre-Deployment
- [ ] Backup database
- [ ] Backup file
- [ ] Verifica requisiti sistema
- [ ] Verifica dipendenze
- [ ] Verifica configurazione
- [ ] Verifica permessi
- [ ] Verifica SSL
- [ ] Verifica DNS

### 12.2 Deployment
- [ ] Aggiornamento codice
- [ ] Installazione dipendenze
- [ ] Configurazione ambiente
- [ ] Migrazione database
- [ ] Compilazione asset
- [ ] Ottimizzazione cache
- [ ] Verifica servizi
- [ ] Verifica log

### 12.3 Post-Deployment
- [ ] Verifica funzionalità
- [ ] Verifica performance
- [ ] Verifica sicurezza
- [ ] Verifica backup
- [ ] Verifica monitoraggio
- [ ] Verifica alerting
- [ ] Verifica documentazione
- [ ] Verifica SLA 