<?php return array (
  'pages' => 'Pagine',
  'widgets' => 'Widgets',
  'navigation' => 
  array (
    'name' => 'Import',
    'plural' => 'Imports',
    'group' => 
    array (
      'name' => 'Import/Export',
      'description' => 'Gestione delle importazioni dati',
    ),
    'label' => 'import',
    'sort' => 54,
    'icon' => 'import.navigation',
  ),
  'fields' => 
  array (
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
    'select_all' => 
    array (
      'name' => 'Seleziona Tutti',
      'message' => '',
    ),
  ),
  'actions' => 
  array (
    'import' => 
    array (
      'label' => 'Importa',
      'modal' => 
      array (
        'heading' => 'Importa Dati',
        'description' => 'Seleziona un file da importare',
      ),
      'messages' => 
      array (
        'success' => 'Importazione avviata con successo',
      ),
      'fields' => 
      array (
        'import_file' => 'Seleziona un file XLS o CSV da caricare',
      ),
    ),
    'retry' => 
    array (
      'label' => 'Riprova',
      'modal' => 
      array (
        'heading' => 'Riprova Importazione',
        'description' => 'Vuoi riprovare l\'importazione delle righe fallite?',
      ),
      'messages' => 
      array (
        'success' => 'Importazione riprovata con successo',
      ),
    ),
    'delete' => 
    array (
      'label' => 'Elimina',
      'modal' => 
      array (
        'heading' => 'Elimina Import',
        'description' => 'Sei sicuro di voler eliminare questa importazione?',
      ),
      'messages' => 
      array (
        'success' => 'Import eliminato con successo',
      ),
    ),
    'download_errors' => 
    array (
      'label' => 'Scarica Errori',
      'modal' => 
      array (
        'heading' => 'Scarica Log Errori',
        'description' => 'Vuoi scaricare il log degli errori di importazione?',
      ),
      'messages' => 
      array (
        'success' => 'Log errori scaricato con successo',
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
  'messages' => 
  array (
    'no_imports' => 'Nessuna importazione presente',
    'import_started' => 'Importazione avviata',
    'import_completed' => 'Importazione completata',
    'import_failed' => 'Importazione fallita',
    'file_not_found' => 'File non trovato',
    'invalid_format' => 'Formato non valido',
    'row_error' => 'Errore alla riga :row: :message',
  ),
  'statuses' => 
  array (
    'pending' => 'In Attesa',
    'processing' => 'In Elaborazione',
    'completed' => 'Completato',
    'failed' => 'Fallito',
    'partial' => 'Completato Parzialmente',
  ),
  'types' => 
  array (
    'csv' => 'CSV',
    'excel' => 'Excel',
    'json' => 'JSON',
    'xml' => 'XML',
  ),
  'formats' => 
  array (
    'standard' => 'Standard',
    'extended' => 'Esteso',
    'minimal' => 'Minimo',
    'custom' => 'Personalizzato',
  ),
);