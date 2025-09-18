# Documentazione Deployment Modulo Incentivi

## 1. Introduzione

Questa documentazione fornisce informazioni e procedure per il deployment del modulo Incentivi. Il modulo è progettato per essere deployato in modo efficiente e sicuro.

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
# Requisiti software
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
php8.1-fpm
php8.1-redis
```

### 2.3 Configurazione PHP
```ini
# php.ini
memory_limit = 256M
max_execution_time = 60
upload_max_filesize = 64M
post_max_size = 64M
max_input_vars = 3000
```

## 3. Preparazione Ambiente

### 3.1 Server
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
    php8.1-redis \
    composer \
    nodejs \
    npm
```

### 3.2 PHP
```bash
# Configurazione PHP-FPM
sudo nano /etc/php/8.1/fpm/pool.d/www.conf

# Modifiche da apportare
user = www-data
group = www-data
listen = /run/php/php8.1-fpm.sock
listen.owner = www-data
listen.group = www-data
listen.mode = 0660
pm = dynamic
pm.max_children = 50
pm.start_servers = 5
pm.min_spare_servers = 5
pm.max_spare_servers = 35
```

### 3.3 MySQL
```bash
# Configurazione MySQL
sudo mysql_secure_installation

# Creazione database e utente
sudo mysql -u root -p

CREATE DATABASE incentivi;
CREATE USER 'incentivi_user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON incentivi.* TO 'incentivi_user'@'localhost';
FLUSH PRIVILEGES;
```

## 4. Installazione Modulo

### 4.1 Repository
```bash
# Clonazione repository
git clone https://github.com/your-org/incentivi.git /var/www/html/incentivi

# Permessi
sudo chown -R www-data:www-data /var/www/html/incentivi
sudo chmod -R 755 /var/www/html/incentivi
```

### 4.2 Dipendenze
```bash
# Installazione dipendenze PHP
cd /var/www/html/incentivi
composer install --no-dev --optimize-autoloader

# Installazione dipendenze Node.js
npm install
npm run build
```

### 4.3 Configurazione
```bash
# Copia file di configurazione
cp .env.example .env

# Generazione chiave applicazione
php artisan key:generate

# Configurazione database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=incentivi
DB_USERNAME=incentivi_user
DB_PASSWORD=password

# Configurazione Redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

## 5. Gestione Database

### 5.1 Migrazione
```bash
# Esecuzione migrazioni
php artisan migrate --force

# Esecuzione seeder
php artisan db:seed --force
```

### 5.2 Backup
```bash
# Backup database
mysqldump -u incentivi_user -p incentivi > backup.sql

# Backup compresso
mysqldump -u incentivi_user -p incentivi | gzip > backup.sql.gz
```

### 5.3 Ripristino
```bash
# Ripristino database
mysql -u incentivi_user -p incentivi < backup.sql

# Ripristino compresso
gunzip -c backup.sql.gz | mysql -u incentivi_user -p incentivi
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
sudo apt install -y certbot python3-certbot-nginx

# Ottenimento certificato SSL
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
npm run build
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
tail -f /var/log/nginx/error.log
tail -f /var/log/nginx/access.log
tail -f /var/log/php8.1-fpm.log
```

### 8.2 Sistema
```bash
# Monitoraggio risorse
htop
iostat
vmstat
```

### 8.3 Applicazione
```bash
# Monitoraggio applicazione
php artisan queue:monitor
php artisan queue:failed
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
# Backup file
tar -czf backup.tar.gz /var/www/html/incentivi

# Backup database
mysqldump -u incentivi_user -p incentivi > backup.sql
```

### 9.3 Pulizia
```bash
# Pulizia cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Pulizia log
find /var/www/html/incentivi/storage/logs -type f -name "*.log" -delete
```

## 10. Troubleshooting

### 10.1 Log
```bash
# Controllo log
tail -f /var/www/html/incentivi/storage/logs/laravel.log
tail -f /var/log/nginx/error.log
tail -f /var/log/php8.1-fpm.log
```

### 10.2 Permessi
```bash
# Controllo permessi
ls -la /var/www/html/incentivi
ls -la /var/www/html/incentivi/storage
ls -la /var/www/html/incentivi/bootstrap/cache
```

### 10.3 Servizi
```bash
# Controllo servizi
systemctl status nginx
systemctl status php8.1-fpm
systemctl status mysql
systemctl status redis
```

## 11. Rollback

### 11.1 Backup
```bash
# Backup file
tar -czf backup.tar.gz /var/www/html/incentivi

# Backup database
mysqldump -u incentivi_user -p incentivi > backup.sql
```

### 11.2 Ripristino
```bash
# Ripristino file
tar -xzf backup.tar.gz -C /

# Ripristino database
mysql -u incentivi_user -p incentivi < backup.sql
```

### 11.3 Verifica
```bash
# Verifica ripristino
php artisan migrate:status
php artisan queue:status
```

## 12. Checklist Deployment

### 12.1 Pre-Deployment
- [ ] Backup database
- [ ] Backup file
- [ ] Verifica requisiti
- [ ] Verifica configurazione
- [ ] Verifica permessi
- [ ] Verifica servizi
- [ ] Verifica SSL
- [ ] Verifica DNS

### 12.2 Deployment
- [ ] Aggiornamento codice
- [ ] Aggiornamento dipendenze
- [ ] Aggiornamento database
- [ ] Ottimizzazione cache
- [ ] Compilazione asset
- [ ] Verifica log
- [ ] Verifica performance
- [ ] Verifica sicurezza

### 12.3 Post-Deployment
- [ ] Verifica funzionalità
- [ ] Verifica integrazione
- [ ] Verifica performance
- [ ] Verifica sicurezza
- [ ] Monitoraggio log
- [ ] Monitoraggio errori
- [ ] Monitoraggio risorse
- [ ] Documentazione modifiche 