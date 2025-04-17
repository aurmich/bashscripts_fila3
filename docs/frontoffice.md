# Documentazione Frontoffice

## Introduzione

Questo documento descrive l'architettura e l'implementazione del frontoffice del progetto Predict. Il frontoffice è l'interfaccia pubblica con cui gli utenti interagiscono per accedere ai mercati predittivi e alle funzionalità della piattaforma.

## Architettura Generale

Il frontoffice è basato su un'architettura moderna che utilizza:

1. **Sistema di Temi**: La cartella `/Themes` contiene i diversi temi disponibili (One, Sixteen, TwentyOne)
2. **Laravel Folio**: Per il routing basato su file
3. **Livewire**: Per componenti interattivi senza scrivere JavaScript complesso
4. **Alpine.js**: Per interazioni JavaScript leggere e reattive
5. **Tailwind CSS**: Per lo styling e la creazione di un'interfaccia moderna

## Sistema di Routing con Laravel Folio

Il routing del frontoffice è gestito principalmente attraverso Laravel Folio, un sistema di routing basato su file che permette di creare pagine senza definire esplicitamente le rotte.

```php
// app/Providers/FolioServiceProvider.php
use Laravel\Folio\Folio;

Folio::path(resource_path('views/pages'))->middleware([
    // middleware applicati a tutte le pagine
]);
```

Caratteristiche principali di Folio:

- **Routing basato su file**: Le pagine in `resources/views/pages/` diventano automaticamente rotte accessibili
- **Parametri dinamici**: Supporto per parametri nelle URL tramite la sintassi `[param].blade.php`
- **Middleware**: Configurabile a livello di pagina tramite la funzione `middleware()`
- **Naming delle rotte**: Possibilità di assegnare nomi alle rotte tramite la funzione `name()`

Esempio di pagina Folio con parametri:

```php
// resources/views/pages/markets/[id].blade.php
<?php

use function Laravel\Folio\{middleware, name};
use App\Models\Market;

name('markets.show');
middleware(['auth']);

$market = Market::findOrFail($id);
?>

<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1>{{ $market->title }}</h1>
        <!-- Contenuto della pagina -->
    </div>
</x-app-layout>
```

## Componenti Interattivi con Livewire

Livewire è utilizzato per creare componenti interattivi senza scrivere JavaScript complesso. I componenti principali includono:

- **MarketsList**: Per visualizzare e filtrare i mercati disponibili
- **MarketCard**: Per visualizzare le informazioni di un singolo mercato
- **TradingInterface**: Per l'interfaccia di trading e scommesse
- **CommentForm** e **CommentList**: Per la gestione dei commenti

Esempio di componente Livewire:

```php
// Modules/Predict/Http/Livewire/MarketCard.php
namespace Modules\Predict\Http\Livewire;

use Livewire\Component;
use App\Models\Market;

class MarketCard extends Component
{
    public Market $market;
    
    public function render()
    {
        return view('predict::livewire.market-card', [
            'market' => $this->market,
        ]);
    }
}
```

Utilizzo del componente nel template:

```html
<livewire:predict::market-card :market="$market" :key="$market->id" />
```

## Struttura del Tema

Il tema principale (TwentyOne) è strutturato come segue:

```
Themes/TwentyOne/
├── Http/
│   └── Livewire/        # Componenti Livewire specifici del tema
├── resources/
│   ├── css/             # Stili CSS e Tailwind
│   ├── js/              # Script JavaScript
│   ├── images/          # Immagini e asset grafici
│   └── views/           # Template Blade
│       ├── components/  # Componenti riutilizzabili
│       ├── layouts/     # Layout principali
│       ├── livewire/    # Template per componenti Livewire
│       └── pages/       # Pagine specifiche
├── vite.config.js       # Configurazione Vite per gli asset
└── theme.json          # Metadati del tema
```

## Layout Base

Il layout base dell'applicazione include:

- Metatag e configurazioni SEO
- Inclusione degli asset CSS e JavaScript tramite Vite
- Struttura principale con header, contenuto principale e footer
- Integrazione con sistemi di analisi del traffico

```html
<!-- resources/views/layouts/app.blade.php (esempio semplificato) -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('title')</title>
    
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col">
        @include('layouts.partials.header')
        
        <main class="flex-grow container mx-auto px-4 py-8">
            @yield('content')
        </main>
        
        @include('layouts.partials.footer')
    </div>
    
    @vite(['resources/js/app.js'])
    @livewireScripts
</body>
</html>
```

## Principi di Design dell'Interfaccia Utente

L'interfaccia utente del frontoffice segue questi principi:

1. **Semplicità**: Riduzione della complessità, presentando solo le informazioni essenziali
2. **Coerenza**: Pattern di design uniformi in tutta l'applicazione
3. **Feedback**: Risposte immediate per ogni azione dell'utente
4. **Accessibilità**: Conformità WCAG 2.1 e design responsivo

## Gestione degli Asset

Gli asset frontend sono gestiti tramite Vite, con configurazione in `vite.config.js`. Gli asset principali includono:

- **CSS**: Compilato da Tailwind CSS
- **JavaScript**: Gestito tramite moduli ES6
- **Immagini e altri asset**: Serviti dalla directory pubblica

## Integrazione con il Backend

Il frontoffice si integra con il backend attraverso:

1. **Livewire**: Per le interazioni in tempo reale
2. **API REST**: Per le chiamate asincrone
3. **Eventi**: Per la comunicazione in tempo reale

## Best Practices

- Utilizzare i componenti Livewire per funzionalità interattive
- Organizzare i componenti in namespace appropriati
- Utilizzare il lazy loading per componenti pesanti
- Combinare Folio e Volt per creare pagine dinamiche con stato
# Documentazione Frontoffice

## Introduzione

Questo documento descrive l'architettura e l'implementazione del frontoffice del progetto Predict. Il frontoffice è l'interfaccia pubblica con cui gli utenti interagiscono per accedere ai mercati predittivi e alle funzionalità della piattaforma.

## Architettura Generale

Il frontoffice è basato su un'architettura moderna che utilizza:

1. **Sistema di Temi**: La cartella `/Themes` contiene i diversi temi disponibili (One, Sixteen, TwentyOne)
2. **Laravel Folio**: Per il routing basato su file
3. **Livewire**: Per componenti interattivi senza scrivere JavaScript complesso
4. **Alpine.js**: Per interazioni JavaScript leggere e reattive
5. **Tailwind CSS**: Per lo styling e la creazione di un'interfaccia moderna

## Sistema di Routing con Laravel Folio

Il routing del frontoffice è gestito principalmente attraverso Laravel Folio, un sistema di routing basato su file che permette di creare pagine senza definire esplicitamente le rotte.

```php
// app/Providers/FolioServiceProvider.php
use Laravel\Folio\Folio;

Folio::path(resource_path('views/pages'))->middleware([
    // middleware applicati a tutte le pagine
]);
```

Caratteristiche principali di Folio:

- **Routing basato su file**: Le pagine in `resources/views/pages/` diventano automaticamente rotte accessibili
- **Parametri dinamici**: Supporto per parametri nelle URL tramite la sintassi `[param].blade.php`
- **Middleware**: Configurabile a livello di pagina tramite la funzione `middleware()`
- **Naming delle rotte**: Possibilità di assegnare nomi alle rotte tramite la funzione `name()`

Esempio di pagina Folio con parametri:

```php
// resources/views/pages/markets/[id].blade.php
<?php

use function Laravel\Folio\{middleware, name};
use App\Models\Market;

name('markets.show');
middleware(['auth']);

$market = Market::findOrFail($id);
?>

<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1>{{ $market->title }}</h1>
        <!-- Contenuto della pagina -->
    </div>
</x-app-layout>
```

## Componenti Interattivi con Livewire

Livewire è utilizzato per creare componenti interattivi senza scrivere JavaScript complesso. I componenti principali includono:

- **MarketsList**: Per visualizzare e filtrare i mercati disponibili
- **MarketCard**: Per visualizzare le informazioni di un singolo mercato
- **TradingInterface**: Per l'interfaccia di trading e scommesse
- **CommentForm** e **CommentList**: Per la gestione dei commenti

Esempio di componente Livewire:

```php
// Modules/Predict/Http/Livewire/MarketCard.php
namespace Modules\Predict\Http\Livewire;

use Livewire\Component;
use App\Models\Market;

class MarketCard extends Component
{
    public Market $market;
    
    public function render()
    {
        return view('predict::livewire.market-card', [
            'market' => $this->market,
        ]);
    }
}
```

Utilizzo del componente nel template:

```html
<livewire:predict::market-card :market="$market" :key="$market->id" />
```

## Struttura del Tema

Il tema principale (TwentyOne) è strutturato come segue:

```
Themes/TwentyOne/
├── Http/
│   └── Livewire/        # Componenti Livewire specifici del tema
├── resources/
│   ├── css/             # Stili CSS e Tailwind
│   ├── js/              # Script JavaScript
│   ├── images/          # Immagini e asset grafici
│   └── views/           # Template Blade
│       ├── components/  # Componenti riutilizzabili
│       ├── layouts/     # Layout principali
│       ├── livewire/    # Template per componenti Livewire
│       └── pages/       # Pagine specifiche
├── vite.config.js       # Configurazione Vite per gli asset
└── theme.json          # Metadati del tema
```

## Layout Base

Il layout base dell'applicazione include:

- Metatag e configurazioni SEO
- Inclusione degli asset CSS e JavaScript tramite Vite
- Struttura principale con header, contenuto principale e footer
- Integrazione con sistemi di analisi del traffico

```html
<!-- resources/views/layouts/app.blade.php (esempio semplificato) -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('title')</title>
    
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col">
        @include('layouts.partials.header')
        
        <main class="flex-grow container mx-auto px-4 py-8">
            @yield('content')
        </main>
        
        @include('layouts.partials.footer')
    </div>
    
    @vite(['resources/js/app.js'])
    @livewireScripts
</body>
</html>
```

## Principi di Design dell'Interfaccia Utente

L'interfaccia utente del frontoffice segue questi principi:

1. **Semplicità**: Riduzione della complessità, presentando solo le informazioni essenziali
2. **Coerenza**: Pattern di design uniformi in tutta l'applicazione
3. **Feedback**: Risposte immediate per ogni azione dell'utente
4. **Accessibilità**: Conformità WCAG 2.1 e design responsivo

## Gestione degli Asset

Gli asset frontend sono gestiti tramite Vite, con configurazione in `vite.config.js`. Gli asset principali includono:

- **CSS**: Compilato da Tailwind CSS
- **JavaScript**: Gestito tramite moduli ES6
- **Immagini e altri asset**: Serviti dalla directory pubblica

## Integrazione con il Backend

Il frontoffice si integra con il backend attraverso:

1. **Livewire**: Per le interazioni in tempo reale
2. **API REST**: Per le chiamate asincrone
3. **Eventi**: Per la comunicazione in tempo reale

## Best Practices

- Utilizzare i componenti Livewire per funzionalità interattive
- Organizzare i componenti in namespace appropriati
- Utilizzare il lazy loading per componenti pesanti
- Combinare Folio e Volt per creare pagine dinamiche con stato
- Scrivere test per tutti i componenti