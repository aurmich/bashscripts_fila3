<?php

declare(strict_types=1);

return [
    'name' => 'Performance',
    'icon' => 'heroicon-o-presentation-chart-line',
    'providers' => [
        \Modules\Performance\Providers\Html2PdfServiceProvider::class,
    ],
];
