<?php 
return array (
  'resource' => 
  array (
    'name' => 'notification',
  ),
  'navigation' => 
  array (
    'name' => 'notification',
    'plural' => 'notification',
    'group' => 
    array (
      'name' => 'Admin',
    ),'
    'label' => 'notification',
  ),
  'fields' => 
  array (
    'name' => 'Nome Area',
    'parent' => 'Settore di appartenenza',
    'parent.name' => 'Settore di appartenenza',
    'parent_name' => 'Settore di appartenenza',
    'assets' => 'Quantità di asset',
    'type' => 
    array (
      'fields' => 'type',
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
