<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Laravel\Socialite\Contracts\User;

final class UserNameFieldsResolver
{
    private const NAME_SEARCH = 'before';

    private const SURNAME_SEARCH = 'after';

    public readonly ?string $name;

    public readonly ?string $first_name;

    public readonly ?string $last_name;

    public function __construct(User $user)
    {
        $this->name = $this->resolveName($user);
        $this->first_name = $this->resolveFirstName($user);
        $this->last_name = $this->resolveLastName($user);
    }

    public static function make(User $user): self
    {
        return new self($user);
    }

    /**
     * Execute the action.
     *
     * @param \Laravel\Socialite\Contracts\User $socialiteUser
     *
     * @return array{name: string, first_name: string, last_name: string}
     */
    public function execute($socialiteUser): array
    {
        $name = $this->resolveName($socialiteUser);
        $firstName = $this->resolveFirstName($socialiteUser);
        $lastName = $this->resolveLastName($socialiteUser);

        return [
            'name' => $name,
            'first_name' => $firstName,
            'last_name' => $lastName,
        ];
    }

    /**
     * Resolve the user's full name.
     */
    private function resolveName($socialiteUser): string
    {
        return (string) ($socialiteUser->getName() ?? '');
    }

    /**
     * Resolve the user's first name.
     */
    private function resolveFirstName($socialiteUser): string
    {
        return (string) ($socialiteUser->user['given_name'] ?? '');
    }

    /**
     * Resolve the user's last name.
     */
    private function resolveLastName($socialiteUser): string
    {
        return (string) ($socialiteUser->user['family_name'] ?? '');
    }

    private function resolveNameFieldByNameAttributeAnalysis(string $nameField, string $searchMethod): Stringable
    {
        return Str::of($nameField)
            ->trim()
            ->$searchMethod(' ')
            ->trim();
    }
}
