<<<<<<< HEAD
# Traduzioni

## Sintassi Array

Per le traduzioni, utilizzare **sempre** la sintassi breve degli array PHP:

```php
// ✅ CORRETTO - Short array syntax
return [
    'navigation' => [
        'name' => 'Nome',
        'group' => [
            'name' => 'Gruppo',
            'description' => 'Descrizione'
        ]
    ]
];

// ❌ ERRATO - Long array syntax
return array(
    'navigation' => array(
        'name' => 'Nome',
        'group' => array(
            'name' => 'Gruppo',
            'description' => 'Descrizione'
        )
    )
);
```

## Gruppi di Menu

### Schede
Il gruppo "Schede" contiene tutte le schede di valutazione del sistema:

- **Schede Dipendenti** (`individuale_dip.php`)
  - Gestione delle schede di valutazione dei dipendenti
  - Icona: `performance-employee-document`
  - Ordinamento: 31

- **Schede PO** (`individuale_po.php`)
  - Gestione delle schede di valutazione delle Posizioni Organizzative
  - Icona: `performance-po-document`
  - Ordinamento: 32

- **Schede Regionali** (`individuale_regionale.php`)
  - Gestione delle schede di valutazione regionali
  - Icona: `performance-region-document`
  - Ordinamento: 33

## Regole per le Icone SVG

1. **Posizione dei file SVG**:
   - I file SVG devono essere posizionati nella cartella `resources/svg` del modulo corrispondente
   - Esempio: `/laravel/Modules/Performance/resources/svg/`

2. **Convenzione di denominazione**:
   - Nome del file: `nome-icona.svg` (tutto in minuscolo)
   - Riferimento nel file di traduzione: `modulo-nome-icona`
   - Esempio: Se il modulo è "Performance" e il file è `region-document.svg`, il riferimento sarà `performance-region-document`

3. **Struttura del file SVG**:
   - Deve essere un SVG valido con viewBox="0 0 24 24"
   - Utilizzare `currentColor` per il colore del tracciato
   - Mantenere una larghezza e altezza di 24px
   - Includere l'header XML

4. **Best Practices**:
   - Utilizzare tracciati semplici e chiari
   - Mantenere la coerenza con lo stile delle altre icone
   - Testare l'icona in diverse dimensioni
   - Verificare la leggibilità in chiaro e scuro

### Campi Comuni
Tutte le schede condividono i seguenti campi comuni:

```php
'fields' => [
    'periodo' => [
        'label' => 'Periodo',
        'placeholder' => 'Seleziona il periodo',
        'help' => 'Periodo di valutazione'
    ],
    'risultati_ottenuti' => [
        'label' => 'Risultati Ottenuti',
        'placeholder' => 'Valuta i risultati',
        'help' => 'Valutazione dei risultati raggiunti'
    ],
    'qualita_prestazione' => [
        'label' => 'Qualità della Prestazione',
        'placeholder' => 'Valuta la qualità',
        'help' => 'Valutazione della qualità del lavoro'
    ],
    'arricchimento_professionale' => [
        'label' => 'Arricchimento Professionale',
        'placeholder' => 'Valuta l\'arricchimento',
        'help' => 'Valutazione della crescita professionale'
    ],
    'impegno' => [
        'label' => 'Impegno',
        'placeholder' => 'Valuta l\'impegno',
        'help' => 'Valutazione dell\'impegno profuso'
    ],
    'esperienza_acquisita' => [
        'label' => 'Esperienza Acquisita',
        'placeholder' => 'Valuta l\'esperienza',
        'help' => 'Valutazione dell\'esperienza maturata'
    ],
    'ha_diritto' => [
        'label' => 'Ha Diritto',
        'placeholder' => 'Indica se ha diritto alla valutazione',
        'help' => 'Stato del diritto alla valutazione'
    ],
    'motivo' => [
        'label' => 'Motivo',
        'placeholder' => 'Specifica il motivo',
        'help' => 'Motivazione della valutazione'
    ],
    'mail_sended_at' => [
        'label' => 'Data Invio Mail',
        'placeholder' => 'Data di invio della mail',
        'help' => 'Data in cui è stata inviata la mail di notifica'
    ]
]
```

### Azioni
Tutte le schede condividono le seguenti azioni:

```php
'actions' => [
    'copy_from_organizzativa' => [
        'label' => 'Copia da Organizzativa',
        'help' => 'Copia i dati dalla scheda organizzativa'
    ]
]
```

### Messaggi
Tutte le schede condividono i seguenti messaggi di sistema:

<<<<<<< HEAD
- Successo:
  - `created`: Scheda creata con successo
  - `updated`: Scheda aggiornata con successo
  - `deleted`: Scheda eliminata con successo

- Errori:
  - `created`: Errore durante la creazione della scheda
  - `updated`: Errore durante l'aggiornamento della scheda
  - `deleted`: Errore durante l'eliminazione della scheda

## Sintassi Array

Per le traduzioni, utilizzare sempre la sintassi breve degli array PHP:

<<<<<<< HEAD
```php
// ✅ CORRETTO - Short array syntax
return [
    'fields' => [
        'nome' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome'
        ]
    ]
];

// ❌ ERRATO - Long array syntax
return array(
    'fields' => array(
        'nome' => array(
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome'
        )
    )
);
```

## Struttura delle Traduzioni

Le traduzioni devono seguire questa struttura:

```php
return [
    'fields' => [
        // Campi del form
        'field_name' => [
            'label' => 'Etichetta Campo',
            'placeholder' => 'Placeholder Campo',
            'help' => 'Testo di aiuto'
        ]
    ],
    'actions' => [
        // Azioni (bottoni, link, etc)
        'create' => 'Crea',
        'edit' => 'Modifica',
        'delete' => 'Elimina'
    ],
    'messages' => [
        // Messaggi di sistema
        'success' => 'Operazione completata con successo',
        'error' => 'Si è verificato un errore'
    ]
];
```

## Icone di Navigazione

Le icone di navigazione devono:
1. Essere file SVG nella cartella `resources/svg/`
2. Avere un nome descrittivo in inglese
3. Essere referenziate nel file di traduzione senza l'estensione .svg

Esempio:
```php
// In filament.php
return [
    'navigation' => [
        'group' => [
            'label' => 'Gruppo',
            'icon' => 'nome-icona' // riferimento a resources/svg/nome-icona.svg
        ]
    ]
];
```
=======
# Sistema di Traduzioni

## Struttura

### File di Traduzione
```
resources/lang/
├── it/
│   ├── broker.php
│   ├── ui.php
│   └── validation.php
└── en/
    ├── broker.php
    ├── ui.php
    └── validation.php
```

### Formato File
```php
return [
    'resources' => [
        'polizza_convenzione' => [
            'label' => 'Polizza in Convenzione',
            'plural_label' => 'Polizze in Convenzione',
            'navigation' => [
                'group' => 'Portafoglio',
                'icon' => 'heroicon-o-document-text',
                'sort' => 1,
            ],
            'columns' => [
                'numero_adesione' => 'Numero Adesione',
                'cliente' => 'Cliente',
                // ...
            ],
            'filters' => [
                'stato_pratica' => 'Stato Pratica',
                'convenzione' => 'Convenzione',
                // ...
            ],
            'actions' => [
                'create' => 'Nuova Polizza',
                'edit' => 'Modifica',
                'view' => 'Visualizza',
                // ...
            ],
        ],
    ],
];
```

## Utilizzo

### In Filament Resources
```php
// NON utilizzare ->label()
TextColumn::make('numero_adesione')
TextColumn::make('cliente.nominativo')
SelectFilter::make('stato_pratica_id')
```

### In Blade Views
```blade
@lang('broker.resources.polizza_convenzione.label')
{{ __('broker.resources.polizza_convenzione.columns.numero_adesione') }}
```

### In PHP
```php
trans('broker.resources.polizza_convenzione.label')
__('broker.resources.polizza_convenzione.columns.numero_adesione')
```

## Best Practices

### 1. Struttura Chiavi
- Utilizzare nomi descrittivi
- Mantenere una gerarchia logica
- Evitare duplicazioni
- Usare snake_case per le chiavi

### 2. Organizzazione File
- Un file per modulo
- Separare le traduzioni per contesto
- Mantenere coerenza tra lingue
- Documentare struttura complessa

### 3. Gestione Traduzioni
- Non cancellare traduzioni esistenti
- Aggiungere nuove traduzioni in modo incrementale
- Mantenere le traduzioni aggiornate
- Verificare completezza traduzioni

### 4. Performance
- Utilizzare cache delle traduzioni
- Caricare solo le traduzioni necessarie
- Evitare traduzioni dinamiche
- Ottimizzare file di grandi dimensioni

## LangService

### Caratteristiche
- Caricamento automatico traduzioni
- Fallback su lingua predefinita
- Cache delle traduzioni
- Supporto per più lingue

### Configurazione
```php
// config/xot.php
return [
    'translations' => [
        'default_locale' => 'it',
        'fallback_locale' => 'en',
        'cache_translations' => true,
        'cache_key' => 'translations',
        'cache_duration' => 3600,
    ],
];
```

### Metodi Principali
```php
// Carica tutte le traduzioni per una lingua
LangService::loadTranslations(string $locale): array

// Ottiene una traduzione con fallback
LangService::get(string $key, array $replace = []): string

// Verifica esistenza traduzione
LangService::has(string $key): bool

// Aggiunge traduzioni runtime
LangService::add(string $key, string $value): void
```

## Esempi Comuni

### Resource
```php
// Definizione traduzioni
'resources' => [
    'polizza_convenzione' => [
        'label' => 'Polizza in Convenzione',
        'columns' => [
            'numero_adesione' => 'Numero Adesione',
        ],
    ],
],

// Utilizzo in Resource
TextColumn::make('numero_adesione')
```

### Form
```php
// Definizione traduzioni
'forms' => [
    'cliente' => [
        'fields' => [
            'nome' => 'Nome',
            'cognome' => 'Cognome',
        ],
    ],
],

// Utilizzo in Form
TextInput::make('nome')
TextInput::make('cognome')
```

### Actions
```php
// Definizione traduzioni
'actions' => [
    'save' => 'Salva',
    'cancel' => 'Annulla',
    'delete' => [
        'label' => 'Elimina',
        'confirm' => 'Sei sicuro?',
    ],
],

// Utilizzo in Actions
Action::make('save')
Action::make('delete')
``` 
>>>>>>> 59bc4fe7 (first)
=======
```
>>>>>>> c658c7a3 (.)
=======
```php
'messages' => [
    'success' => [
        'created' => 'Scheda creata con successo',
        'updated' => 'Scheda aggiornata con successo',
        'deleted' => 'Scheda eliminata con successo'
    ],
    'error' => [
        'created' => 'Errore durante la creazione della scheda',
        'updated' => 'Errore durante l\'aggiornamento della scheda',
        'deleted' => 'Errore durante l\'eliminazione della scheda'
    ]
]
```
>>>>>>> 7c8293d8 (.)
