<?php

return array (
  'navigation' => 
  array (
    'name' => 'Performance Individuale',
    'plural' => 'Performance Individuali',
    'group' => 'Admin',
    'label' => 'Performance Individuale',
    'sort' => 37,
    'icon' => 'performance-individuale-outline',
  ),
  'fields' => 
  array (
    'ha_diritto' => 
    array (
      'label' => 'Ha Diritto',
      'placeholder' => 'Indica se ha diritto alla valutazione',
      'help' => 'Stato del diritto alla valutazione',
    ),
    'motivo' => 
    array (
      'label' => 'Motivo',
      'placeholder' => 'Specifica il motivo',
      'help' => 'Motivazione della valutazione',
    ),
    'mail_sended_at' => 
    array (
      'label' => 'Data Invio Mail',
      'placeholder' => 'Data di invio della mail',
      'help' => 'Data in cui è stata inviata la mail di notifica',
    ),
    'name' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome della performance individuale',
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
      'help' => 'Nome del dipendente',
    ),
    'last_name' => 
    array (
      'label' => 'Cognome',
      'placeholder' => 'Inserisci il cognome',
      'help' => 'Cognome del dipendente',
    ),
    'select_all' => 
    array (
      'label' => 'Seleziona Tutti',
      'message' => 'Seleziona tutti gli elementi',
    ),
    'risultati_ottenuti' => 
    array (
      'label' => 'Conseguimento degli obiettivi',
      'help' => 'Descrizione dei risultati ottenuti',
    ),
    'qualita_prestazione' => 
    array (
      'label' => 'Qualità della Prestazione',
      'help' => 'Valutazione della qualità della prestazione',
    ),
    'arricchimento_professionale' => 
    array (
      'label' => 'Arricchimento Professionale',
      'help' => 'Descrizione dell\'arricchimento professionale',
    ),
    'impegno' => 
    array (
      'label' => 'Impegno',
      'help' => 'Valutazione dell\'impegno',
    ),
    'esperienza_acquisita' => 
    array (
      'label' => 'Esperienza Acquisita',
      'help' => 'Descrizione dell\'esperienza acquisita',
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
    'resetFilters' => 
    array (
      'label' => 'resetFilters',
    ),
    'toggleColumns' => 
    array (
      'label' => 'toggleColumns',
    ),
    'reorderRecords' => 
    array (
      'label' => 'reorderRecords',
    ),
    'openFilters' => 
    array (
      'label' => 'openFilters',
    ),
    'value' => 
    array (
      'label' => 'value',
    ),
    'fill' => 
    array (
      'label' => 'fill',
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
    'al' => 
    array (
      'label' => 'al',
    ),
    'dal' => 
    array (
      'label' => 'dal',
    ),
    'repar_txt' => 
    array (
      'label' => 'repar_txt',
    ),
    'repar' => 
    array (
      'label' => 'repar',
    ),
    'stabi_txt' => 
    array (
      'label' => 'stabi_txt',
    ),
    'stabi' => 
    array (
      'label' => 'stabi',
    ),
    'disci1_txt' => 
    array (
      'label' => 'disci1_txt',
    ),
    'disci1' => 
    array (
      'label' => 'disci1',
    ),
    'cognome' => 
    array (
      'label' => 'cognome',
    ),
    'nome' => 
    array (
      'label' => 'nome',
    ),
    'matr' => 
    array (
      'label' => 'matr',
    ),
    'email' => 
    array (
      'label' => 'email',
    ),
    'totale_punteggio' => 
    array (
      'label' => 'totale_punteggio',
    ),
    'propro' => 
    array (
      'label' => 'propro',
    ),
    'posfun' => 
    array (
      'label' => 'posfun',
    ),
    'categoria_eco' => 
    array (
      'label' => 'categoria_eco',
    ),
    'categoria_ecoval' => 
    array (
      'label' => 'categoria_ecoval',
    ),
    'posfunval' => 
    array (
      'label' => 'posfunval',
    ),
    'posiz' => 
    array (
      'label' => 'posiz',
    ),
    'posiz_txt' => 
    array (
      'label' => 'posiz_txt',
    ),
  ),
  'actions' => 
  array (
    'copy_from_organizzativa' => 
    array (
      'label' => 'Copia da Organizzativa',
      'help' => 'Copia i dati dalla scheda organizzativa',
    ),
    'import' => 
    array (
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
      'filename_prefix' => 'Aree al',
      'columns' => 
      array (
        'name' => 
        array (
          'label' => 'Nome area',
          'help' => 'Nome dell\'area di performance',
        ),
        'parent_name' => 
        array (
          'label' => 'Area Superiore',
          'help' => 'Nome dell\'area di livello superiore',
        ),
      ),
    ),
  ),
  'messages' => 
  array (
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
      'success' => 'Performance individuale salvata con successo',
      'error' => 'Errore durante il salvataggio',
    ),
    'delete' => 
    array (
      'success' => 'Performance individuale eliminata con successo',
      'error' => 'Errore durante l\'eliminazione',
    ),
  ),
  'title' => 'individuale',
  'model' => 
  array (
    'label' => 'individuale.model',
  ),
);
