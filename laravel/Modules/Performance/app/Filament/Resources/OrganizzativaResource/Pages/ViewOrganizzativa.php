<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\OrganizzativaResource\Pages;

use Filament\Actions;
use Filament\Infolists\Components\Livewire;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Modules\Performance\Filament\Resources\OrganizzativaResource;
use Modules\Progressioni\Filament\Infolists as ProgressioniInfolists;
use Modules\Progressioni\Filament\Resources\ProgressioniResource\RelationManagers;
use Modules\Ptv\Filament\Infolists as PtvInfolists;

class ViewOrganizzativa extends ViewRecord
{
    protected static string $resource = OrganizzativaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        $year = 2023;

        return $infolist
            ->schema([
                PtvInfolists\WorkerSection::make('Lavoratore'),
                PtvInfolists\RepSection::make(),
                PtvInfolists\QuaSection::make(),
                /*
                ProgressioniInfolists\HaDirittoSection::make(),
                ProgressioniInfolists\CriteriValutazioneSection::setYear($year)->configure(),
                //ProgressioniInfolists\CriteriValutazioneSection::make(''),
                //Livewire::make(ProgressioniInfolists\CriteriValutazioneSection::class, ['year' => 2023]),
                //ProgressioniInfolists\CriteriPrecedenzaSection::make('Criteri Precedenza'),
                ProgressioniInfolists\CriteriPrecedenzaSection::setYear($year)->configure(),

                //PtvInfolists\Qua00fYearSection::make(),
                //PtvInfolists\Qua00fSection::make(), //-- moved to relationsManager
                //PtvInfolists\Qua03fSection::make(), //-- moved to RelationManager
                //PtvInfolists\AssenzeSection::make(), // non serve
                */
                PtvInfolists\AszEffSection::make(), // -- moved to relationManager

            ]);
    }

    /* va in progressioniResource
    public function getRelations():array {

        return [
            RelationManagers\Qua00fRelationManager::class,
        ];
    }
    */
}
