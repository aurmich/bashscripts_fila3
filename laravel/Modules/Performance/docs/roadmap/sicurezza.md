# Sistema Sicurezza

⬅️ [Torna alla Roadmap](../roadmap.md)

## Stato Attuale
**Completamento: 45%**

## Overview
Sistema di sicurezza del modulo Performance, inclusi controlli di accesso, autenticazione, autorizzazione e protezione dati.

## Componenti Principali

### 1. Autenticazione (50% completato)
- Integrazione con sistema auth
- Multi-factor authentication
- Session management
- Token handling

### 2. Autorizzazione (45% completato)
- RBAC (Role Based Access Control)
- Policy per risorse
- Gate per azioni
- Permessi granulari

### 3. Protezione Dati (40% completato)
- Crittografia dati sensibili
- Audit logging
- Data masking
- GDPR compliance

## Implementazioni Chiave

### 1. Policies
```php
/**
 * @template TModel of Model
 */
class PerformancePolicy
{
    /**
     * @param User $user
     * @param TModel $performance
     * @return bool
     */
    public function view(User $user, Model $performance): bool
    {
        return $user->can('view_performance')
            && ($user->id === $performance->user_id
                || $user->hasRole('supervisor'));
    }
    
    /**
     * @param User $user
     * @param TModel $performance
     * @return bool
     */
    public function update(User $user, Model $performance): bool
    {
        return $user->can('update_performance')
            && $this->checkUpdatePermissions($user, $performance);
    }
}
```

### 2. Data Protection
```php
/**
 * @template TModel of Model
 */
trait HasEncryptedAttributes
{
    /**
     * @var list<string>
     */
    protected $encryptedAttributes = [
        'note_riservate',
        'valutazione_dettaglio'
    ];
    
    /**
     * @param string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
        
        if (in_array($key, $this->encryptedAttributes, true)) {
            return $this->decryptValue($value);
        }
        
        return $value;
    }
}
```

## Metriche di Successo
- [x] Auth Success Rate > 99.9% (100%)
- [ ] Zero Data Breaches (100%)
- [ ] Audit Log Coverage (45%)
- [ ] Policy Coverage (40%)
- [ ] GDPR Compliance (35%)

## Best Practices

### 1. Authorization
```php
// ❌ Check diretto
if ($user->role === 'admin') {
    // ...
}

// ✅ Utilizzo policies
if ($user->can('update', $performance)) {
    // ...
}
```

### 2. Data Protection
```php
// ❌ Dati sensibili esposti
return [
    'valutazione' => $this->valutazione_dettaglio
];

// ✅ Dati protetti
return [
    'valutazione' => $this->maskSensitiveData(
        $this->valutazione_dettaglio
    )
];
```

## Testing

### Security Tests
```php
class SecurityTest extends TestCase
{
    public function test_unauthorized_access(): void
    {
        $user = User::factory()->create();
        $performance = Performance::factory()->create();
        
        $response = $this->actingAs($user)
            ->getJson("/api/performances/{$performance->id}");
            
        $response->assertStatus(403);
    }
    
    public function test_data_encryption(): void
    {
        $performance = Performance::factory()->create([
            'note_riservate' => 'Dati sensibili'
        ]);
        
        $this->assertDatabaseMissing('performances', [
            'note_riservate' => 'Dati sensibili'
        ]);
        
        $this->assertEquals(
            'Dati sensibili',
            $performance->note_riservate
        );
    }
}
```

## Dipendenze
- Laravel Framework v10.x
- Laravel Sanctum
- Laravel Passport
- Laravel Encryption

## Link Correlati
- [Authentication](../auth/README.md)
- [Authorization](../auth/policies.md)
- [Data Protection](../security/data-protection.md)
- [Audit Logging](../security/audit-logs.md)

## Note e Considerazioni
- Implementare MFA
- Gestire sessioni
- Proteggere dati
- Logging completo
- Monitorare accessi
- Gestire permessi
- GDPR compliance
- Audit regolare

---
⬅️ [Torna alla Roadmap](../roadmap.md)
