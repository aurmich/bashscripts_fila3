<?php

return array (
  'navigation' => 
  array (
    'name' => 'Opzioni Criteri',
    'plural' => 'Opzioni Criteri',
    'group' => 
    array (
      'name' => 'Criteri',
      'description' => 'Gestione delle opzioni dei criteri',
    ),
    'label' => 'Opzioni Criteri',
    'sort' => 60,
    'icon' => 'performance-option-outline',
  ),
  'fields' => 
  array (
    'name' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome dell\'opzione',
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
      'help' => 'Data di ultimo aggiornamento',
    ),
    'first_name' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome dell\'utente',
    ),
    'last_name' => 
    array (
      'label' => 'Cognome',
      'placeholder' => 'Inserisci il cognome',
      'help' => 'Cognome dell\'utente',
    ),
    'select_all' => 
    array (
      'label' => 'Seleziona Tutti',
      'help' => 'Seleziona tutte le opzioni',
    ),
    'valore' => 
    array (
      'label' => 'Valore',
      'placeholder' => 'Inserisci il valore',
      'help' => 'Valore dell\'opzione',
    ),
    'descrizione' => 
    array (
      'label' => 'Descrizione',
      'placeholder' => 'Inserisci la descrizione',
      'help' => 'Descrizione dettagliata dell\'opzione',
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
    'toggleColumns' => 
    array (
      'label' => 'toggleColumns',
    ),
    'reorderRecords' => 
    array (
      'label' => 'reorderRecords',
    ),
    'resetFilters' => 
    array (
      'label' => 'resetFilters',
    ),
    'openFilters' => 
    array (
      'label' => 'openFilters',
    ),
    'value' => 
    array (
      'label' => 'value',
    ),
    'created_at' => 
    array (
      'label' => 'created_at',
    ),
    'delete' => 
    array (
      'label' => 'delete',
    ),
    'edit' => 
    array (
      'label' => 'edit',
    ),
    'view' => 
    array (
      'label' => 'view',
    ),
    'create' => 
    array (
      'label' => 'create',
    ),
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
        'import_file' => 
        array (
          'label' => 'File da importare',
          'placeholder' => 'Seleziona un file XLS o CSV',
          'help' => 'Seleziona il file da importare (formati supportati: XLS, CSV)',
        ),
      ),
    ),
    'export' => 
    array (
      'filename_prefix' => 'Criteri_Opzioni_',
      'columns' => 
      array (
        'name' => 
        array (
          'label' => 'Nome',
          'help' => 'Nome dell\'opzione',
        ),
        'valore' => 
        array (
          'label' => 'Valore',
          'help' => 'Valore dell\'opzione',
        ),
      ),
    ),
    'create' => 
    array (
      'label' => 'create',
    ),
  ),
  'model' => 
  array (
    'label' => 'criteri option.model',
  ),
);
