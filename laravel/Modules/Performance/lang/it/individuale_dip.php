<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Schede Dipendenti',
        'plural' => 'Schede Dipendenti',
        'group' => [
            'name' => 'Schede',
            'description' => 'Gestione delle schede di valutazione dei dipendenti',
        ],
        'label' => 'Schede Dipendenti',
        'sort' => 31,
        'icon' => 'employee-document',
    ],
    'fields' => [
        'dipendente' => [
            'label' => 'Dipendente',
            'placeholder' => 'Seleziona il dipendente',
            'help' => 'Dipendente da valutare',
        ],
        'matricola' => [
            'label' => 'Matricola',
            'placeholder' => 'Inserisci la matricola',
            'help' => 'Numero di matricola del dipendente',
        ],
        'periodo' => [
            'label' => 'Periodo',
            'placeholder' => 'Seleziona il periodo',
            'help' => 'Periodo di valutazione',
            'options' => [
                'mensile' => 'Mensile',
                'trimestrale' => 'Trimestrale',
                'semestrale' => 'Semestrale',
                'annuale' => 'Annuale',
            ],
        ],
        'risultati_ottenuti' => [
            'label' => 'Risultati Ottenuti',
            'placeholder' => 'Valuta i risultati',
            'help' => 'Valutazione dei risultati raggiunti',
            'scale' => [
                1 => 'Insufficiente',
                2 => 'Sufficiente',
                3 => 'Buono',
                4 => 'Ottimo',
                5 => 'Eccellente',
            ],
        ],
        'qualita_prestazione' => [
            'label' => 'Qualità della Prestazione',
            'placeholder' => 'Valuta la qualità',
            'help' => 'Valutazione della qualità del lavoro',
        ],
        'arricchimento_professionale' => [
            'label' => 'Crescita Professionale',
            'placeholder' => 'Valuta la crescita',
            'help' => 'Valutazione dello sviluppo professionale',
        ],
        'impegno' => [
            'label' => 'Impegno',
            'placeholder' => 'Valuta l\'impegno',
            'help' => 'Valutazione dell\'impegno dimostrato',
        ],
        'note' => [
            'label' => 'Note',
            'placeholder' => 'Inserisci eventuali note',
            'help' => 'Note aggiuntive sulla valutazione',
        ],
    ],
    'actions' => [
        'evaluate' => [
            'label' => 'Valuta',
            'success' => 'Valutazione completata con successo',
        ],
        'approve' => [
            'label' => 'Approva',
            'success' => 'Valutazione approvata con successo',
        ],
        'reject' => [
            'label' => 'Rifiuta',
            'success' => 'Valutazione rifiutata',
        ],
    ],
    'messages' => [
        'validation' => [
            'required' => 'Campo obbligatorio',
            'numeric' => 'Il valore deve essere numerico',
            'min' => 'Il valore minimo è :min',
            'max' => 'Il valore massimo è :max',
        ],
        'status' => [
            'draft' => 'Bozza',
            'pending' => 'In Attesa',
            'approved' => 'Approvata',
            'rejected' => 'Rifiutata',
        ],
    ],
];