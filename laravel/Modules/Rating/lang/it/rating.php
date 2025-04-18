<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Rating',
        'plural' => 'Ratings',
    ],
    'navigation' => [
        'name' => 'Rating',
        'plural' => 'Ratings',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'help' => 'Identificativo univoco del rating',
        ],
        'title' => [
            'label' => 'Titolo',
            'help' => 'Titolo del rating',
        ],
        'description' => [
            'label' => 'Descrizione',
            'help' => 'Descrizione dettagliata',
        ],
        'rating' => [
            'label' => 'Valutazione',
            'help' => 'Valore numerico della valutazione',
        ],
        'color' => [
            'label' => 'Colore',
            'help' => 'Colore associato al rating',
        ],
        'is_enabled' => [
            'label' => 'Attivo',
            'help' => 'Indica se il rating è attivo',
        ],
        'is_disabled' => [
            'label' => 'Disabilitato',
            'help' => 'Indica se il rating è disabilitato',
        ],
        'is_readonly' => [
            'label' => 'Sola lettura',
            'help' => 'Indica se il rating è in sola lettura',
        ],
        'view' => [
            'label' => 'Vista',
            'help' => 'Template di visualizzazione',
        ],
    ],
    'actions' => [
        'enable' => [
            'label' => 'Attiva',
            'help' => 'Attiva il rating',
        ],
        'disable' => [
            'label' => 'Disattiva',
            'help' => 'Disattiva il rating',
        ],
        'import' => [
            'label' => 'Importa',
            'help' => 'Importa ratings da file',
            'row_number' => 'Riga :row',
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'label' => 'Esporta',
            'help' => 'Esporta ratings in file',
            'filename_prefix' => 'Lista ratings al',
        ],
    ],
    'messages' => [
        'created' => 'Rating creato con successo',
        'updated' => 'Rating aggiornato con successo',
        'deleted' => 'Rating eliminato con successo',
        'enabled' => 'Rating attivato con successo',
        'disabled' => 'Rating disattivato con successo',
    ],
    'exceptions' => [
        'mandatory_data' => '{1} Dato obbligatorio non presente|{2} 2 Dati obbligatori non presenti|{3} 3 Dati obbligatori non presenti|[4,*] Vari dati obbligatori non presenti',
    ],
];
