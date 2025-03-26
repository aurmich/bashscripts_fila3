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
    public function handle(): void
    {
        $email = text('email ?');

        $xot = XotData::make();
        $user = $xot->getUserByEmail($email);

        if (!$user instanceof UserContract) {
            $this->error('User not found!');
            return;
        }

        $teamClass = $xot->getTeamClass();
        if (!class_exists($teamClass)) {
            $this->error('Team class not found!');
            return;
        }

        /** @var array<int|string, string> */
        $opts = $teamClass::pluck('name', 'id')->toArray();

        $team_id = select(
            label: 'What team?',
            options: $opts,
            required: true,
            scroll: 10,
        );

        $user->current_team_id = (int) $team_id;
        $user->save();

        $this->info('OK');
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
