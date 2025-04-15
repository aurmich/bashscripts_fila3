# PHPStan Corrections Log

## Latest Update: 2025-04-04

### Fixed Issues

1. IndividualePoResource/Pages/ListIndividualePos.php
   - Fixed missing return statement in `getTableFilters()`
   - Uncommented table filters implementation
   - Ensured proper namespace usage for IndividualePoResource

### Current Status
- All Level 1 issues resolved
- Method return types properly implemented
- Namespace declarations corrected

### Best Practices Followed
1. Return Types
   - All methods have explicit return type declarations
   - Array return types specify key and value types
   - No use of mixed type unless absolutely necessary

2. Namespace Usage
   - Proper module-based namespace structure
   - No app segment in namespace paths
   - Correct use statements for dependencies

3. Method Implementation
   - Complete implementation of interface methods
   - No empty or partially implemented methods
   - Proper type hints for parameters and returns

### Next Steps
1. Continue PHPStan analysis at higher levels
2. Document any new patterns or issues found
3. Keep monitoring for new type-related issues
4. Ensure all new code follows these standards

# Correzione Errori PHPStan nel Modulo Performance

## Errore: Property $excellence is not compatible with parent class

### Descrizione del Problema
L'errore si verifica perché la proprietà `$excellence` è definita in modo diverso tra le classi figlie e la classe padre `BaseIndividualeModel`. 

### Analisi del Codice
- Nella classe `BaseIndividualeModel`, la proprietà `$excellence` è definita come `bool` nel metodo `casts()`
- Nelle classi figlie (Individuale, IndividualePo, IndividualeAdm, etc.) la proprietà è definita come `int|null`

### Soluzione
Per risolvere l'errore, dobbiamo uniformare la definizione della proprietà `$excellence` in tutte le classi. La soluzione migliore è:

1. Modificare il cast nella classe `BaseIndividualeModel`:
```php
public function casts(): array
{
    return [
        'type' => WorkerType::class,
        'ente' => 'integer',
        'matr' => 'integer',
        'disci1' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'excellence' => 'integer', // Cambiato da 'bool' a 'integer'
    ];
}
```

2. Assicurarsi che tutte le classi figlie mantengano la stessa definizione:
```php
protected $casts = [
    'excellence' => 'integer',
    // ... altri casts
];
```

### Motivazione
- La proprietà `$excellence` viene utilizzata per memorizzare un valore numerico (0 o 1) che indica se un dipendente è eccellente
- Utilizzare `integer` invece di `bool` è più appropriato perché:
  - Mantiene la compatibilità con il database dove il campo è tipicamente definito come INT
  - Permette di gestire valori NULL
  - È più flessibile per eventuali modifiche future

### Best Practices
1. Mantenere la coerenza dei tipi di dati tra le classi padre e figlie
2. Utilizzare tipi di dati che riflettono accuratamente l'uso effettivo della proprietà
3. Documentare chiaramente il significato dei valori possibili (0 = non eccellente, 1 = eccellente)

### Note di Implementazione
- Assicurarsi che tutte le migrazioni del database utilizzino il tipo corretto per la colonna `excellence`
- Aggiornare eventuali query che fanno riferimento a questa proprietà
- Verificare che i form e le validazioni gestiscano correttamente il tipo integer
