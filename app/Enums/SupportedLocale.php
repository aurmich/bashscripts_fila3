<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Rating\Enums;
=======
namespace Modules\Rating\App\Enums;
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
namespace Modules\Rating\Enums;
>>>>>>> 2df6fbc8 (first)

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
        /** @var array<string, string> $result */
        $result = array_reduce(
=======
        return array_reduce(
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
        /** @var array<string, string> $result */
        $result = array_reduce(
>>>>>>> 2df6fbc8 (first)
            self::cases(),
            fn (array $carry, self $locale) => [...$carry, $locale->value => $locale->getLabel()],
            []
        );
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2df6fbc8 (first)
        
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
<<<<<<< HEAD
=======
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
>>>>>>> 2df6fbc8 (first)
    }
}
