<?php

declare(strict_types=1);

return [
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
    ],
];
