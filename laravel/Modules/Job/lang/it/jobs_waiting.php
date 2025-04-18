<?php

return [
    'pages' => 'Pagine',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Jobs in Attesa',
        'plural' => 'Jobs in Attesa',
        'group' => [
            'name' => 'Jobs',
            'description' => 'Gestione dei jobs in attesa di esecuzione'
        ],
        'label' => 'jobs in attesa'
    ],
    'fields' => [
        'id' => 'ID',
        'queue' => 'Coda',
        'payload' => 'Payload',
        'attempts' => 'Tentativi',
        'reserved_at' => 'Riservato il',
        'available_at' => 'Disponibile il',
        'created_at' => 'Creato il',
        'status' => 'Stato',
        'priority' => 'Priorità',
        'type' => 'Tipo',
        'name' => 'Nome',
        'description' => 'Descrizione',
        'delay' => 'Ritardo',
        'timeout' => 'Timeout',
        'tags' => 'Tags',
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
        'process' => [
            'label' => 'Processa',
            'modal' => [
                'heading' => 'Processa Job',
                'description' => 'Vuoi processare questo job in attesa?'
            ],
            'messages' => [
                'success' => 'Job processato con successo'
            ]
        ],
        'cancel' => [
            'label' => 'Cancella',
            'modal' => [
                'heading' => 'Cancella Job',
                'description' => 'Vuoi cancellare questo job in attesa?'
            ],
            'messages' => [
                'success' => 'Job cancellato con successo'
            ]
        ],
        'retry' => [
            'label' => 'Riprova',
            'modal' => [
                'heading' => 'Riprova Job',
                'description' => 'Vuoi riprovare questo job?'
            ],
            'messages' => [
                'success' => 'Job riprovato con successo'
            ]
        ]
    ],
    'messages' => [
        'no_jobs' => 'Nessun job in attesa',
        'job_processed' => 'Job processato',
        'job_cancelled' => 'Job cancellato',
        'job_retried' => 'Job riprovato'
    ],
    'statuses' => [
        'waiting' => 'In Attesa',
        'reserved' => 'Riservato',
        'delayed' => 'Ritardato',
        'ready' => 'Pronto'
    ],
    'priorities' => [
        'low' => 'Bassa',
        'normal' => 'Normale',
        'high' => 'Alta',
        'urgent' => 'Urgente'
    ],
    'types' => [
        'default' => 'Default',
        'scheduled' => 'Schedulato',
        'recurring' => 'Ricorrente',
        'batch' => 'Batch'
    ]
];
