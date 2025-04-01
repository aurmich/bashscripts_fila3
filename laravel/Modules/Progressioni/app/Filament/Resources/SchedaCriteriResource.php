<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\SchedaCriteriResource\Pages;
use Modules\Progressioni\Filament\Resources\SchedaCriteriResource\RelationManagers;
use Modules\Progressioni\Models\SchedaCriteri;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class SchedaCriteriResource extends XotBaseResource
{
    protected static ?string $model = SchedaCriteri::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
{
    return [
                TextInput::make('id')->disabled(),
                TextInput::make('criterio'),
                TextInput::make('peso'),

                Toggle::make('is_editable'),
                TextInput::make('field_name'),
                TextInput::make('anno'),
                TextInput::make('pos'),
                TextInput::make('converted_in'),
                Textarea::make('descr')->columnSpanFull(),
                // RichEditor::make('descr')->columnSpanFull(),
    ];//)->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('criterio'),
                TextColumn::make('peso'),
                TextColumn::make('descr')->html()->wrap(),
                TextColumn::make('is_editable'),
                TextColumn::make('field_name'),
                TextColumn::make('anno'),
                TextColumn::make('pos'),
                TextColumn::make('converted_in'),
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
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchedaCriteris::route('/'),
            'create' => Pages\CreateSchedaCriteri::route('/create'),
            'edit' => Pages\EditSchedaCriteri::route('/{record}/edit'),
        ];
    }
}
