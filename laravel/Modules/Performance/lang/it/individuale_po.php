<?php

return array (
  'navigation' => 
  array (
    'name' => 'Schede PO',
    'plural' => 'Schede PO',
    'group' => 
    array (
      'name' => 'Schede',
      'description' => 'Gestione delle schede di valutazione delle Posizioni Organizzative',
    ),
    'label' => 'Schede PO',
    'sort' => 32,
    'icon' => 'performance-region-document',
  ),
  'fields' => 
  array (
    'posizione' => 
    array (
      'label' => 'Posizione Organizzativa',
      'placeholder' => 'Seleziona la PO',
      'help' => 'Posizione Organizzativa da valutare',
    ),
    'responsabile' => 
    array (
      'label' => 'Responsabile',
      'placeholder' => 'Seleziona il responsabile',
      'help' => 'Responsabile della posizione organizzativa',
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
      'label' => 'Conseguimento Obiettivi',
      'placeholder' => 'Valuta il conseguimento',
      'help' => 'Valutazione del conseguimento degli obiettivi',
    ),
    'qualita_prestazione' => 
    array (
      'label' => 'Monitoraggio Processi',
      'placeholder' => 'Valuta il monitoraggio',
      'help' => 'Valutazione del monitoraggio delle attività',
    ),
    'arricchimento_professionale' => 
    array (
      'label' => 'Clima Lavorativo',
      'placeholder' => 'Valuta il clima',
      'help' => 'Valutazione delle strategie di miglioramento del clima',
    ),
    'impegno' => 
    array (
      'label' => 'Programmazione Attività',
      'placeholder' => 'Valuta la programmazione',
      'help' => 'Valutazione dell\'organizzazione delle attività',
    ),
    'esperienza_acquisita' => 
    array (
      'label' => 'Comunicazione Risultati',
      'placeholder' => 'Valuta la comunicazione',
      'help' => 'Valutazione della condivisione dei risultati',
    ),
    'punteggio_totale' => 
    array (
      'label' => 'Punteggio Totale',
      'help' => 'Punteggio complessivo della valutazione',
    ),
    'updated_at' => 
    array (
      'label' => 'updated_at',
    ),
    'created_at' => 
    array (
      'label' => 'created_at',
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
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
    'fill' => 
    array (
      'label' => 'fill',
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
    'calculate' => 
    array (
      'label' => 'Calcola Punteggio',
      'success' => 'Punteggio calcolato con successo',
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
      'pending' => 'In Attesa di Approvazione',
      'approved' => 'Approvata',
      'rejected' => 'Rifiutata',
    ),
  ),
  'model' => 
  array (
    'label' => 'individuale po.model',
  ),
);
