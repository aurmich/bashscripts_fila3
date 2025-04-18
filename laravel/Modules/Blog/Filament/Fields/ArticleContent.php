<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Fields;

use Filament\Forms\Components\Builder;
use Modules\Blog\Filament\Blocks\Chart;
use Modules\Rating\Filament\Blocks\Rating;
use Modules\UI\Filament\Blocks\Image;
use Modules\UI\Filament\Blocks\ImagesGallery;
use Modules\UI\Filament\Blocks\ImageSpatie;
use Modules\UI\Filament\Blocks\Paragraph;
use Modules\UI\Filament\Blocks\Title;

class ArticleContent
{
    /**
     * Crea un builder per il contenuto dell'articolo.
     *
     * @param string $name
     * @param string $context
     * @return Builder
     */
    public static function make(string $name, string $context = 'form'): Builder
    {
        return Builder::make($name)
            ->blocks([
                Title::make($name),
                Paragraph::make($name),
                // Image::make('content', $name),
                ImageSpatie::make($name),
                ImagesGallery::make($name),
                Rating::make($name),
                Chart::make($name),
            ])
            ->collapsible();
    }
}
