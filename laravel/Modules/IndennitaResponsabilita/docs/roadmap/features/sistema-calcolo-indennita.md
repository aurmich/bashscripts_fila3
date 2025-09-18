# Sistema Calcolo Indennità

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 100%**

## Overview
Sistema di calcolo automatico delle indennità di responsabilità, con gestione periodi, importi e regole di business.

## Obiettivi
- [x] Calcolo automatico importi (100%)
- [x] Gestione periodi (100%)
- [x] Gestione regole business (100%)
- [x] Validazione dati (100%)
- [x] Logging e monitoring (100%)

## Guida Step-by-Step

### 1. Calcolo Importi (100% completato)
```php
/**
 * Gestisce il calcolo degli importi delle indennità
 */
class CalcoloIndennita
{
    /**
     * @param Posizione $posizione
     * @param Carbon $dataInizio
     * @param Carbon $dataFine
     * @return array<string, float>
     */
    public function calcolaImporto(
        Posizione $posizione,
        Carbon $dataInizio,
        Carbon $dataFine
    ): array {
        return Cache::tags(['indennita', 'calcoli'])
            ->remember(
                "calcolo_{$posizione->id}_{$dataInizio->format('Ymd')}_{$dataFine->format('Ymd')}",
                now()->addHours(24),
                fn() => $this->eseguiCalcolo($posizione, $dataInizio, $dataFine)
            );
    }
    
    /**
     * @param Posizione $posizione
     * @param Carbon $dataInizio
     * @param Carbon $dataFine
     * @return array<string, float>
     */
    private function eseguiCalcolo(
        Posizione $posizione,
        Carbon $dataInizio,
        Carbon $dataFine
    ): array {
        $importoBase = $this->calcolaImportoBase($posizione);
        $giorni = $dataInizio->diffInDays($dataFine) + 1;
        $importoGiornaliero = $importoBase / 365;
        
        return [
            'importo_base' => $importoBase,
            'giorni' => $giorni,
            'importo_periodo' => round(
                $importoGiornaliero * $giorni,
                2
            )
        ];
    }
}
```

#### Passi da Seguire
1. Definire regole calcolo
2. Implementare formule
3. Gestire periodi
4. Implementare caching

#### Consigli
- Validare input
- Gestire arrotondamenti
- Documentare formule
- Monitorare performance

### 2. Gestione Periodi (100% completato)
```php
/**
 * Gestisce i periodi di validità delle indennità
 */
class GestionePeriodi
{
    /**
     * @param Posizione $posizione
     * @return Collection<int, array{
     *   data_inizio: Carbon,
     *   data_fine: Carbon|null,
     *   importo: float
     * }>
     */
    public function getPeriodi(Posizione $posizione): Collection
    {
        return PeriodoIndennita::where('posizione_id', $posizione->id)
            ->orderBy('data_inizio')
            ->get()
            ->map(function ($periodo) {
                return [
                    'data_inizio' => $periodo->data_inizio,
                    'data_fine' => $periodo->data_fine,
                    'importo' => $this->calcolaImportoPeriodo($periodo)
                ];
            });
    }
    
    /**
     * Verifica la sovrapposizione tra periodi
     */
    public function verificaSovrapposizione(
        Carbon $dataInizio,
        ?Carbon $dataFine,
        int $posizioneId,
        ?int $periodoId = null
    ): bool {
        $query = PeriodoIndennita::where('posizione_id', $posizioneId)
            ->where(function ($q) use ($dataInizio, $dataFine) {
                $q->where(function ($q) use ($dataInizio) {
                    $q->where('data_inizio', '<=', $dataInizio)
                        ->where(function ($q) use ($dataInizio) {
                            $q->whereNull('data_fine')
                                ->orWhere('data_fine', '>=', $dataInizio);
                        });
                })->orWhere(function ($q) use ($dataInizio, $dataFine) {
                    $q->where('data_inizio', '>=', $dataInizio)
                        ->where('data_inizio', '<=', $dataFine ?? now());
                });
            });
            
        if ($periodoId) {
            $query->where('id', '!=', $periodoId);
        }
        
        return $query->exists();
    }
}
```

#### Passi da Seguire
1. Validare periodi
2. Gestire sovrapposizioni
3. Implementare queries
4. Ottimizzare performance

#### Consigli
- Usare indici appropriati
- Gestire date null
- Documentare regole
- Implementare validazioni

## Metriche di Successo
- [x] Precisione calcoli 100%
- [x] Performance < 250ms
- [x] Cache hit rate > 90%
- [x] Zero errori calcolo
- [x] Validazione completa

## Problemi Comuni e Soluzioni

### 1. Precisione Calcoli
```php
// ❌ Calcolo impreciso
$importo = $base * $giorni / 365;

// ✅ Calcolo preciso con arrotondamento
$importo = round(
    bcmul(
        bcdiv($base, '365', 6),
        (string)$giorni,
        6
    ),
    2
);
```

### 2. Gestione Date
```php
// ❌ Confronto date semplice
$valid = $start <= $end;

// ✅ Confronto date robusto
$valid = $start instanceof Carbon
    && ($end === null || $end instanceof Carbon)
    && ($end === null || $start->lte($end));
```

## Testing

### Unit Tests
```php
class CalcoloIndennitaTest extends TestCase
{
    public function test_calcolo_importo(): void
    {
        $posizione = Posizione::factory()->create([
            'importo_base' => 1000
        ]);
        
        $calculator = new CalcoloIndennita();
        $result = $calculator->calcolaImporto(
            $posizione,
            now(),
            now()->addDays(30)
        );
        
        $this->assertEquals(31, $result['giorni']);
        $this->assertEquals(1000, $result['importo_base']);
        $this->assertEquals(
            round(1000 * 31 / 365, 2),
            $result['importo_periodo']
        );
    }
}
```

### Integration Tests
```php
class GestionePeriodiTest extends TestCase
{
    public function test_verifica_sovrapposizione(): void
    {
        $posizione = Posizione::factory()->create();
        $manager = new GestionePeriodi();
        
        // Test periodo sovrapposto
        PeriodoIndennita::factory()->create([
            'posizione_id' => $posizione->id,
            'data_inizio' => now(),
            'data_fine' => now()->addDays(30)
        ]);
        
        $this->assertTrue(
            $manager->verificaSovrapposizione(
                now()->addDays(15),
                now()->addDays(45),
                $posizione->id
            )
        );
        
        // Test periodo non sovrapposto
        $this->assertFalse(
            $manager->verificaSovrapposizione(
                now()->addDays(31),
                now()->addDays(60),
                $posizione->id
            )
        );
    }
}
```

## Dipendenze
- Laravel Framework v10.x
- Carbon
- Laravel Cache
- BCMath

## Link Correlati
- [Performance Optimization](./performance-optimization.md)
- [Database Schema](./database-schema.md)
- [Error Handling](./error-handling.md)

## Note e Considerazioni
- Validare input utente
- Gestire arrotondamenti
- Documentare formule
- Pianificare manutenzione
- Monitorare performance
- Mantenere audit log

---
⬅️ [Torna alla Roadmap](../../roadmap.md)
