<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\ArticleResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Modules\Blog\Actions\Article\ImportArticlesFromByJsonTextAction;
use Modules\Blog\Filament\Resources\ArticleResource;
use Modules\Blog\Models\Category;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListArticles extends XotBaseListRecords
{
    use ListRecords\Concerns\Translatable;

    // protected static string $resource = ArticleResource::class;

    /**
     * @return array<string, mixed>
     */
    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id'),
            'title' => Tables\Columns\TextColumn::make('title')
                ->wrap()
                ->sortable()
                ->searchable(),
            'category_title' => Tables\Columns\TextColumn::make('category.title')
                ->sortable()
                ->searchable(),
            'published_at' => Tables\Columns\TextColumn::make('published_at')
                ->dateTime()
                ->sortable(),
            'closed_at' => Tables\Columns\TextColumn::make('closed_at')
                ->dateTime()
                ->sortable(),
            'rewarded_at' => Tables\Columns\TextColumn::make('rewarded_at')
                ->dateTime()
                ->sortable(),
            'is_featured' => Tables\Columns\IconColumn::make('is_featured')
                ->boolean()
                ->sortable(),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            'edit' => Tables\Actions\EditAction::make()->label(''),
            'view' => Tables\Actions\ViewAction::make()->label(''),
            'delete' => Tables\Actions\DeleteAction::make()->label(''),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\BulkAction>
     */
    public function getTableBulkActions(): array
    {
        return [
            'delete' => Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            Tables\Filters\Filter::make('is_featured')->toggle(),
            Tables\Filters\SelectFilter::make('Categoria')
                ->options(Category::getTreeCategoryOptions())
                ->attribute('category_id'),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())
            ->filters($this->getTableFilters())
            ->bulkActions($this->getTableBulkActions())
            ->actionsPosition(ActionsPosition::BeforeColumns)
            ->actions($this->getTableActions())
            ->defaultSort('published_at', 'desc');
    }

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
                        ->afterStateUpdated(static function (callable $set, TemporaryUploadedFile $state): void {
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
