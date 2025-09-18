# Performance Module Translations

## Overview
This document outlines the translation structure and recent updates for the Performance module.

## Translation Files
- Main translations: `/lang/it/individuale.php`
- Related files:
  - `/lang/it/individuale_po.php`
  - `/lang/it/organizzativa.php`

## Recent Updates (2025-04-04)

### Added Translations
1. Field Labels
   - `ha_diritto`: Indicates if employee is eligible for performance bonus
   - `motivo`: Reason for inclusion/exclusion
   - `mail_sended_at`: Timestamp of last email sent

2. Action Labels
   - `copy_from_organizzativa`: Action to copy data from organizational performance

### Translation Structure
```php
'fields' => [
    'ha_diritto' => [
        'label' => 'Ha Diritto',
        'help' => 'Indica se il dipendente ha diritto alla performance',
    ],
    'motivo' => [
        'label' => 'Motivo',
        'help' => 'Motivo dell\'esclusione o inclusione',
    ],
    'mail_sended_at' => [
        'label' => 'Data Invio Mail',
        'help' => 'Data e ora dell\'ultimo invio mail',
    ],
],
'actions' => [
    'copy_from_organizzativa' => [
        'label' => 'Copia da Organizzativa',
        'success' => 'Dati copiati con successo dalla performance organizzativa',
        'error' => 'Errore durante la copia dei dati',
    ],
]
```

## Best Practices
1. Always include help text for fields
2. Use proper Italian grammar and punctuation
3. Keep translations organized by context
4. Maintain consistency with existing translations
5. Document all translation updates

## Related Documentation
- See `docs/translation-standards.md` for global translation rules
- See `docs/performance-best-practices.md` for module-specific guidelines
