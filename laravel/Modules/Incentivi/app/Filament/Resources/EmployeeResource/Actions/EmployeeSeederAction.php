<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\EmployeeResource\Actions;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Modules\Incentivi\Database\Seeders\SeedEmployeeSeeder;
use Modules\Incentivi\Models\Employee;
use Modules\Xot\Contracts\UserContract;

class EmployeeSeederAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel()
            ->label('Popola TEST Seeder')
            ->icon('heroicon-o-arrow-up-tray')
            ->action(
                static function (UserContract $user, array $data): void {
                    app(SeedEmployeeSeeder::class)->run();
                    Notification::make()->success()->title('Seeder executed successfully.');
                }
            )->visible(fn (): bool => Employee::query()->count() === 0);
    }

    public static function getDefaultName(): ?string
    {
        return 'EmployeeSeederAction';
    }
}
