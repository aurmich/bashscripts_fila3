# Sistema Valutazioni

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 45%**

## Overview
Sistema di gestione delle valutazioni delle performance con supporto per criteri multipli, periodi di valutazione e workflow approvativo.

## Obiettivi
- [x] Sistema base valutazioni (100%)
- [x] Validazione base (100%)
- [ ] Sistema avanzato (40%)
- [ ] Validazione avanzata (35%)

## Guida Step-by-Step

### 1. Core Features (50% completato)
```php
/**
 * Gestisce il sistema di valutazione
 */
class SistemaValutazione
{
    /**
     * @param ValutazioneRecord $valutazione
     * @return array<string, float>
     */
    public function calcolaPunteggio(ValutazioneRecord $valutazione): array
    {
        return Cache::tags(['valutazioni', 'punteggi'])
            ->remember(
                "punteggio_{$valutazione->id}",
                now()->addHours(24),
                fn() => $this->eseguiCalcolo($valutazione)
            );
    }
    
    /**
     * @param ValutazioneRecord $valutazione
     * @return array<string, float>
     */
    private function eseguiCalcolo(ValutazioneRecord $valutazione): array
    {
        $punteggiCriteri = $this->calcolaPunteggiCriteri($valutazione);
        $punteggiObiettivi = $this->calcolaPunteggiObiettivi($valutazione);
        
        return [
            'totale' => array_sum($punteggiCriteri) + array_sum($punteggiObiettivi),
            'criteri' => $punteggiCriteri,
            'obiettivi' => $punteggiObiettivi
        ];
    }
}
```

#### Passi da Seguire
1. Implementare criteri valutazione
2. Gestire periodi
3. Implementare workflow
4. Validare input

#### Consigli
- Usare caching strategico
- Implementare validazioni
- Documentare formule
- Monitorare performance

### 2. Data Management (40% completato)
```php
/**
 * Gestisce i dati delle valutazioni
 */
class ValutazioneManager
{
    /**
     * @param string $periodo
     * @param string $tipo
     * @return Collection<int, ValutazioneRecord>
     */
    public function getValutazioniPeriodo(
        string $periodo,
        string $tipo
    ): Collection {
        return ValutazioneRecord::where('periodo', $periodo)
            ->where('tipo', $tipo)
            ->with(['criteri', 'obiettivi', 'valutatore'])
            ->get();
    }
    
    /**
     * @param ValutazioneRecord $valutazione
     * @return array<string, mixed>
     */
    public function getStatistiche(ValutazioneRecord $valutazione): array
    {
        return [
            'media_criteri' => $valutazione->criteri->avg('punteggio'),
            'media_obiettivi' => $valutazione->obiettivi->avg('punteggio'),
            'completamento' => $this->calcolaCompletamento($valutazione),
            'trend' => $this->calcolaTrend($valutazione)
        ];
    }
}
```

#### Passi da Seguire
1. Definire struttura dati
2. Implementare queries
3. Gestire relazioni
4. Ottimizzare performance

#### Consigli
- Usare eager loading
- Implementare caching
- Validare input
- Documentare schema

## Metriche di Successo
- [ ] Performance < 200ms (45%)
- [ ] Cache hit rate > 90% (40%)
- [ ] Zero data loss (100%)
- [ ] Validazione completa (35%)
- [ ] Logging completo (40%)

## Problemi Comuni e Soluzioni

### 1. Performance Query
```php
// ❌ N+1 query problem
$valutazioni->each(fn($v) => $v->criteri);

// ✅ Eager loading
$valutazioni = ValutazioneRecord::with(['criteri', 'obiettivi'])->get();
```

### 2. Validazione Input
```php
// ❌ Validazione semplice
$valid = $punteggio >= 0 && $punteggio <= 100;

// ✅ Validazione robusta
$valid = is_numeric($punteggio)
    && $punteggio >= config('valutazioni.min_punteggio')
    && $punteggio <= config('valutazioni.max_punteggio')
    && $this->validatePunteggioCriterio($criterio, $punteggio);
```

## Testing

### Unit Tests
```php
class SistemaValutazioneTest extends TestCase
{
    public function test_calcolo_punteggio(): void
    {
        $valutazione = ValutazioneRecord::factory()->create();
        $sistema = new SistemaValutazione();
        
        $result = $sistema->calcolaPunteggio($valutazione);
        
        $this->assertArrayHasKey('totale', $result);
        $this->assertArrayHasKey('criteri', $result);
        $this->assertArrayHasKey('obiettivi', $result);
        $this->assertIsFloat($result['totale']);
        $this->assertGreaterThanOrEqual(0, $result['totale']);
        $this->assertLessThanOrEqual(100, $result['totale']);
    }
}
```

### Integration Tests
```php
class ValutazioneManagerTest extends TestCase
{
    public function test_statistiche(): void
    {
        $valutazione = ValutazioneRecord::factory()
            ->has(Criterio::factory()->count(3))
            ->has(Obiettivo::factory()->count(2))
            ->create();
            
        $manager = new ValutazioneManager();
        $stats = $manager->getStatistiche($valutazione);
        
        $this->assertArrayHasKey('media_criteri', $stats);
        $this->assertArrayHasKey('media_obiettivi', $stats);
        $this->assertArrayHasKey('completamento', $stats);
        $this->assertArrayHasKey('trend', $stats);
    }
}
```

## Dipendenze
- Laravel Framework v10.x
- Spatie Data
- Spatie Queryable Actions
- Laravel Cache

## Link Correlati
- [Sistema Obiettivi](./obiettivi.md)
- [Sistema Monitoraggio](./monitoraggio.md)
- [Sistema Reportistica](./reportistica.md)

## Note e Considerazioni
- Mantenere focus su accuratezza
- Migliorare performance calcoli
- Prioritizzare validazione
- Pianificare manutenzione
- Gestire workflow
- Mantenere audit log
- Implementare notifiche
- Gestire permessi

---
⬅️ [Torna alla Roadmap](../../roadmap.md)
