# Sistema Obiettivi

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 40%**

## Overview
Sistema di gestione degli obiettivi di performance con supporto per KPI, milestone e tracking del progresso.

## Obiettivi
- [x] Sistema base obiettivi (100%)
- [x] Validazione base (100%)
- [ ] Sistema avanzato (35%)
- [ ] Validazione avanzata (30%)

## Guida Step-by-Step

### 1. Goal System (45% completato)
```php
/**
 * Gestisce il sistema degli obiettivi
 */
class SistemaObiettivi
{
    /**
     * @param ObiettivoRecord $obiettivo
     * @return array<string, float>
     */
    public function calcolaProgresso(ObiettivoRecord $obiettivo): array
    {
        return Cache::tags(['obiettivi', 'progressi'])
            ->remember(
                "progresso_{$obiettivo->id}",
                now()->addHours(24),
                fn() => $this->elaboraProgresso($obiettivo)
            );
    }
    
    /**
     * @param ObiettivoRecord $obiettivo
     * @return array<string, float>
     */
    private function elaboraProgresso(ObiettivoRecord $obiettivo): array
    {
        $kpiProgress = $this->calcolaKpiProgress($obiettivo);
        $milestoneProgress = $this->calcolaMilestoneProgress($obiettivo);
        
        return [
            'totale' => ($kpiProgress + $milestoneProgress) / 2,
            'kpi' => $kpiProgress,
            'milestone' => $milestoneProgress,
            'trend' => $this->calcolaTrend($obiettivo)
        ];
    }
}
```

#### Passi da Seguire
1. Definire struttura obiettivi
2. Implementare KPI
3. Gestire milestone
4. Tracciare progressi

#### Consigli
- Usare metriche SMART
- Implementare validazioni
- Documentare KPI
- Monitorare trend

### 2. Data Integrity (35% completato)
```php
/**
 * Gestisce l'integrità dei dati degli obiettivi
 */
class ObiettiviManager
{
    /**
     * @param string $periodo
     * @param string $tipo
     * @return Collection<int, ObiettivoRecord>
     */
    public function getObiettiviPeriodo(
        string $periodo,
        string $tipo
    ): Collection {
        return ObiettivoRecord::where('periodo', $periodo)
            ->where('tipo', $tipo)
            ->with(['kpi', 'milestone', 'responsabile'])
            ->get();
    }
    
    /**
     * @param ObiettivoRecord $obiettivo
     * @return array<string, mixed>
     */
    public function getStatistiche(ObiettivoRecord $obiettivo): array
    {
        return [
            'completamento' => $this->calcolaCompletamento($obiettivo),
            'scadenza' => $this->calcolaScadenza($obiettivo),
            'rischi' => $this->analizzaRischi($obiettivo),
            'impatto' => $this->valutaImpatto($obiettivo)
        ];
    }
}
```

#### Passi da Seguire
1. Validare dati obiettivi
2. Gestire integrità
3. Implementare controlli
4. Monitorare qualità

#### Consigli
- Implementare validazioni
- Usare transazioni
- Documentare regole
- Gestire eccezioni

## Metriche di Successo
- [ ] Performance < 180ms (40%)
- [ ] Cache hit rate > 85% (35%)
- [ ] Zero data loss (100%)
- [ ] Validazione completa (30%)
- [ ] Logging completo (35%)

## Problemi Comuni e Soluzioni

### 1. Validazione Obiettivi
```php
// ❌ Validazione base
$valid = $obiettivo->scadenza > now();

// ✅ Validazione completa
$valid = $obiettivo->scadenza instanceof Carbon
    && $obiettivo->scadenza->isFuture()
    && $this->validaPeriodo($obiettivo)
    && $this->validaKPI($obiettivo)
    && $this->validaMilestone($obiettivo);
```

### 2. Calcolo Progresso
```php
// ❌ Calcolo semplice
$progress = $completati / $totale;

// ✅ Calcolo ponderato
$progress = $this->calcolaPesoKPI($obiettivo) * $kpiProgress
    + $this->calcolaPesoMilestone($obiettivo) * $milestoneProgress;
```

## Testing

### Unit Tests
```php
class SistemaObiettiviTest extends TestCase
{
    public function test_calcolo_progresso(): void
    {
        $obiettivo = ObiettivoRecord::factory()->create();
        $sistema = new SistemaObiettivi();
        
        $result = $sistema->calcolaProgresso($obiettivo);
        
        $this->assertArrayHasKey('totale', $result);
        $this->assertArrayHasKey('kpi', $result);
        $this->assertArrayHasKey('milestone', $result);
        $this->assertArrayHasKey('trend', $result);
        $this->assertIsFloat($result['totale']);
        $this->assertGreaterThanOrEqual(0, $result['totale']);
        $this->assertLessThanOrEqual(100, $result['totale']);
    }
}
```

### Integration Tests
```php
class ObiettiviManagerTest extends TestCase
{
    public function test_statistiche(): void
    {
        $obiettivo = ObiettivoRecord::factory()
            ->has(KPI::factory()->count(3))
            ->has(Milestone::factory()->count(4))
            ->create();
            
        $manager = new ObiettiviManager();
        $stats = $manager->getStatistiche($obiettivo);
        
        $this->assertArrayHasKey('completamento', $stats);
        $this->assertArrayHasKey('scadenza', $stats);
        $this->assertArrayHasKey('rischi', $stats);
        $this->assertArrayHasKey('impatto', $stats);
    }
}
```

## Dipendenze
- Laravel Framework v10.x
- Spatie Data
- Spatie Queryable Actions
- Laravel Cache

## Link Correlati
- [Sistema Valutazioni](./valutazioni.md)
- [Sistema Monitoraggio](./monitoraggio.md)
- [Sistema Reportistica](./reportistica.md)

## Note e Considerazioni
- Definire obiettivi SMART
- Implementare KPI misurabili
- Gestire milestone
- Tracciare progressi
- Monitorare scadenze
- Gestire rischi
- Valutare impatto
- Mantenere storico

---
⬅️ [Torna alla Roadmap](../../roadmap.md)
