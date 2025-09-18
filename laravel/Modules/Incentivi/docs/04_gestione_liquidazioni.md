# Gestione Liquidazioni

## 1. Struttura Base

### 1.1 Model per Liquidazioni
```php
// app/Models/Settlement.php
class Settlement extends Model
{
    protected $fillable = [
        'incentive_calculation_id',
        'employee_id',
        'amount',
        'status',
        'payment_date',
        'payment_method',
        'notes',
        'metadata'
    ];

    protected $casts = [
        'payment_date' => 'datetime',
        'metadata' => 'array'
    ];

    public function calculation()
    {
        return $this->belongsTo(IncentiveCalculation::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
```

### 1.2 Data Transfer Object
```php
// app/Data/SettlementData.php
class SettlementData extends Data
{
    public function __construct(
        public int $incentive_calculation_id,
        public int $employee_id,
        public float $amount,
        public string $payment_method,
        public ?string $notes = null,
        public ?array $metadata = null
    ) {}
}
```

## 2. Gestione Stato Liquidazioni

### 2.1 Enum per Stati
```php
// app/Enums/SettlementStatus.php
enum SettlementStatus: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
}
```

### 2.2 Action per Gestione Stato
```php
// app/Actions/Incentives/UpdateSettlementStatusAction.php
class UpdateSettlementStatusAction extends QueableAction
{
    public function handle(Settlement $settlement, SettlementStatus $status, ?string $notes = null): Settlement
    {
        $settlement->update([
            'status' => $status,
            'notes' => $notes
        ]);

        if ($status === SettlementStatus::PAID) {
            $settlement->update([
                'payment_date' => now()
            ]);
        }

        return $settlement;
    }
}
```

## 3. Calcolo Quote Dipendenti

### 3.1 Action per Calcolo Quote
```php
// app/Actions/Incentives/CalculateEmployeeQuotesAction.php
class CalculateEmployeeQuotesAction extends QueableAction
{
    public function handle(IncentiveCalculation $calculation): array
    {
        $employee_share = $calculation->employee_share_amount;
        $details = $calculation->details;

        return $details->map(function ($detail) use ($employee_share) {
            return [
                'activity_type' => $detail->activity_type,
                'amount' => $employee_share * $detail->percentage,
                'percentage' => $detail->percentage
            ];
        })->toArray();
    }
}
```

## 4. Gestione Pagamenti

### 4.1 Action per Creazione Liquidazioni
```php
// app/Actions/Incentives/CreateSettlementsAction.php
class CreateSettlementsAction extends QueableAction
{
    public function handle(IncentiveCalculation $calculation, array $employee_quotes): array
    {
        $settlements = [];

        foreach ($employee_quotes as $quote) {
            $settlements[] = Settlement::create([
                'incentive_calculation_id' => $calculation->id,
                'employee_id' => $quote['employee_id'],
                'amount' => $quote['amount'],
                'status' => SettlementStatus::PENDING,
                'payment_method' => 'bank_transfer',
                'metadata' => [
                    'activity_type' => $quote['activity_type'],
                    'percentage' => $quote['percentage']
                ]
            ]);
        }

        return $settlements;
    }
}
```

### 4.2 Action per Processo Pagamento
```php
// app/Actions/Incentives/ProcessSettlementPaymentAction.php
class ProcessSettlementPaymentAction extends QueableAction
{
    public function handle(Settlement $settlement, string $payment_method): Settlement
    {
        // Verifica stato
        if ($settlement->status !== SettlementStatus::APPROVED) {
            throw new InvalidArgumentException('La liquidazione deve essere approvata prima del pagamento');
        }

        // Aggiorna stato e metodo di pagamento
        $settlement->update([
            'status' => SettlementStatus::PAID,
            'payment_date' => now(),
            'payment_method' => $payment_method
        ]);

        return $settlement;
    }
}
```

## 5. Validazione e Testing

### 5.1 Test per Liquidazioni
```php
// tests/Unit/SettlementTest.php
class SettlementTest extends TestCase
{
    public function test_create_settlement()
    {
        $calculation = IncentiveCalculation::factory()->create();
        $employee = Employee::factory()->create();
        
        $data = new SettlementData(
            incentive_calculation_id: $calculation->id,
            employee_id: $employee->id,
            amount: 1000,
            payment_method: 'bank_transfer'
        );

        $action = new CreateSettlementsAction();
        $settlements = $action->handle($calculation, [
            [
                'employee_id' => $employee->id,
                'amount' => 1000,
                'activity_type' => 'rup'
            ]
        ]);

        $this->assertCount(1, $settlements);
        $this->assertEquals(1000, $settlements[0]->amount);
    }

    public function test_update_settlement_status()
    {
        $settlement = Settlement::factory()->create([
            'status' => SettlementStatus::PENDING
        ]);

        $action = new UpdateSettlementStatusAction();
        $updated = $action->handle($settlement, SettlementStatus::APPROVED);

        $this->assertEquals(SettlementStatus::APPROVED, $updated->status);
    }

    public function test_process_payment()
    {
        $settlement = Settlement::factory()->create([
            'status' => SettlementStatus::APPROVED
        ]);

        $action = new ProcessSettlementPaymentAction();
        $processed = $action->handle($settlement, 'bank_transfer');

        $this->assertEquals(SettlementStatus::PAID, $processed->status);
        $this->assertEquals('bank_transfer', $processed->payment_method);
        $this->assertNotNull($processed->payment_date);
    }
}
```

## 6. Integrazione con Filament

### 6.1 Resource per Liquidazioni
```php
// app/Filament/Resources/SettlementResource.php
class SettlementResource extends Resource
{
    protected static ?string $model = Settlement::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('incentive_calculation_id')
                ->relationship('calculation', 'id')
                ->required(),
            Forms\Components\Select::make('employee_id')
                ->relationship('employee', 'name')
                ->required(),
            Forms\Components\TextInput::make('amount')
                ->numeric()
                ->required(),
            Forms\Components\Select::make('status')
                ->options(collect(SettlementStatus::cases())->mapWithKeys(fn ($status) => [$status->value => $status->name]))
                ->required(),
            Forms\Components\Select::make('payment_method')
                ->options([
                    'bank_transfer' => 'Bonifico Bancario',
                    'cash' => 'Contanti',
                    'check' => 'Assegno'
                ])
                ->required(),
            Forms\Components\DatePicker::make('payment_date')
                ->required(),
            Forms\Components\Textarea::make('notes')
                ->rows(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('calculation.id')
                ->searchable(),
            Tables\Columns\TextColumn::make('employee.name')
                ->searchable(),
            Tables\Columns\TextColumn::make('amount')
                ->money('EUR'),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                    'paid' => 'info',
                    'cancelled' => 'gray',
                }),
            Tables\Columns\TextColumn::make('payment_date')
                ->dateTime(),
        ]);
    }
}
```

## 7. Deployment Checklist

1. Eseguire le migrazioni:
```bash
php artisan migrate
```

2. Pubblicare le configurazioni:
```bash
php artisan vendor:publish --tag=incentives-settlements
```

3. Eseguire i test:
```bash
php artisan test --filter=SettlementTest
```

4. Verificare i permessi:
```bash
php artisan permissions:sync
```

5. Pulire la cache:
```bash
php artisan optimize:clear
``` 