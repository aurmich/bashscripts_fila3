<?php

return array (
  'navigation' => 
  array (
    'name' => 'I Miei Log',
    'plural' => 'I Miei Log',
    'group' => 
    array (
      'name' => 'Valutazione & KPI',
      'description' => 'Visualizzazione dei log personali',
    ),
    'label' => 'I Miei Log',
    'sort' => 56,
    'icon' => 'performance-log-outline',
  ),
  'fields' => 
  array (
    'name' => 
    array (
      'label' => 'Nome',
      'placeholder' => 'Inserisci il nome',
      'help' => 'Nome del log',
    ),
    'descrizione' => 
    array (
      'label' => 'Descrizione',
      'placeholder' => 'Inserisci la descrizione',
      'help' => 'Descrizione dettagliata del log',
    ),
    'data' => 
    array (
      'label' => 'Data',
      'placeholder' => 'Seleziona la data',
      'help' => 'Data del log',
    ),
    'tipo' => 
    array (
      'label' => 'Tipo',
      'placeholder' => 'Seleziona il tipo',
      'help' => 'Tipologia di log',
      'options' => 
      array (
        'info' => 'Informazione',
        'warning' => 'Avviso',
        'error' => 'Errore',
      ),
    ),
    'utente' => 
    array (
      'label' => 'Utente',
      'placeholder' => 'Seleziona l\'utente',
      'help' => 'Utente associato al log',
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
  ),
);
