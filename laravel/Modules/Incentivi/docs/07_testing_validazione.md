# Testing e Validazione

## 1. Test Unitari

### 1.1 Test per Calcolo Incentivi
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

### 1.2 Test per Gestione Liquidazioni
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

## 2. Test di Integrazione

### 2.1 Test per Flusso Completo
```php
// tests/Integration/IncentiveFlowTest.php
class IncentiveFlowTest extends TestCase
{
    public function test_complete_incentive_flow()
    {
        // Crea progetto
        $project = Project::factory()->create([
            'amount' => 100000,
            'type' => 'lavori'
        ]);

        // Crea dipendenti
        $rup = Employee::factory()->create(['role' => 'rup']);
        $programmer = Employee::factory()->create(['role' => 'programmer']);

        // Calcola incentivo
        $calculation = (new CalculateFinalIncentiveAction())->handle(
            new IncentiveCalculationData(
                project: $project,
                project_amount: 100000,
                project_type: 'lavori',
                is_eu_threshold: false,
                iva_amount: 22000,
                safety_costs: 1000,
                activities: ['rup', 'programmazione']
            )
        );

        // Verifica calcolo
        $this->assertEquals(2000, $calculation->total_amount);
        $this->assertEquals(400, $calculation->innovation_fund_amount);
        $this->assertEquals(1600, $calculation->employee_share_amount);

        // Crea liquidazioni
        $settlements = (new CreateSettlementsAction())->handle($calculation, [
            [
                'employee_id' => $rup->id,
                'amount' => 800,
                'activity_type' => 'rup'
            ],
            [
                'employee_id' => $programmer->id,
                'amount' => 800,
                'activity_type' => 'programmazione'
            ]
        ]);

        // Verifica liquidazioni
        $this->assertCount(2, $settlements);
        $this->assertEquals(800, $settlements[0]->amount);
        $this->assertEquals(800, $settlements[1]->amount);

        // Approva liquidazioni
        foreach ($settlements as $settlement) {
            (new UpdateSettlementStatusAction())->handle($settlement, SettlementStatus::APPROVED);
        }

        // Processa pagamenti
        foreach ($settlements as $settlement) {
            (new ProcessSettlementPaymentAction())->handle($settlement, 'bank_transfer');
        }

        // Verifica stati finali
        foreach ($settlements as $settlement) {
            $this->assertEquals(SettlementStatus::PAID, $settlement->fresh()->status);
            $this->assertEquals('bank_transfer', $settlement->fresh()->payment_method);
            $this->assertNotNull($settlement->fresh()->payment_date);
        }
    }
}
```

## 3. Test per Validazione

### 3.1 Test per Validazione Dati
```php
// tests/Unit/ValidationTest.php
class ValidationTest extends TestCase
{
    public function test_incentive_calculation_validation()
    {
        $validator = Validator::make([
            'project_amount' => 80000,
            'project_type' => 'invalid_type',
            'iva_amount' => -1000,
            'safety_costs' => 'not_numeric'
        ], IncentiveCalculationRequest::rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('project_type', $validator->errors()->toArray());
        $this->assertArrayHasKey('iva_amount', $validator->errors()->toArray());
        $this->assertArrayHasKey('safety_costs', $validator->errors()->toArray());
    }

    public function test_settlement_validation()
    {
        $validator = Validator::make([
            'incentive_calculation_id' => 999999,
            'employee_id' => 999999,
            'amount' => -1000,
            'payment_method' => 'invalid_method'
        ], SettlementRequest::rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('incentive_calculation_id', $validator->errors()->toArray());
        $this->assertArrayHasKey('employee_id', $validator->errors()->toArray());
        $this->assertArrayHasKey('amount', $validator->errors()->toArray());
        $this->assertArrayHasKey('payment_method', $validator->errors()->toArray());
    }
}
```

## 4. Test per API

### 4.1 Test per Endpoint API
```php
// tests/Feature/ApiTest.php
class ApiTest extends TestCase
{
    public function test_calculate_incentive_endpoint()
    {
        $response = $this->postJson('/api/incentives/calculate', [
            'project_amount' => 80000,
            'project_type' => 'lavori',
            'is_eu_threshold' => false,
            'iva_amount' => 17600,
            'safety_costs' => 1000,
            'activities' => ['rup', 'programmazione']
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'total_amount',
                'innovation_fund_amount',
                'employee_share_amount',
                'details' => [
                    '*' => [
                        'activity_type',
                        'percentage',
                        'amount'
                    ]
                ]
            ]);
    }

    public function test_create_settlement_endpoint()
    {
        $calculation = IncentiveCalculation::factory()->create();
        $employee = Employee::factory()->create();

        $response = $this->postJson('/api/settlements', [
            'incentive_calculation_id' => $calculation->id,
            'employee_id' => $employee->id,
            'amount' => 1000,
            'payment_method' => 'bank_transfer'
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'amount',
                'status',
                'payment_method'
            ]);
    }
}
```

## 5. Test per Interfaccia

### 5.1 Test per Componenti Vue
```javascript
// resources/js/components/__tests__/IncentiveChart.spec.js
import { mount } from '@vue/test-utils';
import IncentiveChart from '../IncentiveChart.vue';

describe('IncentiveChart', () => {
    it('renders chart with correct data', () => {
        const data = [
            { month: '2024-01', total: 1000 },
            { month: '2024-02', total: 2000 }
        ];

        const wrapper = mount(IncentiveChart, {
            props: { data }
        });

        expect(wrapper.exists()).toBe(true);
        expect(wrapper.vm.chart.data.labels).toEqual(['2024-01', '2024-02']);
        expect(wrapper.vm.chart.data.datasets[0].data).toEqual([1000, 2000]);
    });
});
```

### 5.2 Test per Componenti Blade
```php
// tests/Feature/ViewTest.php
class ViewTest extends TestCase
{
    public function test_dashboard_view()
    {
        $response = $this->get('/incentives/dashboard');

        $response->assertStatus(200)
            ->assertViewIs('incentives.dashboard')
            ->assertViewHas('total_projects')
            ->assertViewHas('total_employees')
            ->assertViewHas('total_incentives')
            ->assertViewHas('pending_settlements');
    }

    public function test_calculation_form_view()
    {
        $response = $this->get('/incentives/calculate');

        $response->assertStatus(200)
            ->assertViewIs('incentives.calculate')
            ->assertViewHas('projects')
            ->assertViewHas('employees');
    }
}
```

## 6. Deployment Checklist

1. Eseguire i test:
```bash
php artisan test
```

2. Verificare la copertura dei test:
```bash
php artisan test --coverage-html coverage
```

3. Eseguire i test di linting:
```bash
npm run lint
```

4. Eseguire i test di TypeScript:
```bash
npm run type-check
```

5. Verificare i test di sicurezza:
```bash
composer require --dev laravel/telescope
php artisan telescope:install
php artisan telescope:publish
``` 