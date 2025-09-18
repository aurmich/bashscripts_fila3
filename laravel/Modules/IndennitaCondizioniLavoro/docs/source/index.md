# Indennità Condizioni Lavoro Module

This module handles the management of work condition allowances (Indennità Condizioni Lavoro) in the system.

## Features

- Management of work condition allowances
- Role-based access control
- Filtering by year and quarter
- Detailed view of allowance types and details

## Models

### CondizioniLavoro

The main model that represents a work condition allowance record. It contains:

- `anno` - Year of the allowance
- `quadrimestre` - Quarter (1-3)
- `matr` - Employee ID
- `cognome` - Last name
- `nome` - First name
- `stabi` - Facility
- `repar` - Department
- `indennitaTipoDettaglio` - Relationship to allowance type details

### IndennitaTipoDettaglio

Represents the details of an allowance type. Contains:

- `nome` - Name of the allowance type
- `indennitaTipo` - Relationship to the parent allowance type

## Access Control

The module implements role-based access control:

- `super-admin` users have full access to all records
- Regular users can only view records with associated `indennitaTipoDettaglio`

## Filament Resources

### CondizioniLavoroAdmResource

This resource provides the admin interface for managing work condition allowances. It includes:

- List view with searchable columns
- Filtering by year and quarter
- Role-based access control
- Formatted display of allowance types

## Testing

Run the tests using:

```bash
php artisan test --filter=CondizioniLavoroTest
```

Tests cover:
- Access control for different user roles
- Proper display of table columns
- Filtering functionality

## Known Issues and Solutions

1. Table Column Types
   - Issue: Column types in ListCondizioniLavoroAdms need to be properly keyed
   - Solution: Updated the getListTableColumns method to return properly keyed array

2. Role Access
   - Issue: User model needs HasRoles trait for role checking
   - Solution: Ensure User model uses Spatie\Permission\Traits\HasRoles trait

3. Property Access
   - Issue: Undefined properties in CondizioniLavoroResource
   - Solution: Add property definitions or use proper accessor methods
