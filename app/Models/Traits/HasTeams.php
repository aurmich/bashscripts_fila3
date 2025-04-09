<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Membership;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;
use Modules\User\Models\Team;

/**
 * Trait HasTeams.
 *
 * @property Team|null $currentTeam
 * @property int|null $current_team_id
 * @property-read Collection<int, Team> $teams
 * @property-read Collection<int, Team> $ownedTeams
 */
trait HasTeams
{
    /**
     * Determine if the given team is the current team.
     */
    public function isCurrentTeam(TeamContract $teamContract): bool
    {
        if ($this->currentTeam === null) {
            return false;
        }

        return $teamContract->getKey() == $this->currentTeam->getKey();
    }

    /**
     * Get the current team of the user's.
     *
     * @return BelongsTo<Team, static>
     */
    public function currentTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'current_team_id');
    }

    /**
     * Get all of the teams the user owns or belongs to.
     *
     * @return Collection<TeamContract>
     */
    public function allTeams(): Collection
    {
        return $this->teams()->get();
    }

    /**
     * Get all of the teams the user owns.
     *
     * @return HasMany<Team, static>
     */
    public function ownedTeams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     * Get all of the teams the user belongs to.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Modules\User\Models\Team, static>
     */
    public function teams(): BelongsToMany
    {
        /** @var class-string<Team> $teamClass */
        $teamClass = XotData::make()->getTeamClass();
        return $this->belongsToManyX($teamClass)
            ->withPivot('role')
            ->withTimestamps()
            ->as('membership');
    }

    /**
     * Get the user's "personal" team.
     */
    public function personalTeam(): ?TeamContract
    {
        $personalTeam = $this->ownedTeams->where('personal_team', true)->first();
        if ($personalTeam === null) {
            return null;
        }

        Assert::nullOrIsInstanceOf($personalTeam, TeamContract::class, 'Personal team must implement TeamContract.');

        return $personalTeam;
    }

    /**
     * Invite a user to a team.
     */
    public function inviteToTeam(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->attach($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Remove a user from the team.
     */
    public function removeFromTeam(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->detach($user->id);

            return true;
        }

        return false;
    }

    /**
     * Check if the user is an owner or a member.
     */
    public function isOwnerOrMember(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->belongsToTeam($team);
    }

    /**
     * Promote a member to team admin.
     */
    public function promoteToAdmin(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->updateExistingPivot($user->id, ['role' => 'admin']);

            return true;
        }

        return false;
    }

    /**
     * Demote a member from team admin.
     */
    public function demoteFromAdmin(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->updateExistingPivot($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Get all admins of the team.
     */
    public function getTeamAdmins(TeamContract $team): Collection
    {
        return $team->members()->wherePivot('role', 'admin')->get();
    }

    /**
     * Get all members of the team.
     */
    public function getTeamMembers(TeamContract $team): Collection
    {
        return $team->members()->wherePivot('role', 'member')->get();
    }

    public function canManageTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'manage');
    }

    public function canAddTeamMembers(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'add_team_members');
    }

    public function canDeleteTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
    }

    public function canRemoveTeamMembers(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'remove_team_members');
    }

    public function canUpdateTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update_team');
    }

    /**
     * Create a new team for the user.
     */
    public function createTeam(string $name): Team
    {
        $team = new Team();
        $team->name = $name;
        $team->user_id = $this->id;
        $team->save();

        return $team;
    }

    public function updateTeamName(TeamContract $team, string $name): void
    {
        if ($this->canUpdateTeam($team)) {
            $team->forceFill([
                'name' => $name,
            ])->save();
        }
    }

    public function addTeamMember(TeamContract $team, string $email, ?string $role = null): void
    {
        if ($this->canAddTeamMembers($team)) {
            /** @var class-string<Model&UserContract> $userClass */
            $userClass = XotData::make()->getUserClass();

            /** @var Model&UserContract $newTeamMember */
            $newTeamMember = $userClass::where('email', $email)->firstOrFail();

            $team->users()->attach(
                $newTeamMember,
                ['role' => $role]
            );
        }
    }

    public function removeTeamMember(TeamContract $team, int $userId): void
    {
        if ($this->canRemoveTeamMembers($team)) {
            $team->users()->detach($userId);
        }
    }

    public function deleteTeam(TeamContract $team): void
    {
        if ($this->canDeleteTeam($team)) {
            $team->delete();
        }
    }

    public function switchTeam(\Modules\User\Contracts\TeamContract $team): bool
    {
        if (! $this->belongsToTeam($team)) {
            return false;
        }

        $this->current_team_id = (string) $team->id;
        $this->save();

        return true;
    }

    public function belongsToTeam(\Modules\User\Contracts\TeamContract $team): bool
    {
        return $this->teams()->get()->contains('id', $team->id);
    }

    public function ownsTeam(\Modules\User\Contracts\TeamContract $team): bool
    {
        return $this->ownedTeams()->get()->contains('id', $team->id);
    }

    public function teamRole(\Modules\User\Contracts\TeamContract $team): ?Role
    {
        /** @var \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\Pivot|null $teamUser */
        $teamUser = $this->teams()->get()->first(function ($t) use ($team) {
            return $t->id === $team->id;
        });
        if ($teamUser && method_exists($teamUser, 'getPivot') && $teamUser->getPivot() !== null && isset($teamUser->pivot->role)) {
            return $teamUser->pivot->role;
        }
        return null;
    }

    public function teamPermissions(\Modules\User\Contracts\TeamContract $team): array
    {
        return $this->teamRole($team)->permissions->pluck('name')->toArray() ?? [];
    }

    public function hasTeamPermission(\Modules\User\Contracts\TeamContract $team, string $permission): bool
    {
        return $this->ownsTeam($team) || in_array($permission, $this->teamPermissions($team));
    }

    public function hasTeamRole(\Modules\User\Contracts\TeamContract $team, string $role): bool
    {
        return $this->ownsTeam($team) || $this->teamRole($team)->name === $role;
    }

    public function canLeaveTeam(TeamContract $team): bool
    {
        return $this->belongsToTeam($team) && ! $this->ownsTeam($team);
    }

    public function canRemoveTeamMember(TeamContract $team, UserContract $user): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'remove team member');
    }

    public function canAddTeamMember(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'add team member');
    }

    public function canUpdateTeamMember(TeamContract $team, UserContract $user): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update team member');
    }

    public function canViewTeam(TeamContract $team): bool
    {
        return $this->belongsToTeam($team) || $this->hasTeamPermission($team, 'view team');
    }

    public function canCreateTeam(): bool
    {
        return $this->hasPermissionTo('create team');
    }
}
