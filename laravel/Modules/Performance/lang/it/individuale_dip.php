<?php

return array (
  'navigation' => 
  array (
    'name' => 'Schede Dipendenti',
    'plural' => 'Schede Dipendenti',
    'group' => 
    array (
      'name' => 'Schede',
      'description' => 'Gestione delle schede di valutazione dei dipendenti',
    ),
    'label' => 'Schede Dipendenti',
    'sort' => 31,
    'icon' => 'employee-document',
  ),
  'fields' => 
  array (
    'dipendente' => 
    array (
      'label' => 'Dipendente',
      'placeholder' => 'Seleziona il dipendente',
      'help' => 'Dipendente da valutare',
    ),
    'matricola' => 
    array (
      'label' => 'Matricola',
      'placeholder' => 'Inserisci la matricola',
      'help' => 'Numero di matricola del dipendente',
    ),
    'periodo' => 
    array (
      'label' => 'Periodo',
      'placeholder' => 'Seleziona il periodo',
      'help' => 'Periodo di valutazione',
      'options' => 
      array (
        'mensile' => 'Mensile',
        'trimestrale' => 'Trimestrale',
        'semestrale' => 'Semestrale',
        'annuale' => 'Annuale',
      ),
    ),
    'risultati_ottenuti' => 
    array (
      'label' => 'Risultati Ottenuti',
      'placeholder' => 'Valuta i risultati',
      'help' => 'Valutazione dei risultati raggiunti',
      'scale' => 
      array (
        1 => 'Insufficiente',
        2 => 'Sufficiente',
        3 => 'Buono',
        4 => 'Ottimo',
        5 => 'Eccellente',
      ),
    ),
    'qualita_prestazione' => 
    array (
      'label' => 'Qualità della Prestazione',
      'placeholder' => 'Valuta la qualità',
      'help' => 'Valutazione della qualità del lavoro',
    ),
    'arricchimento_professionale' => 
    array (
      'label' => 'Crescita Professionale',
      'placeholder' => 'Valuta la crescita',
      'help' => 'Valutazione dello sviluppo professionale',
    ),
    'impegno' => 
    array (
      'label' => 'Impegno',
      'placeholder' => 'Valuta l\'impegno',
      'help' => 'Valutazione dell\'impegno dimostrato',
    ),
    'note' => 
    array (
      'label' => 'Note',
      'placeholder' => 'Inserisci eventuali note',
      'help' => 'Note aggiuntive sulla valutazione',
    ),
    'toggleColumns' => 
    array (
      'label' => 'toggleColumns',
    ),
    'reorderRecords' => 
    array (
      'label' => 'reorderRecords',
    ),
    'ha_diritto' => 
    array (
      'label' => 'ha_diritto',
    ),
    'motivo' => 
    array (
      'label' => 'motivo',
    ),
    'mail_sended_at' => 
    array (
      'label' => 'mail_sended_at',
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
    'disci1' => 
    array (
      'label' => 'disci1',
    ),
    'disci1_txt' => 
    array (
      'label' => 'disci1_txt',
    ),
    'stabi' => 
    array (
      'label' => 'stabi',
    ),
    'stabi_txt' => 
    array (
      'label' => 'stabi_txt',
    ),
    'repar' => 
    array (
      'label' => 'repar',
    ),
    'repar_txt' => 
    array (
      'label' => 'repar_txt',
    ),
    'dal' => 
    array (
      'label' => 'dal',
    ),
    'al' => 
    array (
      'label' => 'al',
    ),
    'anno' => 
    array (
      'label' => 'anno',
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
    'openFilters' => 
    array (
      'label' => 'openFilters',
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
    'resetFilters' => 
    array (
      'label' => 'resetFilters',
    ),
  ),
  'actions' => 
  array (
    'evaluate' => 
    array (
      'label' => 'Valuta',
      'success' => 'Valutazione completata con successo',
    ),
    'approve' => 
    array (
      'label' => 'Approva',
      'success' => 'Valutazione approvata con successo',
    ),
    'reject' => 
    array (
      'label' => 'Rifiuta',
      'success' => 'Valutazione rifiutata',
    ),
    'create' => 
    array (
      'label' => 'create',
    ),
    'copy_from_organizzativa' => 
    array (
      'label' => 'copy_from_organizzativa',
    ),
  ),
  'messages' => 
  array (
    'validation' => 
    array (
      'required' => 'Campo obbligatorio',
      'numeric' => 'Il valore deve essere numerico',
      'min' => 'Il valore minimo è :min',
      'max' => 'Il valore massimo è :max',
    ),
    'status' => 
    array (
      'draft' => 'Bozza',
      'pending' => 'In Attesa',
      'approved' => 'Approvata',
      'rejected' => 'Rifiutata',
    ),
  ),
);
