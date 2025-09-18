# Implementazione Regolamento Incentivi

## Note Importanti

1. Tutti i modelli estendono `BaseModel` che risiede nello stesso namespace del modello che lo estende
2. Il path corretto per i Data Transfer Objects è `app/Datas/` (non `app/Data/`)
3. I valori di configurazione sono gestiti tramite tabelle dedicate con valori di default
4. Gli enum utilizzano nomi in inglese con commenti in italiano
5. Tutte le classi Filament devono estendere le classi base del modulo Xot con prefisso `XotBase`
6. La classe `XotBaseResource` richiede:
   - `getFormSchema()` invece di `form()`
   - `getFormSchema()` deve restituire un array associativo con chiavi stringhe
   - Non usa il metodo `table()`
   - La logica della tabella è implementata nella pagina "index"
7. La classe `XotBasePage` richiede:
   - `getTableColumns()` deve restituire un array associativo con chiavi stringhe
   - `getTableFilters()` deve restituire un array associativo con chiavi stringhe
   - `getTableActions()` deve restituire un array associativo con chiavi stringhe

## 1. Tabelle di Configurazione

### 1.1 IncentivePercentage
```sql
CREATE TABLE incentive_percentages (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    type varchar(255) NOT NULL, -- 'works', 'services', 'supplies'
    min_amount decimal(15,2) NOT NULL,
    max_amount decimal(15,2) NULL,
    value decimal(5,4) NOT NULL,
    is_eu_threshold boolean DEFAULT false,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
```

### 1.2 ActivityQuote
```sql
CREATE TABLE activity_quotes (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    type varchar(255) NOT NULL, -- 'works', 'services', 'supplies'
    activity_type varchar(255) NOT NULL,
    percentage decimal(5,4) NOT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
```

### 1.3 InnovationFundPercentage
```sql
CREATE TABLE innovation_fund_percentages (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    value decimal(5,4) NOT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id)
);
```

## 2. Struttura Directory

```
app/
├── Datas/
│   └── IncentiveCalculationData.php
├── Models/
│   ├── BaseModel.php
│   ├── InnovationFund.php
│   └── IncentiveLimit.php
├── Enums/
│   └── ActivityType.php
└── Actions/
    ├── CalculateIncentivePercentageAction.php
    ├── CalculateWorkQuotesAction.php
    └── CalculateInnovationFundAction.php
```

## 3. Valori di Default

### 3.1 Percentuali per Importo Progetto
```php
// Valori di default per lavori
[
    ['min_amount' => 75000, 'max_amount' => 1000000, 'value' => 0.02, 'is_eu_threshold' => false],
    ['min_amount' => 1000000, 'max_amount' => null, 'value' => 0.018, 'is_eu_threshold' => false],
    ['min_amount' => 1000000, 'max_amount' => 25000000, 'value' => 0.014, 'is_eu_threshold' => true],
    ['min_amount' => 25000000, 'max_amount' => null, 'value' => 0.01, 'is_eu_threshold' => true]
]
```

### 3.2 Quote per Attività
```php
// Valori di default per lavori
[
    'RUP' => 0.24,
    'PROGRAMMING' => 0.02,
    'RUP_COLLABORATION' => 0.09,
    'FEASIBILITY' => 0.04,
    'PROJECT' => 0.04,
    'SAFETY' => 0.01,
    'VERIFICATION' => 0.04,
    'TENDER' => 0.03,
    'DIRECTION' => 0.22,
    'TESTING' => 0.06
]
```

### 3.3 Percentuale Fondo Innovazione
```php
// Valore di default
0.20 // 20%
```

## 4. Note di Implementazione

1. Tutti i valori di configurazione sono gestiti tramite tabelle dedicate
2. Se non esistono valori in tabella, vengono utilizzati i valori di default
3. I valori possono essere modificati tramite interfaccia amministrativa
4. Le modifiche ai valori di default richiedono una nuova release

## 1. Calcolo Percentuali per Importo Progetto

### 1.1 Creazione Data Transfer Object
```php
// app/Datas/IncentiveCalculationData.php
class IncentiveCalculationData extends Data
{
    public function __construct(
        public float $project_amount,
        public string $project_type, // 'lavori', 'servizi', 'forniture'
        public bool $is_eu_threshold,
        public float $iva_amount,
        public float $safety_costs,
        public ?float $renewal_costs = null,
    ) {}
}
```

### 1.2 Implementazione Calcolo Percentuale
```php
// app/Actions/CalculateIncentivePercentageAction.php
class CalculateIncentivePercentageAction extends QueableAction
{
    public function handle(IncentiveCalculationData $data): float
    {
        $base_amount = $data->project_amount - $data->iva_amount + $data->safety_costs;
        
        if ($data->renewal_costs) {
            $base_amount += $data->renewal_costs;
        }

        return match($data->project_type) {
            'lavori' => $this->calculateWorksPercentage($base_amount, $data->is_eu_threshold),
            'servizi' => $this->calculateServicesPercentage($base_amount),
            'forniture' => $this->calculateSuppliesPercentage($base_amount),
            default => throw new InvalidArgumentException('Tipo progetto non valido')
        };
    }

    private function calculateWorksPercentage(float $amount, bool $is_eu_threshold): float
    {
        // Recupera le percentuali dalla tabella di configurazione
        $percentages = IncentivePercentage::where('type', 'works')->get();
        
        // Se non esistono configurazioni, usa i valori di default
        if ($percentages->isEmpty()) {
            return $this->getDefaultWorksPercentage($amount, $is_eu_threshold);
        }

        // Applica le percentuali configurate
        foreach ($percentages as $percentage) {
            if ($amount >= $percentage->min_amount && 
                ($percentage->max_amount === null || $amount < $percentage->max_amount) &&
                $percentage->is_eu_threshold === $is_eu_threshold) {
                return $percentage->value;
            }
        }

        return 0;
    }

    // Implementare metodi simili per servizi e forniture
}
```

## 2. Gestione Quote per Tipo Contratto

### 2.1 Creazione Enum per Tipi Attività
```php
// app/Enums/ActivityType.php
enum ActivityType: string
{
    case PROGRAMMING = 'programming'; // Programmazione
    case RUP = 'rup'; // Responsabile Unico del Procedimento
    case RUP_COLLABORATION = 'rup_collaboration'; // Collaborazione RUP
    case FEASIBILITY = 'feasibility'; // Fattibilità
    case PROJECT = 'project'; // Progetto
    case SAFETY = 'safety'; // Sicurezza
    case VERIFICATION = 'verification'; // Verifica
    case TENDER = 'tender'; // Gara
    case DIRECTION = 'direction'; // Direzione
    case TESTING = 'testing'; // Collaudo
}
```

### 2.2 Implementazione Quote per Lavori
```php
// app/Actions/CalculateWorkQuotesAction.php
class CalculateWorkQuotesAction extends QueableAction
{
    public function handle(ActivityType $type): float
    {
        // Recupera le quote dalla tabella di configurazione
        $quote = ActivityQuote::where('type', 'works')
            ->where('activity_type', $type->value)
            ->first();

        // Se non esiste una configurazione, usa i valori di default
        if (!$quote) {
            return $this->getDefaultQuote($type);
        }

        return $quote->percentage;
    }

    private function getDefaultQuote(ActivityType $type): float
    {
        return match($type) {
            ActivityType::RUP => 0.24,
            ActivityType::PROGRAMMING => 0.02,
            ActivityType::RUP_COLLABORATION => 0.09,
            ActivityType::FEASIBILITY => 0.04,
            ActivityType::PROJECT => 0.04,
            ActivityType::SAFETY => 0.01,
            ActivityType::VERIFICATION => 0.04,
            ActivityType::TENDER => 0.03,
            ActivityType::DIRECTION => 0.22,
            ActivityType::TESTING => 0.06,
            default => 0
        };
    }
}
```

## 3. Implementazione Quota 20% Innovazione

### 3.1 Creazione Model per Fondo Innovazione
```php
// app/Models/InnovationFund.php
class InnovationFund extends BaseModel
{
    protected $fillable = [
        'project_id',
        'amount',
        'status',
        'allocated_amount',
        'remaining_amount'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
```

### 3.2 Implementazione Calcolo Fondo
```php
// app/Actions/CalculateInnovationFundAction.php
class CalculateInnovationFundAction extends QueableAction
{
    public function handle(Project $project): float
    {
        // Recupera la percentuale dalla configurazione
        $percentage = InnovationFundPercentage::first();

        // Se non esiste una configurazione, usa il valore di default
        $percentage_value = $percentage ? $percentage->value : 0.20;

        $total_incentive = $project->calculateTotalIncentive();
        return $total_incentive * $percentage_value;
    }
}
```

## 4. Gestione Limiti Soggettivi

### 4.1 Creazione Model per Limiti
```php
// app/Models/IncentiveLimit.php
class IncentiveLimit extends Model
{
    protected $fillable = [
        'employee_id',
        'year',
        'base_salary',
        'max_incentive',
        'current_incentive',
        'is_digital'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
```

### 4.2 Implementazione Verifica Limiti
```php
// app/Actions/CheckIncentiveLimitAction.php
class CheckIncentiveLimitAction extends QueableAction
{
    public function handle(Employee $employee, float $incentive_amount): bool
    {
        $limit = IncentiveLimit::where('employee_id', $employee->id)
            ->where('year', now()->year)
            ->first();

        if (!$limit) {
            $limit = $this->createLimit($employee);
        }

        $max_incentive = $limit->is_digital 
            ? $limit->base_salary * 1.15 
            : $limit->base_salary;

        return ($limit->current_incentive + $incentive_amount) <= $max_incentive;
    }

    private function createLimit(Employee $employee): IncentiveLimit
    {
        return IncentiveLimit::create([
            'employee_id' => $employee->id,
            'year' => now()->year,
            'base_salary' => $employee->annual_salary,
            'max_incentive' => $employee->annual_salary,
            'current_incentive' => 0,
            'is_digital' => $employee->uses_digital_tools
        ]);
    }
}
```

## 5. Implementazione Validazione

### 5.1 Creazione Request Validation
```php
// app/Http/Requests/IncentiveCalculationRequest.php
class IncentiveCalculationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'project_amount' => 'required|numeric|min:75000',
            'project_type' => 'required|in:lavori,servizi,forniture',
            'is_eu_threshold' => 'required|boolean',
            'iva_amount' => 'required|numeric|min:0',
            'safety_costs' => 'required|numeric|min:0',
            'renewal_costs' => 'nullable|numeric|min:0',
            'employee_id' => 'required|exists:employees,id',
            'activity_type' => 'required|string|in:' . implode(',', array_column(ActivityType::cases(), 'value')),
        ];
    }
}
```

### 5.2 Implementazione Test
```php
// tests/Unit/IncentiveCalculationTest.php
class IncentiveCalculationTest extends TestCase
{
    public function test_calculate_works_percentage()
    {
        $action = new CalculateIncentivePercentageAction();
        
        $data = new IncentiveCalculationData(
            project_amount: 80000,
            project_type: 'lavori',
            is_eu_threshold: false,
            iva_amount: 17600,
            safety_costs: 1000
        );

        $percentage = $action->handle($data);
        
        $this->assertEquals(0.02, $percentage);
    }

    // Implementare altri test per tutti i casi
}
```

## 6. Integrazione con Filament

### 6.1 Creazione Resource
```php
// app/Filament/Resources/IncentiveCalculationResource.php
class IncentiveCalculationResource extends XotBaseResource
{
    protected static ?string $model = Project::class;

    public static function getFormSchema(): array
    {
        return [
            'project_amount' => Forms\Components\TextInput::make('project_amount')
                ->required()
                ->numeric()
                ->minValue(75000),
            'project_type' => Forms\Components\Select::make('project_type')
                ->options([
                    'lavori' => 'Lavori',
                    'servizi' => 'Servizi',
                    'forniture' => 'Forniture'
                ])
                ->required(),
            // Altri campi...
        ];
    }
}
```

### 6.2 Creazione Index Page
```php
// app/Filament/Pages/IncentiveCalculationIndexPage.php
class IncentiveCalculationIndexPage extends XotBasePage
{
    protected static string $view = 'filament.pages.incentive-calculation.index';

    public function getTableColumns(): array
    {
        return [
            'project_amount' => Tables\Columns\TextColumn::make('project_amount')
                ->money('EUR'),
            'project_type' => Tables\Columns\TextColumn::make('project_type')
                ->badge(),
            'incentive_percentage' => Tables\Columns\TextColumn::make('incentive_percentage')
                ->percentage(),
            'status' => Tables\Columns\TextColumn::make('status')
                ->badge(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'project_type' => Tables\Filters\SelectFilter::make('project_type')
                ->options([
                    'lavori' => 'Lavori',
                    'servizi' => 'Servizi',
                    'forniture' => 'Forniture'
                ]),
            'status' => Tables\Filters\SelectFilter::make('status')
                ->options([
                    'pending' => 'In Attesa',
                    'approved' => 'Approvato',
                    'rejected' => 'Rifiutato'
                ]),
        ];
    }

    public function getTableActions(): array
    {
        return [
            'edit' => Tables\Actions\EditAction::make(),
            'delete' => Tables\Actions\DeleteAction::make(),
            'approve' => Tables\Actions\Action::make('approve')
                ->label('Approva')
                ->icon('heroicon-o-check')
                ->color('success'),
        ];
    }
}
```

## 7. Logging e Audit

### 7.1 Implementazione Logging
```php
// app/Logging/IncentiveCalculationLogger.php
class IncentiveCalculationLogger
{
    public function logCalculation(Project $project, array $data): void
    {
        Log::channel('incentives')->info('Calcolo incentivo', [
            'project_id' => $project->id,
            'amount' => $data['amount'],
            'percentage' => $data['percentage'],
            'quotes' => $data['quotes'],
            'user_id' => auth()->id(),
            'timestamp' => now()
        ]);
    }
}
```

## 8. Deployment Checklist

1. Eseguire le migrazioni:
```bash
php artisan migrate
```

2. Pubblicare le configurazioni:
```bash
php artisan vendor:publish --tag=incentives-config
```

3. Eseguire i test:
```bash
php artisan test --filter=IncentiveCalculationTest
```

4. Verificare i permessi:
```bash
php artisan permissions:sync
```

5. Pulire la cache:
```bash
php artisan optimize:clear
``` 