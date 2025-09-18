# Documentazione Testing Modulo Incentivi

## 1. Introduzione

Questa documentazione fornisce informazioni e procedure per il testing del modulo Incentivi. Il modulo è progettato per essere testato in modo completo ed efficace.

## 2. Unit Testing

### 2.1 Modelli
```php
// Test Modelli
class IncentivoTest extends TestCase
{
    public function test_can_create_incentivo()
    {
        $incentivo = Incentivo::factory()->create([
            'nome' => 'Test Incentivo',
            'descrizione' => 'Test Descrizione'
        ]);

        $this->assertDatabaseHas('incentivi', [
            'nome' => 'Test Incentivo',
            'descrizione' => 'Test Descrizione'
        ]);
    }

    public function test_can_update_incentivo()
    {
        $incentivo = Incentivo::factory()->create();
        
        $incentivo->update([
            'nome' => 'Updated Incentivo'
        ]);

        $this->assertDatabaseHas('incentivi', [
            'id' => $incentivo->id,
            'nome' => 'Updated Incentivo'
        ]);
    }

    public function test_can_delete_incentivo()
    {
        $incentivo = Incentivo::factory()->create();
        
        $incentivo->delete();

        $this->assertDatabaseMissing('incentivi', [
            'id' => $incentivo->id
        ]);
    }
}
```

### 2.2 Servizi
```php
// Test Servizi
class IncentivoServiceTest extends TestCase
{
    public function test_can_calculate_bonus()
    {
        $service = new IncentivoService();
        
        $result = $service->calculateBonus(1000, 0.1);

        $this->assertEquals(100, $result);
    }

    public function test_can_validate_rules()
    {
        $service = new IncentivoService();
        
        $result = $service->validateRules([
            'min_amount' => 1000,
            'max_amount' => 5000
        ]);

        $this->assertTrue($result);
    }

    public function test_can_process_payment()
    {
        $service = new IncentivoService();
        
        $result = $service->processPayment(1000);

        $this->assertTrue($result->success);
    }
}
```

### 2.3 Helper
```php
// Test Helper
class IncentivoHelperTest extends TestCase
{
    public function test_can_format_amount()
    {
        $result = formatAmount(1000.50);

        $this->assertEquals('1.000,50 €', $result);
    }

    public function test_can_calculate_percentage()
    {
        $result = calculatePercentage(50, 100);

        $this->assertEquals(50, $result);
    }

    public function test_can_generate_code()
    {
        $result = generateIncentivoCode();

        $this->assertMatchesRegularExpression('/^INC-\d{6}$/', $result);
    }
}
```

## 3. Feature Testing

### 3.1 Controller
```php
// Test Controller
class IncentivoControllerTest extends TestCase
{
    public function test_can_list_incentivi()
    {
        $response = $this->get('/api/incentivi');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        '*' => [
                            'id',
                            'nome',
                            'descrizione'
                        ]
                    ]
                ]);
    }

    public function test_can_create_incentivo()
    {
        $data = [
            'nome' => 'Test Incentivo',
            'descrizione' => 'Test Descrizione'
        ];

        $response = $this->post('/api/incentivi', $data);

        $response->assertStatus(201)
                ->assertJson([
                    'data' => $data
                ]);
    }

    public function test_can_update_incentivo()
    {
        $incentivo = Incentivo::factory()->create();
        
        $data = [
            'nome' => 'Updated Incentivo'
        ];

        $response = $this->put("/api/incentivi/{$incentivo->id}", $data);

        $response->assertStatus(200)
                ->assertJson([
                    'data' => $data
                ]);
    }
}
```

### 3.2 Middleware
```php
// Test Middleware
class IncentivoMiddlewareTest extends TestCase
{
    public function test_can_check_permission()
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)
                        ->get('/api/incentivi');

        $response->assertStatus(200);
    }

    public function test_cannot_access_without_permission()
    {
        $user = User::factory()->create([
            'role' => 'user'
        ]);

        $response = $this->actingAs($user)
                        ->get('/api/incentivi');

        $response->assertStatus(403);
    }

    public function test_can_validate_token()
    {
        $token = Sanctum::actingAs(User::factory()->create())
                        ->createToken('test')
                        ->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$token}"
        ])->get('/api/incentivi');

        $response->assertStatus(200);
    }
}
```

### 3.3 Request
```php
// Test Request
class IncentivoRequestTest extends TestCase
{
    public function test_validates_required_fields()
    {
        $response = $this->post('/api/incentivi', []);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['nome', 'descrizione']);
    }

    public function test_validates_numeric_fields()
    {
        $response = $this->post('/api/incentivi', [
            'nome' => 'Test',
            'descrizione' => 'Test',
            'importo' => 'not-a-number'
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['importo']);
    }

    public function test_validates_date_fields()
    {
        $response = $this->post('/api/incentivi', [
            'nome' => 'Test',
            'descrizione' => 'Test',
            'data_scadenza' => 'invalid-date'
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['data_scadenza']);
    }
}
```

## 4. Integration Testing

### 4.1 API
```php
// Test API
class IncentivoApiTest extends TestCase
{
    public function test_can_access_api_endpoints()
    {
        $response = $this->get('/api/incentivi');

        $response->assertStatus(200)
                ->assertHeader('Content-Type', 'application/json');
    }

    public function test_can_create_incentivo_via_api()
    {
        $data = [
            'nome' => 'Test Incentivo',
            'descrizione' => 'Test Descrizione'
        ];

        $response = $this->postJson('/api/incentivi', $data);

        $response->assertStatus(201)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'nome',
                        'descrizione'
                    ]
                ]);
    }

    public function test_can_update_incentivo_via_api()
    {
        $incentivo = Incentivo::factory()->create();
        
        $data = [
            'nome' => 'Updated Incentivo'
        ];

        $response = $this->putJson("/api/incentivi/{$incentivo->id}", $data);

        $response->assertStatus(200)
                ->assertJson([
                    'data' => $data
                ]);
    }
}
```

### 4.2 Database
```php
// Test Database
class IncentivoDatabaseTest extends TestCase
{
    public function test_can_store_incentivo()
    {
        $incentivo = Incentivo::factory()->create();

        $this->assertDatabaseHas('incentivi', [
            'id' => $incentivo->id,
            'nome' => $incentivo->nome
        ]);
    }

    public function test_can_update_incentivo()
    {
        $incentivo = Incentivo::factory()->create();
        
        $incentivo->update([
            'nome' => 'Updated Incentivo'
        ]);

        $this->assertDatabaseHas('incentivi', [
            'id' => $incentivo->id,
            'nome' => 'Updated Incentivo'
        ]);
    }

    public function test_can_delete_incentivo()
    {
        $incentivo = Incentivo::factory()->create();
        
        $incentivo->delete();

        $this->assertDatabaseMissing('incentivi', [
            'id' => $incentivo->id
        ]);
    }
}
```

### 4.3 Queue
```php
// Test Queue
class IncentivoQueueTest extends TestCase
{
    public function test_can_dispatch_job()
    {
        Queue::fake();

        ProcessIncentivoJob::dispatch($incentivo);

        Queue::assertPushed(ProcessIncentivoJob::class);
    }

    public function test_can_process_job()
    {
        $incentivo = Incentivo::factory()->create();

        ProcessIncentivoJob::dispatch($incentivo);

        $this->assertDatabaseHas('incentivi', [
            'id' => $incentivo->id,
            'processed' => true
        ]);
    }

    public function test_can_handle_failed_job()
    {
        $incentivo = Incentivo::factory()->create();

        ProcessIncentivoJob::dispatch($incentivo);

        $this->assertDatabaseHas('failed_jobs', [
            'payload' => json_encode([
                'data' => [
                    'commandName' => ProcessIncentivoJob::class
                ]
            ])
        ]);
    }
}
```

## 5. End-to-End Testing

### 5.1 Browser
```php
// Test Browser
class IncentivoBrowserTest extends TestCase
{
    public function test_can_view_incentivi_list()
    {
        $this->browse(function ($browser) {
            $browser->visit('/incentivi')
                   ->assertSee('Lista Incentivi')
                   ->assertPresent('.incentivo-item');
        });
    }

    public function test_can_create_incentivo()
    {
        $this->browse(function ($browser) {
            $browser->visit('/incentivi/create')
                   ->type('nome', 'Test Incentivo')
                   ->type('descrizione', 'Test Descrizione')
                   ->press('Salva')
                   ->assertSee('Incentivo creato con successo');
        });
    }

    public function test_can_update_incentivo()
    {
        $incentivo = Incentivo::factory()->create();

        $this->browse(function ($browser) use ($incentivo) {
            $browser->visit("/incentivi/{$incentivo->id}/edit")
                   ->type('nome', 'Updated Incentivo')
                   ->press('Aggiorna')
                   ->assertSee('Incentivo aggiornato con successo');
        });
    }
}
```

### 5.2 API
```php
// Test API Workflow
class IncentivoApiWorkflowTest extends TestCase
{
    public function test_complete_incentivo_workflow()
    {
        // Create
        $response = $this->postJson('/api/incentivi', [
            'nome' => 'Test Incentivo',
            'descrizione' => 'Test Descrizione'
        ]);

        $response->assertStatus(201);
        $incentivoId = $response->json('data.id');

        // Read
        $response = $this->getJson("/api/incentivi/{$incentivoId}");
        $response->assertStatus(200);

        // Update
        $response = $this->putJson("/api/incentivi/{$incentivoId}", [
            'nome' => 'Updated Incentivo'
        ]);
        $response->assertStatus(200);

        // Delete
        $response = $this->deleteJson("/api/incentivi/{$incentivoId}");
        $response->assertStatus(204);
    }
}
```

## 6. Performance Testing

### 6.1 Load
```php
// Test Carico
class IncentivoLoadTest extends TestCase
{
    public function test_can_handle_multiple_requests()
    {
        $response = $this->get('/api/incentivi');

        $response->assertStatus(200)
                ->assertHeader('X-Response-Time');
    }

    public function test_can_handle_concurrent_users()
    {
        $users = User::factory()->count(10)->create();

        $responses = collect($users)->map(function ($user) {
            return $this->actingAs($user)
                       ->get('/api/incentivi');
        });

        $responses->each(function ($response) {
            $response->assertStatus(200);
        });
    }
}
```

### 6.2 Stress
```php
// Test Stress
class IncentivoStressTest extends TestCase
{
    public function test_can_handle_high_load()
    {
        $incentivi = Incentivo::factory()->count(1000)->create();

        $response = $this->get('/api/incentivi');

        $response->assertStatus(200)
                ->assertJsonCount(1000, 'data');
    }

    public function test_can_handle_rapid_requests()
    {
        for ($i = 0; $i < 100; $i++) {
            $response = $this->get('/api/incentivi');
            $response->assertStatus(200);
        }
    }
}
```

### 6.3 Scalabilità
```php
// Test Scalabilità
class IncentivoScalabilityTest extends TestCase
{
    public function test_can_scale_with_data_growth()
    {
        $sizes = [100, 1000, 10000];

        foreach ($sizes as $size) {
            Incentivo::factory()->count($size)->create();

            $start = microtime(true);
            $response = $this->get('/api/incentivi');
            $end = microtime(true);

            $response->assertStatus(200);
            $this->assertLessThan(1, $end - $start);
        }
    }
}
```

## 7. Security Testing

### 7.1 Penetration
```php
// Test Penetrazione
class IncentivoPenetrationTest extends TestCase
{
    public function test_cannot_access_without_auth()
    {
        $response = $this->get('/api/incentivi');

        $response->assertStatus(401);
    }

    public function test_cannot_access_other_user_data()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $incentivo = Incentivo::factory()->create([
            'user_id' => $user2->id
        ]);

        $response = $this->actingAs($user1)
                        ->get("/api/incentivi/{$incentivo->id}");

        $response->assertStatus(403);
    }

    public function test_cannot_inject_sql()
    {
        $response = $this->get('/api/incentivi?search=1\' OR \'1\'=\'1');

        $response->assertStatus(200)
                ->assertJsonCount(0, 'data');
    }
}
```

### 7.2 Vulnerabilità
```php
// Test Vulnerabilità
class IncentivoVulnerabilityTest extends TestCase
{
    public function test_cannot_upload_malicious_file()
    {
        $response = $this->post('/api/incentivi/upload', [
            'file' => UploadedFile::fake()->create('script.php', 100)
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['file']);
    }

    public function test_cannot_execute_xss()
    {
        $response = $this->post('/api/incentivi', [
            'nome' => '<script>alert("xss")</script>'
        ]);

        $response->assertStatus(201)
                ->assertJson([
                    'data' => [
                        'nome' => '&lt;script&gt;alert("xss")&lt;/script&gt;'
                    ]
                ]);
    }
}
```

### 7.3 Sicurezza
```php
// Test Sicurezza
class IncentivoSecurityTest extends TestCase
{
    public function test_can_validate_csrf_token()
    {
        $response = $this->post('/incentivi', [
            'nome' => 'Test'
        ]);

        $response->assertStatus(419);
    }

    public function test_can_validate_rate_limit()
    {
        for ($i = 0; $i < 61; $i++) {
            $response = $this->get('/api/incentivi');
        }

        $response->assertStatus(429);
    }

    public function test_can_validate_input()
    {
        $response = $this->post('/api/incentivi', [
            'importo' => -100
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['importo']);
    }
}
```

## 8. Validation Testing

### 8.1 Input
```php
// Test Validazione Input
class IncentivoInputValidationTest extends TestCase
{
    public function test_validates_required_fields()
    {
        $response = $this->post('/api/incentivi', []);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['nome', 'descrizione']);
    }

    public function test_validates_field_types()
    {
        $response = $this->post('/api/incentivi', [
            'nome' => 123,
            'importo' => 'not-a-number'
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['nome', 'importo']);
    }

    public function test_validates_field_rules()
    {
        $response = $this->post('/api/incentivi', [
            'nome' => 'a',
            'importo' => -100
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['nome', 'importo']);
    }
}
```

### 8.2 Output
```php
// Test Validazione Output
class IncentivoOutputValidationTest extends TestCase
{
    public function test_validates_response_structure()
    {
        $response = $this->get('/api/incentivi');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        '*' => [
                            'id',
                            'nome',
                            'descrizione'
                        ]
                    ]
                ]);
    }

    public function test_validates_data_types()
    {
        $response = $this->get('/api/incentivi');

        $response->assertStatus(200)
                ->assertJson([
                    'data' => [
                        '*' => [
                            'id' => fn ($value) => is_int($value),
                            'nome' => fn ($value) => is_string($value),
                            'importo' => fn ($value) => is_numeric($value)
                        ]
                    ]
                ]);
    }
}
```

### 8.3 Business Rules
```php
// Test Regole Business
class IncentivoBusinessRulesTest extends TestCase
{
    public function test_validates_amount_limits()
    {
        $response = $this->post('/api/incentivi', [
            'nome' => 'Test',
            'importo' => 1000000
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['importo']);
    }

    public function test_validates_date_rules()
    {
        $response = $this->post('/api/incentivi', [
            'nome' => 'Test',
            'data_scadenza' => now()->subDay()
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['data_scadenza']);
    }

    public function test_validates_user_rules()
    {
        $response = $this->post('/api/incentivi', [
            'nome' => 'Test',
            'user_id' => 999999
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['user_id']);
    }
}
```

## 9. Database Testing

### 9.1 Migrazioni
```php
// Test Migrazioni
class IncentivoMigrationTest extends TestCase
{
    public function test_can_run_migrations()
    {
        $this->artisan('migrate:fresh')
             ->assertExitCode(0);
    }

    public function test_can_rollback_migrations()
    {
        $this->artisan('migrate:rollback')
             ->assertExitCode(0);
    }

    public function test_can_refresh_migrations()
    {
        $this->artisan('migrate:refresh')
             ->assertExitCode(0);
    }
}
```

### 9.2 Seeding
```php
// Test Seeding
class IncentivoSeedingTest extends TestCase
{
    public function test_can_seed_database()
    {
        $this->artisan('db:seed')
             ->assertExitCode(0);
    }

    public function test_can_seed_specific_seeder()
    {
        $this->artisan('db:seed --class=IncentivoSeeder')
             ->assertExitCode(0);
    }

    public function test_can_refresh_and_seed()
    {
        $this->artisan('migrate:refresh --seed')
             ->assertExitCode(0);
    }
}
```

### 9.3 Transazioni
```php
// Test Transazioni
class IncentivoTransactionTest extends TestCase
{
    public function test_can_rollback_transaction()
    {
        DB::beginTransaction();

        try {
            Incentivo::create([
                'nome' => 'Test'
            ]);

            throw new Exception('Test error');
        } catch (Exception $e) {
            DB::rollBack();
        }

        $this->assertDatabaseMissing('incentivi', [
            'nome' => 'Test'
        ]);
    }

    public function test_can_commit_transaction()
    {
        DB::beginTransaction();

        try {
            Incentivo::create([
                'nome' => 'Test'
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        $this->assertDatabaseHas('incentivi', [
            'nome' => 'Test'
        ]);
    }
}
```

## 10. Cache Testing

### 10.1 Performance
```php
// Test Performance Cache
class IncentivoCachePerformanceTest extends TestCase
{
    public function test_cache_improves_performance()
    {
        $start = microtime(true);
        $this->get('/api/incentivi');
        $end = microtime(true);
        $uncached = $end - $start;

        $start = microtime(true);
        $this->get('/api/incentivi');
        $end = microtime(true);
        $cached = $end - $start;

        $this->assertLessThan($uncached, $cached);
    }

    public function test_cache_reduces_database_queries()
    {
        DB::enableQueryLog();

        $this->get('/api/incentivi');
        $queries1 = count(DB::getQueryLog());

        $this->get('/api/incentivi');
        $queries2 = count(DB::getQueryLog());

        $this->assertLessThan($queries1, $queries2);
    }
}
```

### 10.2 Integrità
```php
// Test Integrità Cache
class IncentivoCacheIntegrityTest extends TestCase
{
    public function test_cache_contains_correct_data()
    {
        $incentivo = Incentivo::factory()->create();

        $response1 = $this->get("/api/incentivi/{$incentivo->id}");
        $data1 = $response1->json('data');

        $incentivo->update(['nome' => 'Updated']);
        Cache::tags('incentivi')->flush();

        $response2 = $this->get("/api/incentivi/{$incentivo->id}");
        $data2 = $response2->json('data');

        $this->assertNotEquals($data1, $data2);
    }

    public function test_cache_is_invalidated_on_update()
    {
        $incentivo = Incentivo::factory()->create();

        $response1 = $this->get("/api/incentivi/{$incentivo->id}");
        $data1 = $response1->json('data');

        $incentivo->update(['nome' => 'Updated']);

        $response2 = $this->get("/api/incentivi/{$incentivo->id}");
        $data2 = $response2->json('data');

        $this->assertNotEquals($data1, $data2);
    }
}
```

### 10.3 Pulizia
```php
// Test Pulizia Cache
class IncentivoCacheCleanupTest extends TestCase
{
    public function test_can_clear_cache()
    {
        Cache::put('test_key', 'test_value', 60);

        $this->artisan('cache:clear')
             ->assertExitCode(0);

        $this->assertFalse(Cache::has('test_key'));
    }

    public function test_can_clear_specific_tags()
    {
        Cache::tags(['incentivi'])->put('test_key', 'test_value', 60);

        $this->artisan('cache:tags --tags=incentivi')
             ->assertExitCode(0);

        $this->assertFalse(Cache::tags(['incentivi'])->has('test_key'));
    }
}
```

## 11. Queue Testing

### 11.1 Job
```php
// Test Job
class IncentivoJobTest extends TestCase
{
    public function test_can_dispatch_job()
    {
        Queue::fake();

        ProcessIncentivoJob::dispatch($incentivo);

        Queue::assertPushed(ProcessIncentivoJob::class);
    }

    public function test_can_process_job()
    {
        $incentivo = Incentivo::factory()->create();

        ProcessIncentivoJob::dispatch($incentivo);

        $this->assertDatabaseHas('incentivi', [
            'id' => $incentivo->id,
            'processed' => true
        ]);
    }

    public function test_can_retry_failed_job()
    {
        $incentivo = Incentivo::factory()->create();

        ProcessIncentivoJob::dispatch($incentivo)
            ->onQueue('failed')
            ->retry(3);

        $this->assertDatabaseHas('jobs', [
            'queue' => 'failed',
            'attempts' => 3
        ]);
    }
}
```

### 11.2 Eventi
```php
// Test Eventi
class IncentivoEventTest extends TestCase
{
    public function test_can_dispatch_event()
    {
        Event::fake();

        $incentivo = Incentivo::factory()->create();

        event(new IncentivoCreated($incentivo));

        Event::assertDispatched(IncentivoCreated::class);
    }

    public function test_can_listen_to_event()
    {
        $incentivo = Incentivo::factory()->create();

        event(new IncentivoCreated($incentivo));

        $this->assertDatabaseHas('audit_logs', [
            'event' => 'incentivo.created',
            'model_id' => $incentivo->id
        ]);
    }
}
```

### 11.3 Listener
```php
// Test Listener
class IncentivoListenerTest extends TestCase
{
    public function test_can_handle_event()
    {
        $incentivo = Incentivo::factory()->create();

        event(new IncentivoCreated($incentivo));

        $this->assertDatabaseHas('notifications', [
            'type' => 'IncentivoCreated',
            'notifiable_id' => $incentivo->user_id
        ]);
    }

    public function test_can_handle_failed_event()
    {
        $incentivo = Incentivo::factory()->create();

        try {
            event(new IncentivoCreated($incentivo));
        } catch (Exception $e) {
            $this->assertDatabaseMissing('notifications', [
                'type' => 'IncentivoCreated',
                'notifiable_id' => $incentivo->user_id
            ]);
        }
    }
}
```

## 12. Checklist Testing

### 12.1 Unit
- [ ] Test modelli
- [ ] Test servizi
- [ ] Test helper
- [ ] Test validazione
- [ ] Test business rules
- [ ] Test errori
- [ ] Test edge cases
- [ ] Test performance

### 12.2 Feature
- [ ] Test controller
- [ ] Test middleware
- [ ] Test request
- [ ] Test response
- [ ] Test routing
- [ ] Test autorizzazione
- [ ] Test validazione
- [ ] Test errori

### 12.3 Integration
- [ ] Test API
- [ ] Test database
- [ ] Test queue
- [ ] Test cache
- [ ] Test storage
- [ ] Test eventi
- [ ] Test notifiche
- [ ] Test performance 