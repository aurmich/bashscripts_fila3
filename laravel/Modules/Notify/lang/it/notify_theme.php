<?php 
return array (
  'resource' => 
  array (
    'name' => 'notify_themes',
  ),
  'navigation' => 
  array (
    'name' => 'notify_themes',
    'plural' => 'notify_themes',
    'group' => 
    array (
      'name' => 'Admin',
    ),'
    'label' => 'notify theme',
  ),
  'fields' => 
  array (
    'name' => 'Nome Area',
    'parent' => 'Settore di appartenenza',
    'parent.name' => 'Settore di appartenenza',
    'parent_name' => 'Settore di appartenenza',
    'assets' => 'Quantità di asset',
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
  'tab' => 
  array (
    'index' => 'Lista',
    'create' => 'Aggiungi',
    'edit' => 'Modifica',
  ),
);
