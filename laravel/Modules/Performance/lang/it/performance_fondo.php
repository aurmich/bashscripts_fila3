<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Fondo Performance',
        'plural' => 'Fondi Performance',
        'group' => [
            'name' => 'Valutazione & KPI',
            'description' => 'Gestione dei fondi performance',
        ],
        'label' => 'Fondo Performance',
        'sort' => 54,
        'icon' => 'performance-fund-outline',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Nome del fondo performance',
        ],
        'importo' => [
            'label' => 'Importo',
            'placeholder' => 'Inserisci l\'importo',
            'help' => 'Importo del fondo',
        ],
        'anno' => [
            'label' => 'Anno',
            'placeholder' => 'Seleziona l\'anno',
            'help' => 'Anno di riferimento',
        ],
        'guard_name' => [
            'label' => 'Sistema di Protezione',
            'placeholder' => 'Seleziona il sistema',
            'help' => 'Sistema di autenticazione utilizzato',
        ],
        'permissions' => [
            'label' => 'Permessi',
            'placeholder' => 'Seleziona i permessi',
            'help' => 'Permessi associati al fondo',
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'help' => 'Data e ora dell\'ultima modifica',
        ],
        'first_name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Nome del responsabile',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'placeholder' => 'Inserisci il cognome',
            'help' => 'Cognome del responsabile',
        ],
        'select_all' => [
            'label' => 'Seleziona Tutto',
            'message' => 'Seleziona tutti gli elementi disponibili',
        ],
        'stato' => [
            'label' => 'Stato',
            'placeholder' => 'Seleziona lo stato',
            'help' => 'Stato attuale del fondo',
            'options' => [
                'attivo' => 'Attivo',
                'chiuso' => 'Chiuso',
                'in_revisione' => 'In Revisione',
            ],
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Nuovo Fondo',
            'success' => 'Fondo creato con successo',
        ],
        'edit' => [
            'label' => 'Modifica',
            'success' => 'Fondo aggiornato con successo',
        ],
        'delete' => [
            'label' => 'Elimina',
            'success' => 'Fondo eliminato con successo',
        ],
        'import' => [
            'label' => 'Importa',
            'fields' => [
                'import_file' => [
                    'label' => 'File da importare',
                    'placeholder' => 'Seleziona un file XLS o CSV',
                    'help' => 'Formati supportati: XLS, XLSX, CSV',
                ],
            ],
        ],
        'export' => [
            'label' => 'Esporta',
            'filename_prefix' => 'Fondi_Performance_',
            'columns' => [
                'name' => [
                    'label' => 'Nome Fondo',
                    'help' => 'Nome del fondo performance',
                ],
                'parent_name' => [
                    'label' => 'Area',
                    'help' => 'Area di appartenenza',
                ],
            ],
        ],
    ],
    'messages' => [
        'validation' => [
            'importo' => [
                'required' => 'L\'importo è obbligatorio',
                'numeric' => 'L\'importo deve essere numerico',
                'min' => 'L\'importo deve essere maggiore di zero',
            ],
            'anno' => [
                'required' => 'L\'anno è obbligatorio',
                'numeric' => 'L\'anno deve essere numerico',
            ],
        ],
        'import' => [
            'success' => 'Importazione completata con successo',
            'error' => 'Errore durante l\'importazione',
        ],
        'export' => [
            'success' => 'Esportazione completata con successo',
            'error' => 'Errore durante l\'esportazione',
        ],
        'save' => [
            'success' => 'Fondo salvato con successo',
            'error' => 'Errore durante il salvataggio',
        ],
        'delete' => [
            'success' => 'Fondo eliminato con successo',
            'error' => 'Errore durante l\'eliminazione',
        ],
    ],
];
