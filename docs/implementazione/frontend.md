# Documentazione Frontend/Frontoffice

## Introduzione

Questo documento descrive l'architettura e l'implementazione del frontend/frontoffice del progetto Predict. Il frontend è basato su un sistema di temi Laravel personalizzato, con il tema principale attualmente in uso denominato "TwentyOne".

## Architettura Generale

Il frontend del progetto è strutturato secondo un'architettura basata su temi, dove:

1. **Temi**: La cartella `/Themes` contiene i diversi temi disponibili per il frontend (One, Sixteen, TwentyOne)
2. **Configurazione**: La configurazione del tema attivo è gestita tramite il parametro `pub_theme` nei file di configurazione in `/config/`
3. **Tecnologie**: Il frontend utilizza principalmente:
   - Livewire per componenti interattivi
   - Alpine.js per interazioni JavaScript leggere
   - Tailwind CSS per lo styling
   - Vite per la gestione degli asset

## Struttura del Tema Principale (TwentyOne)

Il tema TwentyOne è attualmente configurato come tema principale per il frontend ed è strutturato come segue:

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

## Componenti Principali

### Layout Base

Il layout base dell'applicazione è definito in `resources/views/components/layouts/app.blade.php` e include:

- Metatag e configurazioni SEO
- Inclusione degli asset CSS e JavaScript tramite Vite
- Struttura principale con header, contenuto principale e footer
- Integrazione con Matomo per l'analisi del traffico

### Sistema di Routing con Laravel Folio

Il routing del frontend è gestito attraverso:

1. **Route dinamiche**: Configurabili tramite il parametro `disable_frontend_dynamic_route` in `config/xra.php`
2. **Folio Pages**: Utilizzate per pagine statiche e dinamiche in `resources/views/pages/`

Laravel Folio è un sistema di routing basato su file che permette di creare pagine senza definire esplicitamente le rotte. Le caratteristiche principali includono:

- **Routing basato su file**: Le pagine in `resources/views/pages/` diventano automaticamente rotte accessibili
- **Parametri dinamici**: Supporto per parametri nelle URL tramite la sintassi `[param].blade.php`
- **Middleware**: Configurabile a livello di pagina tramite la funzione `middleware()`
- **Naming delle rotte**: Possibilità di assegnare nomi alle rotte tramite la funzione `name()`

La configurazione di Folio è gestita principalmente in `app/Providers/FolioServiceProvider.php` e in `Modules/Cms/app/Providers/CmsServiceProvider.php`, dove vengono registrate le directory contenenti le pagine Folio e configurati i middleware.

### Componenti UI

I componenti UI principali includono:

- **Header/Navigation**: Gestito in `resources/views/layouts/headernav.blade.php`
- **Footer**: Implementato in `resources/views/layouts/footer.blade.php`
- **Componenti riutilizzabili**: Bottoni, badge, input, modali, ecc. in `resources/views/components/ui/`

## Gestione degli Asset

Gli asset frontend sono gestiti tramite Vite, con configurazione in `vite.config.js`. Gli asset principali includono:

- **CSS**: Compilato da Tailwind CSS
- **JavaScript**: Gestito tramite moduli ES6
- **Immagini e altri asset**: Serviti dalla directory pubblica

La configurazione Vite specifica:

```javascript
export default defineConfig({
	build: {
		outDir: "./resources/dist",
		emptyOutDir: false,
        manifest: 'manifest.json',
		rollupOptions: {
			output: {
				entryFileNames: `assets/[name].js`,
				chunkFileNames: `assets/[name].js`,
				assetFileNames: `assets/[name].[ext]`,
			},
		},
	},
	plugins: [
		laravel({
			publicDirectory: "../../../public_html/",
			input: [__dirname + "/resources/css/app.css", __dirname + "/resources/js/app.js"],
			refresh: [...refreshPaths, "app/Livewire/**"],
		}),
	],
});
```

## Interazione con il Backend

Il frontend interagisce con il backend principalmente attraverso:

1. **Componenti Livewire**: Per funzionalità dinamiche e interattive
2. **API REST**: Per operazioni asincrone e caricamento dati
3. **View Composers**: Per iniettare dati nelle viste

## Temi Alternativi

Oltre al tema principale TwentyOne, il progetto include altri temi che possono essere attivati modificando la configurazione:

1. **One**: Un tema più semplice e minimalista
2. **Sixteen**: Un tema alternativo con design diverso

## Configurazione

La configurazione del frontend è gestita principalmente attraverso i file di configurazione in `/config/`, in particolare:

```php
// config/local/predict/xra.php
return [
    // ...
    'pub_theme' => 'TwentyOne',
    'disable_frontend_dynamic_route' => false,
    'register_pub_theme' => true,
    // ...
];
```

## Best Practices

1. **Componenti Riutilizzabili**: Creare componenti UI riutilizzabili in `resources/views/components/`
2. **Responsive Design**: Assicurarsi che tutte le pagine siano responsive e funzionino su dispositivi mobili
3. **Accessibilità**: Seguire le linee guida WCAG per l'accessibilità
4. **Performance**: Ottimizzare gli asset e minimizzare le richieste HTTP

## Conclusioni

Il frontend del progetto è implementato utilizzando un sistema di temi Laravel personalizzato, con il tema TwentyOne come tema principale. L'architettura è modulare e flessibile, permettendo di cambiare facilmente tema e personalizzare l'aspetto dell'applicazione senza modificare la logica di business.