<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Coefficienti Categorie Org.',
        'plural' => 'Coefficienti Categorie Org.',
        'group' => [
            'name' => 'Valutazione & KPI',
            'description' => 'Gestione dei coefficienti delle categorie organizzative',
        ],
        'label' => 'Coefficienti Categorie Org.',
        'sort' => 58,
        'icon' => 'category-coefficient',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Nome del coefficiente',
        ],
        'categoria' => [
            'label' => 'Categoria',
            'placeholder' => 'Seleziona la categoria',
            'help' => 'Categoria di appartenenza',
        ],
        'coefficiente' => [
            'label' => 'Coefficiente',
            'placeholder' => 'Inserisci il coefficiente',
            'help' => 'Valore del coefficiente',
        ],
        'guard_name' => [
            'label' => 'Sistema di Protezione',
            'placeholder' => 'Seleziona il sistema',
            'help' => 'Sistema di protezione utilizzato',
        ],
        'permissions' => [
            'label' => 'Permessi',
            'placeholder' => 'Seleziona i permessi',
            'help' => 'Autorizzazioni associate al coefficiente',
        ],
        'updated_at' => [
            'label' => 'Ultimo aggiornamento',
            'help' => 'Data e ora dell\'ultima modifica',
        ],
        'first_name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Nome del responsabile',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'placeholder' => 'Inserisci il cognome',
            'help' => 'Cognome del responsabile',
        ],
        'select_all' => [
            'label' => 'Seleziona Tutto',
            'message' => 'Seleziona tutti gli elementi disponibili',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Nuovo Coefficiente',
            'success' => 'Coefficiente creato con successo',
        ],
        'edit' => [
            'label' => 'Modifica',
            'success' => 'Coefficiente aggiornato con successo',
        ],
        'delete' => [
            'label' => 'Elimina',
            'success' => 'Coefficiente eliminato con successo',
        ],
        'import' => [
            'label' => 'Importa',
            'fields' => [
                'import_file' => [
                    'label' => 'File da importare',
                    'placeholder' => 'Seleziona un file XLS o CSV',
                    'help' => 'Formati supportati: XLS, XLSX, CSV',
                ],
            ],
        ],
        'export' => [
            'label' => 'Esporta',
            'filename_prefix' => 'Coefficienti_Categoria_',
            'columns' => [
                'name' => [
                    'label' => 'Nome Coefficiente',
                    'help' => 'Nome del coefficiente',
                ],
                'parent_name' => [
                    'label' => 'Categoria',
                    'help' => 'Categoria di appartenenza',
                ],
            ],
        ],
    ],
    'messages' => [
        'validation' => [
            'coefficiente' => [
                'required' => 'Il coefficiente è obbligatorio',
                'numeric' => 'Il coefficiente deve essere numerico',
                'min' => 'Il coefficiente deve essere maggiore di zero',
            ],
            'categoria' => [
                'required' => 'La categoria è obbligatoria',
            ],
        ],
        'import' => [
            'success' => 'Importazione completata con successo',
            'error' => 'Errore durante l\'importazione',
        ],
        'export' => [
            'success' => 'Esportazione completata con successo',
            'error' => 'Errore durante l\'esportazione',
        ],
        'save' => [
            'success' => 'Coefficiente salvato con successo',
            'error' => 'Errore durante il salvataggio',
        ],
        'delete' => [
            'success' => 'Coefficiente eliminato con successo',
            'error' => 'Errore durante l\'eliminazione',
        ],
    ],
    'model' => [
        'label' => 'organizzativa cat coeff.model',
    ],
];
