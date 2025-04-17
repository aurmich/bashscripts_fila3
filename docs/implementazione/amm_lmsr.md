# Implementazione dell'Automated Market Maker basato su LMSR

## Introduzione

Questo documento descrive l'implementazione dell'Automated Market Maker (AMM) basato sul modello matematico Logarithmic Market Scoring Rule (LMSR) nella piattaforma Futurely.net. L'AMM è un componente fondamentale che gestisce automaticamente la liquidità e il pricing nei mercati predittivi.

## Principi Matematici del LMSR

### Formula Base

Il LMSR si basa sulla seguente formula per calcolare il costo di un'operazione:

```
C(q) = b * ln(∑ exp(q_i/b))
```

Dove:
- `C(q)` è il costo totale per raggiungere lo stato `q`
- `q` è un vettore che rappresenta la quantità di azioni per ogni esito
- `b` è il parametro di liquidità (maggiore è `b`, maggiore è la liquidità)
- `ln` è il logaritmo naturale
- `exp` è la funzione esponenziale

### Calcolo dei Prezzi

Il prezzo di un'azione per un particolare esito `i` è dato dalla derivata parziale del costo rispetto alla quantità di quell'esito:

```
P_i(q) = exp(q_i/b) / ∑ exp(q_j/b)
```

Questo prezzo rappresenta la probabilità implicita dell'esito `i`.

## Implementazione in Laravel

### Struttura delle Classi

```php
namespace Modules\Predict\Services;

class LmsrMarketMaker
{
    private float $liquidityParameter;
    private array $quantities;

    public function __construct(float $liquidityParameter, array $initialQuantities = [])
    {
        $this->liquidityParameter = $liquidityParameter;
        $this->quantities = $initialQuantities;
    }

    public function getCost(): float
    {
        $sum = 0;
        foreach ($this->quantities as $quantity) {
            $sum += exp($quantity / $this->liquidityParameter);
        }
        return $this->liquidityParameter * log($sum);
    }

    public function getPrices(): array
    {
        $prices = [];
        $denominator = 0;

        // Calcola il denominatore
        foreach ($this->quantities as $quantity) {
            $denominator += exp($quantity / $this->liquidityParameter);
        }

        // Calcola il prezzo per ogni esito
        foreach ($this->quantities as $index => $quantity) {
            $prices[$index] = exp($quantity / $this->liquidityParameter) / $denominator;
        }

        return $prices;
    }

    public function getCostForBuy(int $outcomeIndex, float $amount): float
    {
        // Crea una copia delle quantità attuali
        $newQuantities = $this->quantities;
        $newQuantities[$outcomeIndex] += $amount;

        // Calcola il nuovo costo
        $newCost = $this->calculateCost($newQuantities);
        $currentCost = $this->getCost();

        // Il costo dell'operazione è la differenza
        return $newCost - $currentCost;
    }

    public function executeBuy(int $outcomeIndex, float $amount): float
    {
        $cost = $this->getCostForBuy($outcomeIndex, $amount);
        $this->quantities[$outcomeIndex] += $amount;
        return $cost;
    }

    private function calculateCost(array $quantities): float
    {
        $sum = 0;
        foreach ($quantities as $quantity) {
            $sum += exp($quantity / $this->liquidityParameter);
        }
        return $this->liquidityParameter * log($sum);
    }
}
```

### Integrazione con il Modello Predict

```php
namespace Modules\Predict\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Predict\Services\LmsrMarketMaker;

class Predict extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'resolution_time',
        'liquidity_parameter',
        'outcomes',
        'quantities',
    ];

    protected $casts = [
        'resolution_time' => 'datetime',
        'outcomes' => 'array',
        'quantities' => 'array',
    ];

    public function getMarketMaker(): LmsrMarketMaker
    {
        return new LmsrMarketMaker(
            $this->liquidity_parameter,
            $this->quantities
        );
    }

    public function getPrices(): array
    {
        return $this->getMarketMaker()->getPrices();
    }

    public function executeTrade(int $outcomeIndex, float $amount, User $user): Transaction
    {
        $marketMaker = $this->getMarketMaker();
        $cost = $marketMaker->executeBuy($outcomeIndex, $amount);

        // Aggiorna le quantità nel database
        $this->quantities = $marketMaker->getQuantities();
        $this->save();

        // Crea una transazione
        return Transaction::create([
            'user_id' => $user->id,
            'predict_id' => $this->id,
            'outcome_index' => $outcomeIndex,
            'amount' => $amount,
            'cost' => $cost,
            'type' => 'buy',
        ]);
    }
}
```

## Gestione della Liquidità

### Parametro di Liquidità

Il parametro di liquidità `b` è cruciale per il funzionamento del mercato. Un valore più alto di `b` significa:

1. Minore impatto sul prezzo per ogni trade
2. Maggiore capacità di assorbire grandi ordini
3. Maggiore sussidio necessario per il market maker

La scelta di `b` dipende da diversi fattori:

- Popolarità attesa del mercato
- Numero di esiti possibili
- Tolleranza al rischio della piattaforma

### Formula per Determinare il Parametro di Liquidità

Una regola empirica per determinare `b` è:

```
b = max_trade / ln(n)
```

Dove:
- `max_trade` è l'importo massimo che si vuole permettere di tradare senza spostare il prezzo più del 10%
- `n` è il numero di esiti possibili

## Implementazione dell'Interfaccia Utente

### Componente Livewire per il Trading

```php
namespace Modules\Predict\Http\Livewire;

use Livewire\Component;
use Modules\Predict\Models\Predict;
use Modules\User\Models\User;

class TradingInterface extends Component
{
    public Predict $predict;
    public int $selectedOutcome = 0;
    public float $amount = 0;
    public float $cost = 0;

    protected $rules = [
        'selectedOutcome' => 'required|integer|min:0',
        'amount' => 'required|numeric|min:0.1',
    ];

    public function mount(Predict $predict)
    {
        $this->predict = $predict;
    }

    public function updatedAmount()
    {
        $this->calculateCost();
    }

    public function updatedSelectedOutcome()
    {
        $this->calculateCost();
    }

    public function calculateCost()
    {
        if ($this->amount <= 0) {
            $this->cost = 0;
            return;
        }

        $marketMaker = $this->predict->getMarketMaker();
        $this->cost = $marketMaker->getCostForBuy($this->selectedOutcome, $this->amount);
    }

    public function executeTrade()
    {
        $this->validate();

        /** @var User $user */
        $user = auth()->user();

        // Verifica che l'utente abbia crediti sufficienti
        if ($user->credits < $this->cost) {
            session()->flash('error', 'Crediti insufficienti per completare l\'operazione.');
            return;
        }

        // Esegui la transazione
        $transaction = $this->predict->executeTrade(
            $this->selectedOutcome,
            $this->amount,
            $user
        );

        // Sottrai i crediti all'utente
        $user->credits -= $this->cost;
        $user->save();

        session()->flash('message', 'Operazione completata con successo!');
        $this->amount = 0;
        $this->cost = 0;

        // Emetti un evento per aggiornare altri componenti
        $this->emit('tradeExecuted', $this->predict->id);
    }

    public function render()
    {
        return view('predict::livewire.trading-interface', [
            'prices' => $this->predict->getPrices(),
            'outcomes' => $this->predict->outcomes,
        ]);
    }
}
```

## Ottimizzazioni e Considerazioni

### Gestione della Precisione Numerica

Le operazioni matematiche con esponenziali e logaritmi possono portare a problemi di precisione numerica. È importante utilizzare tipi di dati a precisione sufficiente (come `float` o `double`) e gestire i casi limite.

### Caching

Per migliorare le performance, è consigliabile implementare un sistema di caching per i calcoli più frequenti:

```php
use Illuminate\Support\Facades\Cache;

// Nel metodo getPrices del modello Predict
public function getPrices(): array
{
    return Cache::remember('predict_prices_' . $this->id, 60, function () {
        return $this->getMarketMaker()->getPrices();
    });
}
```

### Gestione degli Errori

È importante implementare una robusta gestione degli errori, specialmente per operazioni che coinvolgono transazioni finanziarie:

```php
public function executeTrade(int $outcomeIndex, float $amount, User $user): Transaction
{
    try {
        DB::beginTransaction();
        
        $marketMaker = $this->getMarketMaker();
        $cost = $marketMaker->executeBuy($outcomeIndex, $amount);

        // Aggiorna le quantità nel database
        $this->quantities = $marketMaker->getQuantities();
        $this->save();

        // Crea una transazione
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'predict_id' => $this->id,
            'outcome_index' => $outcomeIndex,
            'amount' => $amount,
            'cost' => $cost,
            'type' => 'buy',
        ]);

        // Sottrai i crediti all'utente
        $user->credits -= $cost;
        $user->save();

        DB::commit();
        return $transaction;
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Errore durante l\'esecuzione del trade: ' . $e->getMessage());
        throw $e;
    }
}
```

## Conclusione

L'implementazione di un Automated Market Maker basato su LMSR fornisce un meccanismo robusto per la gestione della liquidità e il pricing nei mercati predittivi. Questo approccio garantisce che i mercati rimangano liquidi anche con un numero limitato di partecipanti, permettendo agli utenti di tradare in qualsiasi momento a prezzi ragionevoli.

La combinazione di un solido modello matematico con un'implementazione efficiente in Laravel crea una base solida per la piattaforma Futurely.net, consentendo di offrire un'esperienza di trading fluida e reattiva agli utenti.