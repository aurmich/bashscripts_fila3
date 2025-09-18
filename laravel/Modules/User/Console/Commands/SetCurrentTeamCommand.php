<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Team;
use App\Models\User;
use Illuminate\Console\Command;

class SetCurrentTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:set-current-team {user_id : The ID of the user} {team_id : The ID of the team}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the current team for a specific user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $userId = $this->argument('user_id');
        $teamId = $this->argument('team_id');

        $user = User::find($userId);
        if (! $user) {
            $this->error("User with ID {$userId} not found.");

            return self::FAILURE;
        }

        $team = Team::find($teamId);
        if (! $team) {
            $this->error("Team with ID {$teamId} not found.");

            return self::FAILURE;
        }

        $user->switchTeam($team);
        $this->info("Successfully set current team for user {$user->name} to {$team->name}");

        return self::SUCCESS;
    }
}
