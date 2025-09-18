<?php return array (
  'navigation' => 
  array (
    'name' => 'individuale',
    'plural' => 'individuale',
    'group' => 
    array (
      'name' => 'Admin',
    ),
  ),
  'fields' => 
  array (
    'name' => 'Nome',
    'guard_name' => 'Guard',
    'permissions' => 'Permessi',
    'updated_at' => 'Aggiornato il',
    'first_name' => 'Nome',
    'last_name' => 'Cognome',
    'select_all' => 
    array (
      'name' => 'Seleziona Tutti',
      'message' => '',
    ),
    'risultati_ottenuti' => 'Conseguimento degli obiettivi',
    'qualita_prestazione' => 'Monitoraggio delle attività afferenti i processi',
    'arricchimento_professionale' => 'Attuazione di strategie di miglioramento del "clima lavorativo"',
    'impegno' => 'Organizzazione della programmazione delle attività',
    'esperienza_acquisita' => 'Focalizzazione dei processi di comunicazione sulla condivisione dei risultati',
    'anno' => 
    array (
      'label' => 'anno',
    ),
  ),
  'actions' => 
  array (
    'import' => 
    array (
      'fields' => 
      array (
        'import_file' => 'Seleziona un file XLS o CSV da caricare',
      ),
    ),
    'export' => 
    array (
      'filename_prefix' => 'Aree al',
      'columns' => 
      array (
        'name' => 'Nome area',
        'parent_name' => 'Nome area livello superiore',
      ),
    ),
  ),
);