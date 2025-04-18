# File di Traduzione Rating

## Panoramica
File di traduzione italiano per il modulo Rating, contenente tutte le stringhe localizzate utilizzate nell'interfaccia utente.

## Struttura
Il file è organizzato nelle seguenti sezioni principali:

### Resource
```php
'resource' => [
    'name' => ['label' => 'Rating'],
]
```
Definisce il nome della risorsa principale.

### Navigation
```php
'navigation' => [
    'name' => ['label' => 'Rating'],
    'plural' => ['label' => 'Rating'],
    'group' => [
        'name' => ['label' => 'Admin'],
    ],
]
```
Contiene le etichette per la navigazione.

### Fields
Traduzioni per tutti i campi del modulo:
- Informazioni generali (nome, descrizione, ecc.)
- Dettagli tecnici (marca, modello, numero di serie)
- Stati e flag (attivo, disabilitato, sola lettura)
- Metadati (template, valutazioni)

### Actions
Traduzioni per le azioni disponibili:
- Attivazione/Disattivazione
- Importazione/Esportazione
- Gestione dati

### Widgets
Traduzioni per i widget dell'interfaccia.

### Exceptions
Messaggi di errore e validazione localizzati.

## Best Practices
1. Mantenere una struttura gerarchica chiara
2. Utilizzare chiavi coerenti
3. Fornire traduzioni complete per ogni stringa
4. Includere placeholder per valori dinamici
5. Gestire correttamente il plurale

## Collegamenti
- [Documentazione Modulo Rating](/docs/modules/module_rating.md)
- [Gestione Traduzioni](/docs/translations.md)
- [Configurazione i18n](/docs/i18n.md)

[Torna alla documentazione principale](/docs/README.md) 