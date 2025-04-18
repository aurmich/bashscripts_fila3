<?php

return [
    'pages' => 'Pagine',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Export',
        'plural' => 'Exports',
        'group' => [
            'name' => 'Import/Export',
            'description' => 'Gestione delle esportazioni dati'
        ],
        'label' => 'export'
    ],
    'fields' => [
        'id' => 'ID',
        'name' => 'Nome',
        'description' => 'Descrizione',
        'type' => 'Tipo',
        'format' => 'Formato',
        'status' => 'Stato',
        'file_name' => 'Nome File',
        'file_path' => 'Percorso File',
        'file_size' => 'Dimensione File',
        'rows_count' => 'Numero Righe',
        'created_at' => 'Creato il',
        'updated_at' => 'Aggiornato il',
        'completed_at' => 'Completato il',
        'downloaded_at' => 'Scaricato il',
        'error' => 'Errore',
        'options' => 'Opzioni',
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
            'label' => 'Esporta',
            'modal' => [
                'heading' => 'Esporta Dati',
                'description' => 'Seleziona le opzioni per l\'esportazione'
            ],
            'messages' => [
                'success' => 'Esportazione avviata con successo'
            ],
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
        'download' => [
            'label' => 'Scarica',
            'modal' => [
                'heading' => 'Scarica File',
                'description' => 'Vuoi scaricare il file esportato?'
            ],
            'messages' => [
                'success' => 'File scaricato con successo'
            ]
        ],
        'delete' => [
            'label' => 'Elimina',
            'modal' => [
                'heading' => 'Elimina Export',
                'description' => 'Sei sicuro di voler eliminare questa esportazione?'
            ],
            'messages' => [
                'success' => 'Export eliminato con successo'
            ]
        ]
    ],
    'messages' => [
        'no_exports' => 'Nessuna esportazione presente',
        'export_started' => 'Esportazione avviata',
        'export_completed' => 'Esportazione completata',
        'export_failed' => 'Esportazione fallita',
        'file_not_found' => 'File non trovato',
        'invalid_format' => 'Formato non valido'
    ],
    'statuses' => [
        'pending' => 'In Attesa',
        'processing' => 'In Elaborazione',
        'completed' => 'Completato',
        'failed' => 'Fallito',
        'downloaded' => 'Scaricato'
    ],
    'types' => [
        'csv' => 'CSV',
        'excel' => 'Excel',
        'json' => 'JSON',
        'pdf' => 'PDF',
        'xml' => 'XML'
    ],
    'formats' => [
        'standard' => 'Standard',
        'extended' => 'Esteso',
        'minimal' => 'Minimo',
        'custom' => 'Personalizzato'
    ]
];
