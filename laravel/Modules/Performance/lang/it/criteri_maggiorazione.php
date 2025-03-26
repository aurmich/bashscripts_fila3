<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Criteri di Maggiorazione',
        'plural' => 'Criteri di Maggiorazione',
        'group' => [
            'name' => 'Valutazione & KPI',
            'description' => 'Gestione dei criteri di maggiorazione',
        ],
        'label' => 'Criteri di Maggiorazione',
        'sort' => 62,
        'icon' => 'performance-criteria-outline',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Nome del criterio di maggiorazione',
        ],
        'descrizione' => [
            'label' => 'Descrizione',
            'placeholder' => 'Inserisci la descrizione',
            'help' => 'Descrizione dettagliata del criterio',
        ],
        'percentuale' => [
            'label' => 'Percentuale',
            'placeholder' => 'Inserisci la percentuale',
            'help' => 'Percentuale di maggiorazione',
        ],
        'tipo' => [
            'label' => 'Tipo',
            'placeholder' => 'Seleziona il tipo',
            'help' => 'Tipo di maggiorazione',
            'options' => [
                'responsabilita' => 'Responsabilità',
                'complessita' => 'Complessità',
                'rischio' => 'Rischio',
            ],
        ],
        'attivo' => [
            'label' => 'Attivo',
            'help' => 'Indica se il criterio è attualmente in uso',
        ],
        'data_inizio' => [
            'label' => 'Data Inizio',
            'placeholder' => 'Seleziona la data di inizio',
            'help' => 'Data di inizio validità',
        ],
        'data_fine' => [
            'label' => 'Data Fine',
            'placeholder' => 'Seleziona la data di fine',
            'help' => 'Data di fine validità',
        ],
        'note' => [
            'label' => 'Note',
            'placeholder' => 'Inserisci eventuali note',
            'help' => 'Note aggiuntive sul criterio',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Nuovo Criterio',
            'success' => 'Criterio creato con successo',
        ],
        'edit' => [
            'label' => 'Modifica',
            'success' => 'Criterio aggiornato con successo',
        ],
        'delete' => [
            'label' => 'Elimina',
            'success' => 'Criterio eliminato con successo',
        ],
    ],
    'messages' => [
        'validation' => [
            'required' => 'Campo obbligatorio',
            'numeric' => 'Il valore deve essere numerico',
            'min' => 'Il valore minimo è :min',
            'max' => 'Il valore massimo è :max',
            'date' => 'Data non valida',
            'date_after' => 'La data deve essere successiva a :date',
            'date_before' => 'La data deve essere precedente a :date',
        ],
    ],
];
