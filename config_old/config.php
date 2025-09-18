<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
    'name' => 'Media',
    'description' => 'Modulo per la gestione dei file multimediali e documenti',
    'icon' => 'heroicon-o-photo',
    'navigation' => [
        'enabled' => true,
        'sort' => 60,
=======
    'name' => 'User',
    'description' => 'Modulo per la gestione degli utenti e autorizzazioni',
    'icon' => 'heroicon-o-users',
    'navigation' => [
        'enabled' => true,
        'sort' => 100,
>>>>>>> e83070fd (.)
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
<<<<<<< HEAD
        'Modules\\Media\\Providers\\MediaServiceProvider',
=======
        'Modules\\User\\Providers\\UserServiceProvider',
>>>>>>> e83070fd (.)
    ],
];
