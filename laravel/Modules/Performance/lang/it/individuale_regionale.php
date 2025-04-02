<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Schede Regionali',
        'plural' => 'Schede Regionali',
        'group' => [
            'name' => 'Schede',
            'description' => 'Gestione delle schede di valutazione regionali',
        ],
        'label' => 'Schede Regionali',
        'sort' => 33,
        'icon' => 'performance-region-document',
    ],
    'fields' => [
        'regione' => [
            'name' => [
                'label' => 'Nome Regione',
                'placeholder' => 'Inserisci il nome della regione',
                'help' => 'Nome della regione di riferimento',
            ],
            'codice' => [
                'label' => 'Codice Regione',
                'placeholder' => 'Inserisci il codice regionale',
                'help' => 'Codice identificativo della regione',
            ],
            'area' => [
                'label' => 'Area Geografica',
                'placeholder' => 'Seleziona l\'area',
                'help' => 'Area geografica di appartenenza',
                'options' => [
                    'nord' => 'Nord',
                    'centro' => 'Centro',
                    'sud' => 'Sud',
                    'isole' => 'Isole',
                ],
            ],
        ],
        'performance' => [
            'totale' => [
                'label' => 'Totale Performance',
                'placeholder' => 'Inserisci il totale',
                'help' => 'Punteggio totale delle performance regionali',
            ],
            'media' => [
                'label' => 'Media Performance',
                'help' => 'Media delle performance degli stabilimenti',
            ],
            'trend' => [
                'label' => 'Trend',
                'help' => 'Andamento rispetto al periodo precedente',
                'options' => [
                    'crescita' => 'In Crescita',
                    'stabile' => 'Stabile',
                    'decrescita' => 'In Decrescita',
                ],
            ],
        ],
        'stabilimenti' => [
            'numero' => [
                'label' => 'Numero Stabilimenti',
                'help' => 'Totale stabilimenti nella regione',
            ],
            'attivi' => [
                'label' => 'Stabilimenti Attivi',
                'help' => 'Numero di stabilimenti operativi',
            ],
            'valutati' => [
                'label' => 'Stabilimenti Valutati',
                'help' => 'Numero di stabilimenti con valutazione completa',
            ],
        ],
        'periodo' => [
            'inizio' => [
                'label' => 'Data Inizio',
                'placeholder' => 'Seleziona la data di inizio',
                'help' => 'Inizio del periodo di valutazione',
            ],
            'fine' => [
                'label' => 'Data Fine',
                'placeholder' => 'Seleziona la data di fine',
                'help' => 'Fine del periodo di valutazione',
            ],
        ],
        'timestamps' => [
            'created_at' => [
                'label' => 'Data Creazione',
                'help' => 'Data di creazione del record',
            ],
            'updated_at' => [
                'label' => 'Ultimo Aggiornamento',
                'help' => 'Data dell\'ultima modifica',
            ],
        ],
    ],
    'actions' => [
        'calculate' => [
            'label' => 'Calcola Performance',
            'success' => 'Performance calcolate con successo',
            'error' => 'Errore durante il calcolo delle performance',
        ],
        'export' => [
            'label' => 'Esporta Report',
            'success' => 'Report regionale esportato con successo',
            'error' => 'Errore durante l\'esportazione del report',
        ],
        'compare' => [
            'label' => 'Confronta Regioni',
            'success' => 'Confronto completato con successo',
            'error' => 'Errore durante il confronto',
        ],
    ],
    'messages' => [
        'validation' => [
            'regione' => [
                'required' => 'La regione è obbligatoria',
                'exists' => 'La regione selezionata non esiste',
            ],
            'periodo' => [
                'required' => 'Il periodo è obbligatorio',
                'date' => 'Le date devono essere valide',
                'after' => 'La data di fine deve essere successiva all\'inizio',
            ],
        ],
        'errors' => [
            'calculation_failed' => 'Calcolo delle performance fallito',
            'missing_data' => 'Dati insufficienti per il calcolo',
            'invalid_period' => 'Periodo non valido',
            'no_stabilimenti' => 'Nessuno stabilimento trovato nella regione',
        ],
        'warnings' => [
            'incomplete_data' => 'Dati incompleti per alcuni stabilimenti',
            'performance_gap' => 'Rilevato gap significativo tra stabilimenti',
            'trend_negative' => 'Trend negativo rilevato',
        ],
        'info' => [
            'calculation_started' => 'Calcolo performance avviato',
            'export_ready' => 'Report pronto per il download',
            'comparison_available' => 'Confronto con altre regioni disponibile',
        ],
    ],
];
