<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    'name' => 'Rating',
    'icon' => 'heroicon-o-star', // icon on dashboard
    'navigation_sort' => 1,
=======
    'name' => 'Xot',
    'description' => 'Modulo base con funzionalità core e utilities',
    'icon' => 'heroicon-o-cube',
    'navigation' => [
        'enabled' => true,
        'sort' => 110,
=======
    'name' => 'UI',
    'description' => 'Modulo per la gestione dell\'interfaccia utente e componenti',
    'icon' => 'heroicon-o-squares-2x2',
    'navigation' => [
        'enabled' => true,
        'sort' => 90,
>>>>>>> a8f30311 (first)
=======
    'name' => 'Lang',
    'description' => 'Modulo per la gestione delle traduzioni e localizzazioni',
    'icon' => 'heroicon-o-language',
    'navigation' => [
        'enabled' => true,
        'sort' => 50,
>>>>>>> bbec4378 (first)
=======
    'name' => 'Job',
    'description' => 'Modulo per la gestione dei lavori in background e code',
    'icon' => 'heroicon-o-queue-list',
    'navigation' => [
        'enabled' => true,
        'sort' => 40,
>>>>>>> c088001a (first)
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        'Modules\\Xot\\Providers\\XotServiceProvider',
    ],
>>>>>>> 59bc4fe7 (first)
=======
        'Modules\\UI\\Providers\\UIServiceProvider',
    ],
>>>>>>> a8f30311 (first)
=======
        'Modules\\Lang\\Providers\\LangServiceProvider',
    ],
>>>>>>> bbec4378 (first)
=======
        'Modules\\Job\\Providers\\JobServiceProvider',
    ],
>>>>>>> c088001a (first)
];
