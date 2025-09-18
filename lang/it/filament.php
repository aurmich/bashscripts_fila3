<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    'pages' => [
        'artisan-commands-manager' => [
            'navigation_label' => 'Gestione Artisan',
            'navigation_group' => 'Sistema',
            'navigation_icon' => 'xot::terminal',
            'title' => 'Gestione Comandi Artisan',
            'commands' => [
                'migrate' => [
                    'label' => 'Migrate Database',
                    'icon' => 'xot::database-update',
                ],
                'filament_upgrade' => [
                    'label' => 'Upgrade Filament',
                    'icon' => 'xot::upgrade',
                ],
                'filament_optimize' => [
                    'label' => 'Optimize Filament',
                    'icon' => 'xot::optimize',
                ],
                'view_cache' => [
                    'label' => 'Cache Views',
                    'icon' => 'xot::view-cache',
                ],
                'config_cache' => [
                    'label' => 'Cache Config',
                    'icon' => 'xot::config-cache',
                ],
                'route_cache' => [
                    'label' => 'Cache Routes',
                    'icon' => 'xot::route-cache',
                ],
                'event_cache' => [
                    'label' => 'Cache Events',
                    'icon' => 'xot::event-cache',
                ],
                'queue_restart' => [
                    'label' => 'Restart Queue',
                    'icon' => 'xot::queue-restart',
                ],
            ],
            'status' => [
                'completed' => 'Completato',
                'failed' => 'Fallito',
                'waiting' => 'In attesa dell\'output...',
            ],
            'messages' => [
                'command_started' => 'Comando avviato',
                'command_completed' => 'Il comando :command è stato eseguito con successo',
                'command_failed' => 'Il comando :command è fallito',
            ],
        ],
=======
    'navigation' => [
        'group' => [
            'sistema' => [
                'label' => 'Sistema',
                'description' => 'Funzionalità di sistema',
            ],
        ],
        'badge' => [
            'label' => 'Badge',
            'plural' => 'Badges',
            'icon' => 'badge-identification', 
        ],
    ],
    'resources' => [
        'badge' => [
            'label' => 'Badge',
            'plural_label' => 'Badges',
        ],
>>>>>>> 7e417e87 (first)
=======
    'navigation' => [
        'group' => [
            'documenti' => [
                'label' => 'Documenti',
                'description' => 'Gestione documenti e certificazioni',
            ],
        ],
        'certfisc' => [
            'label' => 'Certificazione Fiscale',
            'plural' => 'Certificazioni Fiscali',
            'icon' => 'certfisc-document',
        ],
    ],
    'resources' => [
        'certfisc' => [
            'label' => 'Certificazione Fiscale',
            'plural_label' => 'Certificazioni Fiscali',
        ],
>>>>>>> 53542950 (first)
=======
    'navigation' => [
        'group' => [
            'retribuzioni' => [
                'label' => 'Retribuzioni',
                'description' => 'Gestione retribuzioni e incentivi',
                'icon' => 'heroicon-o-banknotes',
            ],
        ],
        'incentivi' => [
            'label' => 'Incentivo',
            'plural' => 'Incentivi',
            'icon' => 'incentivi-money',
        ],
        'progetto' => [
            'label' => 'Progetto',
            'plural' => 'Progetti',
            'icon' => 'incentivi-project',
        ],
        'gruppo-lavoro' => [
            'label' => 'Gruppo di Lavoro',
            'plural' => 'Gruppi di Lavoro',
            'icon' => 'incentivi-team',
        ],
        'attivita' => [
            'label' => 'Attività',
            'plural' => 'Attività',
            'icon' => 'incentivi-activity',
        ],
    ],
    'resources' => [
        'incentivi' => [
            'label' => 'Incentivo',
            'plural_label' => 'Incentivi',
            'icon' => 'incentivi-money',
        ],
        'progetto' => [
            'label' => 'Progetto',
            'plural_label' => 'Progetti',
            'icon' => 'incentivi-project',
            'fields' => [
                'nome' => [
                    'label' => 'Nome',
                    'placeholder' => 'Inserisci il nome del progetto',
                ],
                'tipo' => [
                    'label' => 'Tipo',
                    'placeholder' => 'Seleziona il tipo di progetto',
                ],
                'settore' => [
                    'label' => 'Settore',
                    'placeholder' => 'Seleziona il settore',
                ],
                'stato' => [
                    'label' => 'Stato',
                    'options' => [
                        'bozza' => 'Bozza',
                        'in_corso' => 'In Corso',
                        'completato' => 'Completato',
                        'annullato' => 'Annullato',
                    ],
                ],
                'data_inizio' => [
                    'label' => 'Data Inizio',
                    'placeholder' => 'Seleziona la data di inizio',
                ],
                'data_fine' => [
                    'label' => 'Data Fine',
                    'placeholder' => 'Seleziona la data di fine',
                ],
            ],
        ],
        'gruppo-lavoro' => [
            'label' => 'Gruppo di Lavoro',
            'plural_label' => 'Gruppi di Lavoro',
            'icon' => 'incentivi-team',
            'fields' => [
                'nome' => [
                    'label' => 'Nome',
                    'placeholder' => 'Inserisci il nome del gruppo',
                ],
                'responsabile' => [
                    'label' => 'Responsabile',
                    'placeholder' => 'Seleziona il responsabile',
                ],
                'membri' => [
                    'label' => 'Membri',
                    'placeholder' => 'Seleziona i membri del gruppo',
                ],
            ],
        ],
        'attivita' => [
            'label' => 'Attività',
            'plural_label' => 'Attività',
            'icon' => 'incentivi-activity',
            'fields' => [
                'nome' => [
                    'label' => 'Nome',
                    'placeholder' => 'Inserisci il nome dell\'attività',
                ],
                'descrizione' => [
                    'label' => 'Descrizione',
                    'placeholder' => 'Inserisci la descrizione',
                ],
                'stato' => [
                    'label' => 'Stato',
                    'options' => [
                        'da_iniziare' => 'Da Iniziare',
                        'in_corso' => 'In Corso',
                        'completata' => 'Completata',
                        'sospesa' => 'Sospesa',
                    ],
                ],
            ],
        ],
        'dipendente' => [
            'label' => 'Dipendente',
            'plural_label' => 'Dipendenti',
            'fields' => [
                'nome' => [
                    'label' => 'Nome',
                    'placeholder' => 'Inserisci il nome',
                ],
                'cognome' => [
                    'label' => 'Cognome',
                    'placeholder' => 'Inserisci il cognome',
                ],
                'matricola' => [
                    'label' => 'Matricola',
                    'placeholder' => 'Inserisci la matricola',
                ],
            ],
        ],
        'liquidazione' => [
            'label' => 'Liquidazione',
            'plural_label' => 'Liquidazioni',
            'fields' => [
                'importo' => [
                    'label' => 'Importo',
                    'placeholder' => 'Inserisci l\'importo',
                ],
                'data' => [
                    'label' => 'Data',
                    'placeholder' => 'Seleziona la data',
                ],
                'stato' => [
                    'label' => 'Stato',
                    'options' => [
                        'in_elaborazione' => 'In Elaborazione',
                        'approvata' => 'Approvata',
                        'pagata' => 'Pagata',
                        'annullata' => 'Annullata',
                    ],
                ],
            ],
        ],
>>>>>>> 15ea09e2 (first)
=======
    'navigation' => [
        'group' => [
            'performance' => [
                'label' => 'Performance',
                'description' => 'Sistema di gestione e valutazione delle performance',
            ],
        ],
        'performance' => [
            'dashboard' => 'Dashboard',
            'criteri_esclusione' => 'Criteri di Esclusione',
            'criteri_maggiorazione' => 'Criteri di Maggiorazione',
            'criteri_option' => 'Opzioni Criteri',
            'criteri_valutazione' => 'Criteri di Valutazione',
            'individuale_adm' => 'Gestione Individuale',
            'individuale_assenze' => 'Assenze Individuali',
            'individuale_cat_coeff' => 'Coefficienti Categorie',
            'individuale_decurtazione_assenze' => 'Decurtazioni Assenze',
            'individuale_dip' => 'Dipendenti',
            'individuale_pesi' => 'Pesi Individuali',
            'individuale_po' => 'Posizioni Organizzative',
            'individuale_regionale' => 'Gestione Regionale',
            'individuale_tot_stabi' => 'Totali Stabilimenti',
            'my_log' => 'Log Personale',
            'option' => 'Opzioni',
            'organizzativa_adm' => 'Gestione Organizzativa',
            'organizzativa_assenze' => 'Assenze Organizzative',
            'organizzativa_cat_coeff' => 'Coefficienti Categorie Org.',
            'organizzativa_tot_stabi' => 'Totali Stabilimenti Org.',
            'performance_fondo' => 'Fondo Performance',
            'stabi_dirigente' => 'Dirigenti Stabilimento',
        ],
    ],
    'resources' => [
        'criteri_esclusione' => [
            'label' => 'Criterio di Esclusione',
            'plural_label' => 'Criteri di Esclusione',
        ],
        'criteri_maggiorazione' => [
            'label' => 'Criterio di Maggiorazione',
            'plural_label' => 'Criteri di Maggiorazione',
        ],
        'criteri_option' => [
            'label' => 'Opzione Criterio',
            'plural_label' => 'Opzioni Criteri',
        ],
        'criteri_valutazione' => [
            'label' => 'Criterio di Valutazione',
            'plural_label' => 'Criteri di Valutazione',
        ],
        'individuale_adm' => [
            'label' => 'Gestione Individuale',
            'plural_label' => 'Gestioni Individuali',
        ],
        'individuale_assenze' => [
            'label' => 'Assenza Individuale',
            'plural_label' => 'Assenze Individuali',
        ],
        'individuale_cat_coeff' => [
            'label' => 'Coefficiente Categoria',
            'plural_label' => 'Coefficienti Categorie',
        ],
        'individuale_decurtazione_assenze' => [
            'label' => 'Decurtazione Assenze',
            'plural_label' => 'Decurtazioni Assenze',
        ],
        'individuale_dip' => [
            'label' => 'Dipendente',
            'plural_label' => 'Dipendenti',
        ],
        'individuale_pesi' => [
            'label' => 'Peso Individuale',
            'plural_label' => 'Pesi Individuali',
        ],
        'individuale_po' => [
            'label' => 'Posizione Organizzativa',
            'plural_label' => 'Posizioni Organizzative',
        ],
        'individuale_regionale' => [
            'label' => 'Gestione Regionale',
            'plural_label' => 'Gestioni Regionali',
        ],
        'individuale_tot_stabi' => [
            'label' => 'Totale Stabilimento',
            'plural_label' => 'Totali Stabilimenti',
        ],
        'my_log' => [
            'label' => 'Log Personale',
            'plural_label' => 'Log Personali',
        ],
        'option' => [
            'label' => 'Opzione',
            'plural_label' => 'Opzioni',
        ],
        'organizzativa_adm' => [
            'label' => 'Gestione Organizzativa',
            'plural_label' => 'Gestioni Organizzative',
        ],
        'organizzativa_assenze' => [
            'label' => 'Assenza Organizzativa',
            'plural_label' => 'Assenze Organizzative',
        ],
        'organizzativa_cat_coeff' => [
            'label' => 'Coefficiente Categoria Org.',
            'plural_label' => 'Coefficienti Categorie Org.',
        ],
        'organizzativa_tot_stabi' => [
            'label' => 'Totale Stabilimento Org.',
            'plural_label' => 'Totali Stabilimenti Org.',
        ],
        'performance_fondo' => [
            'label' => 'Fondo Performance',
            'plural_label' => 'Fondi Performance',
        ],
        'stabi_dirigente' => [
            'label' => 'Dirigente Stabilimento',
            'plural_label' => 'Dirigenti Stabilimento',
        ],
>>>>>>> 961ad402 (first)
    ],
];
