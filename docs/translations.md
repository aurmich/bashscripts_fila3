# Traduzioni

## Sintassi Array

Per le traduzioni, utilizzare sempre la sintassi breve degli array PHP:

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
