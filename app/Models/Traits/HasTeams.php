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
     * Get the current team of the user's context.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\User\Contracts\TeamContract, static>
     */
    public function currentTeam(): BelongsTo
    {
        /** @var class-string<Team> $teamClass */
        $teamClass = XotData::make()->getTeamClass();
        return $this->belongsTo($teamClass, 'current_team_id');
    }

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(Team $team): bool
    {
        if (! $this->belongsToTeam($team)) {
            return false;
        }

        $this->forceFill([
            'current_team_id' => $team->id,
        ])->save();

        $this->setRelation('currentTeam', $team);

        return true;
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\User\Contracts\TeamContract>
     */
    public function ownedTeams(): HasMany
    {
        /** @var class-string<Team> $teamClass */
        $teamClass = XotData::make()->getTeamClass();
        return $this->hasMany($teamClass, 'user_id');
    }

    /**
     * Get all of the teams the user belongs to.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Modules\User\Contracts\TeamContract>
     */
    public function teams(): BelongsToMany
    {
        /** @var class-string<Team> $teamClass */
        $teamClass = XotData::make()->getTeamClass();
        return $this->belongsToMany($teamClass)
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
     * Determine if the user owns the given team.
     */
    public function ownsTeam(Team $team): bool
    {
        return $this->ownedTeams()->where('id', $team->id)->exists();
    }

    /**
     * Determine if the user belongs to the given team.
     */
    public function belongsToTeam(Team $team): bool
    {
        return $this->teams()->where('team_id', $team->id)->exists();
    }

    /**
     * Get the role that the user has on the team.
     */
    public function teamRole(Team $team): ?Role
    {
        if (! $this->belongsToTeam($team)) {
            return null;
        }

        $pivot = $this->teams()->where('team_id', $team->id)->first()?->pivot;
        return $pivot ? Role::findByName($pivot->role) : null;
    }

    /**
     * Get the user's permissions for the given team.
     */
    public function teamPermissions(Team $team): array
    {
        $role = $this->teamRole($team);
        return $role ? $role->permissions->pluck('name')->toArray() : [];
    }

    /**
     * Determine if the user has the given permission on the given team.
     */
    public function hasTeamPermission(Team $team, string $permission): bool
    {
        return $this->belongsToTeam($team) && in_array($permission, $this->teamPermissions($team), true);
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

    public function canManageTeam(Team $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'manage');
    }

    public function canAddTeamMembers(Team $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'add_team_members');
    }

    public function canDeleteTeam(Team $team): bool
    {
        return $this->ownsTeam($team);
    }

    public function canRemoveTeamMembers(Team $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'remove_team_members');
    }

    public function canUpdateTeam(Team $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update_team');
    }

    public function createTeam(array $input): Team
    {
        /** @var class-string<Team> $teamClass */
        $teamClass = XotData::make()->getTeamClass();

        /** @var Team $team */
        $team = $this->ownedTeams()->create([
            'name' => $input['name'],
            'personal_team' => $input['personal_team'] ?? false,
        ]);

        $this->switchTeam($team);

        return $team;
    }

    public function updateTeamName(Team $team, string $name): void
    {
        if ($this->canUpdateTeam($team)) {
            $team->forceFill([
                'name' => $name,
            ])->save();
        }
    }

    public function addTeamMember(Team $team, string $email, string $role = null): void
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

    public function removeTeamMember(Team $team, int $userId): void
    {
        if ($this->canRemoveTeamMembers($team)) {
            $team->users()->detach($userId);
        }
    }

    public function deleteTeam(Team $team): void
    {
        if ($this->canDeleteTeam($team)) {
            $team->delete();
        }
    }
}
