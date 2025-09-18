# Documentazione Modulo Incentivi

## 1. Introduzione

Il modulo Incentivi è progettato per gestire il calcolo e la distribuzione degli incentivi per le funzioni tecniche secondo il regolamento aziendale. Il modulo si integra con il sistema SUA esistente e fornisce un'interfaccia completa per la gestione di progetti, attività e liquidazioni.

## 2. Architettura

### 2.1 Struttura del Modulo
```
laravel/Modules/Incentivi/
├── app/
│   ├── Actions/
│   │   └── Incentives/
│   ├── Data/
│   ├── Enums/
│   ├── Filament/
│   ├── Http/
│   ├── Models/
│   └── Providers/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── docs/
├── lang/
├── resources/
│   ├── js/
│   └── views/
├── routes/
└── tests/
```

### 2.2 Dipendenze Principali
- Laravel 10.x
- Filament 3.x
- Spatie Laravel Data
- Spatie QueableActions
- Vue.js 3.x
- Chart.js

## 3. Configurazione

### 3.1 Variabili d'Ambiente
```env
SUA_API_URL=https://api.sua.it
SUA_API_KEY=your-api-key
SUA_API_SECRET=your-api-secret
SUA_TIMEOUT=30
SUA_RETRY_ATTEMPTS=3
```

### 3.2 Provider
```php
// config/app.php
'providers' => [
    // ...
    Incentivi\Providers\IncentiviServiceProvider::class,
    Incentivi\Providers\SuaServiceProvider::class,
],
```

## 4. Modelli

### 4.1 Project
```php
class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'amount',
        'type',
        'start_date',
        'end_date',
        'status',
        'sua_id',
        'metadata'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'metadata' => 'array'
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function calculations()
    {
        return $this->hasMany(IncentiveCalculation::class);
    }
}
```

### 4.2 Activity
```php
class Activity extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'description',
        'type',
        'percentage',
        'start_date',
        'end_date',
        'status',
        'sua_id',
        'metadata'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'percentage' => 'float',
        'metadata' => 'array'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'activity_employee')
            ->withPivot('percentage')
            ->withTimestamps();
    }
}
```

### 4.3 Employee
```php
class Employee extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'email',
        'role',
        'sua_id',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_employee')
            ->withPivot('percentage')
            ->withTimestamps();
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
}
```

## 5. Actions

### 5.1 Calcolo Incentivi
```php
class CalculateFinalIncentiveAction extends QueableAction
{
    public function handle(IncentiveCalculationData $data): IncentiveCalculation
    {
        // Calcolo percentuale base
        $base_percentage = (new CalculateBasePercentageAction())->handle($data);
        
        // Calcolo importo base
        $base_amount = $data->project_amount - $data->iva_amount + $data->safety_costs;
        if ($data->renewal_costs) {
            $base_amount += $data->renewal_costs;
        }

        // Calcolo quote per attività
        $quotes = (new CalculateQuotesAction())->handle($data->project_type, $data->activities);

        // Calcolo penalità
        $penalties = (new CalculatePenaltiesAction())->handle(
            $data->project,
            $data->penalties['delays'] ?? [],
            $data->penalties['cost_increases'] ?? []
        );

        // Calcolo importo totale
        $total_amount = $base_amount * $base_percentage;

        // Calcolo quota innovazione (20%)
        $innovation_fund = $total_amount * 0.20;

        // Calcolo quota dipendenti (80%)
        $employee_share = $total_amount * 0.80;

        // Applicazione penalità
        foreach ($penalties as $penalty) {
            $employee_share -= $penalty['amount'];
        }

        // Creazione record calcolo
        return IncentiveCalculation::create([
            'project_id' => $data->project->id,
            'base_amount' => $base_amount,
            'total_percentage' => $base_percentage,
            'total_amount' => $total_amount,
            'innovation_fund_amount' => $innovation_fund,
            'employee_share_amount' => $employee_share,
            'status' => 'completed',
            'calculation_date' => now(),
            'metadata' => [
                'quotes' => $quotes,
                'penalties' => $penalties
            ]
        ]);
    }
}
```

## 6. API

### 6.1 Endpoint per Calcolo Incentivi
```php
// routes/api.php
Route::prefix('incentives')->group(function () {
    Route::post('calculate', [IncentiveController::class, 'calculate']);
    Route::get('calculations/{calculation}', [IncentiveController::class, 'show']);
    Route::get('calculations', [IncentiveController::class, 'index']);
});
```

### 6.2 Endpoint per Liquidazioni
```php
// routes/api.php
Route::prefix('settlements')->group(function () {
    Route::post('/', [SettlementController::class, 'store']);
    Route::get('{settlement}', [SettlementController::class, 'show']);
    Route::put('{settlement}/status', [SettlementController::class, 'updateStatus']);
    Route::post('{settlement}/process', [SettlementController::class, 'processPayment']);
});
```

## 7. Interfaccia

### 7.1 Dashboard
La dashboard principale mostra:
- Statistiche generali (progetti, dipendenti, incentivi)
- Grafico degli incentivi mensili
- Top dipendenti per importo incentivi
- Liquidazioni in sospeso

### 7.2 Form Calcolo
Il form di calcolo include:
- Selezione progetto
- Dati di calcolo (importi, percentuali)
- Gestione attività
- Anteprima risultato

### 7.3 Gestione Liquidazioni
L'interfaccia di gestione liquidazioni permette:
- Visualizzazione lista liquidazioni
- Filtri e ricerca
- Azioni di massa
- Dettaglio singola liquidazione

## 8. Testing

### 8.1 Test Unitari
```bash
php artisan test --filter=IncentiveCalculationTest
php artisan test --filter=SettlementTest
```

### 8.2 Test di Integrazione
```bash
php artisan test --filter=IncentiveFlowTest
```

### 8.3 Test API
```bash
php artisan test --filter=ApiTest
```

## 9. Deployment

### 9.1 Requisiti di Sistema
- PHP 8.1+
- MySQL 8.0+
- Node.js 16+
- Composer 2.0+

### 9.2 Procedura di Installazione
1. Clonare il repository
2. Installare dipendenze PHP:
```bash
composer install
```

3. Installare dipendenze Node.js:
```bash
npm install
```

4. Configurare l'ambiente:
```bash
cp .env.example .env
php artisan key:generate
```

5. Configurare il database:
```bash
php artisan migrate
```

6. Compilare gli assets:
```bash
npm run build
```

7. Eseguire i test:
```bash
php artisan test
```

### 9.3 Manutenzione
- Aggiornare regolarmente le dipendenze
- Monitorare i log di errore
- Eseguire backup del database
- Verificare la sicurezza

## 10. Supporto

### 10.1 Contatti
- Email: support@example.com
- Telefono: +39 123 456 7890

### 10.2 Documentazione Aggiuntiva
- [Regolamento Incentivi](regolamento.md)
- [Guida Utente](guida_utente.md)
- [FAQ](faq.md)
- [Changelog](changelog.md) 