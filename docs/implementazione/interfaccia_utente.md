# Linee Guida per lo Sviluppo dell'Interfaccia Utente

## Introduzione

Questo documento fornisce le linee guida per lo sviluppo dell'interfaccia utente della piattaforma Futurely.net. L'obiettivo è creare un'esperienza utente intuitiva, accessibile e coinvolgente che permetta agli utenti di partecipare facilmente ai mercati predittivi.

## Principi di Design

### 1. Semplicità

- **Riduzione della complessità**: Presentare solo le informazioni essenziali nelle schermate principali
- **Progressiva divulgazione**: Rivelare dettagli aggiuntivi solo quando necessario
- **Linguaggio chiaro**: Utilizzare termini semplici e comprensibili, evitando il gergo tecnico

### 2. Coerenza

- **Pattern di design uniformi**: Mantenere coerenza in tutta l'applicazione
- **Comportamenti prevedibili**: Le azioni simili dovrebbero produrre risultati simili
- **Terminologia consistente**: Utilizzare gli stessi termini per gli stessi concetti

### 3. Feedback

- **Risposte immediate**: Fornire feedback visivo per ogni azione dell'utente
- **Messaggi chiari**: Comunicare successi, errori e stati in modo comprensibile
- **Indicatori di progresso**: Mostrare lo stato di operazioni che richiedono tempo

### 4. Accessibilità

- **Conformità WCAG 2.1**: Seguire le linee guida di accessibilità web
- **Design responsivo**: Garantire un'esperienza ottimale su tutti i dispositivi
- **Contrasto adeguato**: Assicurare leggibilità per utenti con problemi visivi

## Stack Tecnologico

### Frontend

- **Livewire**: Per componenti interattivi senza scrivere JavaScript
- **Alpine.js**: Per interazioni JavaScript leggere e reattive
- **Tailwind CSS**: Per lo styling e la creazione di un'interfaccia moderna
- **Blade**: Per il templating e la composizione delle viste

### Componenti UI

- **Wireframes**: Utilizzo di Figma per la progettazione iniziale
- **Design System**: Creazione di un sistema di componenti riutilizzabili
- **Libreria di icone**: Utilizzo di Heroicons per icone consistenti

## Struttura dell'Interfaccia

### Layout Base

```html
<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Futurely') }} - @yield('title')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        @include('layouts.partials.header')
        
        <!-- Main Content -->
        <main class="flex-grow container mx-auto px-4 py-8 sm:px-6 lg:px-8">
            @yield('content')
        </main>
        
        <!-- Footer -->
        @include('layouts.partials.footer')
    </div>
    
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireScripts
    @stack('scripts')
</body>
</html>
```

### Componenti Principali

#### Header

```html
<!-- resources/views/layouts/partials/header.blade.php -->
<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-blue-600 font-bold text-xl">
                    Futurely.net
                </a>
            </div>
            
            <!-- Navigation -->
            <nav class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('markets.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                    Mercati
                </a>
                <a href="{{ route('leaderboard') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                    Classifica
                </a>
                <a href="{{ route('how-it-works') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                    Come Funziona
                </a>
            </nav>
            
            <!-- User Menu -->
            <div class="flex items-center">
                @auth
                    <div class="flex items-center space-x-4">
                        <!-- Credits -->
                        <div class="hidden md:block">
                            <div class="text-sm text-gray-500">Crediti</div>
                            <div class="font-medium">{{ number_format(auth()->user()->credits, 2) }}</div>
                        </div>
                        
                        <!-- Profile Dropdown -->
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 focus:outline-none">
                                    <span>{{ auth()->user()->name }}</span>
                                    <svg class="ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>
                            
                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    Profilo
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('wallet.show') }}">
                                    Portafoglio
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('predictions.index') }}">
                                    Le mie previsioni
                                </x-dropdown-link>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Logout
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                            Accedi
                        </a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md text-sm font-medium">
                            Registrati
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>
```

## Componenti Livewire

### MarketsList

```php
namespace Modules\Predict\Http\Livewire;

use Livewire\Component;
use Modules\Predict\Models\Predict;

class MarketsList extends Component
{
    public string $search = '';
    public string $category = '';
    public string $sortBy = 'latest';
    public array $categories = [];
    
    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'sortBy' => ['except' => 'latest'],
    ];
    
    public function mount()
    {
        $this->categories = Predict::distinct('category')
            ->pluck('category')
            ->filter()
            ->toArray();
    }
    
    public function render()
    {
        $query = Predict::query()
            ->where('status', 'active');
            
        // Applica filtro di ricerca
        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%");
        }
        
        // Applica filtro per categoria
        if ($this->category) {
            $query->where('category', $this->category);
        }
        
        // Applica ordinamento
        switch ($this->sortBy) {
            case 'latest':
                $query->latest();
                break;
            case 'ending-soon':
                $query->where('resolution_time', '>', now())
                    ->orderBy('resolution_time', 'asc');
                break;
            case 'volume':
                $query->orderBy('trading_volume', 'desc');
                break;
        }
        
        $markets = $query->paginate(12);
        
        return view('predict::livewire.markets-list', [
            'markets' => $markets,
        ]);
    }
    
    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function updatedCategory()
    {
        $this->resetPage();
    }
    
    public function updatedSortBy()
    {
        $this->resetPage();
    }
}
```

### MarketCard

```php
namespace Modules\Predict\Http\Livewire;

use Livewire\Component;
use Modules\Predict\Models\Predict;

class MarketCard extends Component
{
    public Predict $market;
    
    public function mount(Predict $market)
    {
        $this->market = $market;
    }
    
    public function render()
    {
        return view('predict::livewire.market-card', [
            'prices' => $this->market->getPrices(),
        ]);
    }
}
```

## Pagine Principali

### Home Page

```html
<!-- resources/views/predict/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="space-y-12">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 md:p-12 text-white">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Prevedi il futuro, guadagna oggi</h1>
            <p class="text-lg md:text-xl mb-8 opacity-90">Partecipa ai mercati predittivi su Futurely.net e metti alla prova le tue capacità previsionali.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('markets.index') }}" class="bg-white text-blue-700 hover:bg-gray-100 px-6 py-3 rounded-lg font-medium text-center">
                    Esplora i mercati
                </a>
                <a href="{{ route('register') }}" class="bg-blue-500 bg-opacity-30 hover:bg-opacity-40 text-white px-6 py-3 rounded-lg font-medium text-center">
                    Inizia gratis
                </a>
            </div>
        </div>
    </div>
    
    <!-- Featured Markets -->
    <div>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Mercati in evidenza</h2>
            <a href="{{ route('markets.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">Vedi tutti</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredMarkets as $market)
                <livewire:predict::market-card :market="$market" :key="$market->id" />
            @endforeach
        </div>
    </div>
    
    <!-- How It Works -->
    <div class="bg-white rounded-xl p-8 shadow-sm">
        <h2 class="text-2xl font-bold mb-6 text-center">Come funziona</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 text-blue-700 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <span class="font-bold">1</span>
                </div>
                <h3 class="text-lg font-semibold mb-2">Scegli un mercato</h3>
                <p class="text-gray-600">Esplora i mercati disponibili e trova quelli che ti interessano.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 text-blue-700 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <span class="font-bold">2</span>
                </div>
                <h3 class="text-lg font-semibold mb-2">Fai la tua previsione</h3>
                <p class="text-gray-600">Acquista azioni degli esiti che ritieni più probabili.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 text-blue-700 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <span class="font-bold">3</span>
                </div>
                <h3 class="text-lg font-semibold mb-2">Ricevi ricompense</h3>
                <p class="text-gray-600">Guadagna crediti quando le tue previsioni si rivelano corrette.</p>
            </div>
        </div>
        
        <div class="mt-8 text-center">
            <a href="{{ route('how-it-works') }}" class="text-blue-600 hover:text-blue-800 font-medium">Scopri di più</a>
        </div>
    </div>
    
    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-sm text-center">
            <div class="text-3xl font-bold text-blue-600 mb-2">{{ $totalMarkets }}</div>
            <div class="text-gray-600">Mercati attivi</div>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-sm text-center">
            <div class="text-3xl font-bold text-blue-600 mb-2">{{ $totalUsers }}</div>
            <div class="text-gray-600">Utenti registrati</div>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-sm text-center">
            <div class="text-3xl font-bold text-blue-600 mb-2">{{ $totalTrades }}</div>
            <div class="text-gray-600">Transazioni completate</div>
        </div>
    </div>
</div>
@endsection
```

### Dettaglio Mercato

```html
<!-- resources/views/predict/market-detail.blade.php -->
@extends('layouts.app')

@section('title', $market->title)

@section('content')
<div class="space-y-8">
    <!-- Market Header -->
    <div class="bg-white rounded-xl p-6 shadow-sm">
        <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">{{ $market->title }}</h1>
                
                <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                    <div class="flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        <span>Chiusura: {{ $market->resolution_time->format('d/m/Y H:i') }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                        </svg>
                        <span>Volume: {{ number_format($market->trading_volume, 2) }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ $market->participants_count }} partecipanti</span>
                    </div>
                </div>
                
                <div class="prose max-w-none">
                    <p>{{ $market->description }}</p>
                </div>
            </div>
            
            <div class="bg-gray-50 p-4 rounded-lg md:w-64 flex-shrink-0">
                <div class="text-sm text-gray-500 mb-1">Stato</div>
                <div class="font-medium mb-4">
                    @if($market->status === 'active')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Attivo
                        </span>
                    @elseif($market->status === 'resolved')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            Risolto
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            {{ ucfirst($market->status) }}
                        </span>
                    @endif
                </div>
                
                <div class="text-sm text-gray-500 mb-1">Categoria</div>
                <div class="font-medium">
                    <a href="{{ route('markets.index', ['category' => $market->category]) }}" class="text-blue-600 hover:text-blue-800">
                        {{ $market->category }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Market Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Outcomes and Chart -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Probability Chart -->
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-semibold mb-4">Probabilità nel tempo</h2>
                <div class="h-64">
                    <canvas id="probabilityChart"></canvas>
                </div>
            </div>
            
            <!-- Outcomes -->
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-semibold mb-4">Esiti possibili</h2>
                
                <div class="space-y-4">
                    @foreach($market->outcomes as $index => $outcome)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div>
                                <div class="font-medium">{{ $outcome }}</div>
                                <div class="text-sm text-gray-500">
                                    Probabilità: {{ number_format($prices[$index] * 100, 1) }}%
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-semibold">
                                    {{ number_format(1 / $prices[$index], 2) }}x
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Trading Interface -->
        <div>
            <div class="bg-white rounded-xl p-6 shadow-sm sticky top-4">
                <h2 class="text-lg font-semibold mb-4">Fai la tua previsione</h2>
                
                @auth
                    <livewire:predict::trading-interface :market="$market" />
                @else
                    <div class="text-center p-6 bg-gray-50 rounded-lg">
                        <p class="text-gray-600 mb-4">Accedi o registrati per partecipare a questo mercato</p>
                        <div class="flex flex-col space-y-2">
                            <a href="{{ route('login') }}" class="bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md text-sm font-medium text-center">
                                Accedi
                            </a>
                            <a href="{{ route('register') }}" class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-md text-sm font-medium text-center">
                                Registrati
                            </a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    
    <!-- Comments -->
    <div class="bg-white rounded-xl p-6 shadow-sm">
        <h2 class="text-lg font-semibold mb-4">Discussione</h2>
        
        @auth
            <livewire:comment::comment-form :model="$market" />
        @else
            <div class="text-center p-4 bg-gray-50 rounded-lg mb-6">
                <p class="text-gray-600">Accedi per partecipare alla discussione</p>
            </div>
        @endauth
        
        <livewire:comment::comment-list :model="$market" />
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('probabilityChart').getContext('2d');
        
        // Dati di esempio - in produzione, questi dati verrebbero caricati da un endpoint API
        const chartData = @json($chartData);
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: chartData.datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1,
                        ticks: {
                            callback: function(value) {
                                return (value * 100) + '%';
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
@endsection
```

## Componenti UI Riutilizzabili

### Button

```html
<!-- resources/views/components/button.blade.php -->
@props([
    'type' => 'primary',
    'size' => 'md',
    'disabled' => false,
])

@php
$baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg focus:outline-none transition';

$typeClasses = [
    'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2',
    'secondary' => 'bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2',
    'success' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2',
    'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2',
][$type] ?? 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2';

$sizeClasses = [
    'sm' => 'px-3 py-1.5 text-xs',
    'md' => 'px-4 py-2 text-sm',
    'lg' => 'px-5 py-2.5 text-base',
    'xl' => 'px-6 py-3 text-lg',
][$size] ?? 'px-4 py-2 text-sm';

$disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';

$classes = $baseClasses . ' ' . $typeClasses . ' ' . $sizeClasses . ' ' . $disabledClasses;
@endphp

<button {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled]) }}>
    {{ $slot }}
</button>
```

### Card

```html
<!-- resources/views/components/card.blade.php -->
@props(['header' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl shadow-sm overflow-hidden']) }}>
    @if ($header)
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
            {{ $header }}
        </div>