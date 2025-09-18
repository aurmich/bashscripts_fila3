<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Performance Amministrativa',
        'plural' => 'Performance Amministrative',
        'group' => [
            'name' => 'Admin',
            'description' => 'Gestione delle performance amministrative',
        ],
        'label' => 'Performance Amministrativa',
        'sort' => 55,
        'icon' => 'performance-individuale-outline',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Nome della performance amministrativa',
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
            'help' => 'Nome del dipendente',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'placeholder' => 'Inserisci il cognome',
            'help' => 'Cognome del dipendente',
        ],
        'select_all' => [
            'label' => 'Seleziona Tutti',
            'help' => '',
        ],
    ],
    'actions' => [
        'import' => [
            'fields' => [
                'import_file' => [
                    'label' => 'Seleziona un file XLS o CSV da caricare',
                    'placeholder' => '',
                    'help' => '',
                ],
            ],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => [
                    'label' => 'Nome area',
                    'help' => '',
                ],
                'parent_name' => [
                    'label' => 'Nome area livello superiore',
                    'help' => '',
                ],
            ],
        ],
    ],
];