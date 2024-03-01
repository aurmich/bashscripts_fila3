<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\ArticleResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Modules\Blog\Filament\Resources\ArticleResource;

class ListArticles extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
            Actions\Action::make('import')
            ->form([
                FileUpload::make('file')
                    ->label('')
                    // ->acceptedFileTypes(['application/json', 'json'])
                    ->imagePreviewHeight('250')
                    ->reactive()
                    ->afterStateUpdated(static function (callable $set, TemporaryUploadedFile $state) {
                        $set('fileContent', File::get($state->getRealPath()));
                    }),
                Textarea::make('fileContent'),
            ])
            ->label('')
            ->tooltip('Import')
            ->icon('heroicon-o-folder-open')
            ->action(static fn (array $data) => app(ImportArticlesFromByJsonTextAction::class)->execute($data['fileContent'])),
        ];
    }
}
