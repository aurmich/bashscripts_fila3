<?php

declare(strict_types=1);

namespace Modules\Performance\Providers;

use Illuminate\Support\ServiceProvider;
use Spipu\Html2Pdf\Html2Pdf;

class Html2PdfServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('html2pdf', function ($app) {
            return new Html2Pdf('P', 'A4', 'it', true, 'UTF-8', [0, 0, 0, 0]);
        });
    }

    public function boot(): void
    {
        //
    }
} 