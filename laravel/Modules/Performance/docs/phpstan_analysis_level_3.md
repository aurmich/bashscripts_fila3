# PHPStan Analysis Level 3

## Issues Found

### 1. Undefined Property Access
- File: `app/Actions/ShowMailSendedAt.php`
- Line: 24
- Issue: Access to undefined property `updated_at` on Eloquent Model
- Fix Required: Ensure the model has the property defined or use proper accessor

### 2. Return Type Compatibility Issues in List Pages
Multiple List pages have return type compatibility issues with their parent class methods:

#### getHeaderActions() Method
Files affected:
- `app/Filament/Resources/CriteriEsclusioneResource/Pages/ListCriteriEsclusiones.php`
- `app/Filament/Resources/CriteriMaggiorazioneResource/Pages/ListCriteriMaggioraziones.php`
- `app/Filament/Resources/CriteriOptionResource/Pages/ListCriteriOptions.php`

Issue: Return type should be `array<int, Filament\Actions\Action>` but returns associative array with specific action types.

### 3. Return Type Issues in Model Traits
File: `app/Models/Traits/FunctionTrait.php`

Methods affected in multiple models:
1. `criteriOptionsYear()`
   - Expected: `array<int, array<string, mixed>>`
   - Actual: `array<string, mixed>`

2. `criteriEsclusioneYear()`
   - Expected: `array<int, array<string, mixed>>`
   - Actual: `array<string, mixed>`

Affected Models:
- `BaseIndividualeModel`
- `Organizzativa`
- `Performance`

## Fix Implementation Plan

### 1. Model Property Access
```php
// In ShowMailSendedAt.php
// Add property definition to the model or use proper accessor
protected $appends = ['updated_at'];
// OR
public function getUpdatedAtAttribute() { ... }
```

### 2. List Pages Return Types
Update getHeaderActions() in all affected List pages to return numerically indexed arrays:
```php
public function getHeaderActions(): array
{
    return [
        CreateAction::make(),
        CopyFromLastYearAction::make(),
    ];
}
```

### 3. Model Trait Methods
Update return types in FunctionTrait.php to ensure indexed arrays are returned:
```php
public function criteriOptionsYear(): array
{
    $result = // ... existing logic
    return array_values($result); // Convert to indexed array
}

public function criteriEsclusioneYear(): array
{
    $result = // ... existing logic
    return array_values($result); // Convert to indexed array
}
```

## Progress Tracking

### Property Access
- [ ] ShowMailSendedAt.php - Fix updated_at property access

### List Pages
- [ ] ListCriteriEsclusiones.php - Fix getHeaderActions return type
- [ ] ListCriteriMaggioraziones.php - Fix getHeaderActions return type
- [ ] ListCriteriOptions.php - Fix getHeaderActions return type

### Model Traits
- [ ] FunctionTrait.php - Fix criteriOptionsYear return type
- [ ] FunctionTrait.php - Fix criteriEsclusioneYear return type

## Next Steps

1. Implement fixes for undefined property access
2. Update List pages to return properly typed arrays
3. Modify trait methods to return indexed arrays
4. Run PHPStan level 3 analysis again to verify fixes
