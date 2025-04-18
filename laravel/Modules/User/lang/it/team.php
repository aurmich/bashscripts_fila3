<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Team',
        'plural' => 'Teams',
        'group' => [
            'name' => 'Admin',
        ],
        'label' => 'team',
        'sort' => 97,
    ],
    'fields' => [
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'detach' => [
            'label' => 'detach',
        ],
    ],
    'actions' => [
        'import' => [
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
        'create' => [
            'label' => 'create',
        ],
    ],
];
