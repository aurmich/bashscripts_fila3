<<<<<<< HEAD
<?php 
return array (
  'navigation' => 
  array (
    'label' => 'Valutatori',
    'group' => 'Admin',
    'icon' => 'heroicon-o-user-circle',
    'sort' => 15,
  ),
  'model' => 
  array (
    'label' => 'stabi dirigente.model',
  ),
  'fields' => 
  array (
    'file' => 
    array (
      'label' => 'file',
    ),
    'header_row' => 
    array (
      'label' => 'header_row',
    ),
    'quadrimestre' => 
    array (
      'label' => 'quadrimestre',
    ),
    'anno' => 
    array (
      'label' => 'anno',
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
    'id' => 
    array (
      'label' => 'id',
    ),
    'valutatore_id' => 
    array (
      'label' => 'valutatore_id',
    ),
    'stabi' => 
    array (
      'label' => 'stabi',
    ),
    'repar' => 
    array (
      'label' => 'repar',
    ),
    'nome_stabi' => 
    array (
      'label' => 'nome_stabi',
    ),
    'matr' => 
    array (
      'label' => 'matr',
    ),
    'nome_diri' => 
    array (
      'label' => 'nome_diri',
    ),
    'nome_diri_plus' => 
    array (
      'label' => 'nome_diri_plus',
    ),
    'email' => 
    array (
      'label' => 'email',
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
    'value' => 
    array (
      'label' => 'value',
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
    'importXLS' => 
    array (
      'label' => 'importXLS',
    ),
  ),
);
=======
<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Stabi diri',
    ],
    'navigation' => [
        'name' => 'Stabi diri',
        'plural' => 'Stabi diri',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'fields' => [
        'brand' => 'Marca',
        'model' => 'Modello',
        'description' => 'Descrizione',
        'serial_number' => 'Numero di serie',
        'inventory_number' => 'Codice inventario',
        'code' => 'Identificativo',
        'manufacturing_year' => 'Anno di fabbricazione',
        'purchase_year' => 'Anno di acquisto',
        'is_enabled' => 'È attivo?',
        'asset_type' => 'Tipologia',
        'area' => 'Area',
        'parent' => 'Asset genitore',
        'name' => 'Nome',
        'id' => ['label' => 'ID'],
        'valutatore_id' => ['label' => 'Valutatore Id'],
        'stabi' => ['label' => 'Stabi'],
        'repar' => ['label' => 'Repar'],
        'anno' => ['label' => 'Anno'],
        'matr' => ['label' => 'Matricola'],
        'cognome' => ['label' => 'Cognome'],
        'nome' => ['label' => 'Nome'],
    ],
    'actions' => [
        'enable' => [
            'cta' => 'Attiva',
        ],
        'disable' => [
            'cta' => 'Dismetti',
        ],
        'import' => [
            'row_number' => 'Riga :row',
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Lista asset al',
            'columns' => [
                'brand' => 'Marca',
                'model' => 'Modello',
                'description' => 'Descrizione',
                'serial_number' => 'Numero di serie',
                'inventory_number' => 'Codice inventario',
                'code' => 'Identificativo',
                'manufacturing_year' => 'Anno di fabbricazione',
                'purchase_year' => 'Anno di acquisto',
                'is_enabled' => 'È attivo?',
                'asset_type' => 'Tipologia',
                'parent_inventory_number' => 'Codice inventario genitore',
            ],
        ],
    ],
    'widgets' => [
        'child_assets' => 'Asset figli',
    ],
    'exceptions' => [
        'mandatory_data' => '{1} Dato obbligatorio non presente|{2} 2 Dati obbligatori non presenti|{3} 3 Dati obbligatori non presenti|[4,*] Vari dati obbligatori non presenti',
    ],
];
>>>>>>> e0005d7d (first)
