<?php

declare(strict_types=1);

namespace Modules\Ptv\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Livewire\Wireable;
use Modules\Xot\Actions\GetTransKeyAction;
use Spatie\LaravelData\Concerns\WireableData;

enum WorkerType: string implements HasColor, HasIcon, HasLabel, Wireable
{
    use WireableData;

    case Dip = 'dip';
    case Regionale = 'regionale';
    case Po = 'po';
    case Dirigente = 'dirigente';
    
    public static function trans(string $key): string
    {
        $transKey = app(GetTransKeyAction::class)->execute(self::class);
        $tmp = $transKey.'.'.$key;
        $res = trans($tmp);
        if (\is_string($res)) {
            return $res;
        }

        return 'fix:'.$tmp;
    }

    public function getColor(): string
    {
        return self::trans($this->value.'.color');
        /*
        return match ($this) {
            self::Active => 'success',
            self::Inactive => 'warning',
            self::Trashed => 'danger',
        };
        */
    }

    public function getIcon(): string
    {
        return self::trans($this->value.'.icon');
        /*
        return match ($this) {
            self::Active => 'heroicon-o-check-circle',
            self::Inactive => 'heroicon-o-document',
            self::Trashed => 'heroicon-o-x-circle',
        };
        */
    }

    public function getLabel(): string
    {
        return self::trans($this->value.'.label');
        /*
        return match ($this) {
            self::Active => __('job::schedule.status.active'),
            self::Inactive => __('job::schedule.status.inactive'),
            self::Trashed => __('job::schedule.status.trashed'),
        };
        */
    }
}
