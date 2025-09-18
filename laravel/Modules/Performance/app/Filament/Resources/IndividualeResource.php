<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Illuminate\Support\Arr;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Performance\Filament\Resources\IndividualeResource\Pages;
use Modules\Performance\Models\CriteriValutazione;
use Modules\Performance\Models\Individuale;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class IndividualeResource extends XotBaseResource
{
    protected static ?string $model = Individuale::class;

    
    public static function getFormSchema(): array
    {
        return [
            'id' => TextInput::make('id')->disabled(),

            'diritto_section' => Section::make('diritto')
                ->headerActions([
                    Forms\Components\Actions\Action::make('refresh')
                        ->label('')
                        ->tooltip('ricalcola')
                        ->icon('heroicon-o-arrow-path')
                        ->action(function ($record) {
                            dddx($record);
                        }),
                ])
                ->schema([
                    'ha_diritto' => Toggle::make('ha_diritto'),
                    'motivo' => Textarea::make('motivo')->columnSpan(3),
                ])
                ->columns(4),

            'lavoratore_section' => Section::make('lavoratore')->schema([
                'matr' => TextInput::make('matr'),
                'cognome' => TextInput::make('cognome'),
                'nome' => TextInput::make('nome'),
                'email' => TextInput::make('email'),
            ])->columns(4),

            'qua_section' => Section::make('qua')->schema([
                'propro' => TextInput::make('propro'),
                'posfun' => TextInput::make('posfun'),
                'posiz' => TextInput::make('posiz'),
                'posiz_txt' => TextInput::make('posiz_txt'),
                'disci1' => TextInput::make('disci1'),
                'disci1_txt' => TextInput::make('disci1_txt'),
            ])->columns(5),

            'rep_section' => Section::make('rep')->schema([
                'stabi' => TextInput::make('stabi'),
                'stabi_txt' => TextInput::make('stabi_txt'),
                'repar' => TextInput::make('repar'),
                'repar_txt' => TextInput::make('repar_txt'),
            ])->columns(2),

            'periodo_section' => Section::make('periodo')->schema([
                'dal' => TextInput::make('dal'),
                'al' => TextInput::make('al'),
                'anno' => TextInput::make('anno'),
            ])->columns(4),

            'assenze_section' => Section::make('assenze')->schema([
                'gg_assenza_dalal' => TextInput::make('gg_assenza_dalal'),
                'hh_assenza_dalal' => TextInput::make('hh_assenza_dalal'),
            ])->columns(4),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'ha_diritto' => Tables\Columns\ToggleColumn::make('ha_diritto')
                ->sortable(),
            'motivo' => Tables\Columns\TextColumn::make('motivo')
                ->searchable(),
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->searchable(),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->searchable(),
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->searchable(),
            'email' => Tables\Columns\TextColumn::make('email')
                ->searchable(),
            'stabi' => Tables\Columns\TextColumn::make('stabi')
                ->sortable(),
            'stabi_txt' => Tables\Columns\TextColumn::make('stabi_txt')
                ->searchable(),
            'repar' => Tables\Columns\TextColumn::make('repar')
                ->sortable(),
            'repar_txt' => Tables\Columns\TextColumn::make('repar_txt')
                ->searchable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->sortable(),
        ];
    }

    public static function getTableFilters(): array
    {
        return [
            'anno' => app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)
                ->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
        ];
    }

    public static function getTableActions(): array
    {
        return [
            'edit' => Tables\Actions\EditAction::make(),
            'fill' => Tables\Actions\Action::make('fill')
                ->label('Compila')
                ->url(fn ($record) => Pages\FillOutTheForm::getUrl(['record' => $record])),
        ];
    }

    public static function getTableBulkActions(): array
    {
        return [
            'delete' => Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    

    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndividuales::route('/'),
            'create' => Pages\CreateIndividuale::route('/create'),
            'edit' => Pages\EditIndividuale::route('/{record}/edit'),
            'fill_out_the_form' => Pages\FillOutTheForm::route('/{record}/fill'),
        ];
    }

    public static function getXlsFields(array $data): array
    {
        $anno = Arr::get($data, 'stabi_repar_anno.anno', intval(date('Y')) - 1);
        $criteri = CriteriValutazione::where('anno', $anno)
            ->where('post_type', 'po')
            ->orderBy('posizione')
            ->get();

        $fields = [
            'id',
            'ente',
            'matr',
            'cognome',
            'nome',
            'email',
            'dal',
            'al',
        ];
        $transKey = app(GetTransKeyAction::class)->execute(static::class);
        $trans = trans($transKey);

        foreach ($criteri as $criterio) {
            $fields[] = $criterio->nome;
            Arr::set($trans, 'fields.'.$criterio->nome, $criterio->label);
        }
        app(SaveTransAction::class)->execute($transKey, $trans);
        $fields[] = 'excellence';
        $fields[] = 'totale_punteggio';

        return $fields;
    }
}
