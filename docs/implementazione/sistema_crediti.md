# Sistema di Gestione dei Crediti e delle Transazioni

## Introduzione

Questo documento descrive l'implementazione del sistema di gestione dei crediti e delle transazioni nella piattaforma Futurely.net. Questo sistema è fondamentale per consentire agli utenti di partecipare ai mercati predittivi, acquistare azioni e gestire il proprio portafoglio.

## Architettura del Sistema

### Modelli Principali

#### User

Il modello `User` è esteso per includere la gestione dei crediti:

```php
namespace Modules\User\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Predict\Models\Transaction;
use Modules\Predict\Models\Order;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'credits',
        'settings',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'credits' => 'float',
        'settings' => 'array',
    ];

    /**
     * Relazione con le transazioni dell'utente
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Relazione con gli ordini dell'utente
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Aggiunge crediti all'utente
     */
    public function addCredits(float $amount): void
    {
        $this->credits += $amount;
        $this->save();
    }

    /**
     * Sottrae crediti all'utente se disponibili
     */
    public function subtractCredits(float $amount): bool
    {
        if ($this->credits >= $amount) {
            $this->credits -= $amount;
            $this->save();
            return true;
        }

        return false;
    }
}
```

#### Transaction

Il modello `Transaction` registra tutte le operazioni di credito:

```php
namespace Modules\Predict\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'predict_id',
        'order_id',
        'amount',
        'cost',
        'type',
        'outcome_index',
        'status',
        'metadata',
    ];

    protected $casts = [
        'amount' => 'float',
        'cost' => 'float',
        'metadata' => 'array',
    ];

    /**
     * Relazione con l'utente
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relazione con la previsione
     */
    public function predict()
    {
        return $this->belongsTo(Predict::class);
    }

    /**
     * Relazione con l'ordine
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Scope per filtrare le transazioni per tipo
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope per filtrare le transazioni per stato
     */
    public function scopeWithStatus($query, string $status)
    {
        return $query->where('status', $status);
    }
}
```

#### Order

Il modello `Order` rappresenta un ordine di acquisto o vendita:

```php
namespace Modules\Predict\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'predict_id',
        'outcome_index',
        'amount',
        'price',
        'type',
        'status',
        'filled_amount',
        'expires_at',
    ];

    protected $casts = [
        'amount' => 'float',
        'price' => 'float',
        'filled_amount' => 'float',
        'expires_at' => 'datetime',
    ];

    /**
     * Relazione con l'utente
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relazione con la previsione
     */
    public function predict()
    {
        return $this->belongsTo(Predict::class);
    }

    /**
     * Relazione con le transazioni associate
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Verifica se l'ordine è completamente riempito
     */
    public function isComplete(): bool
    {
        return $this->filled_amount >= $this->amount;
    }

    /**
     * Verifica se l'ordine è scaduto
     */
    public function isExpired(): bool
    {
        return $this->expires_at !== null && now()->gt($this->expires_at);
    }
}
```

## Flusso delle Transazioni

### Acquisto di Crediti

Il processo di acquisto dei crediti è gestito tramite un'azione dedicata:

```php
namespace Modules\Predict\Actions;

use Modules\User\Models\User;
use Modules\Predict\Models\Transaction;

class PurchaseCredits
{
    public function execute(User $user, float $amount, string $paymentMethod, array $paymentData): Transaction
    {
        // Verifica del pagamento tramite gateway esterno
        $paymentSuccessful = $this->processPayment($paymentMethod, $amount, $paymentData);

        if (!$paymentSuccessful) {
            throw new \Exception('Pagamento non riuscito');
        }

        // Aggiunta dei crediti all'utente
        $user->addCredits($amount);

        // Registrazione della transazione
        return Transaction::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'type' => 'credit_purchase',
            'status' => 'completed',
            'metadata' => [
                'payment_method' => $paymentMethod,
                'payment_reference' => $paymentData['reference'] ?? null,
            ],
        ]);
    }

    private function processPayment(string $method, float $amount, array $data): bool
    {
        // Implementazione del gateway di pagamento
        // In produzione, questo metodo interagirebbe con Stripe, PayPal, ecc.
        
        // Simulazione per ambiente di sviluppo
        return true;
    }
}
```

### Esecuzione di un Trade

L'esecuzione di un trade coinvolge sia il sistema di crediti che l'AMM:

```php
namespace Modules\Predict\Actions;

use Modules\Predict\Models\Predict;
use Modules\Predict\Models\Transaction;
use Modules\User\Models\User;
use Illuminate\Support\Facades\DB;

class ExecuteTrade
{
    public function execute(Predict $predict, User $user, int $outcomeIndex, float $amount): Transaction
    {
        return DB::transaction(function () use ($predict, $user, $outcomeIndex, $amount) {
            // Ottieni il market maker
            $marketMaker = $predict->getMarketMaker();
            
            // Calcola il costo dell'operazione
            $cost = $marketMaker->getCostForBuy($outcomeIndex, $amount);
            
            // Verifica che l'utente abbia crediti sufficienti
            if (!$user->subtractCredits($cost)) {
                throw new \Exception('Crediti insufficienti');
            }
            
            // Esegui l'acquisto tramite il market maker
            $marketMaker->executeBuy($outcomeIndex, $amount);
            
            // Aggiorna le quantità nel modello Predict
            $predict->quantities = $marketMaker->getQuantities();
            $predict->save();
            
            // Registra la transazione
            return Transaction::create([
                'user_id' => $user->id,
                'predict_id' => $predict->id,
                'amount' => $amount,
                'cost' => $cost,
                'type' => 'buy',
                'outcome_index' => $outcomeIndex,
                'status' => 'completed',
            ]);
        });
    }
}
```

## Sistema di Ricompense

### Risoluzione dei Mercati

Quando un mercato viene risolto, gli utenti che hanno acquistato azioni dell'esito vincente ricevono ricompense:

```php
namespace Modules\Predict\Actions;

use Modules\Predict\Models\Predict;
use Modules\Predict\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ResolveMarket
{
    public function execute(Predict $predict, int $winningOutcomeIndex): void
    {
        DB::transaction(function () use ($predict, $winningOutcomeIndex) {
            // Imposta l'esito vincente
            $predict->winning_outcome_index = $winningOutcomeIndex;
            $predict->status = 'resolved';
            $predict->resolved_at = now();
            $predict->save();
            
            // Trova tutte le transazioni di acquisto per l'esito vincente
            $winningTransactions = Transaction::where('predict_id', $predict->id)
                ->where('type', 'buy')
                ->where('outcome_index', $winningOutcomeIndex)
                ->get();
            
            // Distribuisci le ricompense
            foreach ($winningTransactions as $transaction) {
                $user = $transaction->user;
                
                // Calcola la ricompensa (1 credito per ogni azione dell'esito vincente)
                $reward = $transaction->amount;
                
                // Aggiungi i crediti all'utente
                $user->addCredits($reward);
                
                // Registra la transazione di ricompensa
                Transaction::create([
                    'user_id' => $user->id,
                    'predict_id' => $predict->id,
                    'amount' => $reward,
                    'type' => 'reward',
                    'outcome_index' => $winningOutcomeIndex,
                    'status' => 'completed',
                    'metadata' => [
                        'original_transaction_id' => $transaction->id,
                    ],
                ]);
            }
        });
    }
}
```

## Interfaccia Utente

### Componente Livewire per il Portafoglio

```php
namespace Modules\Predict\Http\Livewire;

use Livewire\Component;
use Modules\User\Models\User;

class UserWallet extends Component
{
    public User $user;
    public float $purchaseAmount = 10.0;
    
    protected $rules = [
        'purchaseAmount' => 'required|numeric|min:5|max:1000',
    ];
    
    public function mount()
    {
        $this->user = auth()->user();
    }
    
    public function purchaseCredits()
    {
        $this->validate();
        
        // Simulazione di acquisto per ambiente di sviluppo
        app(\Modules\Predict\Actions\PurchaseCredits::class)->execute(
            $this->user,
            $this->purchaseAmount,
            'test',
            ['reference' => 'dev-' . time()]
        );
        
        session()->flash('message', 'Crediti acquistati con successo!');
        $this->purchaseAmount = 10.0;
    }
    
    public function render()
    {
        $transactions = $this->user->transactions()
            ->latest()
            ->take(10)
            ->get();
            
        return view('predict::livewire.user-wallet', [
            'transactions' => $transactions,
        ]);
    }
}
```

### Vista Blade per il Portafoglio

```html
<!-- resources/views/livewire/user-wallet.blade.php -->
<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Il tuo portafoglio</h2>
    
    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600">Crediti disponibili</p>
                <p class="text-3xl font-bold">{{ number_format($user->credits, 2) }}</p>
            </div>
            <button 
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                x-data="{}"
                x-on:click="$dispatch('open-modal', 'purchase-credits')"
            >
                Acquista crediti
            </button>
        </div>
    </div>
    
    <!-- Modal per l'acquisto di crediti -->
    <div 
        x-data="{ open: false }"
        x-show="open"
        x-on:open-modal.window="$event.detail == 'purchase-credits' ? open = true : null"
        x-on:close-modal.window="open = false"
        x-on:keydown.escape.window="open = false"
        class="fixed inset-0 z-50 overflow-y-auto" 
        style="display: none;"
    >
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black opacity-50" x-on:click="open = false"></div>
            
            <div class="relative bg-white rounded-lg max-w-md w-full p-6">
                <h3 class="text-xl font-bold mb-4">Acquista crediti</h3>
                
                <form wire:submit.prevent="purchaseCredits">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Importo</label>
                        <input 
                            type="number" 
                            wire:model="purchaseAmount"
                            class="w-full px-3 py-2 border rounded-lg"
                            min="5"
                            max="1000"
                            step="5"
                        >
                        @error('purchaseAmount') 
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>
                    
                    <div class="flex justify-end space-x-3">
                        <button 
                            type="button"
                            class="px-4 py-2 border rounded-lg"
                            x-on:click="open = false"
                        >
                            Annulla
                        </button>
                        <button 
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                        >
                            Conferma acquisto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Storico transazioni -->
    <div class="mt-6">
        <h3 class="text-xl font-bold mb-3">Ultime transazioni</h3>
        
        @if($transactions->isEmpty())
            <p class="text-gray-500 italic">Nessuna transazione recente</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                            <th class="py-3 px-4 text-left">Data</th>
                            <th class="py-3 px-4 text-left">Tipo</th>
                            <th class="py-3 px-4 text-left">Importo</th>
                            <th class="py-3 px-4 text-left">Stato</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                                <td class="py-3 px-4">
                                    @switch($transaction->type)
                                        @case('credit_purchase')
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">
                                                Acquisto crediti
                                            </span>
                                            @break
                                        @case('buy')
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                                                Acquisto azioni
                                            </span>
                                            @break
                                        @case('reward')
                                            <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-xs">
                                                Ricompensa
                                            </span>
                                            @break
                                        @default
                                            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs">
                                                {{ $transaction->type }}
                                            </span>
                                    @endswitch
                                </td>
                                <td class="py-3 px-4">
                                    @if(in_array($transaction->type, ['credit_purchase', 'reward']))
                                        <span class="text-green-600">+{{ number_format($transaction->amount, 2) }}</span>
                                    @else
                                        <span class="text-red-600">-{{ number_format($transaction->cost, 2) }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">
                                    @if($transaction->status === 'completed')
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">
                                            Completata
                                        </span>
                                    @else
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">
                                            {{ $transaction->status }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
```

## Sicurezza e Validazione

### Middleware per la Verifica dei Crediti

```php
namespace Modules\Predict\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureSufficientCredits
{
    public function handle(Request $request, Closure $next, float $minCredits = 0)
    {
        $user = auth()->user();
        
        if (!$user || $user->credits < $minCredits) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Crediti insufficienti per completare questa operazione.',
                ], 403);
            }
            
            return redirect()->route('predict.credits.purchase')
                ->with('error', 'Crediti insufficienti per completare questa operazione.');
        }
        
        return $next($request);
    }
}
```

### Validazione delle Transazioni

```php
namespace Modules\Predict\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExecuteTradeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'predict_id' => 'required|exists:predicts,id',
            'outcome_index' => 'required|integer|min:0',
            'amount' => 'required|numeric|min:0.1',
        ];
    }
    
    public function messages()
    {
        return [
            'predict_id.required' => 'È necessario specificare un mercato.',
            'predict_id.exists' => 'Il mercato selezionato non esiste.',
            'outcome_index.required' => 'È necessario specificare un esito.',
            'outcome_index.integer' => 'L\'indice dell\'esito deve essere un numero intero.',
            'outcome_index.min' => 'L\'indice dell\'esito non è valido.',
            'amount.required' => 'È necessario specificare un importo.',
            'amount.numeric' => 'L\'importo deve essere un numero.',
            'amount.min' => 'L\'importo minimo è 0.1.',
        ];
    }
}
```

## Conclusione

Il sistema di gestione dei crediti e delle transazioni è un componente fondamentale della piattaforma Futurely.net. Fornisce le funzionalità necessarie per consentire agli utenti di acquistare crediti, partecipare ai mercati predittivi e ricevere ricompense per le previsioni corrette.

L'implementazione si basa su un'architettura robusta con modelli ben definiti e relazioni chiare, garantendo l'integrità dei dati e la tracciabilità di tutte le operazioni. L'integrazione con l'Automated Market Maker (AMM) basato su LMSR assicura un pricing equo e una liquidità adeguata per tutti i mercati.

Le future evoluzioni del sistema potrebbero includere:

1. Integrazione con provider di pagamento reali (Stripe, PayPal, ecc.)
2. Supporto per criptovalute e wallet blockchain
3. Sistema di bonus e promozioni per incentivare la partecipazione
4. Meccanismi di staking per aumentare le ricompense potenziali
5. Implementazione di un sistema di referral per premiare gli utenti che invitano nuovi partecipanti