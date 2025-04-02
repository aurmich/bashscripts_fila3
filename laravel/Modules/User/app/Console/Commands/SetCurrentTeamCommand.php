<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;

use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class SetCurrentTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'user:set-current-team';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign current team to user';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $user = auth()->user();

        if (! $user instanceof UserContract) {
            $this->error('User not found or not authenticated.');
            return self::FAILURE;
        }

        $teamId = $this->argument('team_id');
        $team = $user->ownedTeams()->find($teamId);

        if (! $team) {
            $this->error('Team not found or not owned by user.');
            return self::FAILURE;
        }

        $user->switchTeam($team);
        $this->info('Current team switched successfully.');

        return self::SUCCESS;
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
