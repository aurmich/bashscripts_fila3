<?php

/**
 * ---.
 */

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Xot\Contracts;
=======
namespace Modules\User\Contracts;
>>>>>>> 0d55b583 (first)
=======
namespace Modules\User\Contracts;
>>>>>>> e83070fd (.)
=======
namespace Modules\User\Contracts;
>>>>>>> bdeae81f (first)

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Token;
use Laravel\Passport\TransientToken;

/**
 * @propery \Laravel\Passport\Token|\Laravel\Passport\TransientToken|null $accessToken;
 *
 * @phpstan-require-extends Model
 */
interface PassportHasApiTokensContract
{
    /**
     * Get all of the user's registered OAuth clients.
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return HasMany
     */
    public function clients();

    /**
     * Get all of the access tokens for the user.
     *
     * @return HasMany
     */
    public function tokens();

    /**
     * Get the current access token being used by the user.
     *
     * @return Token|TransientToken|null
     */
    public function token();

    /**
     * Determine if the current API token has a given scope.
     *
     * @param string $scope
     *
     * @return bool
     */
    public function tokenCan($scope);

    /**
     * Create a new personal access token for the user.
     *
     * @param string $name
     *
     * @return PersonalAccessTokenResult
     */
    public function createToken($name, array $scopes = []);
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
     */
    public function clients(): HasMany;

    /**
     * Get all of the access tokens for the user.
     */
    public function tokens(): HasMany;

    /**
     * Get the current access token being used by the user.
     */
    public function token(): Token|TransientToken|null;

    /**
     * Determine if the current API token has a given scope.
     */
    public function tokenCan(string $scope): bool;

    /**
     * Create a new personal access token for the user.
     */
    public function createToken(string $name, array $scopes = []): PersonalAccessTokenResult;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)

    /**
     * Set the current access token for the user.
     *
     * @return $this
     */
    public function withAccessToken(Token|TransientToken $accessToken);
}
