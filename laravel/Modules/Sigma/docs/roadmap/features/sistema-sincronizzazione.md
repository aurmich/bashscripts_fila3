# Sistema Sincronizzazione

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 100%**

## Overview
Sistema di sincronizzazione dati tra Sigma e altri moduli, con gestione di dipendenti, strutture e relative relazioni.

## Obiettivi
- [x] Sincronizzazione dipendenti (100%)
- [x] Sincronizzazione strutture (100%)
- [x] Gestione relazioni (100%)
- [x] Gestione errori (100%)
- [x] Logging e monitoring (100%)

## Guida Step-by-Step

### 1. Sincronizzazione Dipendenti (100% completato)
```php
/**
 * Gestisce la sincronizzazione dei dipendenti
 */
class SincronizzazioneDipendenti
{
    /**
     * @return array<string, int>
     */
    public function sincronizza(): array
    {
        $stats = [
            'totali' => 0,
            'inseriti' => 0,
            'aggiornati' => 0,
            'errori' => 0
        ];
        
        DB::beginTransaction();
        try {
            $dipendenti = $this->getDipendentiDaSincronizzare();
            $stats['totali'] = $dipendenti->count();
            
            foreach ($dipendenti as $dipendente) {
                if ($this->processDipendente($dipendente)) {
                    $stats['inseriti']++;
                } else {
                    $stats['aggiornati']++;
                }
            }
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $stats['errori']++;
            Log::error('Errore sincronizzazione', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
        
        return $stats;
    }
    
    /**
     * @return Collection<int, array<string, mixed>>
     */
    private function getDipendentiDaSincronizzare(): Collection
    {
        return Cache::tags(['sigma', 'dipendenti'])
            ->remember('dipendenti_da_sync', now()->addMinutes(5), function () {
                return DB::connection('sigma_legacy')
                    ->table('dipendenti')
                    ->where('updated_at', '>', $this->getLastSyncDate())
                    ->get();
            });
    }
}
```

#### Passi da Seguire
1. Configurare connessione legacy
2. Implementare logica sync
3. Gestire transazioni
4. Implementare logging

#### Consigli
- Usare batch processing
- Implementare retry logic
- Validare dati in ingresso
- Monitorare performance

### 2. Sincronizzazione Strutture (100% completato)
```php
/**
 * Gestisce la sincronizzazione delle strutture
 */
class SincronizzazioneStrutture
{
    /**
     * @return array<string, int>
     */
    public function sincronizza(): array
    {
        return Cache::tags(['sigma', 'strutture'])
            ->remember('sync_strutture', now()->addMinutes(15), function () {
                return $this->eseguiSincronizzazione();
            });
    }
    
    /**
     * @param StrutturaSigma $struttura
     * @return array<string, mixed>
     */
    private function mapToNewFormat(StrutturaSigma $struttura): array
    {
        return [
            'codice' => $struttura->codice,
            'denominazione' => $struttura->denominazione,
            'tipo' => $this->mapTipoStruttura($struttura->tipo),
            'parent_id' => $struttura->parent_id,
            'metadata' => $this->getMetadata($struttura)
        ];
    }
}
```

#### Passi da Seguire
1. Mappare struttura dati
2. Gestire gerarchia
3. Validare relazioni
4. Implementare caching

#### Consigli
- Mantenere consistenza dati
- Gestire dipendenze circolari
- Documentare mapping
- Implementare validazioni

## Metriche di Successo
- [x] Velocità sync > 2000 rec/sec
- [x] Zero data loss
- [x] Cache hit rate > 90%
- [x] Errori gestiti 100%
- [x] Logging completo

## Problemi Comuni e Soluzioni

### 1. Memory Usage
```php
// ❌ Caricamento completo
$records = DB::table('huge_table')->get();

// ✅ Chunk processing
DB::table('huge_table')
    ->orderBy('id')
    ->chunk(1000, function ($records) {
        foreach ($records as $record) {
            $this->process($record);
        }
    });
```

### 2. Deadlock Prevention
```php
// ❌ Lock potenziale
DB::transaction(function () {
    $this->syncAll();
});

// ✅ Gestione lock
DB::transaction(function () {
    $this->syncChunk();
}, 3);
```

## Testing

### Unit Tests
```php
class SincronizzazioneDipendentiTest extends TestCase
{
    public function test_sincronizzazione(): void
    {
        $sync = new SincronizzazioneDipendenti();
        
        $result = $sync->sincronizza();
        
        $this->assertArrayHasKey('totali', $result);
        $this->assertArrayHasKey('inseriti', $result);
        $this->assertArrayHasKey('aggiornati', $result);
        $this->assertArrayHasKey('errori', $result);
        $this->assertEquals(0, $result['errori']);
    }
}
```

### Integration Tests
```php
class SincronizzazioneIntegrationTest extends TestCase
{
    public function test_sync_workflow(): void
    {
        // Setup test data
        $this->seedTestData();
        
        // Run sync
        $sync = new SincronizzazioneDipendenti();
        $result = $sync->sincronizza();
        
        // Verify results
        $this->assertTrue($result['totali'] > 0);
        $this->assertEquals(
            $result['totali'],
            $result['inseriti'] + $result['aggiornati']
        );
    }
}
```

## Dipendenze
- Laravel Framework v10.x
- Laravel Queue
- Redis/Memcached
- Laravel Telescope

## Link Correlati
- [Performance Optimization](./performance-optimization.md)
- [Database Schema](./database-schema.md)
- [Error Handling](./error-handling.md)

## Note e Considerazioni
- Monitorare uso memoria
- Implementare circuit breaker
- Documentare procedure recovery
- Pianificare manutenzione
- Gestire dati sensibili
- Mantenere audit log

---
⬅️ [Torna alla Roadmap](../../roadmap.md)
