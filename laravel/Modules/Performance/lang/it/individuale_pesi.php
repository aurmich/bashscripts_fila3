<?php

return array (
  'navigation' => 
  array (
    'name' => 'Peso Performance',
    'plural' => 'Pesi Performance',
    'group' => 
    array (
      'name' => 'Valutazione',
      'description' => 'Gestione dei pesi per il calcolo delle performance',
    ),
    'label' => 'pesi',
    'sort' => 96,
    'icon' => 'performance-weight',
  ),
  'fields' => 
  array (
    'categoria' => 
    array (
      'name' => 
      array (
        'label' => 'Nome Categoria',
        'placeholder' => 'Inserisci il nome della categoria',
        'help' => 'Nome identificativo della categoria di peso',
      ),
      'descrizione' => 
      array (
        'label' => 'Descrizione',
        'placeholder' => 'Inserisci la descrizione',
        'help' => 'Descrizione dettagliata della categoria',
      ),
      'tipo' => 
      array (
        'label' => 'Tipo Categoria',
        'placeholder' => 'Seleziona il tipo',
        'help' => 'Tipologia della categoria di peso',
        'options' => 
        array (
          'obiettivi' => 'Obiettivi',
          'competenze' => 'Competenze',
          'comportamenti' => 'Comportamenti',
          'risultati' => 'Risultati',
        ),
      ),
    ),
    'peso' => 
    array (
      'valore' => 
      array (
        'label' => 'Valore Peso',
        'placeholder' => 'Inserisci il valore (0-100)',
        'help' => 'Valore percentuale del peso',
      ),
      'minimo' => 
      array (
        'label' => 'Valore Minimo',
        'placeholder' => 'Inserisci il minimo',
        'help' => 'Valore minimo consentito',
      ),
      'massimo' => 
      array (
        'label' => 'Valore Massimo',
        'placeholder' => 'Inserisci il massimo',
        'help' => 'Valore massimo consentito',
      ),
    ),
    'applicazione' => 
    array (
      'livello' => 
      array (
        'label' => 'Livello',
        'placeholder' => 'Seleziona il livello',
        'help' => 'Livello di applicazione del peso',
        'options' => 
        array (
          'globale' => 'Globale',
          'regionale' => 'Regionale',
          'locale' => 'Locale',
        ),
      ),
      'periodo' => 
      array (
        'label' => 'Periodo',
        'placeholder' => 'Seleziona il periodo',
        'help' => 'Periodo di validità del peso',
      ),
      'stato' => 
      array (
        'label' => 'Stato',
        'help' => 'Stato attuale del peso',
        'options' => 
        array (
          'attivo' => 'Attivo',
          'inattivo' => 'Inattivo',
          'bozza' => 'Bozza',
        ),
      ),
    ),
    'timestamps' => 
    array (
      'created_at' => 
      array (
        'label' => 'Data Creazione',
        'help' => 'Data di creazione del peso',
      ),
      'updated_at' => 
      array (
        'label' => 'Ultimo Aggiornamento',
        'help' => 'Data dell\'ultima modifica',
      ),
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
    'toggleColumns' => 
    array (
      'label' => 'toggleColumns',
    ),
    'type' => 
    array (
      'label' => 'type',
    ),
    'lista_propro' => 
    array (
      'label' => 'lista_propro',
    ),
    'descr' => 
    array (
      'label' => 'descr',
    ),
    'peso_esperienza_acquisita' => 
    array (
      'label' => 'peso_esperienza_acquisita',
    ),
    'peso_risultati_ottenuti' => 
    array (
      'label' => 'peso_risultati_ottenuti',
    ),
    'peso_arricchimento_professionale' => 
    array (
      'label' => 'peso_arricchimento_professionale',
    ),
    'peso_impegno' => 
    array (
      'label' => 'peso_impegno',
    ),
    'peso_qualita_prestazione' => 
    array (
      'label' => 'peso_qualita_prestazione',
    ),
    'anno' => 
    array (
      'label' => 'anno',
    ),
    'created_at' => 
    array (
      'label' => 'created_at',
    ),
    'updated_at' => 
    array (
      'label' => 'updated_at',
    ),
    'created_by' => 
    array (
      'label' => 'created_by',
    ),
    'updated_by' => 
    array (
      'label' => 'updated_by',
    ),
    'pesi_non_zero' => 
    array (
      'label' => 'pesi_non_zero',
    ),
    'value' => 
    array (
      'label' => 'value',
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
    'isActive' => 
    array (
      'label' => 'isActive',
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
  ),
  'actions' => 
  array (
    'create' => 
    array (
      'label' => 'Nuovo Peso',
      'success' => 'Peso creato con successo',
      'error' => 'Errore durante la creazione del peso',
    ),
    'update' => 
    array (
      'label' => 'Modifica',
      'success' => 'Peso aggiornato con successo',
      'error' => 'Errore durante l\'aggiornamento',
    ),
    'delete' => 
    array (
      'label' => 'Elimina',
      'success' => 'Peso eliminato con successo',
      'error' => 'Errore durante l\'eliminazione',
      'confirm' => 'Sei sicuro di voler eliminare questo peso?',
    ),
    'distribute' => 
    array (
      'label' => 'Distribuisci',
      'success' => 'Pesi distribuiti con successo',
      'error' => 'Errore durante la distribuzione',
    ),
  ),
  'messages' => 
  array (
    'validation' => 
    array (
      'valore' => 
      array (
        'required' => 'Il valore è obbligatorio',
        'numeric' => 'Il valore deve essere numerico',
        'min' => 'Il valore deve essere almeno :min',
        'max' => 'Il valore non può superare :max',
      ),
      'categoria' => 
      array (
        'required' => 'La categoria è obbligatoria',
        'exists' => 'La categoria selezionata non esiste',
      ),
      'periodo' => 
      array (
        'required' => 'Il periodo è obbligatorio',
        'date' => 'Il periodo deve essere una data valida',
      ),
    ),
    'errors' => 
    array (
      'total_exceeded' => 'Il totale dei pesi supera il 100%',
      'invalid_distribution' => 'Distribuzione dei pesi non valida',
      'overlap_period' => 'Periodo si sovrappone con altri pesi',
      'dependency_conflict' => 'Conflitto con pesi dipendenti',
    ),
    'warnings' => 
    array (
      'unbalanced' => 'Distribuzione dei pesi sbilanciata',
      'unused_categories' => 'Categorie senza pesi assegnati',
      'expiring_soon' => 'Alcuni pesi stanno per scadere',
    ),
    'info' => 
    array (
      'distribution_ready' => 'Distribuzione pronta per l\'applicazione',
      'balanced' => 'Pesi distribuiti in modo equilibrato',
      'history_available' => 'Storico modifiche disponibile',
    ),
  ),
  'model' => 
  array (
    'label' => 'individuale pesi.model',
  ),
);
