<?php return array (
  'resource' => 
  array (
    'name' => 'Send',
  ),
  'navigation' => 
  array (
    'name' => 'firebase notification',
    'plural' => 'firebase notification',
    'group' => 
    array (
      'name' => 'Invia',
    ),
  ),
  'fields' => 
  array (
    'name' => 
    array (
      'label' => 'Nome Area',
    ),
    'parent' => 'Settore di appartenenza',
    'parent.name' => 'Settore di appartenenza',
    'parent_name' => 'Settore di appartenenza',
    'assets' => 'Quantità di asset',
    'deviceToken' => 
    array (
      'label' => 'deviceToken',
    ),
    'type' => 
    array (
      'label' => 'type',
    ),
    'title' => 
    array (
      'label' => 'title',
    ),
    'body' => 
    array (
      'label' => 'body',
    ),
    'data' => 
    array (
      'label' => 'data',
    ),
    'value' => 
    array (
      'label' => 'value',
    ),
  ),
  'actions' => 
  array (
    'import' => 
    array (
      'name' => 'Importa da file',
      'fields' => 
      array (
        'import_file' => 'Seleziona un file XLS o CSV da caricare',
      ),
    ),
    'export' => 
    array (
      'name' => 'Esporta dati',
      'filename_prefix' => 'Aree al',
      'columns' => 
      array (
        'name' => 'Nome area',
        'parent_name' => 'Nome area livello superiore',
      ),
    ),
  ),
);