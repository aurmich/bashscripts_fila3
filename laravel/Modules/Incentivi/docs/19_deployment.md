# Documentazione Deployment Modulo Incentivi

## 1. Introduzione

Questa documentazione descrive le procedure e le configurazioni necessarie per il deployment del modulo Incentivi in ambiente di produzione. Il modulo è progettato per essere scalabile e manutenibile.

## 2. Requisiti di Sistema

### 2.1 Hardware
- CPU: 4+ core
- RAM: 8GB+
- Disco: 100GB+ SSD
- Banda: 100Mbps+

### 2.2 Software
```bash
# Requisiti software
PHP >= 8.1
MySQL >= 8.0
Redis >= 6.0
Nginx >= 1.18
Composer >= 2.0
Node.js >= 16.0
```

### 2.3 Estensioni PHP
```ini
# php.ini
extension=redis
extension=memcached
extension=zip
extension=fileinfo
extension=gd
extension=mbstring
extension=pdo_mysql
extension=xml
extension=curl
```

## 3. Preparazione Ambiente

### 3.1 Configurazione Server
```bash
# Aggiorna sistema
sudo apt update && sudo apt upgrade -y

# Installa dipendenze
sudo apt install -y \
    nginx \
    mysql-server \
    redis-server \
    php8.1-fpm \
    php8.1-mysql \
    php8.1-redis \
    php8.1-memcached \
    php8.1-zip \
    php8.1-gd \
    php8.1-mbstring \
    php8.1-xml \
    php8.1-curl \
    composer \
    nodejs \
    npm
```

### 3.2 Configurazione PHP
```ini
# /etc/php/8.1/fpm/php.ini
memory_limit = 256M
max_execution_time = 60
upload_max_filesize = 10M
post_max_size = 10M
max_input_vars = 3000
```

### 3.3 Configurazione MySQL
```sql
-- Configurazione MySQL
CREATE DATABASE incentivi CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'incentivi_user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON incentivi.* TO 'incentivi_user'@'localhost';
FLUSH PRIVILEGES;
```

## 4. Installazione Modulo

### 4.1 Clonazione Repository
```bash
# Clona repository
git clone https://github.com/example/incentivi.git /var/www/html/incentivi

# Imposta permessi
sudo chown -R www-data:www-data /var/www/html/incentivi
sudo chmod -R 755 /var/www/html/incentivi
```

### 4.2 Installazione Dipendenze
```bash
# Installa dipendenze PHP
cd /var/www/html/incentivi
composer install --no-dev --optimize-autoloader

# Installa dipendenze Node.js
npm install
npm run production
```

### 4.3 Configurazione Ambiente
```bash
# Copia file di configurazione
cp .env.example .env

# Genera chiave applicazione
php artisan key:generate

# Configura .env
APP_NAME=Incentivi
APP_ENV=production
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

## 5. Database

### 5.1 Migrazione
```bash
# Esegui migrazioni
php artisan migrate --force

# Esegui seeder
php artisan db:seed --force
```

### 5.2 Backup
```bash
# Backup database
mysqldump -u incentivi_user -p incentivi > backup.sql

# Backup file
tar -czf storage_backup.tar.gz storage/
```

### 5.3 Ripristino
```bash
# Ripristina database
mysql -u incentivi_user -p incentivi < backup.sql

# Ripristina file
tar -xzf storage_backup.tar.gz
```

## 6. Configurazione Web Server

### 6.1 Nginx
```nginx
# /etc/nginx/sites-available/incentivi
server {
    listen 443 ssl http2;
    server_name incentivi.example.com;
    root /var/www/html/incentivi/public;

    ssl_certificate /etc/letsencrypt/live/incentivi.example.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/incentivi.example.com/privkey.pem;

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
# Installa Certbot
sudo apt install certbot python3-certbot-nginx

# Ottieni certificato SSL
sudo certbot --nginx -d incentivi.example.com
```

## 7. Ottimizzazione

### 7.1 Cache
```bash
# Ottimizza cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7.2 Assets
```bash
# Compila assets
npm run production

# Ottimizza immagini
npm run optimize-images
```

### 7.3 Composer
```bash
# Ottimizza autoloader
composer dump-autoload --optimize
```

## 8. Monitoraggio

### 8.1 Log
```bash
# Configurazione log
tail -f /var/www/html/incentivi/storage/logs/laravel.log
tail -f /var/www/html/incentivi/storage/logs/error.log
```

### 8.2 Monitoraggio Sistema
```bash
# Installa strumenti di monitoraggio
sudo apt install -y prometheus node-exporter grafana

# Configura prometheus
cat > /etc/prometheus/prometheus.yml << EOF
global:
  scrape_interval: 15s
  evaluation_interval: 15s

scrape_configs:
  - job_name: 'node'
    static_configs:
      - targets: ['localhost:9100']
EOF
```

### 8.3 Alerting
```php
// config/logging.php
'channels' => [
    'slack' => [
        'driver' => 'slack',
        'url' => env('LOG_SLACK_WEBHOOK_URL'),
        'username' => 'Incentivi Log',
        'emoji' => ':boom:',
        'level' => 'critical',
    ],
]
```

## 9. Manutenzione

### 9.1 Aggiornamenti
```bash
# Aggiorna codice
git pull origin main

# Aggiorna dipendenze
composer update --no-dev
npm update

# Esegui migrazioni
php artisan migrate --force

# Pulisci cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### 9.2 Backup
```bash
# Backup automatico
0 0 * * * mysqldump -u incentivi_user -p incentivi > /backup/db_$(date +\%Y\%m\%d).sql
0 1 * * * tar -czf /backup/storage_$(date +\%Y\%m\%d).tar.gz /var/www/html/incentivi/storage/
```

### 9.3 Pulizia
```bash
# Pulisci file temporanei
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:clear

# Pulisci log
find /var/www/html/incentivi/storage/logs -type f -name "*.log" -mtime +30 -delete
```

## 10. Troubleshooting

### 10.1 Log
```bash
# Verifica log Nginx
tail -f /var/log/nginx/error.log
tail -f /var/log/nginx/access.log

# Verifica log PHP
tail -f /var/log/php8.1-fpm.log

# Verifica log MySQL
tail -f /var/log/mysql/error.log
```

### 10.2 Permessi
```bash
# Verifica permessi
ls -la /var/www/html/incentivi
ls -la /var/www/html/incentivi/storage
ls -la /var/www/html/incentivi/bootstrap/cache

# Correggi permessi
sudo chown -R www-data:www-data /var/www/html/incentivi
sudo chmod -R 755 /var/www/html/incentivi
sudo chmod -R 775 /var/www/html/incentivi/storage
sudo chmod -R 775 /var/www/html/incentivi/bootstrap/cache
```

### 10.3 Servizi
```bash
# Verifica stato servizi
sudo systemctl status nginx
sudo systemctl status php8.1-fpm
sudo systemctl status mysql
sudo systemctl status redis

# Riavvia servizi
sudo systemctl restart nginx
sudo systemctl restart php8.1-fpm
sudo systemctl restart mysql
sudo systemctl restart redis
```

## 11. Rollback

### 11.1 Backup
```bash
# Backup completo
tar -czf /backup/incentivi_$(date +\%Y\%m\%d).tar.gz /var/www/html/incentivi/
mysqldump -u incentivi_user -p incentivi > /backup/db_$(date +\%Y\%m\%d).sql
```

### 11.2 Ripristino
```bash
# Ripristina file
tar -xzf /backup/incentivi_20240320.tar.gz -C /

# Ripristina database
mysql -u incentivi_user -p incentivi < /backup/db_20240320.sql

# Riavvia servizi
sudo systemctl restart nginx
sudo systemctl restart php8.1-fpm
sudo systemctl restart mysql
sudo systemctl restart redis
```

## 12. Checklist Deployment

### 12.1 Pre-Deployment
- [ ] Backup database e file
- [ ] Verifica requisiti di sistema
- [ ] Aggiorna dipendenze
- [ ] Esegui test
- [ ] Verifica configurazioni
- [ ] Pianifica finestra di manutenzione

### 12.2 Deployment
- [ ] Aggiorna codice
- [ ] Installa dipendenze
- [ ] Esegui migrazioni
- [ ] Ottimizza cache
- [ ] Compila assets
- [ ] Verifica permessi
- [ ] Riavvia servizi

### 12.3 Post-Deployment
- [ ] Verifica funzionalità
- [ ] Monitora errori
- [ ] Verifica performance
- [ ] Aggiorna documentazione
- [ ] Notifica utenti
- [ ] Pianifica rollback se necessario 