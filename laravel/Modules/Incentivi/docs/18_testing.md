# Documentazione Testing Modulo Incentivi

## 1. Introduzione

Questa documentazione descrive le strategie e le procedure di testing per il modulo Incentivi. Il modulo utilizza un approccio completo al testing che include unit test, feature test, integration test e end-to-end test.

## 2. Unit Test

### 2.1 Test dei Modelli
```php
// tests/Unit/Models/ProjectTest.php
class ProjectTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_calculates_total_incentive_correctly()
    {
        $project = Project::factory()->create([
            'amount' => 100000
        ]);
        
        $activity = Activity::factory()->create([
            'project_id' => $project->id,
            'incentive_amount' => 5000
        ]);
        
        $this->assertEquals(5000, $project->total_incentive);
    }
    
    /** @test */
    public function it_validates_required_fields()
    {
        $this->expectException(ValidationException::class);
        
        Project::create([]);
    }
}
```

### 2.2 Test dei Servizi
```php
// tests/Unit/Services/IncentiveCalculationServiceTest.php
class IncentiveCalculationServiceTest extends TestCase
{
    /** @test */
    public function it_calculates_incentive_with_penalties()
    {
        $service = new IncentiveCalculationService();
        
        $result = $service->calculate([
            'amount' => 100000,
            'base_percentage' => 5,
            'penalties' => [
                'delay' => 2,
                'cost_increase' => 1
            ]
        ]);
        
        $this->assertEquals(2000, $result['final_incentive']);
    }
}
```

### 2.3 Test delle Actions
```php
// tests/Unit/Actions/CalculateFinalIncentiveActionTest.php
class CalculateFinalIncentiveActionTest extends TestCase
{
    /** @test */
    public function it_executes_calculation_action()
    {
        $action = new CalculateFinalIncentiveAction();
        
        $result = $action->execute([
            'project_id' => 1,
            'employee_id' => 1,
            'activity_id' => 1
        ]);
        
        $this->assertIsArray($result);
        $this->assertArrayHasKey('incentive_amount', $result);
    }
}
```

## 3. Feature Test

### 3.1 Test dei Controller
```php
// tests/Feature/Controllers/ProjectControllerTest.php
class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_can_create_project()
    {
        $response = $this->postJson('/api/projects', [
            'name' => 'Test Project',
            'amount' => 100000,
            'start_date' => now(),
            'end_date' => now()->addYear()
        ]);
        
        $response->assertStatus(201)
                ->assertJsonStructure([
                    'id',
                    'name',
                    'amount',
                    'start_date',
                    'end_date'
                ]);
    }
    
    /** @test */
    public function it_can_update_project()
    {
        $project = Project::factory()->create();
        
        $response = $this->putJson("/api/projects/{$project->id}", [
            'name' => 'Updated Project',
            'amount' => 150000
        ]);
        
        $response->assertStatus(200)
                ->assertJson([
                    'name' => 'Updated Project',
                    'amount' => 150000
                ]);
    }
}
```

### 3.2 Test delle API
```php
// tests/Feature/Api/IncentiveCalculationTest.php
class IncentiveCalculationTest extends TestCase
{
    /** @test */
    public function it_calculates_incentive_via_api()
    {
        $response = $this->postJson('/api/incentives/calculate', [
            'project_id' => 1,
            'employee_id' => 1,
            'activity_id' => 1
        ]);
        
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'incentive_amount',
                    'base_percentage',
                    'penalties',
                    'final_amount'
                ]);
    }
}
```

### 3.3 Test delle Route
```php
// tests/Feature/Routes/ProjectRoutesTest.php
class ProjectRoutesTest extends TestCase
{
    /** @test */
    public function it_can_access_project_routes()
    {
        $this->get('/api/projects')->assertStatus(401);
        
        $user = User::factory()->create();
        $this->actingAs($user);
        
        $this->get('/api/projects')->assertStatus(200);
    }
}
```

## 4. Integration Test

### 4.1 Test di Integrazione con SUA
```php
// tests/Integration/SuaIntegrationTest.php
class SuaIntegrationTest extends TestCase
{
    /** @test */
    public function it_syncs_projects_with_sua()
    {
        $this->mock(SuaService::class, function ($mock) {
            $mock->shouldReceive('getProjects')
                ->once()
                ->andReturn([
                    ['id' => 1, 'name' => 'Test Project']
                ]);
        });
        
        $this->artisan('incentivi:sync-sua')
            ->assertExitCode(0);
            
        $this->assertDatabaseHas('projects', [
            'sua_id' => 1,
            'name' => 'Test Project'
        ]);
    }
}
```

### 4.2 Test di Integrazione con Cache
```php
// tests/Integration/CacheIntegrationTest.php
class CacheIntegrationTest extends TestCase
{
    /** @test */
    public function it_caches_incentive_calculations()
    {
        $project = Project::factory()->create();
        
        // Prima chiamata
        $response1 = $this->getJson("/api/projects/{$project->id}/incentive");
        
        // Seconda chiamata (dovrebbe usare cache)
        $response2 = $this->getJson("/api/projects/{$project->id}/incentive");
        
        $this->assertEquals($response1->json(), $response2->json());
        
        // Verifica che la cache sia stata utilizzata
        $this->assertTrue(Cache::has("project.{$project->id}.incentive"));
    }
}
```

## 5. End-to-End Test

### 5.1 Test con Laravel Dusk
```php
// tests/Dusk/IncentiveCalculationTest.php
class IncentiveCalculationTest extends DuskTestCase
{
    /** @test */
    public function it_calculates_incentive_through_ui()
    {
        $this->browse(function ($browser) {
            $browser->visit('/incentives/calculate')
                   ->type('project_id', '1')
                   ->type('employee_id', '1')
                   ->type('activity_id', '1')
                   ->press('Calcola')
                   ->assertSee('Incentivo calcolato con successo');
        });
    }
}
```

### 5.2 Test con Cypress
```javascript
// cypress/integration/incentive_calculation.spec.js
describe('Incentive Calculation', () => {
    it('calculates incentive through UI', () => {
        cy.visit('/incentives/calculate')
        cy.get('#project_id').type('1')
        cy.get('#employee_id').type('1')
        cy.get('#activity_id').type('1')
        cy.get('button[type="submit"]').click()
        cy.contains('Incentivo calcolato con successo')
    })
})
```

## 6. Test di Performance

### 6.1 Test di Carico
```php
// tests/Performance/LoadTest.php
class LoadTest extends TestCase
{
    /** @test */
    public function it_handles_concurrent_requests()
    {
        $responses = [];
        
        for ($i = 0; $i < 100; $i++) {
            $responses[] = $this->getJson('/api/projects');
        }
        
        foreach ($responses as $response) {
            $this->assertEquals(200, $response->status());
        }
    }
}
```

### 6.2 Test di Stress
```php
// tests/Performance/StressTest.php
class StressTest extends TestCase
{
    /** @test */
    public function it_handles_heavy_calculations()
    {
        $start = microtime(true);
        
        for ($i = 0; $i < 1000; $i++) {
            $this->postJson('/api/incentives/calculate', [
                'project_id' => rand(1, 100),
                'employee_id' => rand(1, 50),
                'activity_id' => rand(1, 200)
            ]);
        }
        
        $duration = microtime(true) - $start;
        
        $this->assertLessThan(30, $duration); // Dovrebbe completarsi in meno di 30 secondi
    }
}
```

## 7. Test di Sicurezza

### 7.1 Test di Autenticazione
```php
// tests/Security/AuthenticationTest.php
class AuthenticationTest extends TestCase
{
    /** @test */
    public function it_prevents_unauthorized_access()
    {
        $response = $this->getJson('/api/projects');
        
        $response->assertStatus(401);
    }
    
    /** @test */
    public function it_allows_authorized_access()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
                        ->getJson('/api/projects');
                        
        $response->assertStatus(200);
    }
}
```

### 7.2 Test di Autorizzazione
```php
// tests/Security/AuthorizationTest.php
class AuthorizationTest extends TestCase
{
    /** @test */
    public function it_enforces_role_permissions()
    {
        $user = User::factory()->create(['role' => 'user']);
        
        $response = $this->actingAs($user)
                        ->postJson('/api/projects', [
                            'name' => 'Test Project',
                            'amount' => 100000
                        ]);
                        
        $response->assertStatus(403);
    }
}
```

## 8. Test di Validazione

### 8.1 Test di Input
```php
// tests/Validation/InputValidationTest.php
class InputValidationTest extends TestCase
{
    /** @test */
    public function it_validates_project_input()
    {
        $response = $this->postJson('/api/projects', [
            'name' => '',
            'amount' => -100
        ]);
        
        $response->assertStatus(422)
                ->assertJsonValidationErrors(['name', 'amount']);
    }
}
```

### 8.2 Test di Output
```php
// tests/Validation/OutputValidationTest.php
class OutputValidationTest extends TestCase
{
    /** @test */
    public function it_validates_incentive_calculation_output()
    {
        $response = $this->postJson('/api/incentives/calculate', [
            'project_id' => 1,
            'employee_id' => 1,
            'activity_id' => 1
        ]);
        
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'incentive_amount' => 'numeric',
                    'base_percentage' => 'numeric',
                    'penalties' => 'array',
                    'final_amount' => 'numeric'
                ]);
    }
}
```

## 9. Test di Database

### 9.1 Test di Migrazione
```php
// tests/Database/MigrationTest.php
class MigrationTest extends TestCase
{
    /** @test */
    public function it_creates_required_tables()
    {
        $this->assertDatabaseHas('migrations', [
            'migration' => '2024_03_20_create_projects_table'
        ]);
        
        $this->assertDatabaseHas('migrations', [
            'migration' => '2024_03_20_create_activities_table'
        ]);
    }
}
```

### 9.2 Test di Seeder
```php
// tests/Database/SeederTest.php
class SeederTest extends TestCase
{
    /** @test */
    public function it_seeds_required_data()
    {
        $this->seed();
        
        $this->assertDatabaseCount('projects', 10);
        $this->assertDatabaseCount('activities', 50);
        $this->assertDatabaseCount('employees', 20);
    }
}
```

## 10. Test di Cache

### 10.1 Test di Cache Hit/Miss
```php
// tests/Cache/CacheTest.php
class CacheTest extends TestCase
{
    /** @test */
    public function it_caches_and_retrieves_data()
    {
        $project = Project::factory()->create();
        
        // Prima chiamata (cache miss)
        $response1 = $this->getJson("/api/projects/{$project->id}");
        
        // Seconda chiamata (cache hit)
        $response2 = $this->getJson("/api/projects/{$project->id}");
        
        $this->assertEquals($response1->json(), $response2->json());
        
        // Verifica cache
        $this->assertTrue(Cache::has("project.{$project->id}"));
    }
}
```

### 10.2 Test di Cache Invalidation
```php
// tests/Cache/CacheInvalidationTest.php
class CacheInvalidationTest extends TestCase
{
    /** @test */
    public function it_invalidates_cache_on_update()
    {
        $project = Project::factory()->create();
        
        // Popola cache
        Cache::put("project.{$project->id}", $project);
        
        // Aggiorna progetto
        $this->putJson("/api/projects/{$project->id}", [
            'name' => 'Updated Project'
        ]);
        
        // Verifica che la cache sia stata invalidata
        $this->assertFalse(Cache::has("project.{$project->id}"));
    }
}
```

## 11. Test di Queue

### 11.1 Test di Job
```php
// tests/Queue/JobTest.php
class JobTest extends TestCase
{
    /** @test */
    public function it_processes_job_correctly()
    {
        Queue::fake();
        
        CalculateProjectIncentive::dispatch(1);
        
        Queue::assertPushed(CalculateProjectIncentive::class);
    }
}
```

### 11.2 Test di Batch
```php
// tests/Queue/BatchTest.php
class BatchTest extends TestCase
{
    /** @test */
    public function it_processes_batch_correctly()
    {
        Bus::fake();
        
        $batch = Bus::batch([
            new CalculateProjectIncentive(1),
            new CalculateProjectIncentive(2)
        ])->dispatch();
        
        Bus::assertBatch([
            CalculateProjectIncentive::class,
            CalculateProjectIncentive::class
        ]);
    }
}
```

## 12. Test di Eventi

### 12.1 Test di Event Dispatch
```php
// tests/Events/EventTest.php
class EventTest extends TestCase
{
    /** @test */
    public function it_dispatches_events()
    {
        Event::fake();
        
        $project = Project::factory()->create();
        
        Event::assertDispatched(ProjectCreated::class);
    }
}
```

### 12.2 Test di Event Listeners
```php
// tests/Events/ListenerTest.php
class ListenerTest extends TestCase
{
    /** @test */
    public function it_handles_events()
    {
        $project = Project::factory()->create();
        
        event(new ProjectCreated($project));
        
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'project.created',
            'project_id' => $project->id
        ]);
    }
}
```

## 13. Best Practices

### 13.1 Organizzazione Test
- Separare i test per tipo (unit, feature, integration)
- Utilizzare factory per i dati di test
- Mantenere i test indipendenti
- Utilizzare naming conventions chiare
- Documentare i test complessi

### 13.2 Performance Test
- Utilizzare database in-memory per i test
- Implementare test di performance
- Monitorare tempi di esecuzione
- Utilizzare cache per test frequenti
- Implementare test di carico

### 13.3 Manutenzione Test
- Aggiornare i test quando cambia il codice
- Rimuovere test obsoleti
- Mantenere i test semplici e leggibili
- Utilizzare setup e teardown appropriati
- Implementare test di regressione 