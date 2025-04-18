<?php

return [
    'pages' => 'Pagine',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Job Manager',
        'plural' => 'Job Managers',
        'group' => [
            'name' => 'Jobs',
            'description' => 'Gestione avanzata dei processi'
        ],
        'label' => 'job manager'
    ],
    'fields' => [
        'id' => 'ID',
        'name' => 'Nome',
        'description' => 'Descrizione',
        'status' => 'Stato',
        'type' => 'Tipo',
        'priority' => 'Priorità',
        'max_attempts' => 'Tentativi Massimi',
        'timeout' => 'Timeout',
        'created_at' => 'Creato il',
        'updated_at' => 'Aggiornato il',
        'last_run' => 'Ultima Esecuzione',
        'next_run' => 'Prossima Esecuzione',
        'cron_expression' => 'Espressione Cron',
        'output' => 'Output',
        'error' => 'Errore',
        'guard_name' => 'Guard',
        'permissions' => 'Permessi',
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'select_all' => [
            'name' => 'Seleziona Tutti',
            'message' => '',
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
        'run' => [
            'label' => 'Esegui',
            'modal' => [
                'heading' => 'Esegui Job Manager',
                'description' => 'Vuoi eseguire questo job manager?'
            ],
            'messages' => [
                'success' => 'Job manager avviato con successo'
            ]
        ],
        'pause' => [
            'label' => 'Pausa',
            'modal' => [
                'heading' => 'Metti in Pausa',
                'description' => 'Vuoi mettere in pausa questo job manager?'
            ],
            'messages' => [
                'success' => 'Job manager messo in pausa con successo'
            ]
        ],
        'resume' => [
            'label' => 'Riprendi',
            'modal' => [
                'heading' => 'Riprendi Esecuzione',
                'description' => 'Vuoi riprendere l\'esecuzione di questo job manager?'
            ],
            'messages' => [
                'success' => 'Job manager ripreso con successo'
            ]
        ],
        'delete' => [
            'label' => 'Elimina',
            'modal' => [
                'heading' => 'Elimina Job Manager',
                'description' => 'Sei sicuro di voler eliminare questo job manager?'
            ],
            'messages' => [
                'success' => 'Job manager eliminato con successo'
            ]
        ]
    ],
    'messages' => [
        'no_jobs' => 'Nessun job manager presente',
        'manager_started' => 'Job manager avviato',
        'manager_paused' => 'Job manager in pausa',
        'manager_resumed' => 'Job manager ripreso',
        'manager_completed' => 'Job manager completato',
        'manager_failed' => 'Job manager fallito'
    ],
    'statuses' => [
        'active' => 'Attivo',
        'paused' => 'In Pausa',
        'completed' => 'Completato',
        'failed' => 'Fallito'
    ],
    'types' => [
        'scheduler' => 'Schedulatore',
        'queue' => 'Coda',
        'worker' => 'Worker',
        'monitor' => 'Monitor'
    ],
    'priorities' => [
        'low' => 'Bassa',
        'normal' => 'Normale',
        'high' => 'Alta',
        'urgent' => 'Urgente'
    ]
];
