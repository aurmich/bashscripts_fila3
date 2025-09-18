<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Laravel\Socialite\Contracts\User;

<<<<<<< HEAD
=======
/**
 * Classe che risolve e normalizza i campi del nome utente da dati di provider Socialite.
 */
>>>>>>> bdeae81f (first)
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
<<<<<<< HEAD
        $this->first_name = $this->resolveFirstName($user);
        $this->last_name = $this->resolveLastName($user);
=======
        $this->first_name = $this->resolveName($user);
        $this->last_name = $this->resolveSurname($user);
>>>>>>> bdeae81f (first)
    }

    public static function make(User $user): self
    {
        return new self($user);
    }

<<<<<<< HEAD
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
=======
    private function resolveName(User $idpUser): string
    {
        return $this->resolveNameFields($idpUser, self::NAME_SEARCH);
    }

    private function resolveSurname(User $idpUser): string
    {
        return $this->resolveNameFields($idpUser, self::SURNAME_SEARCH);
    }

    /**
     * @param  string $searchMethod  use self constants (NAME_SEARCH, SURNAME_SEARCH)
     */
    private function resolveNameFields(User $idpUser, string $searchMethod): string
    {
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH])) {
            throw new \InvalidArgumentException('Metodo di ricerca non valido');
        }

        $name = $idpUser->getName();
        if (!is_string($name) || empty($name)) {
            return '';
        }

        $nameSection = $this->resolveNameFieldByNameAttributeAnalysis($name, $searchMethod);

        if ($nameSection->isNotEmpty()) {
            return $nameSection->toString();
        }

        // Ottenere i dati raw in modo sicuro attraverso reflection
        $raw = [];
        try {
            $reflection = new \ReflectionClass($idpUser);
            if ($reflection->hasMethod('getRaw')) {
                $method = $reflection->getMethod('getRaw');
                $method->setAccessible(true);
                $rawValue = $method->invoke($idpUser);
                if (is_array($rawValue)) {
                    $raw = $rawValue;
                }
            } elseif ($reflection->hasProperty('user')) {
                $property = $reflection->getProperty('user');
                $property->setAccessible(true);
                $userData = $property->getValue($idpUser);
                if (is_array($userData)) {
                    $raw = $userData;
                }
            }
        } catch (\ReflectionException $e) {
            // Fallback silenzioso
        }

        // Tenta di ottenere un nome dai dati raw
        $nameField = '';
        if (isset($raw['name']) && is_string($raw['name']) && !empty($raw['name'])) {
            $nameField = $raw['name'];
        }

        if (empty($nameField)) {
            return '';
        }

        $nameSection = $this->resolveNameFieldByNameAttributeAnalysis($nameField, $searchMethod);
        if (!$nameSection->isNotEmpty()) {
            // If both sections were empty, try the "hardest way"
            // by analyzing email address
            $email = $idpUser->getEmail();
            if (!is_string($email) || empty($email)) {
                return '';
            }

            return Str::of($email)
                ->trim()
                ->before('@')
                ->$searchMethod('.') // If no point is available, the whole string should be returned
                ->trim()
                ->title()
                ->toString();
        }

        if (filter_var($nameSection->toString(), FILTER_VALIDATE_EMAIL)) {
            // If both sections were empty, try the "hardest way"
            // by analyzing email address
            $email = $idpUser->getEmail();
            if (!is_string($email) || empty($email)) {
                return '';
            }

            return Str::of($email)
                ->trim()
                ->before('@')
                ->$searchMethod('.') // If no point is available, the whole string should be returned
                ->trim()
                ->title()
                ->toString();
        }

        return $nameSection->toString();
>>>>>>> bdeae81f (first)
    }

    private function resolveNameFieldByNameAttributeAnalysis(string $nameField, string $searchMethod): Stringable
    {
<<<<<<< HEAD
=======
        if (empty($nameField)) {
            return Str::of('');
        }

        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH])) {
            throw new \InvalidArgumentException('Metodo di ricerca non valido');
        }

>>>>>>> bdeae81f (first)
        return Str::of($nameField)
            ->trim()
            ->$searchMethod(' ')
            ->trim();
    }
}
