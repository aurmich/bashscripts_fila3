# Sistema Calcolo Incentivi

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 100%**

## Overview
Sistema di calcolo automatico degli incentivi con gestione budget, ripartizioni e regole di business.

## Obiettivi
- [x] Calcolo automatico importi (100%)
- [x] Gestione budget (100%)
- [x] Ripartizioni (100%)
- [x] Validazione dati (100%)
- [x] Logging e monitoring (100%)

## Guida Step-by-Step

### 1. Calcolo Importi (100% completato)
```php
/**
 * Gestisce il calcolo degli importi degli incentivi
 */
class CalcoloIncentivi
{
    /**
     * @param Budget $budget
     * @param Collection<int, Dipendente> $dipendenti
     * @return array<int, array<string, float>>
     */
    public function calcolaRipartizione(
        Budget $budget,
        Collection $dipendenti
    ): array {
        return Cache::tags(['incentivi', 'calcoli'])
            ->remember(
                "calcolo_{$budget->id}",
                now()->addHours(24),
                fn() => $this->eseguiCalcolo($budget, $dipendenti)
            );
    }
    
    /**
     * @param Budget $budget
     * @param Collection<int, Dipendente> $dipendenti
     * @return array<int, array<string, float>>
     */
    private function eseguiCalcolo(
        Budget $budget,
        Collection $dipendenti
    ): array {
        $totaleQuote = $dipendenti->sum('quota_incentivo');
        $valoreQuota = $budget->importo / $totaleQuote;
        
        return $dipendenti->mapWithKeys(function ($dipendente) use ($valoreQuota) {
            return [
                $dipendente->id => [
                    'quota' => $dipendente->quota_incentivo,
                    'importo' => round(
                        $dipendente->quota_incentivo * $valoreQuota,
                        2
                    )
                ]
            ];
        })->all();
    }
}
```

#### Passi da Seguire
1. Definire regole calcolo
2. Implementare formule
3. Gestire budget
4. Implementare caching

#### Consigli
- Validare input
- Gestire arrotondamenti
- Documentare formule
- Monitorare performance

### 2. Gestione Budget (100% completato)
```php
/**
 * Gestisce i budget degli incentivi
 */
class GestioneBudget
{
    /**
     * @param string $anno
     * @param string $tipo
     * @return Collection<int, Budget>
     */
    public function getBudgetDisponibili(
        string $anno,
        string $tipo
    ): Collection {
        return Budget::where('anno', $anno)
            ->where('tipo', $tipo)
            ->where('stato', 'aperto')
            ->with(['ripartizioni', 'assegnazioni'])
            ->get();
    }
    
    /**
     * @param Budget $budget
     * @return array<string, float>
     */
    public function calcolaDisponibilita(Budget $budget): array
    {
        $totaleAssegnato = $budget->assegnazioni->sum('importo');
        $disponibile = $budget->importo - $totaleAssegnato;
        
        return [
            'totale' => $budget->importo,
            'assegnato' => $totaleAssegnato,
            'disponibile' => $disponibile,
            'percentuale' => $budget->importo > 0
                ? round(($totaleAssegnato / $budget->importo) * 100, 2)
                : 0
        ];
    }
}
```

#### Passi da Seguire
1. Validare budget
2. Gestire disponibilità
3. Implementare queries
4. Ottimizzare performance

#### Consigli
- Usare transazioni
- Implementare cache
- Documentare regole
- Validare importi

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
$importo = $quota * $valore;

// ✅ Calcolo preciso con arrotondamento
$importo = round(
    bcmul(
        (string)$quota,
        (string)$valore,
        6
    ),
    2
);
```

### 2. Gestione Budget
```php
// ❌ Verifica semplice
$valid = $totale <= $budget;

// ✅ Verifica completa
$valid = $budget > 0
    && $totale > 0
    && bccomp((string)$totale, (string)$budget, 2) <= 0;
```

## Testing

### Unit Tests
```php
class CalcoloIncentiviTest extends TestCase
{
    public function test_calcolo_ripartizione(): void
    {
        $budget = Budget::factory()->create([
            'importo' => 1000
        ]);
        
        $dipendenti = Dipendente::factory()
            ->count(2)
            ->create(['quota_incentivo' => 1]);
        
        $calculator = new CalcoloIncentivi();
        $result = $calculator->calcolaRipartizione($budget, $dipendenti);
        
        $this->assertCount(2, $result);
        $this->assertEquals(500, $result[1]['importo']);
        $this->assertEquals(500, $result[2]['importo']);
    }
}
```

### Integration Tests
```php
class GestioneBudgetTest extends TestCase
{
    public function test_calcolo_disponibilita(): void
    {
        $budget = Budget::factory()
            ->has(
                Assegnazione::factory()
                    ->count(2)
                    ->state(fn() => ['importo' => 250])
            )
            ->create(['importo' => 1000]);
        
        $manager = new GestioneBudget();
        $result = $manager->calcolaDisponibilita($budget);
        
        $this->assertEquals(1000, $result['totale']);
        $this->assertEquals(500, $result['assegnato']);
        $this->assertEquals(500, $result['disponibile']);
        $this->assertEquals(50, $result['percentuale']);
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
- Verificare disponibilità
- Implementare controlli

---
⬅️ [Torna alla Roadmap](../../roadmap.md)
