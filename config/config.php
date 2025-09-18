<?php

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
declare(strict_types=1);

return [
>>>>>>> e83070fd (.)
=======
declare(strict_types=1);

return [
>>>>>>> bdeae81f (first)
    'name' => 'User',
    'description' => 'Modulo per la gestione degli utenti e autorizzazioni',
    'icon' => 'heroicon-o-users',
    'navigation' => [
        'enabled' => true,
        'sort' => 100,
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
declare(strict_types=1);

return [
>>>>>>> 0253339c (first)
    'name' => 'Tenant',
    'description' => 'Modulo per la gestione multi-tenant dell\'applicazione',
    'icon' => 'heroicon-o-building-office',
    'navigation' => [
        'enabled' => true,
        'sort' => 80,
<<<<<<< HEAD
>>>>>>> 8fc3049b (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
=======
>>>>>>> 0253339c (first)
=======
declare(strict_types=1);

return [
    'name' => 'Activity',
    'description' => 'Modulo per il tracciamento delle attività degli utenti',
    // 'icon' => 'heroicon-o-clock',
    'icon' => 'activity-icon',
    'navigation' => [
        'enabled' => true,
        'sort' => 20,
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
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
=======
    'name' => 'ContoAnnuale',
    'icon' => 'heroicon-o-calendar',
>>>>>>> 26424c5e (first)
=======
    'name' => 'Europa',
>>>>>>> c8cd1ec3 (first)
=======
    'name' => 'Inail',
    'icon' => 'heroicon-o-exclamation-triangle',
>>>>>>> 51c7727d (first)
=======
return [
    'name' => 'Incentivi',
    'icon' => 'heroicon-o-banknotes',
>>>>>>> 15ea09e2 (first)
=======
declare(strict_types=1);

return [
    'name' => 'IndennitaCondizioniLavoro',
    // 'icon' => 'heroicon-o-bookmark',
    'icon' => 'fas-helmet-safety',
>>>>>>> b7483fd0 (first)
=======
declare(strict_types=1);

return [
    'name' => 'IndennitaResponsabilita',
    'icon' => 'fas-money-bill-trend-up',
>>>>>>> e0005d7d (first)
=======
declare(strict_types=1);

return [
    'name' => 'Legge104',
    'icon' => 'fas-wheelchair-move',
>>>>>>> 6907d18e (first)
=======
declare(strict_types=1);

return [
    'name' => 'Legge109',
    'icon' => 'fas-wheelchair-move',
>>>>>>> 616a71c2 (first)
=======
declare(strict_types=1);

return [
    'name' => 'Mensa',
    'icon' => 'fas-bowl-food',
>>>>>>> c6af2eee (first)
=======
declare(strict_types=1);

return [
    'name' => 'MobilitaVolontaria',
    'icon' => 'fas-person-walking-luggage',
>>>>>>> 8e6e7d4c (first)
=======
declare(strict_types=1);

return [
    'name' => 'Prenotazioni',
    'icon' => 'heroicon-o-calendar-days',
>>>>>>> 4658bb86 (first)
=======
declare(strict_types=1);

return [
    'name' => 'PresenzeAssenze',
    'icon' => 'fas-person-rays',
>>>>>>> edbb3aab (first)
=======
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
declare(strict_types=1);

return [
    'name' => 'Progressioni',
    // 'icon' => 'fas-fire-flame-curved',
    'icon' => 'fas-signal',
<<<<<<< HEAD
>>>>>>> bcab6efe (first)
=======
declare(strict_types=1);

return [
    'name' => 'Questionari',
>>>>>>> fec698af (first)
=======
declare(strict_types=1);

return [
    'name' => 'Sigma',
    'icon' => 'fas-tower-observation',
>>>>>>> f862c51f (first)
=======
declare(strict_types=1);

return [
    'name' => 'Sindacati',
    'icon' => 'fas-fist-raised',
>>>>>>> 9997d18c (first)
=======
declare(strict_types=1);

return [
    'name' => 'Performance',
    'icon' => 'heroicon-o-presentation-chart-line',
    'providers' => [
        \Modules\Performance\Providers\Html2PdfServiceProvider::class,
    ],
>>>>>>> 961ad402 (first)
=======
declare(strict_types=1);

return [
    'name' => 'Ptv',
    'icon' => 'heroicon-o-bookmark',
>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
=======
        'Modules\\User\\Providers\\UserServiceProvider',
    ],
>>>>>>> e83070fd (.)
=======
        'Modules\\User\\Providers\\UserServiceProvider',
    ],
>>>>>>> bdeae81f (first)
=======
        'Modules\\Tenant\\Providers\\TenantServiceProvider',
    ],
>>>>>>> 0253339c (first)
=======
declare(strict_types=1);

return [
    'name' => 'Rating',
    'icon' => 'heroicon-o-star', // icon on dashboard
    'navigation_sort' => 1,
>>>>>>> bc2abf99 (.)
=======
        'Modules\\Activity\\Providers\\ActivityServiceProvider',
    ],
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
];
