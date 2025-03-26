<?php

declare(strict_types=1);

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
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
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

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
}
