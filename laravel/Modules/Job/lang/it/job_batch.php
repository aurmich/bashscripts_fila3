<?php 
return array (
  'pages' => 'Pagine',
  'widgets' => 'Widgets',
  'navigation' => 
  array (
    'name' => 'Job Batch',
    'plural' => 'Job Batches',
    'group' => 
    array (
      'name' => 'Jobs',
      'description' => 'Gestione dei processi in background'
    ),
    'label' => 'job batch',
  ),
  'fields' => 
  array (
    'id' => 'ID',
    'name' => 'Nome',
    'total_jobs' => 'Jobs Totali',
    'pending_jobs' => 'Jobs in Attesa',
    'failed_jobs' => 'Jobs Falliti',
    'failed_job_ids' => 'ID Jobs Falliti',
    'options' => 'Opzioni',
    'created_at' => 'Creato il',
    'cancelled_at' => 'Cancellato il',
    'finished_at' => 'Terminato il',
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
    'retry' => 
    array (
      'label' => 'Riprova',
      'modal' => 
      array (
        'heading' => 'Riprova Jobs Falliti',
        'description' => 'Vuoi riprovare ad eseguire i jobs falliti?'
      ),
      'messages' => 
      array (
        'success' => 'Jobs riavviati con successo'
      )
    ),
    'cancel' => 
    array (
      'label' => 'Cancella',
      'modal' => 
      array (
        'heading' => 'Cancella Batch',
        'description' => 'Sei sicuro di voler cancellare questo batch?'
      ),
      'messages' => 
      array (
        'success' => 'Batch cancellato con successo'
      )
    )
  ),
  'messages' => 
  array (
    'no_failed_jobs' => 'Nessun job fallito',
    'batch_cancelled' => 'Batch cancellato',
    'batch_finished' => 'Batch completato',
    'batch_processing' => 'Batch in elaborazione'
  )
);
