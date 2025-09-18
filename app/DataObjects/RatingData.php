<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Rating\DataObjects;
=======
namespace Modules\Rating\App\DataObjects;
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
namespace Modules\Rating\DataObjects;
>>>>>>> 2df6fbc8 (first)

final readonly class RatingData
{
    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2df6fbc8 (first)
        $title = is_string($data['title']) ? $data['title'] : (is_scalar($data['title']) ? (string)$data['title'] : '');
        $score = isset($data['score']) && is_numeric($data['score']) ? (int)$data['score'] : 0;
        $description = isset($data['description']) ? (is_string($data['description']) ? $data['description'] : null) : null;
        $userId = isset($data['user_id']) ? (is_string($data['user_id']) ? $data['user_id'] : null) : null;
        
        return new self(
            title: $title,
            score: $score,
            description: $description,
            userId: $userId
<<<<<<< HEAD
=======
        return new self(
            title: $data['title'],
            score: (int) $data['score'],
            description: $data['description'] ?? null,
            userId: $data['user_id'] ?? null
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
>>>>>>> 2df6fbc8 (first)
        );
    }

    public function __construct(
        public string $title,
        public int $score,
        public ?string $description = null,
        public ?string $userId = null,
    ) {
        if ($score < 0 || $score > 5) {
            throw new \InvalidArgumentException('Score must be between 0 and 5');
        }
    }
}
