<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Rating\Enums;
=======
namespace Modules\Rating\App\Enums;
>>>>>>> origin/dev

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
        /** @var array<string, string> $result */
        $result = array_reduce(
=======
        return array_reduce(
>>>>>>> origin/dev
            self::cases(),
            fn (array $carry, self $locale) => [...$carry, $locale->value => $locale->getLabel()],
            []
        );
<<<<<<< HEAD
        
        return $result;
    }
    
    /**
     * Create from string value.
     */
    public static function fromString(string $value): self
    {
        return match ($value) {
            'it' => self::IT,
            'en' => self::EN,
            default => self::IT,
        };
=======
>>>>>>> origin/dev
    }
}
