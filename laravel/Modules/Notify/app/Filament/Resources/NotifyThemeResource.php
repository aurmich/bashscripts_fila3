<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\CreateNotifyTheme;
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\EditNotifyTheme;
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\ListNotifyThemes;
use Modules\Notify\Models\NotifyTheme;
use Modules\Xot\Filament\Resources\XotBaseResource;

class NotifyThemeResource extends XotBaseResource
{
    // //

    protected static ?string $model = NotifyTheme::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Select::make('lang')->options(self::fieldOptions('lang')),
                    Select::make('type')->options(self::fieldOptions('type')),
                    Select::make('post_type')->options(self::fieldOptions('post_type')),
                    TextInput::make('post_id'),
                    TextInput::make('subject'),
                    TextInput::make('from'),
                    TextInput::make('from_email'),
                    SpatieMediaLibraryFileUpload::make('logo_src')
                        ->enableOpen()
                        ->enableDownload()
                        ->columnSpanFull()
                        ->disk('uploads')
                        ->directory('photos')
                        ->preserveFilenames(),
                    TextInput::make('logo_width'),
                    TextInput::make('logo_height'),
                    // Forms\Components\TextInput::make('theme'),
                    Select::make('theme')->options(
                        [
                            'empty' => 'empty',
                            'ark' => 'ark',
                            'minty' => 'minty',
                            'sunny' => 'sunny',
                            'widgets' => 'widgets',
                        ]
                    )
                        ->default('empty'),
                    Textarea::make('body')->columnSpanFull(),
                    RichEditor::make('body_html')->columnSpanFull(),
                    // TinyEditor::make('body_html')->columnSpanFull(),
                ]
            );
    }

    public static function fieldOptions(string $field): array
    {
        return NotifyTheme::select($field)
            ->where($field, '!=', null)
            ->distinct()
            ->pluck($field, $field)
            ->toArray();
    }

    public static function tableOLD(Table $table): Table
    {
        return $table
            ->columns(
                [
                    'id' => TextColumn::make('id')->sortable(),
                    'lang' => TextColumn::make('lang')->sortable(),
                    'type' => TextColumn::make('type')->sortable(),
                    'post_id' => TextColumn::make('post_id')->sortable(),
                    'post_type' => TextColumn::make('post_type')->sortable(),
                    'logo_src' => TextColumn::make('logo_src')->sortable(),
                ]
            )
            ->filters(
                [
                    SelectFilter::make('lang')
                        ->options(self::fieldOptions('lang')),
                    SelectFilter::make('post_type')
                        ->options(self::fieldOptions('post_type')),
                    SelectFilter::make('type')
                        ->options(self::fieldOptions('type')),
                ]
            )
            ->actions(
                [
                    EditAction::make(),
                ]
            )
            ->bulkActions(
                [
                    DeleteBulkAction::make(),
                ]
            )
            ->headerActions(
                [
                    CreateAction::make(),
                ]
            );
    }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\LinkableRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNotifyThemes::route('/'),
            'create' => CreateNotifyTheme::route('/create'),
            'edit' => EditNotifyTheme::route('/{record}/edit'),
        ];
    }
}
