<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Actions\Socialite\Utils\UserNameFieldsResolver;
use Spatie\QueueableAction\QueueableAction;

class GetUserModelAttributesFromSocialiteAction
{
    use QueueableAction;

    public readonly string $name;

    public readonly string $first_name;

    public readonly string $last_name;

    public readonly string $email;

    public function __construct(
        private readonly string $provider,
        private readonly SocialiteUserContract $oauthUser,
    ) {
        $nameFieldsResolver = app(UserNameFieldsResolver::class, ['user' => $this->oauthUser]);
        $this->name = $nameFieldsResolver->name;
        $this->first_name = $nameFieldsResolver->name;
        $this->last_name = $nameFieldsResolver->last_name;
        $this->email = $this->oauthUser->getEmail();
    }

    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * Execute the action.
     *
     * @param \Laravel\Socialite\Contracts\User $socialiteUser
     * @param string $provider
     *
     * @return array<string, mixed>
     */
    public function execute($socialiteUser, string $provider): array
    {
        $nameFields = app(UserNameFieldsResolver::class)->execute($socialiteUser);

        return [
            'name' => $nameFields['name'],
            'first_name' => $nameFields['first_name'],
            'last_name' => $nameFields['last_name'],
            'email' => $socialiteUser->getEmail(),
            'provider' => $provider,
            'provider_id' => (string) $socialiteUser->getId(),
        ];
    }
}
