<?php

return array (
  'navigation' => 
  array (
    'name' => 'Criteri di Esclusione',
    'plural' => 'Criteri di Esclusione',
    'group' => 
    array (
      'name' => 'Criteri',
      'description' => 'Gestione dei criteri di esclusione',
    ),
    'label' => 'Criteri di Esclusione',
    'sort' => 61,
    'icon' => 'performance-exclusion-outline',
  ),
  'fields' => 
  array (
    'name' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome del criterio di esclusione',
    ),
    'descrizione' => 
    array (
      'label' => 'Descrizione',
      'placeholder' => 'Inserisci la descrizione',
      'help' => 'Descrizione dettagliata del criterio',
    ),
    'tipo' => 
    array (
      'label' => 'Tipo',
      'placeholder' => 'Seleziona il tipo',
      'help' => 'Tipo di esclusione',
      'options' => 
      array (
        'assenza' => 'Assenza',
        'comportamento' => 'Comportamento',
        'performance' => 'Performance',
      ),
    ),
    'attivo' => 
    array (
      'label' => 'Attivo',
      'help' => 'Indica se il criterio è attualmente in uso',
    ),
    'data_inizio' => 
    array (
      'label' => 'Data Inizio',
      'placeholder' => 'Seleziona la data di inizio',
      'help' => 'Data di inizio validità',
    ),
    'data_fine' => 
    array (
      'label' => 'Data Fine',
      'placeholder' => 'Seleziona la data di fine',
      'help' => 'Data di fine validità',
    ),
    'note' => 
    array (
      'label' => 'Note',
      'placeholder' => 'Inserisci eventuali note',
      'help' => 'Note aggiuntive sul criterio',
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
    'field_name' => 
    array (
      'label' => 'field_name',
    ),
    'op' => 
    array (
      'label' => 'op',
    ),
    'value' => 
    array (
      'label' => 'value',
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
    'create' => 
    array (
      'label' => 'create',
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
  ),
  'actions' => 
  array (
    'create' => 
    array (
      'label' => 'Nuovo Criterio',
      'success' => 'Criterio creato con successo',
    ),
    'edit' => 
    array (
      'label' => 'Modifica',
      'success' => 'Criterio aggiornato con successo',
    ),
    'delete' => 
    array (
      'label' => 'Elimina',
      'success' => 'Criterio eliminato con successo',
    ),
  ),
  'messages' => 
  array (
    'validation' => 
    array (
      'required' => 'Campo obbligatorio',
      'date' => 'Data non valida',
      'date_after' => 'La data deve essere successiva a :date',
      'date_before' => 'La data deve essere precedente a :date',
    ),
  ),
  'model' => 
  array (
    'label' => 'criteri esclusione.model',
  ),
);
