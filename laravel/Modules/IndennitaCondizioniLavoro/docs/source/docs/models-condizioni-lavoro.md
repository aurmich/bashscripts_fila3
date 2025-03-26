---
title: CondizioniLavoro Model
description: Documentation for the CondizioniLavoro model
extends: _layouts.documentation
section: content
---

# CondizioniLavoro Model

The `CondizioniLavoro` model represents working conditions and related data in the system. It is part of the `IndennitaCondizioniLavoro` module and extends the module's `BaseModel` class.

## Model Property Annotations

### Array Properties
The model follows strict PHPDoc annotations for array properties:

```php
/** @var list<string> */
protected $fillable = [
    'field1',
    'field2'
];
```

Note: The `$fillable` property MUST be declared as public in all models.

Type casting is handled by the `casts()` method in the module's `BaseModel` class, so individual models don't need to implement it.

These annotations are required for PHPStan level 7+ compliance.

## Properties

### Basic Information
- `id`: Primary key
- `ente`: Entity identifier
- `matr`: Matrix identifier
- `email`: User's email
- `cognome`: Last name
- `nome`: First name
- `trimestre`: Quarter
- `anno`: Year
- `quadrimestre`: Four-month period

### Location and Position
- `stabi`: Establishment code
- `stabi_txt`: Establishment description
- `repar`: Department code
- `repar_txt`: Department description
- `propro`: Professional profile
- `posfun`: Functional position
- `categoria_eco`: Economic category
- `posiz`: Position code
- `posiz_txt`: Position description

### Attendance and Work Time
- `gg_presenza_anno`: Days of presence in the year
- `gg_presenza_periodo`: Days of presence in the period
- `gg_assenza_anno`: Days of absence in the year
- `hh_assenza_anno`: Hours of absence in the year
- `gg_trasferte_anno`: Days of business trips in the year
- `tot_presenza_periodo_plus_no_timbr`: Total presence in period plus untimed entries

### Codes and References
- `rep2kd`: Department reference code
- `rep2ka`: Department alternative code
- `qua2kd`: Qualification reference code
- `qua2ka`: Qualification alternative code
- `disci1`: Discipline code
- `disci1_txt`: Discipline description
- `codqua`: Qualification code
- `codqua_txt`: Qualification description

### Timestamps and Tracking
- `dal`: Start date
- `al`: End date
- `created_at`: Creation timestamp
- `updated_at`: Last update timestamp
- `created_by`: Creator identifier
- `updated_by`: Last updater identifier

### Calculations and Totals
- `tot`: Total
- `tot_x_ptime`: Total for part-time
- `valutatore_id`: Evaluator identifier

## Relationships

The model has several relationships with other models:

### One-to-Many Relationships
- `Sto00fYear`: Year-based storage records
- `ana02f`: Personnel records
- `asz00f`: Assignment records
- `asz00k1`: Additional assignment records
- `qua00f`: Qualification records
- `qua03f`: Additional qualification records
- `rep00f`: Department records
- `wstr01lx`: Work structure records

### One-to-One Relationships
- `ana10f`: Additional personnel record
- `anag`: Personnel main record
- `stabiDirigente`: Manager establishment record

### Many-to-Many Relationships
- `indennitaTipoDettaglio`: Allowance type details
- `tipoDettaglio`: Type details

## Recent Updates

### PHPStan Level 3 Fixes
- Fixed undefined property access issues
- Improved type safety in method calls
- Removed debug code and cleaned up methods
- Added proper type hints and return types
- Ensured all properties are properly documented
- Fixed namespace usage for StabiDirigente model to use module's own namespace
- Updated model inheritance to use module's BaseModel

### Module Dependencies
- Uses StabiDirigente model from IndennitaCondizioniLavoro module namespace
- Follows module dependency rules for consistent namespace usage
- Extends BaseModel from the same module namespace
- Minimizes cross-module dependencies where possible

## Usage Example

```php
// Get a worker's conditions for a specific year and entity
$conditions = CondizioniLavoro::ofEnteYear($ente, $year)->first();

// Get next four-month period conditions
$nextPeriod = $conditions->getNextQuadrimestre();
```

## Important Notes

1. Always check for null values when accessing relationships
2. Use the provided scopes (ofEnteYear, ofQuarter, etc.) for filtering
3. The model uses several traits for mutators and relationships
4. Some properties are calculated dynamically through accessor methods
