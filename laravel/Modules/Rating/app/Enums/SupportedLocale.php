<?php

declare(strict_types=1);

namespace Modules\Rating\Enums;

enum SupportedLocale: string
{
    case IT = 'it';
    case EN = 'en';

    /**
     * Get the human-readable label for the locale.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::IT => 'Italiano',
            self::EN => 'English',
        };
    }

    /**
     * Get all available locales as array.
     *
     * @return array<string, string>
     */
    public static function toArray(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return array_reduce(
=======
        /** @var array<string, string> $result */
        $result = array_reduce(
>>>>>>> 55edff60 (.)
=======
        /** @var array<string, string> $result */
        $result = array_reduce(
>>>>>>> a563de5c (.)
            self::cases(),
            fn (array $carry, self $locale) => [...$carry, $locale->value => $locale->getLabel()],
            []
        );
<<<<<<< HEAD
<<<<<<< HEAD
    }

=======
=======
>>>>>>> a563de5c (.)
        
        return $result;
    }
    
    /**
     * Create from string value.
     */
>>>>>>> 55edff60 (.)
    public static function fromString(string $value): self
    {
        return match ($value) {
            'it' => self::IT,
            'en' => self::EN,
            default => self::IT,
        };
    }
<<<<<<< HEAD

    public function label(): string
    {
        return match ($this) {
            self::IT => 'Italiano',
            self::EN => 'English',
        };
    }
=======
>>>>>>> 55edff60 (.)
}
