# Sistema di Calcolo Incentivi

## 1. Struttura Base

### 1.1 Data Transfer Objects
```php
// app/Data/IncentiveCalculationData.php
class IncentiveCalculationData extends Data
{
    public function __construct(
        public float $project_amount,
        public string $project_type,
        public bool $is_eu_threshold,
        public float $iva_amount,
        public float $safety_costs,
        public ?float $renewal_costs = null,
        public array $activities = [],
        public array $employees = [],
        public array $penalties = []
    ) {}
}
```

### 1.2 Model per Calcoli
```php
// app/Models/IncentiveCalculation.php
class IncentiveCalculation extends Model
{
    protected $fillable = [
        'project_id',
        'base_amount',
        'total_percentage',
        'total_amount',
        'innovation_fund_amount',
        'employee_share_amount',
        'status',
        'calculation_date',
        'metadata'
    ];

    protected $casts = [
        'calculation_date' => 'datetime',
        'metadata' => 'array'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function details()
    {
        return $this->hasMany(IncentiveCalculationDetail::class);
    }
}
```

## 2. Implementazione Calcolo Base

### 2.1 Action per Calcolo Percentuale
```php
// app/Actions/Incentives/CalculateBasePercentageAction.php
class CalculateBasePercentageAction extends QueableAction
{
    public function handle(IncentiveCalculationData $data): float
    {
        $base_amount = $this->calculateBaseAmount($data);
        
        return match($data->project_type) {
            'lavori' => $this->calculateWorksPercentage($base_amount, $data->is_eu_threshold),
            'servizi' => $this->calculateServicesPercentage($base_amount),
            'forniture' => $this->calculateSuppliesPercentage($base_amount),
            default => throw new InvalidArgumentException('Tipo progetto non valido')
        };
    }

    private function calculateBaseAmount(IncentiveCalculationData $data): float
    {
        $amount = $data->project_amount - $data->iva_amount + $data->safety_costs;
        
        if ($data->renewal_costs) {
            $amount += $data->renewal_costs;
        }

        return $amount;
    }

    private function calculateWorksPercentage(float $amount, bool $is_eu_threshold): float
    {
        return match(true) {
            $amount >= 75000 && $amount < 1000000 => 0.02,
            $amount >= 1000000 && !$is_eu_threshold => 0.018,
            $amount >= 1000000 && $is_eu_threshold && $amount < 25000000 => 0.014,
            $amount >= 25000000 => 0.01,
            default => 0
        };
    }

    private function calculateServicesPercentage(float $amount): float
    {
        return match(true) {
            $amount >= 75000 && $amount < 1000000 => 0.02,
            $amount >= 1000000 && $amount < 5500000 => 0.018,
            $amount >= 5500000 && $amount < 25000000 => 0.014,
            $amount >= 25000000 => 0.01,
            default => 0
        };
    }

    private function calculateSuppliesPercentage(float $amount): float
    {
        return $this->calculateServicesPercentage($amount);
    }
}
```

## 3. Gestione Quote per Tipo Contratto

### 3.1 Action per Calcolo Quote
```php
// app/Actions/Incentives/CalculateQuotesAction.php
class CalculateQuotesAction extends QueableAction
{
    private const WORK_QUOTES = [
        'rup' => 0.24,
        'programmazione' => 0.02,
        'collaborazione_rup' => 0.09,
        'fattibilita' => 0.04,
        'progetto' => 0.04,
        'sicurezza' => 0.01,
        'verifica' => 0.04,
        'gara' => 0.03,
        'direzione' => 0.22,
        'collaudo' => 0.06
    ];

    private const SERVICE_QUOTES = [
        'rup' => 0.21,
        'programmazione' => 0.02,
        'collaborazione_rup' => 0.13,
        'progetto' => 0.24,
        'sicurezza' => 0.01,
        'direzione' => 0.21,
        'collaboratori_direzione' => 0.11,
        'verifica' => 0.05
    ];

    public function handle(string $project_type, array $activities): array
    {
        $quotes = $project_type === 'lavori' ? self::WORK_QUOTES : self::SERVICE_QUOTES;
        
        return collect($activities)->map(function ($activity) use ($quotes) {
            return [
                'activity_type' => $activity,
                'percentage' => $quotes[$activity] ?? 0
            ];
        })->toArray();
    }
}
```

## 4. Calcolo Penalità

### 4.1 Model per Penalità
```php
// app/Models/IncentivePenalty.php
class IncentivePenalty extends Model
{
    protected $fillable = [
        'incentive_calculation_id',
        'type',
        'amount',
        'percentage',
        'reason',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function calculation()
    {
        return $this->belongsTo(IncentiveCalculation::class);
    }
}
```

### 4.2 Action per Calcolo Penalità
```php
// app/Actions/Incentives/CalculatePenaltiesAction.php
class CalculatePenaltiesAction extends QueableAction
{
    public function handle(Project $project, array $delays, array $cost_increases): array
    {
        $penalties = [];

        // Calcolo penalità per ritardi
        foreach ($delays as $delay) {
            if ($delay['percentage'] <= 50) {
                $penalties[] = [
                    'type' => 'delay',
                    'amount' => $this->calculateDelayPenalty($delay),
                    'percentage' => $delay['percentage'],
                    'reason' => $delay['reason']
                ];
            }
        }

        // Calcolo penalità per costi extra
        foreach ($cost_increases as $increase) {
            if ($increase['percentage'] <= 50) {
                $penalties[] = [
                    'type' => 'cost_increase',
                    'amount' => $this->calculateCostIncreasePenalty($increase),
                    'percentage' => $increase['percentage'],
                    'reason' => $increase['reason']
                ];
            }
        }

        return $penalties;
    }

    private function calculateDelayPenalty(array $delay): float
    {
        return $delay['base_amount'] * ($delay['percentage'] / 100);
    }

    private function calculateCostIncreasePenalty(array $increase): float
    {
        return $increase['base_amount'] * ($increase['percentage'] / 100);
    }
}
```

## 5. Calcolo Finale

### 5.1 Action per Calcolo Finale
```php
// app/Actions/Incentives/CalculateFinalIncentiveAction.php
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
        $calculation = IncentiveCalculation::create([
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

        // Creazione dettagli calcolo
        foreach ($quotes as $quote) {
            $calculation->details()->create([
                'activity_type' => $quote['activity_type'],
                'percentage' => $quote['percentage'],
                'amount' => $employee_share * $quote['percentage']
            ]);
        }

        return $calculation;
    }
}
```

## 6. Validazione e Testing

### 6.1 Test per Calcolo Incentivi
```php
// tests/Unit/IncentiveCalculationTest.php
class IncentiveCalculationTest extends TestCase
{
    public function test_calculate_base_percentage()
    {
        $data = new IncentiveCalculationData(
            project_amount: 80000,
            project_type: 'lavori',
            is_eu_threshold: false,
            iva_amount: 17600,
            safety_costs: 1000
        );

        $action = new CalculateBasePercentageAction();
        $percentage = $action->handle($data);

        $this->assertEquals(0.02, $percentage);
    }

    public function test_calculate_quotes()
    {
        $action = new CalculateQuotesAction();
        $quotes = $action->handle('lavori', ['rup', 'programmazione']);

        $this->assertEquals(0.24, $quotes[0]['percentage']);
        $this->assertEquals(0.02, $quotes[1]['percentage']);
    }

    public function test_calculate_final_incentive()
    {
        $project = Project::factory()->create();
        $data = new IncentiveCalculationData(
            project: $project,
            project_amount: 100000,
            project_type: 'lavori',
            is_eu_threshold: false,
            iva_amount: 22000,
            safety_costs: 1000,
            activities: ['rup', 'programmazione']
        );

        $action = new CalculateFinalIncentiveAction();
        $calculation = $action->handle($data);

        $this->assertEquals(2000, $calculation->total_amount);
        $this->assertEquals(400, $calculation->innovation_fund_amount);
        $this->assertEquals(1600, $calculation->employee_share_amount);
    }
}
```

## 7. Integrazione con Filament

### 7.1 Resource per Calcoli
```php
// app/Filament/Resources/IncentiveCalculationResource.php
class IncentiveCalculationResource extends Resource
{
    protected static ?string $model = IncentiveCalculation::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('project_id')
                ->relationship('project', 'name')
                ->required(),
            Forms\Components\TextInput::make('base_amount')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('total_percentage')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('total_amount')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('innovation_fund_amount')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('employee_share_amount')
                ->numeric()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('project.name')
                ->searchable(),
            Tables\Columns\TextColumn::make('total_amount')
                ->money('EUR'),
            Tables\Columns\TextColumn::make('calculation_date')
                ->dateTime(),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'completed' => 'success',
                    'pending' => 'warning',
                    'cancelled' => 'danger',
                }),
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
php artisan vendor:publish --tag=incentives-calculation
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