# Documentazione Testing Modulo Incentivi

## 1. Introduzione

Questa documentazione fornisce informazioni e procedure per il testing del modulo Incentivi. Il modulo è progettato per essere testato in modo completo e sistematico.

## 2. Unit Testing

### 2.1 Model
```php
// Test Unitari per i Model

class IncentiveTest extends TestCase
{
    public function test_can_calculate_total_incentive()
    {
        $incentive = new Incentive([
            'base_amount' => 1000,
            'bonus_percentage' => 10
        ]);

        $this->assertEquals(1100, $incentive->calculateTotal());
    }

    public function test_can_validate_required_fields()
    {
        $incentive = new Incentive();
        
        $this->assertFalse($incentive->isValid());
        $this->assertArrayHasKey('base_amount', $incentive->getErrors());
        $this->assertArrayHasKey('bonus_percentage', $incentive->getErrors());
    }

    public function test_can_apply_discount()
    {
        $incentive = new Incentive([
            'base_amount' => 1000,
            'discount_percentage' => 20
        ]);

        $this->assertEquals(800, $incentive->applyDiscount());
    }
}
```

### 2.2 Service
```php
// Test Unitari per i Service

class IncentiveServiceTest extends TestCase
{
    public function test_can_create_incentive()
    {
        $service = new IncentiveService();
        $data = [
            'name' => 'Test Incentive',
            'base_amount' => 1000,
            'bonus_percentage' => 10
        ];

        $incentive = $service->create($data);

        $this->assertInstanceOf(Incentive::class, $incentive);
        $this->assertEquals($data['name'], $incentive->name);
        $this->assertEquals($data['base_amount'], $incentive->base_amount);
        $this->assertEquals($data['bonus_percentage'], $incentive->bonus_percentage);
    }

    public function test_can_update_incentive()
    {
        $service = new IncentiveService();
        $incentive = $service->create([
            'name' => 'Test Incentive',
            'base_amount' => 1000
        ]);

        $updated = $service->update($incentive->id, [
            'base_amount' => 2000
        ]);

        $this->assertEquals(2000, $updated->base_amount);
    }

    public function test_can_delete_incentive()
    {
        $service = new IncentiveService();
        $incentive = $service->create([
            'name' => 'Test Incentive'
        ]);

        $deleted = $service->delete($incentive->id);

        $this->assertTrue($deleted);
        $this->assertNull($service->find($incentive->id));
    }
}
```

### 2.3 Action
```php
// Test Unitari per le Action

class CalculateIncentiveActionTest extends TestCase
{
    public function test_can_calculate_incentive()
    {
        $action = new CalculateIncentiveAction();
        $data = [
            'base_amount' => 1000,
            'bonus_percentage' => 10,
            'discount_percentage' => 20
        ];

        $result = $action->execute($data);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('total', $result);
        $this->assertArrayHasKey('breakdown', $result);
        $this->assertEquals(880, $result['total']);
    }

    public function test_can_validate_input()
    {
        $action = new CalculateIncentiveAction();
        $data = [
            'base_amount' => -1000
        ];

        $this->expectException(ValidationException::class);
        $action->execute($data);
    }

    public function test_can_handle_edge_cases()
    {
        $action = new CalculateIncentiveAction();
        $data = [
            'base_amount' => 0,
            'bonus_percentage' => 0,
            'discount_percentage' => 0
        ];

        $result = $action->execute($data);

        $this->assertEquals(0, $result['total']);
    }
}
```

## 3. Feature Testing

### 3.1 Controller
```php
// Test Feature per i Controller

class IncentiveControllerTest extends TestCase
{
    public function test_can_list_incentives()
    {
        $response = $this->get('/api/incentives');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        '*' => [
                            'id',
                            'name',
                            'base_amount',
                            'bonus_percentage'
                        ]
                    ]
                ]);
    }

    public function test_can_create_incentive()
    {
        $data = [
            'name' => 'Test Incentive',
            'base_amount' => 1000,
            'bonus_percentage' => 10
        ];

        $response = $this->post('/api/incentives', $data);

        $response->assertStatus(201)
                ->assertJson([
                    'data' => [
                        'name' => $data['name'],
                        'base_amount' => $data['base_amount'],
                        'bonus_percentage' => $data['bonus_percentage']
                    ]
                ]);
    }

    public function test_can_update_incentive()
    {
        $incentive = Incentive::factory()->create();
        $data = [
            'base_amount' => 2000
        ];

        $response = $this->put("/api/incentives/{$incentive->id}", $data);

        $response->assertStatus(200)
                ->assertJson([
                    'data' => [
                        'base_amount' => $data['base_amount']
                    ]
                ]);
    }
}
```

### 3.2 API
```php
// Test Feature per le API

class IncentiveApiTest extends TestCase
{
    public function test_can_calculate_incentive_via_api()
    {
        $data = [
            'base_amount' => 1000,
            'bonus_percentage' => 10,
            'discount_percentage' => 20
        ];

        $response = $this->postJson('/api/incentives/calculate', $data);

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'total',
                    'breakdown' => [
                        'base',
                        'bonus',
                        'discount'
                    ]
                ]);
    }

    public function test_can_validate_api_input()
    {
        $data = [
            'base_amount' => -1000
        ];

        $response = $this->postJson('/api/incentives/calculate', $data);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['base_amount']);
    }

    public function test_can_handle_api_errors()
    {
        $response = $this->getJson('/api/incentives/999');

        $response->assertStatus(404)
                ->assertJson([
                    'message' => 'Incentive not found'
                ]);
    }
}
```

### 3.3 Route
```php
// Test Feature per le Route

class IncentiveRouteTest extends TestCase
{
    public function test_can_access_incentive_routes()
    {
        $this->get('/incentives')->assertStatus(200);
        $this->get('/incentives/create')->assertStatus(200);
        $this->get('/incentives/1')->assertStatus(200);
        $this->get('/incentives/1/edit')->assertStatus(200);
    }

    public function test_can_handle_invalid_routes()
    {
        $this->get('/incentives/999')->assertStatus(404);
        $this->get('/invalid-route')->assertStatus(404);
    }

    public function test_can_handle_route_parameters()
    {
        $incentive = Incentive::factory()->create();
        
        $this->get("/incentives/{$incentive->id}")
             ->assertStatus(200)
             ->assertSee($incentive->name);
    }
}
```

## 4. Integration Testing

### 4.1 Service Integration
```php
// Test di Integrazione per i Service

class IncentiveServiceIntegrationTest extends TestCase
{
    public function test_can_integrate_with_database()
    {
        $service = new IncentiveService();
        $data = [
            'name' => 'Test Incentive',
            'base_amount' => 1000
        ];

        $incentive = $service->create($data);

        $this->assertDatabaseHas('incentives', [
            'id' => $incentive->id,
            'name' => $data['name'],
            'base_amount' => $data['base_amount']
        ]);
    }

    public function test_can_integrate_with_cache()
    {
        $service = new IncentiveService();
        $incentive = $service->create([
            'name' => 'Test Incentive'
        ]);

        $cached = Cache::get("incentive.{$incentive->id}");

        $this->assertNotNull($cached);
        $this->assertEquals($incentive->toArray(), $cached);
    }

    public function test_can_integrate_with_queue()
    {
        $service = new IncentiveService();
        $incentive = $service->create([
            'name' => 'Test Incentive'
        ]);

        ProcessIncentiveJob::dispatch($incentive);

        $this->assertDatabaseHas('jobs', [
            'queue' => 'incentives'
        ]);
    }
}
```

### 4.2 External Service Integration
```php
// Test di Integrazione con Servizi Esterni

class ExternalServiceIntegrationTest extends TestCase
{
    public function test_can_integrate_with_payment_service()
    {
        $service = new PaymentService();
        $data = [
            'amount' => 1000,
            'currency' => 'EUR'
        ];

        $response = $service->processPayment($data);

        $this->assertTrue($response->success);
        $this->assertNotNull($response->transaction_id);
    }

    public function test_can_integrate_with_notification_service()
    {
        $service = new NotificationService();
        $data = [
            'user_id' => 1,
            'message' => 'Test notification'
        ];

        $response = $service->sendNotification($data);

        $this->assertTrue($response->success);
        $this->assertNotNull($response->notification_id);
    }

    public function test_can_handle_integration_errors()
    {
        $service = new PaymentService();
        $data = [
            'amount' => -1000
        ];

        $this->expectException(IntegrationException::class);
        $service->processPayment($data);
    }
}
```

### 4.3 Cache Integration
```php
// Test di Integrazione con Cache

class CacheIntegrationTest extends TestCase
{
    public function test_can_cache_incentive_calculations()
    {
        $action = new CalculateIncentiveAction();
        $data = [
            'base_amount' => 1000,
            'bonus_percentage' => 10
        ];

        $result1 = $action->execute($data);
        $result2 = $action->execute($data);

        $this->assertEquals($result1, $result2);
        $this->assertTrue(Cache::has("incentive.calculation." . md5(json_encode($data))));
    }

    public function test_can_invalidate_cache()
    {
        $service = new IncentiveService();
        $incentive = $service->create([
            'name' => 'Test Incentive'
        ]);

        Cache::put("incentive.{$incentive->id}", $incentive->toArray());

        $service->update($incentive->id, [
            'base_amount' => 2000
        ]);

        $this->assertFalse(Cache::has("incentive.{$incentive->id}"));
    }

    public function test_can_handle_cache_miss()
    {
        $service = new IncentiveService();
        $incentive = $service->find(999);

        $this->assertNull($incentive);
        $this->assertFalse(Cache::has('incentive.999'));
    }
}
```

## 5. End-to-End Testing

### 5.1 Laravel Dusk
```php
// Test End-to-End con Laravel Dusk

class IncentiveDuskTest extends DuskTestCase
{
    public function test_can_create_incentive_through_ui()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/incentives/create')
                   ->type('name', 'Test Incentive')
                   ->type('base_amount', '1000')
                   ->type('bonus_percentage', '10')
                   ->press('Create')
                   ->assertPathIs('/incentives')
                   ->assertSee('Test Incentive');
        });
    }

    public function test_can_calculate_incentive_through_ui()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/incentives/calculate')
                   ->type('base_amount', '1000')
                   ->type('bonus_percentage', '10')
                   ->press('Calculate')
                   ->assertSee('Total: 1100')
                   ->assertSee('Breakdown');
        });
    }

    public function test_can_handle_validation_errors()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/incentives/create')
                   ->press('Create')
                   ->assertSee('The name field is required')
                   ->assertSee('The base amount field is required');
        });
    }
}
```

### 5.2 Cypress
```javascript
// Test End-to-End con Cypress

describe('Incentive Module', () => {
    it('can create incentive through UI', () => {
        cy.visit('/incentives/create')
        cy.get('input[name="name"]').type('Test Incentive')
        cy.get('input[name="base_amount"]').type('1000')
        cy.get('input[name="bonus_percentage"]').type('10')
        cy.get('button[type="submit"]').click()
        cy.url().should('include', '/incentives')
        cy.contains('Test Incentive').should('be.visible')
    })

    it('can calculate incentive through UI', () => {
        cy.visit('/incentives/calculate')
        cy.get('input[name="base_amount"]').type('1000')
        cy.get('input[name="bonus_percentage"]').type('10')
        cy.get('button[type="submit"]').click()
        cy.contains('Total: 1100').should('be.visible')
        cy.contains('Breakdown').should('be.visible')
    })

    it('can handle validation errors', () => {
        cy.visit('/incentives/create')
        cy.get('button[type="submit"]').click()
        cy.contains('The name field is required').should('be.visible')
        cy.contains('The base amount field is required').should('be.visible')
    })
})
```

### 5.3 Selenium
```php
// Test End-to-End con Selenium

class IncentiveSeleniumTest extends TestCase
{
    public function test_can_create_incentive_through_ui()
    {
        $driver = RemoteWebDriver::create();
        $driver->get('http://localhost/incentives/create');

        $driver->findElement(WebDriverBy::name('name'))->sendKeys('Test Incentive');
        $driver->findElement(WebDriverBy::name('base_amount'))->sendKeys('1000');
        $driver->findElement(WebDriverBy::name('bonus_percentage'))->sendKeys('10');
        $driver->findElement(WebDriverBy::cssSelector('button[type="submit"]'))->click();

        $this->assertStringContainsString('/incentives', $driver->getCurrentURL());
        $this->assertStringContainsString('Test Incentive', $driver->getPageSource());

        $driver->quit();
    }

    public function test_can_calculate_incentive_through_ui()
    {
        $driver = RemoteWebDriver::create();
        $driver->get('http://localhost/incentives/calculate');

        $driver->findElement(WebDriverBy::name('base_amount'))->sendKeys('1000');
        $driver->findElement(WebDriverBy::name('bonus_percentage'))->sendKeys('10');
        $driver->findElement(WebDriverBy::cssSelector('button[type="submit"]'))->click();

        $this->assertStringContainsString('Total: 1100', $driver->getPageSource());
        $this->assertStringContainsString('Breakdown', $driver->getPageSource());

        $driver->quit();
    }
}
```

## 6. Performance Testing

### 6.1 Load Testing
```php
// Test di Performance con Load Testing

class IncentiveLoadTest extends TestCase
{
    public function test_can_handle_concurrent_requests()
    {
        $requests = 100;
        $responses = [];

        for ($i = 0; $i < $requests; $i++) {
            $responses[] = $this->get('/api/incentives');
        }

        $successful = collect($responses)->filter(function ($response) {
            return $response->getStatusCode() === 200;
        })->count();

        $this->assertEquals($requests, $successful);
        $this->assertLessThan(1000, collect($responses)->avg(function ($response) {
            return $response->getDuration();
        }));
    }

    public function test_can_handle_heavy_calculations()
    {
        $start = microtime(true);
        
        $this->post('/api/incentives/calculate', [
            'base_amount' => 1000000,
            'bonus_percentage' => 50,
            'discount_percentage' => 30
        ]);

        $duration = microtime(true) - $start;
        
        $this->assertLessThan(1, $duration);
    }
}
```

### 6.2 Stress Testing
```php
// Test di Performance con Stress Testing

class IncentiveStressTest extends TestCase
{
    public function test_can_handle_sustained_load()
    {
        $duration = 300; // 5 minutes
        $requests_per_second = 10;
        $total_requests = $duration * $requests_per_second;
        $responses = [];

        $start = microtime(true);
        
        while (microtime(true) - $start < $duration) {
            $responses[] = $this->get('/api/incentives');
            usleep(1000000 / $requests_per_second);
        }

        $successful = collect($responses)->filter(function ($response) {
            return $response->getStatusCode() === 200;
        })->count();

        $this->assertGreaterThan($total_requests * 0.95, $successful);
        $this->assertLessThan(1000, collect($responses)->avg(function ($response) {
            return $response->getDuration();
        }));
    }
}
```

### 6.3 Benchmark Testing
```php
// Test di Performance con Benchmark Testing

class IncentiveBenchmarkTest extends TestCase
{
    public function test_can_benchmark_database_operations()
    {
        $iterations = 1000;
        $times = [];

        for ($i = 0; $i < $iterations; $i++) {
            $start = microtime(true);
            
            Incentive::create([
                'name' => "Test Incentive {$i}",
                'base_amount' => 1000
            ]);

            $times[] = microtime(true) - $start;
        }

        $average = collect($times)->avg();
        $this->assertLessThan(0.1, $average);
    }

    public function test_can_benchmark_cache_operations()
    {
        $iterations = 1000;
        $times = [];

        for ($i = 0; $i < $iterations; $i++) {
            $start = microtime(true);
            
            Cache::put("test.{$i}", "value {$i}");

            $times[] = microtime(true) - $start;
        }

        $average = collect($times)->avg();
        $this->assertLessThan(0.01, $average);
    }
}
```

## 7. Security Testing

### 7.1 Authentication Testing
```php
// Test di Sicurezza per Autenticazione

class AuthenticationSecurityTest extends TestCase
{
    public function test_can_prevent_brute_force_attacks()
    {
        for ($i = 0; $i < 6; $i++) {
            $response = $this->post('/login', [
                'email' => 'test@example.com',
                'password' => 'wrong_password'
            ]);
        }

        $response->assertStatus(429);
    }

    public function test_can_enforce_password_policy()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'weak'
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['password']);
    }

    public function test_can_protect_against_session_hijacking()
    {
        $response = $this->get('/api/incentives');
        $token = $response->headers->get('X-CSRF-TOKEN');

        $response = $this->withHeaders([
            'X-CSRF-TOKEN' => 'invalid_token'
        ])->get('/api/incentives');

        $response->assertStatus(419);
    }
}
```

### 7.2 Authorization Testing
```php
// Test di Sicurezza per Autorizzazione

class AuthorizationSecurityTest extends TestCase
{
    public function test_can_enforce_role_based_access()
    {
        $user = User::factory()->create(['role' => 'user']);
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($user)
             ->get('/api/incentives/admin')
             ->assertStatus(403);

        $this->actingAs($admin)
             ->get('/api/incentives/admin')
             ->assertStatus(200);
    }

    public function test_can_enforce_permission_based_access()
    {
        $user = User::factory()->create();
        $user->givePermissionTo('view_incentives');

        $this->actingAs($user)
             ->get('/api/incentives')
             ->assertStatus(200);

        $this->actingAs($user)
             ->post('/api/incentives')
             ->assertStatus(403);
    }

    public function test_can_protect_against_csrf()
    {
        $this->post('/api/incentives', [
            'name' => 'Test Incentive'
        ])->assertStatus(419);

        $this->withHeaders([
            'X-CSRF-TOKEN' => csrf_token()
        ])->post('/api/incentives', [
            'name' => 'Test Incentive'
        ])->assertStatus(201);
    }
}
```

### 7.3 Data Protection Testing
```php
// Test di Sicurezza per Protezione Dati

class DataProtectionSecurityTest extends TestCase
{
    public function test_can_encrypt_sensitive_data()
    {
        $incentive = Incentive::create([
            'name' => 'Test Incentive',
            'sensitive_data' => 'secret'
        ]);

        $this->assertDatabaseMissing('incentives', [
            'id' => $incentive->id,
            'sensitive_data' => 'secret'
        ]);

        $this->assertEquals('secret', $incentive->sensitive_data);
    }

    public function test_can_sanitize_user_input()
    {
        $response = $this->post('/api/incentives', [
            'name' => '<script>alert("xss")</script>',
            'description' => '<img src="x" onerror="alert(1)">'
        ]);

        $incentive = Incentive::latest()->first();

        $this->assertEquals('&lt;script&gt;alert("xss")&lt;/script&gt;', $incentive->name);
        $this->assertEquals('&lt;img src="x" onerror="alert(1)"&gt;', $incentive->description);
    }

    public function test_can_prevent_sql_injection()
    {
        $response = $this->get('/api/incentives?search=1\' OR \'1\'=\'1');

        $this->assertDatabaseCount('incentives', 0);
        $this->assertEmpty($response->json('data'));
    }
}
```

## 8. Validation Testing

### 8.1 Input Validation
```php
// Test di Validazione Input

class InputValidationTest extends TestCase
{
    public function test_can_validate_incentive_input()
    {
        $response = $this->post('/api/incentives', [
            'name' => '',
            'base_amount' => 'invalid',
            'bonus_percentage' => 101
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors([
                    'name',
                    'base_amount',
                    'bonus_percentage'
                ]);
    }

    public function test_can_validate_calculation_input()
    {
        $response = $this->post('/api/incentives/calculate', [
            'base_amount' => -1000,
            'bonus_percentage' => -10
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors([
                    'base_amount',
                    'bonus_percentage'
                ]);
    }

    public function test_can_validate_file_upload()
    {
        $response = $this->post('/api/incentives/upload', [
            'file' => UploadedFile::fake()->create('document.txt', 100)
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['file']);
    }
}
```

### 8.2 Output Validation
```php
// Test di Validazione Output

class OutputValidationTest extends TestCase
{
    public function test_can_validate_api_response()
    {
        $response = $this->get('/api/incentives');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        '*' => [
                            'id',
                            'name',
                            'base_amount',
                            'bonus_percentage',
                            'created_at',
                            'updated_at'
                        ]
                    ]
                ]);
    }

    public function test_can_validate_calculation_response()
    {
        $response = $this->post('/api/incentives/calculate', [
            'base_amount' => 1000,
            'bonus_percentage' => 10
        ]);

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'total',
                    'breakdown' => [
                        'base',
                        'bonus',
                        'discount'
                    ]
                ]);
    }

    public function test_can_validate_error_response()
    {
        $response = $this->get('/api/incentives/999');

        $response->assertStatus(404)
                ->assertJsonStructure([
                    'message',
                    'code'
                ]);
    }
}
```

### 8.3 Data Integrity
```php
// Test di Integrità Dati

class DataIntegrityTest extends TestCase
{
    public function test_can_maintain_data_integrity()
    {
        $incentive = Incentive::create([
            'name' => 'Test Incentive',
            'base_amount' => 1000
        ]);

        $this->assertDatabaseHas('incentives', [
            'id' => $incentive->id,
            'name' => 'Test Incentive',
            'base_amount' => 1000
        ]);

        $incentive->update([
            'base_amount' => 2000
        ]);

        $this->assertDatabaseHas('incentives', [
            'id' => $incentive->id,
            'base_amount' => 2000
        ]);
    }

    public function test_can_handle_concurrent_updates()
    {
        $incentive = Incentive::create([
            'name' => 'Test Incentive',
            'base_amount' => 1000
        ]);

        $threads = [];
        for ($i = 0; $i < 10; $i++) {
            $threads[] = new Thread(function () use ($incentive) {
                $incentive->increment('base_amount', 100);
            });
        }

        foreach ($threads as $thread) {
            $thread->start();
        }

        foreach ($threads as $thread) {
            $thread->join();
        }

        $this->assertEquals(2000, $incentive->fresh()->base_amount);
    }
}
```

## 9. Database Testing

### 9.1 Migration Testing
```php
// Test per le Migrazioni Database

class DatabaseMigrationTest extends TestCase
{
    public function test_can_run_migrations()
    {
        $this->artisan('migrate:fresh');
        
        $this->assertDatabaseHas('migrations', [
            'migration' => '2024_01_01_000000_create_incentives_table'
        ]);
    }

    public function test_can_rollback_migrations()
    {
        $this->artisan('migrate');
        $this->artisan('migrate:rollback');
        
        $this->assertDatabaseMissing('migrations', [
            'migration' => '2024_01_01_000000_create_incentives_table'
        ]);
    }

    public function test_can_refresh_migrations()
    {
        $this->artisan('migrate');
        $this->artisan('migrate:refresh');
        
        $this->assertDatabaseHas('migrations', [
            'migration' => '2024_01_01_000000_create_incentives_table'
        ]);
    }
}
```

### 9.2 Seeder Testing
```php
// Test per i Seeder Database

class DatabaseSeederTest extends TestCase
{
    public function test_can_run_seeders()
    {
        $this->artisan('db:seed');
        
        $this->assertDatabaseCount('incentives', 10);
        $this->assertDatabaseCount('users', 5);
    }

    public function test_can_run_specific_seeder()
    {
        $this->artisan('db:seed --class=IncentiveSeeder');
        
        $this->assertDatabaseCount('incentives', 10);
    }

    public function test_can_refresh_and_seed()
    {
        $this->artisan('migrate:fresh --seed');
        
        $this->assertDatabaseCount('incentives', 10);
        $this->assertDatabaseCount('users', 5);
    }
}
```

### 9.3 Query Testing
```php
// Test per le Query Database

class DatabaseQueryTest extends TestCase
{
    public function test_can_execute_complex_queries()
    {
        $incentives = Incentive::with(['user', 'category'])
                              ->where('status', 'active')
                              ->orderBy('created_at', 'desc')
                              ->get();

        $this->assertInstanceOf(Collection::class, $incentives);
        $this->assertTrue($incentives->every(function ($incentive) {
            return $incentive->status === 'active';
        }));
    }

    public function test_can_handle_transactions()
    {
        DB::beginTransaction();
        try {
            Incentive::create([
                'name' => 'Test Incentive',
                'base_amount' => 1000
            ]);
            throw new Exception('Test error');
        } catch (Exception $e) {
            DB::rollBack();
        }

        $this->assertDatabaseMissing('incentives', [
            'name' => 'Test Incentive'
        ]);
    }

    public function test_can_optimize_queries()
    {
        DB::enableQueryLog();
        
        Incentive::with(['user', 'category'])->get();
        
        $queries = DB::getQueryLog();
        
        $this->assertLessThan(5, count($queries));
    }
}
```

## 10. Cache Testing

### 10.1 Cache Hit/Miss
```php
// Test per Cache Hit/Miss

class CacheHitMissTest extends TestCase
{
    public function test_can_cache_incentive_data()
    {
        $incentive = Incentive::create([
            'name' => 'Test Incentive'
        ]);

        Cache::put("incentive.{$incentive->id}", $incentive->toArray());

        $this->assertTrue(Cache::has("incentive.{$incentive->id}"));
        $this->assertEquals($incentive->toArray(), Cache::get("incentive.{$incentive->id}"));
    }

    public function test_can_handle_cache_miss()
    {
        $this->assertNull(Cache::get('incentive.999'));
        $this->assertFalse(Cache::has('incentive.999'));
    }

    public function test_can_remember_cache()
    {
        $incentive = Cache::remember('incentive.1', 60, function () {
            return Incentive::find(1);
        });

        $this->assertTrue(Cache::has('incentive.1'));
        $this->assertEquals($incentive, Cache::get('incentive.1'));
    }
}
```

### 10.2 Cache Invalidation
```php
// Test per Cache Invalidation

class CacheInvalidationTest extends TestCase
{
    public function test_can_invalidate_cache_on_update()
    {
        $incentive = Incentive::create([
            'name' => 'Test Incentive'
        ]);

        Cache::put("incentive.{$incentive->id}", $incentive->toArray());

        $incentive->update([
            'name' => 'Updated Incentive'
        ]);

        $this->assertFalse(Cache::has("incentive.{$incentive->id}"));
    }

    public function test_can_invalidate_cache_on_delete()
    {
        $incentive = Incentive::create([
            'name' => 'Test Incentive'
        ]);

        Cache::put("incentive.{$incentive->id}", $incentive->toArray());

        $incentive->delete();

        $this->assertFalse(Cache::has("incentive.{$incentive->id}"));
    }

    public function test_can_invalidate_cache_by_tag()
    {
        Cache::tags(['incentives'])->put('key', 'value');

        Cache::tags(['incentives'])->flush();

        $this->assertFalse(Cache::tags(['incentives'])->has('key'));
    }
}
```

### 10.3 Cache Performance
```php
// Test per Cache Performance

class CachePerformanceTest extends TestCase
{
    public function test_can_improve_query_performance()
    {
        $start = microtime(true);
        
        for ($i = 0; $i < 100; $i++) {
            Incentive::find(1);
        }
        
        $withoutCache = microtime(true) - $start;

        Cache::put('incentive.1', Incentive::find(1));
        
        $start = microtime(true);
        
        for ($i = 0; $i < 100; $i++) {
            Cache::get('incentive.1');
        }
        
        $withCache = microtime(true) - $start;

        $this->assertLessThan($withoutCache, $withCache);
    }

    public function test_can_handle_cache_stress()
    {
        $iterations = 1000;
        $start = microtime(true);

        for ($i = 0; $i < $iterations; $i++) {
            Cache::put("test.{$i}", "value {$i}");
            Cache::get("test.{$i}");
        }

        $duration = microtime(true) - $start;
        $this->assertLessThan(5, $duration);
    }
}
```

## 11. Queue Testing

### 11.1 Job Processing
```php
// Test per Job Processing

class JobProcessingTest extends TestCase
{
    public function test_can_dispatch_job()
    {
        ProcessIncentiveJob::dispatch([
            'incentive_id' => 1
        ]);

        $this->assertDatabaseHas('jobs', [
            'queue' => 'incentives'
        ]);
    }

    public function test_can_process_job()
    {
        $job = new ProcessIncentiveJob([
            'incentive_id' => 1
        ]);

        $job->handle();

        $this->assertDatabaseHas('processed_incentives', [
            'incentive_id' => 1
        ]);
    }

    public function test_can_handle_job_failure()
    {
        $this->expectException(Exception::class);

        $job = new ProcessIncentiveJob([
            'incentive_id' => 999
        ]);

        $job->handle();
    }
}
```

### 11.2 Batch Processing
```php
// Test per Batch Processing

class BatchProcessingTest extends TestCase
{
    public function test_can_process_batch()
    {
        $batch = Bus::batch([
            new ProcessIncentiveJob(['incentive_id' => 1]),
            new ProcessIncentiveJob(['incentive_id' => 2]),
            new ProcessIncentiveJob(['incentive_id' => 3])
        ])->dispatch();

        $this->assertTrue($batch->finished());
        $this->assertEquals(3, $batch->processedJobs());
    }

    public function test_can_handle_batch_failure()
    {
        $batch = Bus::batch([
            new ProcessIncentiveJob(['incentive_id' => 1]),
            new ProcessIncentiveJob(['incentive_id' => 999]),
            new ProcessIncentiveJob(['incentive_id' => 3])
        ])->dispatch();

        $this->assertTrue($batch->failed());
        $this->assertEquals(1, $batch->failedJobs);
    }

    public function test_can_retry_failed_jobs()
    {
        $batch = Bus::batch([
            new ProcessIncentiveJob(['incentive_id' => 999])
        ])->dispatch();

        $batch->retryFailedJobs();

        $this->assertTrue($batch->finished());
        $this->assertEquals(0, $batch->failedJobs);
    }
}
```

### 11.3 Queue Performance
```php
// Test per Queue Performance

class QueuePerformanceTest extends TestCase
{
    public function test_can_handle_high_queue_load()
    {
        $jobs = 1000;
        $start = microtime(true);

        for ($i = 0; $i < $jobs; $i++) {
            ProcessIncentiveJob::dispatch([
                'incentive_id' => $i
            ]);
        }

        $duration = microtime(true) - $start;
        $this->assertLessThan(5, $duration);
    }

    public function test_can_handle_concurrent_jobs()
    {
        $jobs = 100;
        $processed = 0;

        for ($i = 0; $i < $jobs; $i++) {
            ProcessIncentiveJob::dispatch([
                'incentive_id' => $i
            ])->then(function () use (&$processed) {
                $processed++;
            });
        }

        sleep(5);

        $this->assertEquals($jobs, $processed);
    }

    public function test_can_handle_job_timeout()
    {
        $this->expectException(TimeoutException::class);

        $job = new LongRunningJob();
        $job->timeout(1);
        $job->handle();
    }
}
```

## 12. Event Testing

### 12.1 Event Dispatching
```php
// Test per Event Dispatching

class EventDispatchingTest extends TestCase
{
    public function test_can_dispatch_event()
    {
        Event::fake();

        $incentive = Incentive::create([
            'name' => 'Test Incentive'
        ]);

        Event::assertDispatched(IncentiveCreated::class);
        Event::assertDispatched(IncentiveCreated::class, function ($event) use ($incentive) {
            return $event->incentive->id === $incentive->id;
        });
    }

    public function test_can_dispatch_multiple_events()
    {
        Event::fake();

        $incentive = Incentive::create([
            'name' => 'Test Incentive'
        ]);

        $incentive->update([
            'name' => 'Updated Incentive'
        ]);

        Event::assertDispatchedTimes(IncentiveCreated::class, 1);
        Event::assertDispatchedTimes(IncentiveUpdated::class, 1);
    }

    public function test_can_dispatch_event_with_data()
    {
        Event::fake();

        $incentive = Incentive::create([
            'name' => 'Test Incentive',
            'base_amount' => 1000
        ]);

        Event::assertDispatched(IncentiveCreated::class, function ($event) {
            return $event->incentive->base_amount === 1000;
        });
    }
}
```

### 12.2 Event Handling
```php
// Test per Event Handling

class EventHandlingTest extends TestCase
{
    public function test_can_handle_event()
    {
        $incentive = Incentive::create([
            'name' => 'Test Incentive'
        ]);

        event(new IncentiveCreated($incentive));

        $this->assertDatabaseHas('activity_logs', [
            'event' => 'incentive.created',
            'incentive_id' => $incentive->id
        ]);
    }

    public function test_can_handle_multiple_events()
    {
        $incentive = Incentive::create([
            'name' => 'Test Incentive'
        ]);

        event(new IncentiveCreated($incentive));
        event(new IncentiveUpdated($incentive));

        $this->assertDatabaseCount('activity_logs', 2);
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'incentive.created'
        ]);
        $this->assertDatabaseHas('activity_logs', [
            'event' => 'incentive.updated'
        ]);
    }

    public function test_can_handle_event_exception()
    {
        $this->expectException(Exception::class);

        $incentive = Incentive::create([
            'name' => 'Test Incentive'
        ]);

        event(new InvalidEvent($incentive));
    }
}
```

### 12.3 Event Performance
```php
// Test per Event Performance

class EventPerformanceTest extends TestCase
{
    public function test_can_handle_high_event_load()
    {
        $events = 1000;
        $start = microtime(true);

        for ($i = 0; $i < $events; $i++) {
            event(new IncentiveCreated(new Incentive([
                'name' => "Test Incentive {$i}"
            ])));
        }

        $duration = microtime(true) - $start;
        $this->assertLessThan(5, $duration);
    }

    public function test_can_handle_concurrent_events()
    {
        $events = 100;
        $processed = 0;

        for ($i = 0; $i < $events; $i++) {
            event(new IncentiveCreated(new Incentive([
                'name' => "Test Incentive {$i}"
            ])))->then(function () use (&$processed) {
                $processed++;
            });
        }

        sleep(5);

        $this->assertEquals($events, $processed);
    }

    public function test_can_handle_event_timeout()
    {
        $this->expectException(TimeoutException::class);

        event(new LongRunningEvent());
    }
}
```

## 13. Checklist Testing

### 13.1 Unit Testing
- [ ] Test model
- [ ] Test service
- [ ] Test action
- [ ] Test helper
- [ ] Test trait
- [ ] Test interface
- [ ] Test abstract class
- [ ] Test enum

### 13.2 Feature Testing
- [ ] Test controller
- [ ] Test API
- [ ] Test route
- [ ] Test middleware
- [ ] Test form
- [ ] Test validation
- [ ] Test authorization
- [ ] Test authentication

### 13.3 Integration Testing
- [ ] Test service integration
- [ ] Test external service integration
- [ ] Test cache integration
- [ ] Test queue integration
- [ ] Test event integration
- [ ] Test database integration
- [ ] Test file system integration
- [ ] Test network integration

### 13.4 End-to-End Testing
- [ ] Test user flow
- [ ] Test business process
- [ ] Test data flow
- [ ] Test UI interaction
- [ ] Test form submission
- [ ] Test file upload
- [ ] Test API integration
- [ ] Test third-party integration

### 13.5 Performance Testing
- [ ] Test load
- [ ] Test stress
- [ ] Test benchmark
- [ ] Test memory usage
- [ ] Test CPU usage
- [ ] Test response time
- [ ] Test throughput
- [ ] Test scalability

### 13.6 Security Testing
- [ ] Test authentication
- [ ] Test authorization
- [ ] Test data protection
- [ ] Test input validation
- [ ] Test output validation
- [ ] Test CSRF protection
- [ ] Test XSS prevention
- [ ] Test SQL injection prevention

### 13.7 Validation Testing
- [ ] Test input validation
- [ ] Test output validation
- [ ] Test data integrity
- [ ] Test business rules
- [ ] Test constraints
- [ ] Test relationships
- [ ] Test calculations
- [ ] Test transformations

### 13.8 Database Testing
- [ ] Test migration
- [ ] Test seeder
- [ ] Test query
- [ ] Test transaction
- [ ] Test relationship
- [ ] Test constraint
- [ ] Test index
- [ ] Test trigger

### 13.9 Cache Testing
- [ ] Test cache hit
- [ ] Test cache miss
- [ ] Test cache invalidation
- [ ] Test cache performance
- [ ] Test cache consistency
- [ ] Test cache tags
- [ ] Test cache drivers
- [ ] Test cache configuration

### 13.10 Queue Testing
- [ ] Test job processing
- [ ] Test batch processing
- [ ] Test queue performance
- [ ] Test queue failure
- [ ] Test queue retry
- [ ] Test queue timeout
- [ ] Test queue priority
- [ ] Test queue workers

### 13.11 Event Testing
- [ ] Test event dispatch
- [ ] Test event handling
- [ ] Test event performance
- [ ] Test event failure
- [ ] Test event retry
- [ ] Test event timeout
- [ ] Test event priority
- [ ] Test event listeners 