<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
    'name' => 'Notify',
    'description' => 'Modulo per la gestione delle notifiche e comunicazioni',
    'icon' => 'heroicon-o-bell',
    'navigation' => [
        'enabled' => true,
        'sort' => 70,
>>>>>>> d79d9e57 (first)
=======
    'name' => 'User',
    'description' => 'Modulo per la gestione degli utenti e autorizzazioni',
    'icon' => 'heroicon-o-users',
    'navigation' => [
        'enabled' => true,
        'sort' => 100,
>>>>>>> 0d55b583 (first)
=======
    'name' => 'Media',
    'description' => 'Modulo per la gestione dei file multimediali e documenti',
    'icon' => 'heroicon-o-photo',
    'navigation' => [
        'enabled' => true,
        'sort' => 60,
>>>>>>> c986cc10 (first)
=======
    'name' => 'Tenant',
    'description' => 'Modulo per la gestione multi-tenant dell\'applicazione',
    'icon' => 'heroicon-o-building-office',
    'navigation' => [
        'enabled' => true,
        'sort' => 80,
>>>>>>> 8fc3049b (first)
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
        'Modules\\Notify\\Providers\\NotifyServiceProvider',
    ],
>>>>>>> d79d9e57 (first)
=======
        'Modules\\User\\Providers\\UserServiceProvider',
    ],
>>>>>>> 0d55b583 (first)
=======
    'name' => 'Setting',
    'icon' => 'heroicon-o-cog', // icon on dashboard
    'navigation_sort' => 1,
>>>>>>> 9cec72d6 (first)
=======
    'name' => 'Rating',
    'icon' => 'heroicon-o-star', // icon on dashboard
    'navigation_sort' => 1,
>>>>>>> 2df6fbc8 (first)
=======
        'Modules\\Media\\Providers\\MediaServiceProvider',
    ],
>>>>>>> c986cc10 (first)
=======
        'Modules\\Tenant\\Providers\\TenantServiceProvider',
    ],
>>>>>>> 8fc3049b (first)
=======
    'name' => 'Badge',
    'icon' => 'fas-id-badge',
>>>>>>> 7e417e87 (first)
=======
    'name' => 'CertFisc',
    'icon' => 'heroicon-o-archive-box-arrow-down',
>>>>>>> 53542950 (first)
];
