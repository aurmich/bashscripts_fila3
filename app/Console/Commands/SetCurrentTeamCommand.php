<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;

use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

<<<<<<< HEAD
=======
/**
 * Comando per impostare il team corrente per un utente.
 */
>>>>>>> bdeae81f (first)
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
<<<<<<< HEAD
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
=======
    public function handle(): void
    {
        $email = text('email ?');
        if (empty($email)) {
            $this->error('Email non valida!');
            return;
        }

        $xot = XotData::make();
        $user = $xot->getUserByEmail($email);

        if (! $user instanceof \Illuminate\Database\Eloquent\Model) {
            $this->error('Utente non trovato o non valido!');
            return;
        }

        $teamClass = $xot->getTeamClass();
        if (!class_exists($teamClass)) {
            $this->error('Classe team non trovata!');
            return;
        }

        /** @var array<int|string, string> */
        $opts = $teamClass::pluck('name', 'id')->toArray();

        if (empty($opts)) {
            $this->error('Nessun team disponibile!');
            return;
        }

        $team_id = select(
            label: 'Quale team?',
            options: $opts,
            required: true,
            scroll: 10,
        );

        if (!is_numeric($team_id)) {
            $this->error('ID team non valido!');
            return;
        }

        try {
            $user->current_team_id = (int) $team_id;
            $user->save();
            $this->info('OK');
        } catch (\Exception $e) {
            $this->error('Errore durante il salvataggio: ' . $e->getMessage());
        }
>>>>>>> bdeae81f (first)
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
