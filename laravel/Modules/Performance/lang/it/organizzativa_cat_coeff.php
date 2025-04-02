<?php

return array (
  'navigation' => 
  array (
    'name' => 'Coefficiente Categoria',
    'plural' => 'Coefficienti Categoria',
    'group' => 
    array (
      'name' => 'Valutazione',
      'description' => 'Gestione dei coefficienti per categoria',
    ),
    'label' => 'coefficienti',
    'sort' => 28,
    'icon' => 'performance-coefficient',
  ),
  'fields' => 
  array (
    'name' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome del coefficiente',
    ),
    'categoria' => 
    array (
      'label' => 'Categoria',
      'placeholder' => 'Seleziona la categoria',
      'help' => 'Categoria di appartenenza',
    ),
    'coefficiente' => 
    array (
      'label' => 'Coefficiente',
      'placeholder' => 'Inserisci il coefficiente',
      'help' => 'Valore del coefficiente',
    ),
    'guard_name' => 
    array (
      'label' => 'Sistema di Protezione',
      'placeholder' => 'Seleziona il sistema',
      'help' => 'Sistema di autenticazione utilizzato',
    ),
    'permissions' => 
    array (
      'label' => 'Autorizzazioni',
      'placeholder' => 'Seleziona le autorizzazioni',
      'help' => 'Autorizzazioni associate al coefficiente',
    ),
    'updated_at' => 
    array (
      'label' => 'Ultimo aggiornamento',
      'help' => 'Data e ora dell'ultima modifica',
    ),
    'first_name' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome del responsabile',
    ),
    'last_name' => 
    array (
      'label' => 'Cognome',
      'placeholder' => 'Inserisci il cognome',
      'help' => 'Cognome del responsabile',
    ),
    'select_all' => 
    array (
      'label' => 'Seleziona Tutto',
      'message' => 'Seleziona tutti gli elementi disponibili',
    ),
    'toggleColumns' => 
    array (
      'label' => 'toggleColumns',
    ),
  ),
  'actions' => 
  array (
    'create' => 
    array (
      'label' => 'Nuovo Coefficiente',
      'success' => 'Coefficiente creato con successo',
    ),
    'edit' => 
    array (
      'label' => 'Modifica',
      'success' => 'Coefficiente aggiornato con successo',
    ),
    'delete' => 
    array (
      'label' => 'Elimina',
      'success' => 'Coefficiente eliminato con successo',
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
      'filename_prefix' => 'Coefficienti_Categoria_',
      'columns' => 
      array (
        'name' => 
        array (
          'label' => 'Nome Coefficiente',
          'help' => 'Nome del coefficiente',
        ),
        'parent_name' => 
        array (
          'label' => 'Categoria',
          'help' => 'Categoria di appartenenza',
        ),
      ),
    ),
  ),
  'messages' => 
  array (
    'validation' => 
    array (
      'coefficiente' => 
      array (
        'required' => 'Il coefficiente è obbligatorio',
        'numeric' => 'Il coefficiente deve essere numerico',
        'min' => 'Il coefficiente deve essere maggiore di zero',
      ),
      'categoria' => 
      array (
        'required' => 'La categoria è obbligatoria',
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
      'success' => 'Coefficiente salvato con successo',
      'error' => 'Errore durante il salvataggio',
    ),
    'delete' => 
    array (
      'success' => 'Coefficiente eliminato con successo',
      'error' => 'Errore durante l\'eliminazione',
    ),
  ),
  'model' => 
  array (
    'label' => 'organizzativa cat coeff.model',
  ),
);
