# Best Practices per il Testing nel Modulo Performance

## Overview
Questo documento descrive le best practices per l'implementazione dei test nel modulo Performance.

## Test Unitari

### 1. Test delle Classi
```php
class PerformanceCalculatorTest extends TestCase
{
    private PerformanceCalculator $calculator;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new PerformanceCalculator();
    }
    
    /** @test */
    public function it_calculates_performance_score_correctly(): void
    {
        $user = User::factory()->create();
        $metrics = [
            'efficiency' => 0.8,
            'quality' => 0.9,
            'timeliness' => 0.7
        ];
        
        $score = $this->calculator->calculate($user, $metrics);
        
        $this->assertEquals(0.8, $score);
    }
}
```

### 2. Test dei Value Objects
```php
class PerformanceScoreTest extends TestCase
{
    /** @test */
    public function it_validates_score_range(): void
    {
        $this->expectException(InvalidArgumentException::class);
        
        new PerformanceScore(1.5); // Score deve essere tra 0 e 1
    }
    
    /** @test */
    public function it_can_be_compared(): void
    {
        $score1 = new PerformanceScore(0.8);
        $score2 = new PerformanceScore(0.8);
        
        $this->assertTrue($score1->equals($score2));
    }
}
```

### 3. Test delle Actions
```php
class CalculatePerformanceActionTest extends TestCase
{
    private CalculatePerformanceAction $action;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = new CalculatePerformanceAction();
    }
    
    /** @test */
    public function it_executes_performance_calculation(): void
    {
        $user = User::factory()->create();
        
        $result = $this->action->execute($user);
        
        $this->assertIsArray($result);
        $this->assertArrayHasKey('score', $result);
        $this->assertArrayHasKey('metrics', $result);
    }
}
```

## Test di Integrazione

### 1. Test dei Controller
```php
class PerformanceControllerTest extends TestCase
{
    /** @test */
    public function it_returns_performance_data(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->getJson('/api/v1/performance');
        
        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'score',
                    'metrics',
                    'trends'
                ]
            ]);
    }
}
```

### 2. Test dei Service
```php
class PerformanceServiceTest extends TestCase
{
    private PerformanceService $service;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new PerformanceService();
    }
    
    /** @test */
    public function it_processes_performance_data(): void
    {
        $data = [
            'user_id' => 1,
            'metrics' => [
                'efficiency' => 0.8,
                'quality' => 0.9
            ]
        ];
        
        $result = $this->service->process($data);
        
        $this->assertDatabaseHas('performances', [
            'user_id' => 1,
            'score' => 0.85
        ]);
    }
}
```

### 3. Test delle API
```php
class PerformanceApiTest extends TestCase
{
    /** @test */
    public function it_handles_performance_requests(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->postJson('/api/v1/performance', [
                'metrics' => [
                    'efficiency' => 0.8,
                    'quality' => 0.9
                ]
            ]);
        
        $response->assertCreated()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'score',
                    'created_at'
                ]
            ]);
    }
}
```

## Test di Feature

### 1. Test dei Flussi
```php
class PerformanceFlowTest extends TestCase
{
    /** @test */
    public function it_completes_performance_workflow(): void
    {
        $user = User::factory()->create();
        
        $this->actingAs($user)
            ->post('/performance/start')
            ->assertRedirect('/performance/assessment');
            
        $this->actingAs($user)
            ->post('/performance/assessment', [
                'metrics' => [
                    'efficiency' => 0.8,
                    'quality' => 0.9
                ]
            ])
            ->assertRedirect('/performance/review');
            
        $this->actingAs($user)
            ->get('/performance/review')
            ->assertSee('Performance Review');
    }
}
```

### 2. Test delle Interazioni
```php
class PerformanceInteractionTest extends TestCase
{
    /** @test */
    public function it_handles_user_interactions(): void
    {
        $user = User::factory()->create();
        
        $this->actingAs($user)
            ->get('/performance/dashboard')
            ->assertSee('Performance Dashboard');
            
        $this->actingAs($user)
            ->click('View Details')
            ->assertSee('Performance Details');
            
        $this->actingAs($user)
            ->click('Export Report')
            ->assertDownload();
    }
}
```

### 3. Test delle Validazioni
```php
class PerformanceValidationTest extends TestCase
{
    /** @test */
    public function it_validates_performance_data(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->postJson('/api/v1/performance', [
                'metrics' => [
                    'efficiency' => 1.5, // Valore non valido
                    'quality' => 0.9
                ]
            ]);
        
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['metrics.efficiency']);
    }
}
```

## Test di Performance

### 1. Test di Carico
```php
class PerformanceLoadTest extends TestCase
{
    /** @test */
    public function it_handles_concurrent_requests(): void
    {
        $users = User::factory()->count(50)->create();
        
        $responses = collect($users)->map(function ($user) {
            return $this->actingAs($user)
                ->getJson('/api/v1/performance');
        });
        
        $this->assertTrue($responses->every(fn ($response) => $response->status() === 200));
    }
}
```

### 2. Test di Stress
```php
class PerformanceStressTest extends TestCase
{
    /** @test */
    public function it_handles_high_load(): void
    {
        $start = microtime(true);
        
        for ($i = 0; $i < 1000; $i++) {
            $this->getJson('/api/v1/performance');
        }
        
        $duration = microtime(true) - $start;
        
        $this->assertLessThan(5, $duration); // Dovrebbe completarsi in meno di 5 secondi
    }
}
```

### 3. Test di Memoria
```php
class PerformanceMemoryTest extends TestCase
{
    /** @test */
    public function it_manages_memory_usage(): void
    {
        $initialMemory = memory_get_usage();
        
        $this->getJson('/api/v1/performance');
        
        $finalMemory = memory_get_usage();
        $memoryUsed = $finalMemory - $initialMemory;
        
        $this->assertLessThan(50 * 1024 * 1024, $memoryUsed); // Meno di 50MB
    }
}
```

## Best Practices

### 1. Test Isolation
```php
class IsolatedTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_runs_in_isolation(): void
    {
        $this->assertDatabaseCount('performances', 0);
        
        Performance::factory()->create();
        
        $this->assertDatabaseCount('performances', 1);
    }
}
```

### 2. Test Data
```php
class TestDataTest extends TestCase
{
    /** @test */
    public function it_uses_test_data(): void
    {
        $performance = Performance::factory()->create([
            'score' => 0.8,
            'metrics' => [
                'efficiency' => 0.8,
                'quality' => 0.9
            ]
        ]);
        
        $this->assertEquals(0.8, $performance->score);
        $this->assertEquals(0.8, $performance->metrics['efficiency']);
    }
}
```

### 3. Test Documentation
```php
/**
 * @test
 * @group performance
 * @covers \App\Actions\CalculatePerformanceAction
 */
class DocumentedTest extends TestCase
{
    /** @test */
    public function it_is_well_documented(): void
    {
        $this->assertTrue(true);
    }
}
```

## Conclusioni
Le best practices per il testing nel modulo Performance:
- Implementano test unitari, di integrazione e di feature
- Utilizzano factory e seeder per i dati di test
- Mantengono l'isolamento dei test
- Documentano correttamente i test
- Monitorano le performance dei test
- Seguono le convenzioni di naming
- Utilizzano assertion appropriate
- Gestiscono correttamente le eccezioni 