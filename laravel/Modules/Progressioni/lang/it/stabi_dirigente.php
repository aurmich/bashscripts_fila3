<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Performance Dirigenziale',
        'plural' => 'Performance Dirigenziali',
        'group' => [
            'name' => 'Valutazione & KPI',
            'description' => 'Gestione delle performance dei dirigenti',
        ],
        'label' => 'Performance Dirigenziale',
        'sort' => 58,
        'icon' => 'performance-manager',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Nome della performance dirigenziale',
        ],
        'dirigente' => [
            'label' => 'Dirigente',
            'placeholder' => 'Seleziona il dirigente',
            'help' => 'Dirigente di riferimento',
        ],
        'struttura' => [
            'label' => 'Struttura',
            'placeholder' => 'Seleziona la struttura',
            'help' => 'Struttura organizzativa',
        ],
        'anno' => [
            'label' => 'Anno',
            'placeholder' => 'Seleziona l\'anno',
            'help' => 'Anno di riferimento',
        ],
        'punteggio' => [
            'label' => 'Punteggio',
            'placeholder' => 'Inserisci il punteggio',
            'help' => 'Punteggio della performance',
        ],
        'guard_name' => [
            'label' => 'Sistema di Protezione',
            'placeholder' => 'Seleziona il sistema',
            'help' => 'Sistema di protezione utilizzato',
        ],
        'permissions' => [
            'label' => 'Permessi',
            'placeholder' => 'Seleziona i permessi',
            'help' => 'Permessi associati',
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'help' => 'Data ultimo aggiornamento',
        ],
        'first_name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Nome del dirigente',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'placeholder' => 'Inserisci il cognome',
            'help' => 'Cognome del dirigente',
        ],
        'select_all' => [
            'label' => 'Seleziona Tutto',
            'message' => 'Seleziona tutti gli elementi disponibili',
        ],
        'stabilimento' => [
            'label' => 'Stabilimento',
            'placeholder' => 'Seleziona lo stabilimento',
            'help' => 'Stabilimento di riferimento',
        ],
        'ruolo' => [
            'label' => 'Ruolo',
            'placeholder' => 'Seleziona il ruolo',
            'help' => 'Ruolo del dirigente nello stabilimento',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Nuovo Dirigente',
            'success' => 'Dirigente creato con successo',
        ],
        'edit' => [
            'label' => 'Modifica',
            'success' => 'Dirigente aggiornato con successo',
        ],
        'delete' => [
            'label' => 'Elimina',
            'success' => 'Dirigente eliminato con successo',
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
            'filename_prefix' => 'Stabilimenti_Dirigenti_',
            'columns' => [
                'name' => [
                    'label' => 'Nome Stabilimento',
                    'help' => 'Nome dello stabilimento',
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
            'stabilimento' => [
                'required' => 'Lo stabilimento è obbligatorio',
            ],
            'ruolo' => [
                'required' => 'Il ruolo è obbligatorio',
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
            'success' => 'Dirigente salvato con successo',
            'error' => 'Errore durante il salvataggio',
        ],
        'delete' => [
            'success' => 'Dirigente eliminato con successo',
            'error' => 'Errore durante l\'eliminazione',
        ],
    ],
];
