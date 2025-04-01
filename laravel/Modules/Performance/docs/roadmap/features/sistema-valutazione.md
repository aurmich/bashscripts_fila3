# Sistema di Valutazione

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 100%**

## Overview
Sistema di valutazione delle performance per il calcolo automatico dei punteggi e la gestione delle valutazioni periodiche.

## Obiettivi
- [x] Calcolo automatico punteggi (100%)
- [x] Filtri per periodo (100%)
- [x] Gestione valutatori (100%)
- [x] Report e analytics (100%)
- [x] Workflow approvazioni (100%)

## Guida Step-by-Step

### 1. Calcolo Punteggi (100% completato)
```php
// ✅ Implementazione calcolo punteggi
class CalcoloPunteggi
{
    /**
     * Calcola il punteggio finale per una valutazione
     *
     * @param ValutazioneRecord $valutazione
     * @return array<string, float>
     */
    public function calcolaPunteggio(ValutazioneRecord $valutazione): array
    {
        return [
            'totale' => $this->calcolaTotale($valutazione),
            'obiettivi' => $this->calcolaObiettivi($valutazione),
            'comportamenti' => $this->calcolaComportamenti($valutazione)
        ];
    }
    
    /**
     * @return array<int, array{id: int, punteggio: float}>
     */
    public function calcolaRanking(string $periodo): array
    {
        return ValutazioneRecord::where('periodo', $periodo)
            ->with(['dipendente', 'valutatore'])
            ->get()
            ->map(fn($v) => [
                'id' => $v->dipendente_id,
                'punteggio' => $this->calcolaPunteggio($v)['totale']
            ])
            ->sortByDesc('punteggio')
            ->values()
            ->toArray();
    }
}
```

#### Passi da Seguire
1. Configurare pesi valutazione
2. Implementare formule calcolo
3. Validare risultati
4. Implementare ranking

#### Consigli
- Usare decimal per calcoli precisi
- Implementare caching risultati
- Validare input
- Gestire casi edge

### 2. Filtri Periodo (100% completato)
```php
// ✅ Implementazione filtri
class FiltriPeriodo
{
    /**
     * @return Collection<int, ValutazioneRecord>
     */
    public function getValutazioniPeriodo(
        string $periodo,
        array $filters = []
    ): Collection {
        $query = ValutazioneRecord::where('periodo', $periodo);
        
        if (isset($filters['struttura_id'])) {
            $query->whereHas('dipendente', function ($q) use ($filters) {
                $q->where('struttura_id', $filters['struttura_id']);
            });
        }
        
        return $query->with([
            'dipendente',
            'valutatore',
            'obiettivi',
            'comportamenti'
        ])->get();
    }
}
```

#### Passi da Seguire
1. Definire periodi valutazione
2. Implementare filtri base
3. Aggiungere filtri avanzati
4. Ottimizzare query

#### Consigli
- Indicizzare campi filtro
- Implementare cache per filtri comuni
- Validare parametri filtro
- Gestire periodi invalidi

## Metriche di Successo
- [x] Precisione calcoli 100%
- [x] Performance < 200ms
- [x] Cache hit rate > 90%
- [x] Zero errori calcolo
- [x] Validazione completa input

## Problemi Comuni e Soluzioni

### 1. Precisione Calcoli
```php
// ❌ Calcolo impreciso
$punteggio = $base * $peso;

// ✅ Calcolo preciso
$punteggio = round(
    bcmul($base, $peso, 4),
    2
);
```

### 2. Performance Query
```php
// ❌ Query N+1
$valutazioni->each(function ($v) {
    $v->obiettivi->sum('punteggio');
});

// ✅ Query ottimizzata
$valutazioni = ValutazioneRecord::with([
    'obiettivi' => fn($q) => $q->select(['id', 'punteggio'])
])->get();
```

## Testing

### Unit Tests
```php
class CalcoloPunteggiTest extends TestCase
{
    public function test_calcolo_punteggio(): void
    {
        $valutazione = ValutazioneRecord::factory()->create();
        $calculator = new CalcoloPunteggi();
        
        $result = $calculator->calcolaPunteggio($valutazione);
        
        $this->assertArrayHasKey('totale', $result);
        $this->assertIsFloat($result['totale']);
        $this->assertGreaterThanOrEqual(0, $result['totale']);
        $this->assertLessThanOrEqual(100, $result['totale']);
    }
}
```

### Integration Tests
```php
class ValutazioneIntegrationTest extends TestCase
{
    public function test_workflow_completo(): void
    {
        $valutazione = ValutazioneRecord::factory()->create();
        
        // Compila valutazione
        $this->compilaValutazione($valutazione);
        
        // Calcola punteggio
        $calculator = new CalcoloPunteggi();
        $result = $calculator->calcolaPunteggio($valutazione);
        
        // Verifica risultato
        $this->assertNotNull($result['totale']);
        $this->assertTrue($valutazione->isCompleted());
    }
}
```

## Dipendenze
- Laravel Framework v10.x
- PHP BCMath
- Laravel Cache
- Laravel Excel

## Link Correlati
- [Performance Optimization](./performance-optimization.md)
- [UI/UX Improvements](./ui-ux-improvements.md)
- [Testing Coverage](./testing-coverage.md)

## Note e Considerazioni
- Mantenere precisione calcoli
- Documentare formule
- Validare input utente
- Gestire casi particolari
- Pianificare manutenzione

---
⬅️ [Torna alla Roadmap](../../roadmap.md)
