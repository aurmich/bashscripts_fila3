<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'progressione',
        'plural' => 'progressioni',
        'group' => [
            'name' => 'Admin ',
        ],
    ],
    'actions' => [
        'import' => [
            'name' => 'Importa da file',
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'name' => 'Esporta dati',
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
    'fields' => [
        'name' => 'Nome',
        'parent' => 'Padre',
        'parent.name' => 'Padre',
        'parent_name' => 'Padre',
        'assets' => 'assets',
        'id' => 'ID',
        'id_placeholder' => ' ',
        'cognome' => 'Cognome',
        'cognome_placeholder' => ' ',
        'nome' => 'Nome',
        'nome_placeholder' => ' ',
        'ente' => 'ente',
        'matr' => 'matr',
        'ha_diritto' => 'ha_diritto',
        'motivo' => 'motivo',
        'motivo_placeholder' => ' ',
        'stabi' => 'stabi',
        'stabi_txt' => 'stabi_txt',
        'repar' => 'repar',
        'repar_txt' => 'repar_txt',
        'rep2kd' => 'rep2kd',
        'rep2ka' => 'rep2ka',
        'propro' => 'propro',
        'posfun' => 'posfun',
        'qua2kd' => 'qua2kd',
        'qua2ka' => 'qua2ka',
        'categoria_eco' => 'categoria_eco',
        'anno' => 'anno',
    ],
    'schede' => [
        'field' => [
            'stabi' => 'stabi',
            'valutatore_id' => 'Valutatore',
            'valutatore_id_placeholder' => '---',
            'year' => 'Anno',
            'year_placeholder' => 'anno es 2019',
            'sort_by_placeholder' => '  ',
            'sort_order_placeholder' => '  ',
        ],
    ],
    'tab' => [
        'index' => 'lista',
        'create' => 'Aggiungi.',
    ],
];
