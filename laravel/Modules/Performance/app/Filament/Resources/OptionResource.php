<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Modules\Performance\Enums\WorkerType;
use Modules\Performance\Filament\Resources\OptionResource\Pages;
use Modules\Performance\Models\Option;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class OptionResource extends XotBaseResource
{
    protected static ?string $model = Option::class;

   

   

    public static function table(Table $table): Table
    {
        return $table->columns(
            [
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable(),
                /*
                Tables\Columns\TextInputColumn::make('parent_id')
                    ->type('number')
                    ->sortable(),
                */
                Tables\Columns\SelectColumn::make('parent_id')->options(function ($record) {
                    $opts = Option::where('year', $record->year)
                        ->where('option_type', $record->option_type)
                        ->where('name', $record->name)
                        ->where('id', '!=', $record->getKey())
                        ->where('value', '!=', '')
                        ->get()
                        ->mapWithKeys(function ($item) {
                            $k = $item->id;
                            $v = $item->id.' ]'.$item->value;

                            return [$k => $v];
                        })
                        ->concat([null => 'Root'])
                        ->toArray();

                    return $opts;
                }),
                Tables\Columns\TextColumn::make('option_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('txt')
                    ->searchable()
                    ->wrap()
                    ->html(),
                Tables\Columns\TextColumn::make('txt1')
                    ->searchable()
                    ->wrap()
                    ->html(),
                /*
                Tables\Columns\TextColumn::make('option_id')
                    ->numeric()
                    ->sortable(),
                */
                /*
                Tables\Columns\TextColumn::make('pos')
                    ->numeric()
                    ->sortable(),
                */
                Tables\Columns\TextColumn::make('year')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('year')
                    ->options(function () {
                        $currentYear = (int) date('Y');

                        return [
                            $currentYear => $currentYear,
                            $currentYear - 1 => $currentYear - 1,
                            $currentYear - 2 => $currentYear - 2,
                        ];
                    }),
                SelectFilter::make('option_type')
                    ->options(WorkerType::class),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('pos')
            ->reorderable('pos');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOptions::route('/'),
            'create' => Pages\CreateOption::route('/create'),
            'edit' => Pages\EditOption::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('option_type')
                ->maxLength(191),
            Forms\Components\TextInput::make('option_id')
                ->numeric(),
            Forms\Components\TextInput::make('parent_id')
                ->numeric(),
            Forms\Components\TextInput::make('pos')
                ->numeric(),
            Forms\Components\Textarea::make('name')
                ->columnSpanFull(),
            Forms\Components\Textarea::make('value')
                ->columnSpanFull(),
            Forms\Components\Textarea::make('txt')
                ->columnSpanFull(),
            Forms\Components\Textarea::make('txt1')
                ->columnSpanFull(),
            Forms\Components\TextInput::make('year')
                ->numeric(),
        ];
    }
}
