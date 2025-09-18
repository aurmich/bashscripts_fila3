<?php

return array (
  'navigation' => 
  array (
    'name' => 'Performance Dirigenziale',
    'plural' => 'Performance Dirigenziali',
    'group' => 
    array (
      'name' => 'Valutazione & KPI',
      'description' => 'Gestione delle performance dei dirigenti',
    ),
    'label' => 'Performance Dirigenziale',
    'sort' => 58,
    'icon' => 'performance-manager',
  ),
  'fields' => 
  array (
    'name' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome della performance dirigenziale',
    ),
    'dirigente' => 
    array (
      'label' => 'Dirigente',
      'placeholder' => 'Seleziona il dirigente',
      'help' => 'Dirigente di riferimento',
    ),
    'struttura' => 
    array (
      'label' => 'Struttura',
      'placeholder' => 'Seleziona la struttura',
      'help' => 'Struttura organizzativa',
    ),
    'anno' => 
    array (
      'label' => 'Anno',
      'placeholder' => 'Seleziona l\'anno',
      'help' => 'Anno di riferimento',
    ),
    'punteggio' => 
    array (
      'label' => 'Punteggio',
      'placeholder' => 'Inserisci il punteggio',
      'help' => 'Punteggio della performance',
    ),
    'guard_name' => 
    array (
      'label' => 'Sistema di Protezione',
      'placeholder' => 'Seleziona il sistema',
      'help' => 'Sistema di protezione utilizzato',
    ),
    'permissions' => 
    array (
      'label' => 'Permessi',
      'placeholder' => 'Seleziona i permessi',
      'help' => 'Permessi associati',
    ),
    'updated_at' => 
    array (
      'label' => 'Aggiornato il',
      'help' => 'Data ultimo aggiornamento',
    ),
    'first_name' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome del dirigente',
    ),
    'last_name' => 
    array (
      'label' => 'Cognome',
      'placeholder' => 'Inserisci il cognome',
      'help' => 'Cognome del dirigente',
    ),
    'select_all' => 
    array (
      'label' => 'Seleziona Tutto',
      'message' => 'Seleziona tutti gli elementi disponibili',
    ),
    'stabilimento' => 
    array (
      'label' => 'Stabilimento',
      'placeholder' => 'Seleziona lo stabilimento',
      'help' => 'Stabilimento di riferimento',
    ),
    'ruolo' => 
    array (
      'label' => 'Ruolo',
      'placeholder' => 'Seleziona il ruolo',
      'help' => 'Ruolo del dirigente nello stabilimento',
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
    'file' => 
    array (
      'label' => 'file',
    ),
    'header_row' => 
    array (
      'label' => 'header_row',
    ),
  ),
  'actions' => 
  array (
    'create' => 
    array (
      'label' => 'Nuovo Dirigente',
      'success' => 'Dirigente creato con successo',
    ),
    'edit' => 
    array (
      'label' => 'Modifica',
      'success' => 'Dirigente aggiornato con successo',
    ),
    'delete' => 
    array (
      'label' => 'Elimina',
      'success' => 'Dirigente eliminato con successo',
    ),
    'import' => 
    array (
      'label' => 'Importa',
      'fields' => 
      array (
        'import_file' => 
        array (
          'label' => 'File da importare',
          'placeholder' => 'Seleziona un file XLS o CSV',
          'help' => 'Formati supportati: XLS, XLSX, CSV',
        ),
      ),
    ),
    'export' => 
    array (
      'label' => 'Esporta',
      'filename_prefix' => 'Stabilimenti_Dirigenti_',
      'columns' => 
      array (
        'name' => 
        array (
          'label' => 'Nome Stabilimento',
          'help' => 'Nome dello stabilimento',
        ),
        'parent_name' => 
        array (
          'label' => 'Area',
          'help' => 'Area di appartenenza',
        ),
      ),
    ),
    'importXLS' => 
    array (
      'label' => 'importXLS',
    ),
  ),
  'messages' => 
  array (
    'validation' => 
    array (
      'stabilimento' => 
      array (
        'required' => 'Lo stabilimento è obbligatorio',
      ),
      'ruolo' => 
      array (
        'required' => 'Il ruolo è obbligatorio',
      ),
    ),
    'import' => 
    array (
      'success' => 'Importazione completata con successo',
      'error' => 'Errore durante l\'importazione',
    ),
    'export' => 
    array (
      'success' => 'Esportazione completata con successo',
      'error' => 'Errore durante l\'esportazione',
    ),
    'save' => 
    array (
      'success' => 'Dirigente salvato con successo',
      'error' => 'Errore durante il salvataggio',
    ),
    'delete' => 
    array (
      'success' => 'Dirigente eliminato con successo',
      'error' => 'Errore durante l\'eliminazione',
    ),
  ),
  'model' => 
  array (
    'label' => 'stabi dirigente.model',
  ),
);
