# Documentazione Sicurezza Modulo Incentivi

## 1. Introduzione

Questa documentazione descrive le misure di sicurezza implementate nel modulo Incentivi. Il modulo è progettato per garantire la protezione dei dati sensibili e l'integrità delle operazioni.

## 2. Autenticazione

### 2.1 Sistema di Login
- Autenticazione multi-fattore (MFA)
- Blocco account dopo tentativi falliti
- Password policy robusta
- Sessioni sicure

### 2.2 Password Policy
```php
// config/auth.php
'password_rules' => [
    'min_length' => 12,
    'require_uppercase' => true,
    'require_lowercase' => true,
    'require_numbers' => true,
    'require_special_chars' => true,
    'expire_days' => 90,
    'history_count' => 5
]
```

### 2.3 Sessioni
```php
// config/session.php
'session' => [
    'lifetime' => 120,
    'secure' => true,
    'http_only' => true,
    'same_site' => 'strict'
]
```

## 3. Autorizzazione

### 3.1 Ruoli e Permessi
```php
// config/permissions.php
'roles' => [
    'admin' => [
        'manage_all',
        'view_reports',
        'manage_users'
    ],
    'manager' => [
        'manage_projects',
        'approve_calculations',
        'view_reports'
    ],
    'user' => [
        'view_projects',
        'create_calculations',
        'view_own_settlements'
    ]
]
```

### 3.2 Middleware
```php
// app/Http/Middleware/CheckIncentivePermission.php
class CheckIncentivePermission
{
    public function handle($request, Closure $next, $permission)
    {
        if (!auth()->user()->can($permission)) {
            abort(403, 'Non autorizzato');
        }
        return $next($request);
    }
}
```

## 4. Protezione Dati

### 4.1 Crittografia
```php
// config/app.php
'encryption' => [
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
    'hash_algo' => 'sha256'
]
```

### 4.2 Dati Sensibili
```php
// app/Models/Project.php
protected $encryptable = [
    'description',
    'notes',
    'metadata'
];
```

### 4.3 Sanitizzazione Input
```php
// app/Http/Controllers/ProjectController.php
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'amount' => 'required|numeric|min:0'
    ]);

    $project = Project::create($validated);
}
```

## 5. Protezione API

### 5.1 Rate Limiting
```php
// config/api.php
'rate_limit' => [
    'enabled' => true,
    'max_attempts' => 60,
    'decay_minutes' => 1
]
```

### 5.2 Token
```php
// config/sanctum.php
'sanctum' => [
    'stateful' => true,
    'expiration' => 60 * 24, // 24 ore
    'middleware' => [
        'verify_csrf_token',
        'encrypt_cookies'
    ]
]
```

### 5.3 CORS
```php
// config/cors.php
'cors' => [
    'allowed_origins' => ['https://example.com'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],
    'allowed_headers' => ['Content-Type', 'Authorization'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true
]
```

## 6. Protezione File

### 6.1 Upload
```php
// config/filesystems.php
'disks' => [
    'documents' => [
        'driver' => 'local',
        'root' => storage_path('app/documents'),
        'url' => env('APP_URL').'/storage/documents',
        'visibility' => 'private',
        'throw' => false
    ]
]
```

### 6.2 Validazione File
```php
// app/Http/Controllers/DocumentController.php
public function store(Request $request)
{
    $validated = $request->validate([
        'file' => [
            'required',
            'file',
            'max:10240', // 10MB
            'mimes:pdf,doc,docx',
            'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ]
    ]);
}
```

### 6.3 Permessi File
```bash
# Imposta i permessi corretti
chmod -R 750 storage/app/documents
chown -R www-data:www-data storage/app/documents
```

## 7. Logging e Monitoraggio

### 7.1 Log di Sicurezza
```php
// app/Logging/SecurityLogger.php
class SecurityLogger
{
    public function logSecurityEvent($event, $details)
    {
        Log::channel('security')->info($event, [
            'user_id' => auth()->id(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'details' => $details
        ]);
    }
}
```

### 7.2 Monitoraggio Accessi
```php
// app/Http/Middleware/LogAccess.php
class LogAccess
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        AccessLog::create([
            'user_id' => auth()->id(),
            'ip' => request()->ip(),
            'method' => request()->method(),
            'url' => request()->url(),
            'status' => $response->status()
        ]);
        
        return $response;
    }
}
```

## 8. Backup e Ripristino

### 8.1 Backup Dati
```php
// app/Console/Commands/BackupData.php
class BackupData extends Command
{
    public function handle()
    {
        // Backup database
        $this->backupDatabase();
        
        // Backup file
        $this->backupFiles();
        
        // Backup configurazioni
        $this->backupConfigurations();
    }
}
```

### 8.2 Ripristino
```php
// app/Console/Commands/RestoreData.php
class RestoreData extends Command
{
    public function handle()
    {
        // Verifica integrità backup
        $this->verifyBackup();
        
        // Ripristina database
        $this->restoreDatabase();
        
        // Ripristina file
        $this->restoreFiles();
    }
}
```

## 9. Incident Response

### 9.1 Procedure
```php
// app/Services/SecurityIncidentService.php
class SecurityIncidentService
{
    public function handleIncident($type, $details)
    {
        // Registra incidente
        $this->logIncident($type, $details);
        
        // Notifica amministratori
        $this->notifyAdmins($type, $details);
        
        // Azioni correttive
        $this->takeCorrectiveActions($type, $details);
    }
}
```

### 9.2 Notifiche
```php
// app/Notifications/SecurityAlert.php
class SecurityAlert extends Notification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Allerta di Sicurezza')
            ->line('È stato rilevato un tentativo di accesso non autorizzato.')
            ->line('Dettagli: ' . $this->details)
            ->action('Verifica Log', url('/admin/logs'));
    }
}
```

## 10. Compliance

### 10.1 GDPR
```php
// app/Services/GDPRService.php
class GDPRService
{
    public function exportUserData($userId)
    {
        $user = User::find($userId);
        
        return [
            'personal_data' => $this->getPersonalData($user),
            'activity_logs' => $this->getActivityLogs($user),
            'documents' => $this->getUserDocuments($user)
        ];
    }
    
    public function deleteUserData($userId)
    {
        $user = User::find($userId);
        
        // Anonimizza dati
        $this->anonymizeData($user);
        
        // Rimuovi dati
        $this->deleteData($user);
    }
}
```

### 10.2 Audit
```php
// app/Services/AuditService.php
class AuditService
{
    public function logAudit($action, $model, $changes)
    {
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'changes' => $changes,
            'ip_address' => request()->ip()
        ]);
    }
}
```

## 11. Testing di Sicurezza

### 11.1 Test di Penetrazione
```php
// tests/Feature/SecurityTest.php
class SecurityTest extends TestCase
{
    public function test_unauthorized_access()
    {
        $response = $this->get('/api/projects');
        $response->assertStatus(401);
    }
    
    public function test_rate_limiting()
    {
        for ($i = 0; $i < 61; $i++) {
            $response = $this->get('/api/projects');
        }
        $response->assertStatus(429);
    }
}
```

### 11.2 Vulnerability Scanning
```bash
# Esegui scan di sicurezza
composer require --dev roave/security-advisories
composer require --dev sensiolabs/security-checker
composer require --dev local-php-security-checker

# Esegui i test
./vendor/bin/security-checker security:check composer.lock
./vendor/bin/local-php-security-checker
```

## 12. Manutenzione

### 12.1 Aggiornamenti
```bash
# Aggiorna dipendenze
composer update
npm update

# Verifica vulnerabilità
composer audit
npm audit

# Aggiorna certificati SSL
certbot renew
```

### 12.2 Monitoraggio
```bash
# Monitora accessi
tail -f storage/logs/security.log

# Monitora errori
tail -f storage/logs/laravel.log

# Monitora performance
php artisan telescope:prune
```

## 13. Checklist di Sicurezza

### 13.1 Controlli Giornalieri
- [ ] Verifica log di sicurezza
- [ ] Controlla tentativi di accesso falliti
- [ ] Verifica backup
- [ ] Controlla aggiornamenti di sicurezza

### 13.2 Controlli Settimanali
- [ ] Analisi vulnerabilità
- [ ] Verifica permessi utente
- [ ] Controllo integrità file
- [ ] Revisione log di accesso

### 13.3 Controlli Mensili
- [ ] Aggiornamento sistemi
- [ ] Revisione policy di sicurezza
- [ ] Test di backup
- [ ] Analisi performance 