<?php

<<<<<<< HEAD
declare(strict_types=1);

return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2df6fbc8 (first)
    // 📄 Sezioni principali
    'pages' => 'Pagine',
    'widgets' => 'Widget',

    // 🧭 Navigazione
    'navigation' => [
        'name' => 'Rating Pivot',
        'plural' => 'Rating Pivot',
        'group' => [
            'name' => 'Gestione Rating',
        ],
        'label' => 'Rating Morph',
    ],

    // 🏷️ Campi
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help_text' => 'Nome univoco dell\'elemento',
        ],
        'guard_name' => [
            'label' => 'Guard',
            'placeholder' => 'Seleziona la guardia',
            'help_text' => 'Definisce il contesto di sicurezza',
        ],
        'permissions' => [
            'label' => 'Permessi',
            'placeholder' => 'Seleziona i permessi',
            'help_text' => 'Permessi associati all\'elemento',
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'help_text' => 'Data e ora dell\'ultimo aggiornamento',
        ],
        'first_name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'placeholder' => 'Inserisci il cognome',
        ],
        'select_all' => [
            'label' => 'Seleziona Tutti',
            'message' => 'Seleziona tutti gli elementi disponibili',
        ],
    ],

    // 🎯 Azioni
    'actions' => [
        // 📥 Importazione
        'import' => [
            'label' => 'Importa',
            'description' => 'Carica un file per importare dati',
            'fields' => [
                'import_file' => [
                    'label' => 'File da importare',
                    'placeholder' => 'Seleziona un file XLS o CSV',
                    'help_text' => 'Deve essere un file valido in formato CSV o Excel',
                ],
            ],
            'messages' => [
                'success' => 'Importazione completata con successo',
                'error' => 'Errore durante l\'importazione',
            ],
        ],

        // 📤 Esportazione
        'export' => [
            'label' => 'Esporta',
            'description' => 'Esporta i dati in un file',
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => [
                    'label' => 'Nome area',
                ],
                'parent_name' => [
                    'label' => 'Nome area livello superiore',
                ],
            ],
            'messages' => [
                'success' => 'Esportazione completata con successo',
                'error' => 'Errore durante l\'esportazione',
            ],
        ],

        // 🗑️ Eliminazione
        'delete' => [
            'label' => 'Elimina',
            'confirmation' => 'Sei sicuro di voler eliminare questo elemento?',
            'messages' => [
                'success' => 'Elemento eliminato con successo',
                'error' => 'Errore durante l\'eliminazione',
            ],
        ],

        // ✏️ Modifica
        'edit' => [
            'label' => 'Modifica',
            'description' => 'Modifica i dettagli dell\'elemento',
            'messages' => [
                'success' => 'Modifica salvata con successo',
                'error' => 'Errore durante il salvataggio',
            ],
        ],

        // ➕ Creazione
        'create' => [
            'label' => 'Crea',
            'description' => 'Aggiungi un nuovo elemento',
            'messages' => [
                'success' => 'Elemento creato con successo',
                'error' => 'Errore durante la creazione',
<<<<<<< HEAD
=======
=======
return [
>>>>>>> bc2abf99 (.)
    'pages' => 'Pagine',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Rating pivot',
        'plural' => 'Rating pivot',
        'group' => [
            'name' => '',
        ],
        'label' => 'rating morph.navigation',
    ],
    'fields' => [
        'name' => 'Nome',
        'guard_name' => 'Guard',
        'permissions' => 'Permessi',
        'updated_at' => 'Aggiornato il',
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'select_all' => [
            'name' => 'Seleziona Tutti',
            'message' => '',
        ],
    ],
    'actions' => [
        'import' => [
<<<<<<< HEAD
=======
    'resource' => [
        'name' => 'Rating Morph',
    ],
    'navigation' => [
        'name' => 'Rating Morph',
        'plural' => 'Rating Morph',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'fields' => [
        'brand' => 'Marca',
        'model' => 'Modello',
        'description' => 'Descrizione',
        'serial_number' => 'Numero di serie',
        'inventory_number' => 'Codice inventario',
        'code' => 'Identificativo',
        'manufacturing_year' => 'Anno di fabbricazione',
        'purchase_year' => 'Anno di acquisto',
        'is_enabled' => 'È attivo?',
        'asset_type' => 'Tipologia',
        'area' => 'Area',
        'parent' => 'Asset genitore',
        'name' => 'Nome',
    ],
    'actions' => [
        'enable' => [
            'cta' => 'Attiva',
        ],
        'disable' => [
            'cta' => 'Dismetti',
        ],
        'import' => [
            'row_number' => 'Riga :row',
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bc2abf99 (.)
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
<<<<<<< HEAD
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
>>>>>>> 2df6fbc8 (first)
            ],
        ],
    ],
=======
            'filename_prefix' => 'Lista asset al',
            'columns' => [
                'brand' => 'Marca',
                'model' => 'Modello',
                'description' => 'Descrizione',
                'serial_number' => 'Numero di serie',
                'inventory_number' => 'Codice inventario',
                'code' => 'Identificativo',
                'manufacturing_year' => 'Anno di fabbricazione',
                'purchase_year' => 'Anno di acquisto',
                'is_enabled' => 'È attivo?',
                'asset_type' => 'Tipologia',
                'parent_inventory_number' => 'Codice inventario genitore',
            ],
        ],
    ],
    'widgets' => [
        'child_assets' => 'Asset figli',
    ],
    'exceptions' => [
        'mandatory_data' => '{1} Dato obbligatorio non presente|{2} 2 Dati obbligatori non presenti|{3} 3 Dati obbligatori non presenti|[4,*] Vari dati obbligatori non presenti',
    ],
>>>>>>> e0005d7d (first)
=======
            ],
        ],
    ],
>>>>>>> bc2abf99 (.)
];
