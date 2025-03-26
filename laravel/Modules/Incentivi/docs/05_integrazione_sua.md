# Integrazione con SUA

## 1. Struttura Base

### 1.1 Configurazione SUA
```php
// config/sua.php
return [
    'api_url' => env('SUA_API_URL', 'https://api.sua.it'),
    'api_key' => env('SUA_API_KEY'),
    'api_secret' => env('SUA_API_SECRET'),
    'timeout' => env('SUA_TIMEOUT', 30),
    'retry_attempts' => env('SUA_RETRY_ATTEMPTS', 3),
];
```

### 1.2 Service Provider
```php
// app/Providers/SuaServiceProvider.php
class SuaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SuaClient::class, function ($app) {
            return new SuaClient(
                config('sua.api_url'),
                config('sua.api_key'),
                config('sua.api_secret'),
                config('sua.timeout'),
                config('sua.retry_attempts')
            );
        });
    }
}
```

## 2. Client SUA

### 2.1 Classe Client
```php
// app/Services/SuaClient.php
class SuaClient
{
    public function __construct(
        private string $apiUrl,
        private string $apiKey,
        private string $apiSecret,
        private int $timeout,
        private int $retryAttempts
    ) {}

    public function getProjectDetails(string $projectId): array
    {
        return $this->makeRequest('GET', "/projects/{$projectId}");
    }

    public function getEmployeeDetails(string $employeeId): array
    {
        return $this->makeRequest('GET', "/employees/{$employeeId}");
    }

    public function getActivityDetails(string $activityId): array
    {
        return $this->makeRequest('GET', "/activities/{$activityId}");
    }

    private function makeRequest(string $method, string $endpoint, array $data = []): array
    {
        $attempts = 0;
        $lastException = null;

        while ($attempts < $this->retryAttempts) {
            try {
                $response = Http::withHeaders([
                    'Authorization' => "Bearer {$this->apiKey}",
                    'X-Signature' => $this->generateSignature($method, $endpoint, $data)
                ])
                ->timeout($this->timeout)
                ->baseUrl($this->apiUrl)
                ->$method($endpoint, $data);

                if ($response->successful()) {
                    return $response->json();
                }

                throw new SuaApiException($response->body());
            } catch (Exception $e) {
                $lastException = $e;
                $attempts++;
                sleep(2 ** $attempts); // Exponential backoff
            }
        }

        throw $lastException;
    }

    private function generateSignature(string $method, string $endpoint, array $data): string
    {
        $payload = json_encode([
            'method' => $method,
            'endpoint' => $endpoint,
            'data' => $data,
            'timestamp' => time()
        ]);

        return hash_hmac('sha256', $payload, $this->apiSecret);
    }
}
```

## 3. Sincronizzazione Dati

### 3.1 Action per Sincronizzazione Progetti
```php
// app/Actions/Incentives/SyncSuaProjectAction.php
class SyncSuaProjectAction extends QueableAction
{
    public function __construct(
        private SuaClient $suaClient
    ) {}

    public function handle(Project $project): Project
    {
        $suaData = $this->suaClient->getProjectDetails($project->sua_id);

        $project->update([
            'name' => $suaData['name'],
            'description' => $suaData['description'],
            'start_date' => $suaData['start_date'],
            'end_date' => $suaData['end_date'],
            'status' => $suaData['status'],
            'metadata' => [
                'sua_last_sync' => now(),
                'sua_data' => $suaData
            ]
        ]);

        return $project;
    }
}
```

### 3.2 Action per Sincronizzazione Dipendenti
```php
// app/Actions/Incentives/SyncSuaEmployeeAction.php
class SyncSuaEmployeeAction extends QueableAction
{
    public function __construct(
        private SuaClient $suaClient
    ) {}

    public function handle(Employee $employee): Employee
    {
        $suaData = $this->suaClient->getEmployeeDetails($employee->sua_id);

        $employee->update([
            'name' => $suaData['name'],
            'surname' => $suaData['surname'],
            'email' => $suaData['email'],
            'role' => $suaData['role'],
            'metadata' => [
                'sua_last_sync' => now(),
                'sua_data' => $suaData
            ]
        ]);

        return $employee;
    }
}
```

## 4. Gestione Attività

### 4.1 Action per Sincronizzazione Attività
```php
// app/Actions/Incentives/SyncSuaActivityAction.php
class SyncSuaActivityAction extends QueableAction
{
    public function __construct(
        private SuaClient $suaClient
    ) {}

    public function handle(Activity $activity): Activity
    {
        $suaData = $this->suaClient->getActivityDetails($activity->sua_id);

        $activity->update([
            'name' => $suaData['name'],
            'description' => $suaData['description'],
            'start_date' => $suaData['start_date'],
            'end_date' => $suaData['end_date'],
            'status' => $suaData['status'],
            'percentage' => $suaData['percentage'],
            'metadata' => [
                'sua_last_sync' => now(),
                'sua_data' => $suaData
            ]
        ]);

        return $activity;
    }
}
```

## 5. Comandi Artisan

### 5.1 Comando per Sincronizzazione Completa
```php
// app/Console/Commands/SyncSuaDataCommand.php
class SyncSuaDataCommand extends Command
{
    protected $signature = 'incentives:sync-sua';
    protected $description = 'Sincronizza i dati con SUA';

    public function handle(
        SyncSuaProjectAction $projectAction,
        SyncSuaEmployeeAction $employeeAction,
        SyncSuaActivityAction $activityAction
    ): int {
        $this->info('Inizio sincronizzazione dati SUA...');

        try {
            // Sincronizza progetti
            Project::whereNotNull('sua_id')->each(function ($project) use ($projectAction) {
                $this->info("Sincronizzazione progetto: {$project->id}");
                $projectAction->handle($project);
            });

            // Sincronizza dipendenti
            Employee::whereNotNull('sua_id')->each(function ($employee) use ($employeeAction) {
                $this->info("Sincronizzazione dipendente: {$employee->id}");
                $employeeAction->handle($employee);
            });

            // Sincronizza attività
            Activity::whereNotNull('sua_id')->each(function ($activity) use ($activityAction) {
                $this->info("Sincronizzazione attività: {$activity->id}");
                $activityAction->handle($activity);
            });

            $this->info('Sincronizzazione completata con successo!');
            return self::SUCCESS;
        } catch (Exception $e) {
            $this->error("Errore durante la sincronizzazione: {$e->getMessage()}");
            return self::FAILURE;
        }
    }
}
```

## 6. Testing

### 6.1 Test per Client SUA
```php
// tests/Unit/SuaClientTest.php
class SuaClientTest extends TestCase
{
    private SuaClient $client;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->client = new SuaClient(
            'https://api.sua.it',
            'test-key',
            'test-secret',
            30,
            3
        );
    }

    public function test_get_project_details()
    {
        Http::fake([
            'api.sua.it/projects/*' => Http::response([
                'id' => '123',
                'name' => 'Test Project',
                'status' => 'active'
            ], 200)
        ]);

        $result = $this->client->getProjectDetails('123');

        $this->assertEquals('Test Project', $result['name']);
        $this->assertEquals('active', $result['status']);
    }

    public function test_retry_on_failure()
    {
        Http::fake([
            'api.sua.it/projects/*' => Http::sequence()
                ->push([], 500)
                ->push([], 500)
                ->push(['id' => '123'], 200)
        ]);

        $result = $this->client->getProjectDetails('123');

        $this->assertEquals('123', $result['id']);
    }
}
```

## 7. Deployment Checklist

1. Aggiungere variabili d'ambiente:
```bash
SUA_API_URL=https://api.sua.it
SUA_API_KEY=your-api-key
SUA_API_SECRET=your-api-secret
SUA_TIMEOUT=30
SUA_RETRY_ATTEMPTS=3
```

2. Pubblicare la configurazione:
```bash
php artisan vendor:publish --tag=incentives-sua-config
```

3. Eseguire i test:
```bash
php artisan test --filter=SuaClientTest
```

4. Verificare la sincronizzazione:
```bash
php artisan incentives:sync-sua
```

5. Pulire la cache:
```bash
php artisan optimize:clear
``` 