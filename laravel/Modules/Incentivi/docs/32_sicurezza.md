# Documentazione Sicurezza Modulo Incentivi

## 1. Introduzione

Questa documentazione fornisce informazioni e procedure per la sicurezza del modulo Incentivi. Il modulo è progettato per essere sicuro e protetto.

## 2. Autenticazione

### 2.1 Configurazione
```php
// Configurazione Autenticazione
return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'sanctum',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
];
```

### 2.2 Password
```php
// Gestione Password
class PasswordController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'Password aggiornata con successo'
        ]);
    }
}
```

### 2.3 MFA
```php
// Configurazione MFA
class MfaController extends Controller
{
    public function setup()
    {
        $secret = Google2FA::generateSecretKey();
        
        $user->update([
            'mfa_secret' => $secret,
            'mfa_enabled' => true
        ]);

        return response()->json([
            'secret' => $secret,
            'qr_code' => Google2FA::getQRCodeUrl(
                config('app.name'),
                $user->email,
                $secret
            )
        ]);
    }

    public function verify(Request $request)
    {
        $valid = Google2FA::verifyKey(
            $user->mfa_secret,
            $request->code
        );

        if ($valid) {
            $user->update([
                'mfa_verified' => true
            ]);
        }

        return response()->json([
            'valid' => $valid
        ]);
    }
}
```

## 3. Autorizzazione

### 3.1 Ruoli
```php
// Gestione Ruoli
class RoleController extends Controller
{
    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
            'description' => $request->description
        ]);

        $role->syncPermissions($request->permissions);

        return response()->json([
            'message' => 'Ruolo creato con successo',
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $role->syncPermissions($request->permissions);

        return response()->json([
            'message' => 'Ruolo aggiornato con successo',
            'role' => $role
        ]);
    }
}
```

### 3.2 Permessi
```php
// Gestione Permessi
class PermissionController extends Controller
{
    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'web',
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Permesso creato con successo',
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Permesso aggiornato con successo',
            'permission' => $permission
        ]);
    }
}
```

### 3.3 Policy
```php
// Gestione Policy
class IncentivePolicy
{
    public function view(User $user, Incentive $incentive)
    {
        return $user->hasPermissionTo('view incentives') ||
               $user->id === $incentive->user_id;
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create incentives');
    }

    public function update(User $user, Incentive $incentive)
    {
        return $user->hasPermissionTo('update incentives') ||
               $user->id === $incentive->user_id;
    }

    public function delete(User $user, Incentive $incentive)
    {
        return $user->hasPermissionTo('delete incentives') ||
               $user->id === $incentive->user_id;
    }
}
```

## 4. Protezione Dati

### 4.1 Crittografia
```php
// Gestione Crittografia
class EncryptionController extends Controller
{
    public function encrypt($data)
    {
        return encrypt($data);
    }

    public function decrypt($data)
    {
        return decrypt($data);
    }

    public function hash($data)
    {
        return Hash::make($data);
    }

    public function verify($data, $hash)
    {
        return Hash::check($data, $hash);
    }
}
```

### 4.2 Anonimizzazione
```php
// Gestione Anonimizzazione
class AnonymizationController extends Controller
{
    public function anonymize($data)
    {
        return [
            'name' => Str::mask($data->name, '*', 2),
            'email' => Str::mask($data->email, '*', 3),
            'phone' => Str::mask($data->phone, '*', 4),
            'address' => Str::mask($data->address, '*', 5)
        ];
    }

    public function deAnonymize($data)
    {
        return [
            'name' => $data->name,
            'email' => $data->email,
            'phone' => $data->phone,
            'address' => $data->address
        ];
    }
}
```

### 4.3 Backup
```php
// Gestione Backup
class BackupController extends Controller
{
    public function create()
    {
        $backup = Backup::create([
            'name' => 'backup_' . date('Y-m-d_H-i-s'),
            'path' => storage_path('app/backups'),
            'size' => 0,
            'status' => 'pending'
        ]);

        dispatch(new CreateBackupJob($backup));

        return response()->json([
            'message' => 'Backup avviato con successo',
            'backup' => $backup
        ]);
    }

    public function restore(Backup $backup)
    {
        dispatch(new RestoreBackupJob($backup));

        return response()->json([
            'message' => 'Ripristino avviato con successo',
            'backup' => $backup
        ]);
    }
}
```

## 5. Protezione API

### 5.1 Rate Limiting
```php
// Configurazione Rate Limiting
return [
    'api' => [
        'throttle' => [
            'enabled' => true,
            'attempts' => 60,
            'decay_minutes' => 1,
        ],
    ],
];

// Middleware Rate Limiting
Route::middleware(['throttle:api'])->group(function () {
    Route::apiResource('incentives', IncentiveController::class);
});
```

### 5.2 Token
```php
// Gestione Token
class TokenController extends Controller
{
    public function create(Request $request)
    {
        $token = $request->user()->createToken('api-token');

        return response()->json([
            'token' => $token->plainTextToken
        ]);
    }

    public function revoke(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Token revocato con successo'
        ]);
    }
}
```

### 5.3 CORS
```php
// Configurazione CORS
return [
    'paths' => ['api/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
```

## 6. Protezione File

### 6.1 Upload
```php
// Gestione Upload
class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240|mimes:pdf,doc,docx'
        ]);

        $path = $request->file('file')->store('uploads');

        return response()->json([
            'message' => 'File caricato con successo',
            'path' => $path
        ]);
    }

    public function delete($path)
    {
        Storage::delete($path);

        return response()->json([
            'message' => 'File eliminato con successo'
        ]);
    }
}
```

### 6.2 Storage
```php
// Gestione Storage
class StorageController extends Controller
{
    public function store(Request $request)
    {
        $path = Storage::putFile('public', $request->file('file'));

        return response()->json([
            'message' => 'File salvato con successo',
            'path' => $path
        ]);
    }

    public function retrieve($path)
    {
        return Storage::download($path);
    }
}
```

### 6.3 Accesso
```php
// Gestione Accesso File
class FileAccessController extends Controller
{
    public function check($path)
    {
        return Storage::exists($path);
    }

    public function permissions($path)
    {
        return [
            'readable' => Storage::readable($path),
            'writable' => Storage::writable($path),
            'executable' => Storage::executable($path)
        ];
    }
}
```

## 7. Logging Sicurezza

### 7.1 Configurazione
```php
// Configurazione Logging
return [
    'channels' => [
        'security' => [
            'driver' => 'daily',
            'path' => storage_path('logs/security.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
        ],
    ],
];
```

### 7.2 Eventi
```php
// Gestione Eventi
class SecurityEventController extends Controller
{
    public function log($event, $data)
    {
        Log::channel('security')->info($event, $data);
    }

    public function getEvents()
    {
        return Log::channel('security')
            ->get()
            ->map(function ($log) {
                return [
                    'timestamp' => $log->timestamp,
                    'event' => $log->event,
                    'data' => $log->data
                ];
            });
    }
}
```

### 7.3 Analisi
```php
// Analisi Log
class SecurityLogController extends Controller
{
    public function analyze()
    {
        $logs = Log::channel('security')
            ->get()
            ->groupBy('event');

        return [
            'total' => $logs->count(),
            'by_event' => $logs->map->count(),
            'by_user' => $logs->groupBy('user_id')->map->count(),
            'by_ip' => $logs->groupBy('ip')->map->count()
        ];
    }
}
```

## 8. Backup e Ripristino

### 8.1 Configurazione
```php
// Configurazione Backup
return [
    'backup' => [
        'name' => env('APP_NAME', 'laravel-backup'),
        'source' => [
            'files' => [
                'include' => [
                    base_path(),
                ],
                'exclude' => [
                    base_path('vendor'),
                    base_path('node_modules'),
                ],
            ],
            'databases' => [
                'mysql'
            ]
        ],
        'destination' => [
            'filename_prefix' => 'backup-',
            'disks' => [
                'local'
            ]
        ],
    ],
];
```

### 8.2 Esecuzione
```php
// Esecuzione Backup
class BackupController extends Controller
{
    public function run()
    {
        $backup = Backup::create([
            'name' => 'backup_' . date('Y-m-d_H-i-s'),
            'path' => storage_path('app/backups'),
            'size' => 0,
            'status' => 'pending'
        ]);

        dispatch(new CreateBackupJob($backup));

        return response()->json([
            'message' => 'Backup avviato con successo',
            'backup' => $backup
        ]);
    }
}
```

### 8.3 Ripristino
```php
// Ripristino Backup
class RestoreController extends Controller
{
    public function restore(Backup $backup)
    {
        dispatch(new RestoreBackupJob($backup));

        return response()->json([
            'message' => 'Ripristino avviato con successo',
            'backup' => $backup
        ]);
    }
}
```

## 9. Gestione Incidenti

### 9.1 Procedure
```php
// Procedure Incidenti
class IncidentController extends Controller
{
    public function report(Request $request)
    {
        $incident = Incident::create([
            'type' => $request->type,
            'description' => $request->description,
            'severity' => $request->severity,
            'status' => 'open'
        ]);

        dispatch(new NotifyIncidentJob($incident));

        return response()->json([
            'message' => 'Incidente segnalato con successo',
            'incident' => $incident
        ]);
    }

    public function update(Request $request, Incident $incident)
    {
        $incident->update([
            'status' => $request->status,
            'resolution' => $request->resolution
        ]);

        return response()->json([
            'message' => 'Incidente aggiornato con successo',
            'incident' => $incident
        ]);
    }
}
```

### 9.2 Notifiche
```php
// Gestione Notifiche
class NotificationController extends Controller
{
    public function send(Incident $incident)
    {
        Notification::send(
            User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->get(),
            new IncidentNotification($incident)
        );

        return response()->json([
            'message' => 'Notifiche inviate con successo'
        ]);
    }
}
```

### 9.3 Documentazione
```php
// Documentazione Incidenti
class IncidentDocumentationController extends Controller
{
    public function store(Request $request, Incident $incident)
    {
        $documentation = $incident->documentation()->create([
            'type' => $request->type,
            'content' => $request->content,
            'user_id' => auth()->id()
        ]);

        return response()->json([
            'message' => 'Documentazione aggiunta con successo',
            'documentation' => $documentation
        ]);
    }
}
```

## 10. Conformità

### 10.1 GDPR
```php
// Gestione GDPR
class GdprController extends Controller
{
    public function export(User $user)
    {
        $data = [
            'personal' => $user->only(['name', 'email', 'phone']),
            'preferences' => $user->preferences,
            'activity' => $user->activity_log,
            'consents' => $user->consents
        ];

        return response()->json($data);
    }

    public function delete(User $user)
    {
        $user->anonymize();
        $user->delete();

        return response()->json([
            'message' => 'Utente eliminato con successo'
        ]);
    }
}
```

### 10.2 Audit
```php
// Gestione Audit
class AuditController extends Controller
{
    public function log($event, $data)
    {
        Audit::create([
            'user_id' => auth()->id(),
            'event' => $event,
            'data' => $data,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);
    }

    public function getLogs()
    {
        return Audit::with('user')
            ->latest()
            ->paginate(20);
    }
}
```

### 10.3 Report
```php
// Gestione Report
class SecurityReportController extends Controller
{
    public function generate()
    {
        $report = [
            'incidents' => Incident::count(),
            'audits' => Audit::count(),
            'users' => User::count(),
            'roles' => Role::count(),
            'permissions' => Permission::count()
        ];

        return response()->json($report);
    }
}
```

## 11. Testing Sicurezza

### 11.1 Penetration
```php
// Testing Penetration
class SecurityTest extends TestCase
{
    public function test_authentication()
    {
        $response = $this->post('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

    public function test_authorization()
    {
        $user = User::factory()->create();
        $incentive = Incentive::factory()->create();

        $response = $this->actingAs($user)
            ->get("/api/incentives/{$incentive->id}");

        $response->assertStatus(403);
    }
}
```

### 11.2 Vulnerabilità
```php
// Testing Vulnerabilità
class VulnerabilityTest extends TestCase
{
    public function test_sql_injection()
    {
        $response = $this->get('/api/incentives?search=1\' OR \'1\'=\'1');

        $response->assertStatus(400);
    }

    public function test_xss()
    {
        $response = $this->post('/api/incentives', [
            'name' => '<script>alert("xss")</script>'
        ]);

        $response->assertStatus(422);
    }
}
```

### 11.3 Sicurezza
```php
// Testing Sicurezza
class SecurityTest extends TestCase
{
    public function test_csrf()
    {
        $response = $this->post('/api/incentives', [
            'name' => 'Test'
        ]);

        $response->assertStatus(401);
    }

    public function test_rate_limiting()
    {
        for ($i = 0; $i < 61; $i++) {
            $response = $this->get('/api/incentives');
        }

        $response->assertStatus(429);
    }
}
```

## 12. Checklist Sicurezza

### 12.1 Giornaliera
- [ ] Verifica log di sicurezza
- [ ] Controllo accessi non autorizzati
- [ ] Verifica backup
- [ ] Controllo vulnerabilità
- [ ] Verifica aggiornamenti
- [ ] Controllo permessi
- [ ] Verifica token
- [ ] Report giornaliero

### 12.2 Settimanale
- [ ] Analisi log di sicurezza
- [ ] Verifica configurazione
- [ ] Controllo dipendenze
- [ ] Verifica backup
- [ ] Controllo accessi
- [ ] Verifica policy
- [ ] Controllo token
- [ ] Report settimanale

### 12.3 Mensile
- [ ] Revisione sicurezza
- [ ] Aggiornamento policy
- [ ] Verifica conformità
- [ ] Controllo backup
- [ ] Verifica accessi
- [ ] Analisi vulnerabilità
- [ ] Controllo token
- [ ] Report mensile 