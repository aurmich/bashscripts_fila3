<?php

declare(strict_types=1);

return [
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
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\Xot\\Providers\\XotServiceProvider',
    ],
>>>>>>> 59bc4fe7 (first)
];
