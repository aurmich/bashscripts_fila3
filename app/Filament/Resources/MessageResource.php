<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaResponsabilita\Filament\Resources;

use Modules\IndennitaCondizioniLavoro\Models\Message;
use Modules\IndennitaResponsabilita\Filament\Resources\MessageResource\Pages;
use Modules\Ptv\Filament\Resources\MessageResource as PtvMessageResource;

class MessageResource extends PtvMessageResource
{
    protected static ?string $model = Message::class;

=======
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Filament\Resources;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\MessageResource\Pages;
use Modules\Progressioni\Filament\Resources\MessageResource\RelationManagers;
use Modules\Progressioni\Models\Message;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class MessageResource extends XotBaseResource
{
    protected static ?string $model = Message::class;

<<<<<<< HEAD
=======
namespace Modules\Ptv\Filament\Resources;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Modules\Ptv\Filament\Resources\MessageResource\Pages;
use Modules\UI\Filament\Forms\Components\ParentSelect;
use Modules\Xot\Filament\Resources\XotBaseResource;

class MessageResource extends XotBaseResource
{
>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
            'id' => Forms\Components\TextInput::make('id')
                ->disabled(),
            'type' => Forms\Components\TextInput::make('type')
                ->required()
                ->maxLength(50),
            'title' => Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            'txt' => Forms\Components\TextInput::make('txt')
                ->required()
                ->maxLength(255),
            'anno' => Forms\Components\TextInput::make('anno')
                ->required()
                ->numeric()
                ->default(date('Y')),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('type'),
                TextColumn::make('title'),
                TextColumn::make('txt'),
                TextColumn::make('anno'),
            ])
            ->filters([
                app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
            ], layout: FiltersLayout::AboveContent)
            ->persistFiltersInSession()
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    /**
     * @return array<RelationManagers>
     */
<<<<<<< HEAD
=======
            'parent_id' => TextInput::make('parent_id'),
            // ParentSelect::make('parent_id'),
            'type' => TextInput::make('type'),
            'title' => TextInput::make('title'),
            'anno' => TextInput::make('anno'), // ->default(fn($livewire)=>dddx($livewire->getTableFilters())),
            // RichEditor::make('txt')->columnspan('full'),
            // Textarea::make('txt')->columnspan('full'),
            'txt' => TiptapEditor::make('txt')
                ->columnSpan('full')
                ->output(TiptapOutput::Html),
        ];
    }

>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    public static function getRelations(): array
    {
        return [
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> bcab6efe (first)
=======
>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
}
