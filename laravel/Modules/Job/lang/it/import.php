<?php

return [
    'pages' => 'Pagine',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Import',
        'plural' => 'Imports',
        'group' => [
            'name' => 'Import/Export',
            'description' => 'Gestione delle importazioni dati'
        ],
        'label' => 'import'
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
        'processed_rows' => 'Righe Processate',
        'failed_rows' => 'Righe Fallite',
        'created_at' => 'Creato il',
        'updated_at' => 'Aggiornato il',
        'completed_at' => 'Completato il',
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
            'label' => 'Importa',
            'modal' => [
                'heading' => 'Importa Dati',
                'description' => 'Seleziona un file da importare'
            ],
            'messages' => [
                'success' => 'Importazione avviata con successo'
            ],
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare'
            ]
        ],
        'retry' => [
            'label' => 'Riprova',
            'modal' => [
                'heading' => 'Riprova Importazione',
                'description' => 'Vuoi riprovare l\'importazione delle righe fallite?'
            ],
            'messages' => [
                'success' => 'Importazione riprovata con successo'
            ]
        ],
        'delete' => [
            'label' => 'Elimina',
            'modal' => [
                'heading' => 'Elimina Import',
                'description' => 'Sei sicuro di voler eliminare questa importazione?'
            ],
            'messages' => [
                'success' => 'Import eliminato con successo'
            ]
        ],
        'download_errors' => [
            'label' => 'Scarica Errori',
            'modal' => [
                'heading' => 'Scarica Log Errori',
                'description' => 'Vuoi scaricare il log degli errori di importazione?'
            ],
            'messages' => [
                'success' => 'Log errori scaricato con successo'
            ]
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
    'messages' => [
        'no_imports' => 'Nessuna importazione presente',
        'import_started' => 'Importazione avviata',
        'import_completed' => 'Importazione completata',
        'import_failed' => 'Importazione fallita',
        'file_not_found' => 'File non trovato',
        'invalid_format' => 'Formato non valido',
        'row_error' => 'Errore alla riga :row: :message'
    ],
    'statuses' => [
        'pending' => 'In Attesa',
        'processing' => 'In Elaborazione',
        'completed' => 'Completato',
        'failed' => 'Fallito',
        'partial' => 'Completato Parzialmente'
    ],
    'types' => [
        'csv' => 'CSV',
        'excel' => 'Excel',
        'json' => 'JSON',
        'xml' => 'XML'
    ],
    'formats' => [
        'standard' => 'Standard',
        'extended' => 'Esteso',
        'minimal' => 'Minimo',
        'custom' => 'Personalizzato'
    ]
];
