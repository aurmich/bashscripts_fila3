# Sistema Graduatorie

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 100%**

## Overview
Sistema di gestione graduatorie per le progressioni, con calcolo automatico dei punteggi e gestione dei criteri di valutazione.

## Obiettivi
- [x] Calcolo automatico punteggi (100%)
- [x] Gestione criteri valutazione (100%)
- [x] Generazione graduatorie (100%)
- [x] Gestione ricorsi (100%)
- [x] Export dati (100%)

## Guida Step-by-Step

### 1. Calcolo Punteggi (100% completato)
```php
/**
 * Calcola il punteggio per una domanda di progressione
 */
class CalcoloPunteggi
{
    /**
     * @param DomandaProgressione $domanda
     * @return array<string, float>
     */
    public function calcolaPunteggio(DomandaProgressione $domanda): array
    {
        return [
            'totale' => $this->calcolaTotale($domanda),
            'anzianita' => $this->calcolaAnzianita($domanda),
            'titoli' => $this->calcolaTitoli($domanda),
            'valutazione' => $this->calcolaValutazione($domanda)
        ];
    }
    
    /**
     * @param string $bando_id
     * @return array<int, array{
     *   id: int,
     *   punteggio: float,
     *   posizione: int
     * }>
     */
    public function generaGraduatoria(string $bando_id): array
    {
        return DomandaProgressione::where('bando_id', $bando_id)
            ->with(['dipendente', 'titoli', 'valutazioni'])
            ->get()
            ->map(fn($d) => [
                'id' => $d->id,
                'punteggio' => $this->calcolaPunteggio($d)['totale'],
                'posizione' => 0
            ])
            ->sortByDesc('punteggio')
            ->values()
            ->map(function ($item, $index) {
                $item['posizione'] = $index + 1;
                return $item;
            })
            ->toArray();
    }
}
```

#### Passi da Seguire
1. Configurare criteri punteggio
2. Implementare formule calcolo
3. Validare risultati
4. Gestire parità punteggio

#### Consigli
- Usare decimal per calcoli precisi
- Implementare caching risultati
- Validare tutti gli input
- Documentare formule calcolo

### 2. Gestione Criteri (100% completato)
```php
/**
 * Gestisce i criteri di valutazione per un bando
 */
class GestioneCriteri
{
    /**
     * @return Collection<int, CriterioValutazione>
     */
    public function getCriteriBando(
        string $bando_id,
        array $filters = []
    ): Collection {
        $query = CriterioValutazione::where('bando_id', $bando_id);
        
        if (isset($filters['tipo'])) {
            $query->where('tipo', $filters['tipo']);
        }
        
        return $query->with([
            'sottocriteri',
            'punteggiPossibili'
        ])->get();
    }
    
    /**
     * Verifica la validità di un criterio
     */
    public function verificaValidita(CriterioValutazione $criterio): bool
    {
        return $criterio->punteggiPossibili->sum('valore') <= $criterio->punteggio_massimo
            && $criterio->sottocriteri->every(fn($s) => $this->verificaValidita($s));
    }
}
```

#### Passi da Seguire
1. Definire struttura criteri
2. Implementare validazione
3. Gestire pesi e punteggi
4. Configurare regole business

#### Consigli
- Validare consistenza criteri
- Implementare versionamento
- Documentare regole business
- Gestire modifiche in corso

## Metriche di Successo
- [x] Precisione calcoli 100%
- [x] Performance < 300ms
- [x] Cache hit rate > 85%
- [x] Zero errori calcolo
- [x] Validazione completa input

## Problemi Comuni e Soluzioni

### 1. Precisione Calcoli
```php
// ❌ Calcolo impreciso
$punteggio = $base * $peso;

// ✅ Calcolo preciso con arrotondamento
$punteggio = round(
    bcmul($base, $peso, 4),
    2
);
```

### 2. Gestione Parità
```php
// ❌ Ordinamento semplice
$graduatoria = $domande->sortByDesc('punteggio');

// ✅ Ordinamento con criteri parità
$graduatoria = $domande->sortBy([
    ['punteggio', 'desc'],
    ['anzianita', 'desc'],
    ['eta', 'desc']
]);
```

## Testing

### Unit Tests
```php
class CalcoloPunteggiTest extends TestCase
{
    public function test_calcolo_punteggio(): void
    {
        $domanda = DomandaProgressione::factory()->create();
        $calculator = new CalcoloPunteggi();
        
        $result = $calculator->calcolaPunteggio($domanda);
        
        $this->assertArrayHasKey('totale', $result);
        $this->assertIsFloat($result['totale']);
        $this->assertGreaterThanOrEqual(0, $result['totale']);
        $this->assertLessThanOrEqual(100, $result['totale']);
    }
}
```

### Integration Tests
```php
class GraduatoriaIntegrationTest extends TestCase
{
    public function test_generazione_graduatoria(): void
    {
        $bando = Bando::factory()
            ->has(DomandaProgressione::factory()->count(5))
            ->create();
        
        $calculator = new CalcoloPunteggi();
        $graduatoria = $calculator->generaGraduatoria($bando->id);
        
        $this->assertCount(5, $graduatoria);
        $this->assertTrue(
            $graduatoria[0]['punteggio'] >= $graduatoria[1]['punteggio']
        );
    }
}
```

## Dipendenze
- Laravel Framework v10.x
- PHP BCMath
- Laravel Cache
- Laravel Excel v3.x

## Link Correlati
- [Performance Optimization](./performance-optimization.md)
- [UI/UX Improvements](./ui-ux-improvements.md)
- [Testing Coverage](./testing-coverage.md)

## Note e Considerazioni
- Mantenere precisione calcoli
- Documentare criteri parità
- Validare input utente
- Gestire ricorsi
- Pianificare manutenzione
- Considerare storicizzazione

---
⬅️ [Torna alla Roadmap](../../roadmap.md)
