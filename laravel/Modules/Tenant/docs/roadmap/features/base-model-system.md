# Base Model System

## Overview
Implementation of the base model system that provides consistent model behavior across the Tenant module.

## Technical Implementation

### Base Model Class
```php
abstract class BaseModel extends Model
{
    use HasFactory;
    use Updater;

    /** @var bool */
    public static $snakeAttributes = true;

    /** @var bool */
    public $incrementing = true;

    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;

    /** @var string */
    protected $connection = 'setting';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }
}
```

### Model Properties
1. Array Properties
   ```php
   /** @var list<string> */
   protected $fillable = [
       'field1',
       'field2'
   ];

   /** @var list<string> */
   protected $hidden = [
       'password',
       'remember_token'
   ];
   ```

2. Database Configuration
   - Custom connection setting
   - Timestamp handling
   - Factory support

### Trait Integration
1. HasFactory Trait
   - Factory pattern support
   - Test data generation

2. Updater Trait
   - Timestamp management
   - User tracking

## Dependencies
- Laravel Eloquent
- Factory system
- PHPStan for type checking

## Testing Requirements
1. Unit Tests
   - Test property casting
   - Test timestamp behavior
   - Test factory creation

2. Integration Tests
   - Test with actual database
   - Test relationships
   - Test model events

## Links
- [Back to Roadmap](../../docs/roadmap.md)
- Related: [PHPStan Level 7 Compliance](./phpstan-level7-compliance.md)
- Related: [Test Coverage](./test-coverage.md)
