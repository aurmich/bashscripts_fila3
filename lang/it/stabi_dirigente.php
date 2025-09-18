<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<?php 
return array (
  'navigation' => 
  array (
    'label' => 'Valutatori',
    'group' => 'Admin',
    'icon' => 'heroicon-o-user-circle',
    'sort' => 15,
  ),
  'model' => 
  array (
    'label' => 'stabi dirigente.model',
  ),
  'fields' => 
  array (
    'file' => 
    array (
      'label' => 'file',
    ),
    'header_row' => 
    array (
      'label' => 'header_row',
    ),
    'quadrimestre' => 
    array (
      'label' => 'quadrimestre',
    ),
    'anno' => 
    array (
      'label' => 'anno',
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
    'id' => 
    array (
      'label' => 'id',
    ),
    'valutatore_id' => 
    array (
      'label' => 'valutatore_id',
    ),
    'stabi' => 
    array (
      'label' => 'stabi',
    ),
    'repar' => 
    array (
      'label' => 'repar',
    ),
    'nome_stabi' => 
    array (
      'label' => 'nome_stabi',
    ),
    'matr' => 
    array (
      'label' => 'matr',
    ),
    'nome_diri' => 
    array (
      'label' => 'nome_diri',
    ),
    'nome_diri_plus' => 
    array (
      'label' => 'nome_diri_plus',
    ),
    'email' => 
    array (
      'label' => 'email',
    ),
    'create' => 
    array (
      'label' => 'create',
    ),
    'view' => 
    array (
      'label' => 'view',
    ),
    'edit' => 
    array (
      'label' => 'edit',
    ),
    'delete' => 
    array (
      'label' => 'delete',
    ),
    'value' => 
    array (
      'label' => 'value',
    ),
    'openFilters' => 
    array (
      'label' => 'openFilters',
    ),
    'resetFilters' => 
    array (
      'label' => 'resetFilters',
    ),
    'reorderRecords' => 
    array (
      'label' => 'reorderRecords',
    ),
    'toggleColumns' => 
    array (
      'label' => 'toggleColumns',
    ),
  ),
  'actions' => 
  array (
    'importXLS' => 
    array (
      'label' => 'importXLS',
    ),
  ),
);
=======
=======
>>>>>>> bcab6efe (first)
=======
>>>>>>> 961ad402 (first)
<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
<<<<<<< HEAD
    'resource' => [
        'name' => 'Stabi diri',
    ],
    'navigation' => [
        'name' => 'Stabi diri',
        'plural' => 'Stabi diri',
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
        'id' => ['label' => 'ID'],
        'valutatore_id' => ['label' => 'Valutatore Id'],
        'stabi' => ['label' => 'Stabi'],
        'repar' => ['label' => 'Repar'],
        'anno' => ['label' => 'Anno'],
        'matr' => ['label' => 'Matricola'],
        'cognome' => ['label' => 'Cognome'],
        'nome' => ['label' => 'Nome'],
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
=======
    'navigation' => [
        'name' => 'stabi dirigente',
        'plural' => 'stabi dirigente',
        'group' => [
            'name' => 'Admin ',
        ],
    ],
    'fields' => [
        'name' => 'Nome',
        'parent' => 'Padre',
        'parent.name' => 'Padre',
        'parent_name' => 'Padre',
        'assets' => 'assets',
    ],
    'actions' => [
        'import' => [
            'name' => 'Importa da file',
>>>>>>> bcab6efe (first)
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
<<<<<<< HEAD
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
];
>>>>>>> e0005d7d (first)
=======
            'name' => 'Esporta dati',
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
    'tab' => [
        'index' => 'lista',
        'create' => 'aggiungi',
    ],
];
>>>>>>> bcab6efe (first)
=======
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
>>>>>>> 961ad402 (first)
