<?php

declare(strict_types=1);

return [
    'resource' => [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2df6fbc8 (first)
        'name' => ['label' => 'Rating'],
    ],
    'navigation' => [
        'name' => ['label' => 'Rating'],
        'plural' => ['label' => 'Rating'],
        'group' => [
            'name' => ['label' => 'Admin'],
<<<<<<< HEAD
=======
=======
>>>>>>> e0005d7d (first)
=======
>>>>>>> dc18abbe (first)
        'name' => 'Rating',
    ],
    'navigation' => [
        'name' => 'Rating',
        'plural' => 'Rating',
        'group' => [
            'name' => 'Admin',
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
>>>>>>> 2df6fbc8 (first)
        ],
    ],
    'fields' => [
        'brand' => [
            'label' => 'Marca',
        ],
        'model' => [
            'label' => 'Modello',
        ],
        'description' => [
            'label' => 'Descrizione',
        ],
        'serial_number' => [
            'label' => 'Numero di serie',
        ],
        'inventory_number' => [
            'label' => 'Codice inventario',
        ],
        'code' => [
            'label' => 'Identificativo',
        ],
        'manufacturing_year' => [
            'label' => 'Anno di fabbricazione',
        ],
        'purchase_year' => [
            'label' => 'Anno di acquisto',
        ],
        'is_enabled' => [
            'label' => 'È attivo?',
        ],
        'asset_type' => [
            'label' => 'Tipologia',
        ],
        'area' => [
            'label' => 'Area',
        ],
        'parent' => [
            'label' => 'Asset genitore',
        ],
        'name' => [
            'label' => 'Nome',
        ],
        'is_disabled' => [
            'label' => 'is_disabled',
        ],
        'is_readonly' => [
            'label' => 'is_readonly',
        ],
        '_tpl' => [
            'label' => '_tpl',
        ],
        'ratings' => [
            'label' => 'ratings',
        ],
        'id' => [
            'label' => 'id',
        ],
        'title' => [
            'label' => 'title',
        ],
        'color' => [
            'label' => 'color',
        ],
        'rating' => [
            'label' => 'rating',
        ],
        'view' => [
            'label' => 'view',
        ],
    ],
    'actions' => [
        'enable' => [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2df6fbc8 (first)
            'cta' => ['label' => 'Attiva'],
            'label' => ['label' => 'Attiva'],
        ],
        'disable' => [
            'cta' => ['label' => 'Dismetti'],
            'label' => ['label' => 'Dismetti'],
        ],
        'import' => [
            'row_number' => ['label' => 'Riga :row'],
            'label' => ['label' => 'Importa'],
            'fields' => [
                'import_file' => ['label' => 'Seleziona un file XLS o CSV da caricare'],
            ],
        ],
        'export' => [
            'filename_prefix' => ['label' => 'Lista asset al'],
            'label' => ['label' => 'Esporta'],
            'columns' => [
                'brand' => ['label' => 'Marca'],
                'model' => ['label' => 'Modello'],
                'description' => ['label' => 'Descrizione'],
                'serial_number' => ['label' => 'Numero di serie'],
                'inventory_number' => ['label' => 'Codice inventario'],
                'code' => ['label' => 'Identificativo'],
                'manufacturing_year' => ['label' => 'Anno di fabbricazione'],
                'purchase_year' => ['label' => 'Anno di acquisto'],
                'is_enabled' => ['label' => 'È attivo?'],
                'asset_type' => ['label' => 'Tipologia'],
                'parent_inventory_number' => ['label' => 'Codice inventario genitore'],
<<<<<<< HEAD
=======
=======
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
    ],
    'actions' => [
        'enable' => [
>>>>>>> e0005d7d (first)
=======
        ],
    ],
    'fields' => [
        'brand' => ['label' => 'Marca'],
        'model' => ['label' => 'Modello'],
        'description' => ['label' => 'Descrizione'],
        'serial_number' => ['label' => 'Numero di serie'],
        'inventory_number' => ['label' => 'Codice inventario'],
        'code' => ['label' => 'Identificativo'],
        'manufacturing_year' => ['label' => 'Anno di fabbricazione'],
        'purchase_year' => ['label' => 'Anno di acquisto'],
        'is_enabled' => ['label' => 'È attivo?'],
        'asset_type' => ['label' => 'Tipologia'],
        'area' => ['label' => 'Area'],
        'parent' => ['label' => 'Asset genitore'],
        'name' => ['label' => 'Nome'],
    ],
    'actions' => [
        'enable' => [
>>>>>>> dc18abbe (first)
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
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> e0005d7d (first)
=======
>>>>>>> dc18abbe (first)
            ],
        ],
    ],
    'widgets' => [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2df6fbc8 (first)
        'child_assets' => ['label' => 'Asset figli'],
    ],
    'exceptions' => [
        'mandatory_data' => ['label' => '{1} Dato obbligatorio non presente|{2} 2 Dati obbligatori non presenti|{3} 3 Dati obbligatori non presenti|[4,*] Vari dati obbligatori non presenti'],
<<<<<<< HEAD
=======
=======
>>>>>>> e0005d7d (first)
=======
>>>>>>> dc18abbe (first)
        'child_assets' => 'Asset figli',
    ],
    'exceptions' => [
        'mandatory_data' => '{1} Dato obbligatorio non presente|{2} 2 Dati obbligatori non presenti|{3} 3 Dati obbligatori non presenti|[4,*] Vari dati obbligatori non presenti',
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> e0005d7d (first)
=======
>>>>>>> dc18abbe (first)
    ],
];
