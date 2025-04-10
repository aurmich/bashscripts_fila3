<?php

return array (
  'navigation' => 
  array (
    'name' => 'Performance Amministrativa',
    'plural' => 'Performance Amministrative',
    'group' => 
    array (
      'name' => 'Admin',
      'description' => 'Gestione delle performance amministrative',
    ),
    'label' => 'Performance Amministrativa',
    'sort' => 55,
    'icon' => 'performance-individuale-outline',
  ),
  'fields' => 
  array (
    'anno' => 
    array (
      'label' => 'Anno di Riferimento',
      'placeholder' => 'Seleziona l\'anno di riferimento',
      'help' => 'Anno di riferimento per la valutazione',
    ),
    'matr' => 
    array (
      'label' => 'Matricola',
      'placeholder' => 'Inserisci la matricola',
      'help' => 'Matricola del dipendente',
    ),
    'cognome' => 
    array (
      'label' => 'Cognome',
      'placeholder' => 'Inserisci il cognome',
      'help' => 'Cognome del dipendente',
    ),
    'nome' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome del dipendente',
    ),
    'email' => 
    array (
      'label' => 'Email',
      'placeholder' => 'Inserisci l\'email',
      'help' => 'Indirizzo email del dipendente',
    ),
    'stabi_txt' => 
    array (
      'label' => 'Valutazione Stabilità',
      'placeholder' => 'Inserisci la valutazione sulla stabilità',
      'help' => 'Valutazione complessiva della stabilità del dipendente',
    ),
    'repar_txt' => 
    array (
      'label' => 'Reparto',
      'placeholder' => 'Inserisci il testo sul reparto',
      'help' => 'Valutazione del reparto',
    ),
    'disci_txt' => 
    array (
      'label' => 'Disciplina',
      'placeholder' => 'Inserisci il testo sulla disciplina',
      'help' => 'Valutazione della disciplina',
    ),
    'categoria_eco' => 
    array (
      'label' => 'Categoria Economica',
      'placeholder' => 'Seleziona la categoria economica',
      'help' => 'Categoria economica di appartenenza',
    ),
    'name' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome della performance amministrativa',
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
      'help' => 'Seleziona tutti gli elementi',
    ),
    'applyFilters' => 
    array (
      'label' => 'Applica Filtri',
      'help' => 'Applica i filtri selezionati',
    ),
    'toggleColumns' => 
    array (
      'label' => 'Mostra/Nascondi Colonne',
      'help' => 'Gestisci la visibilità delle colonne',
    ),
    'reorderRecords' => 
    array (
      'label' => 'Riordina Record',
      'help' => 'Modifica l\'ordine dei record',
    ),
    'resetFilters' => 
    array (
      'label' => 'Resetta Filtri',
      'help' => 'Ripristina i filtri predefiniti',
    ),
    'openFilters' => 
    array (
      'label' => 'Apri Filtri',
      'help' => 'Apri il pannello dei filtri',
    ),
    'value' => 
    array (
      'label' => 'value',
    ),
    'totale_punteggio' => 
    array (
      'label' => 'totale_punteggio',
    ),
    'created_at' => 
    array (
      'label' => 'created_at',
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
  ),
  'actions' => 
  array (
    'import' => 
    array (
      'fields' => 
      array (
        'import_file' => 
        array (
          'label' => 'Seleziona un file XLS o CSV da caricare',
          'placeholder' => '',
          'help' => '',
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
          'label' => 'Nome',
        ),
      ),
    ),
    'create' => 
    array (
      'label' => 'create',
    ),
  ),
  'messages' => 
  array (
    'created' => 'Performance amministrativa creata con successo',
    'updated' => 'Performance amministrativa aggiornata con successo',
    'deleted' => 'Performance amministrativa eliminata con successo',
  ),
  'validation' => 
  array (
    'anno_required' => 'L\'anno è obbligatorio',
    'stabi_txt_required' => 'Il campo stabilità è obbligatorio',
    'repar_txt_required' => 'Il campo reparto è obbligatorio',
    'disci_txt_required' => 'Il campo disciplina è obbligatorio',
    'categoria_eco_required' => 'La categoria economica è obbligatoria',
  ),
  'model' => 
  array (
    'label' => 'Performance Amministrativa',
  ),
);
