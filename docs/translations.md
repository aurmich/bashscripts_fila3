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

## Modulo User

### Struttura Base
Il modulo User utilizza la seguente struttura per le traduzioni:

```php
return [
    'navigation' => [
        'name' => 'Utenti',
        'plural' => 'Utenti',
        'group' => [
            'name' => 'Gestione Utenti',
            'description' => 'Gestione degli utenti e dei loro permessi'
        ],
        'label' => 'Utenti',
        'sort' => 26,
        'icon' => 'user-main'
    ],
    'fields' => [
        // Campi del modulo
    ],
    'actions' => [
        // Azioni disponibili
    ],
    'messages' => [
        // Messaggi di sistema
    ],
    'validation' => [
        // Messaggi di validazione
    ],
    'permissions' => [
        // Permessi
    ],
    'model' => [
        'label' => 'Utente'
    ]
];
```

### Campi Principali
I campi principali del modulo User includono:

- **Campi di Identità**:
  - `id`: Identificativo univoco
  - `name`: Nome utente
  - `email`: Indirizzo email
  - `email_verified_at`: Data di verifica email

- **Campi di Sicurezza**:
  - `password`: Password
  - `password_confirmation`: Conferma password
  - `current_password`: Password attuale
  - `password_expires_at`: Scadenza password

- **Campi di Stato**:
  - `status`: Stato dell'utente (Attivo/Inattivo/Bloccato)
  - `verified`: Stato di verifica
  - `last_login`: Ultimo accesso

### Azioni Disponibili
Le azioni principali includono:
- Creazione utente
- Modifica utente
- Eliminazione utente
- Impersonificazione
- Blocco/Sblocco
- Invio link reset password
- Verifica email

### Messaggi di Sistema
I messaggi di sistema includono notifiche per:
- Creazione/Modifica/Eliminazione utente
- Blocco/Sblocco utente
- Invio link reset password
- Verifica email
- Impersonificazione

### Validazione
Le regole di validazione includono:
- Unicità email
- Lunghezza minima password
- Conferma password
- Verifica password attuale

### Permessi
I permessi principali includono:
- Visualizzazione utenti
- Creazione utenti
- Modifica utenti
- Eliminazione utenti
- Impersonificazione utenti
- Gestione ruoli