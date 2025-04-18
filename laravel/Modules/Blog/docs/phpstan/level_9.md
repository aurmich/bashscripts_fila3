# Correzione Errori PHPStan Livello 9 – Modulo Blog

## Strategia
- Correzione sistematica di tutti gli errori PHPStan livello 9.
- Priorità a: tipizzazione array associativi, return type, proprietà senza tipo, relazioni Eloquent, factory/classi mancanti.
- Aggiornamento continuo di questa documentazione e dei collegamenti nella root.

## Esempi di Correzione Applicata

### getListTableColumns
**Prima:**
```php
public function getListTableColumns(): array {
    return [
        Tables\Columns\TextColumn::make('id'),
        Tables\Columns\TextColumn::make('title'),
    ];
}
```
**Dopo:**
```php
/**
 * @return array<string, \Filament\Tables\Columns\Column>
 */
public function getListTableColumns(): array {
    return [
        'id' => Tables\Columns\TextColumn::make('id'),
        'title' => Tables\Columns\TextColumn::make('title'),
    ];
}
```

### getTableActions
**Prima:**
```php
public function getTableActions(): array {
    return [
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
    ];
}
```
**Dopo:**
```php
/**
 * @return array<string, \Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
 */
public function getTableActions(): array {
    return [
        'edit' => Tables\Actions\EditAction::make(),
        'delete' => Tables\Actions\DeleteAction::make(),
    ];
}
```

## Documentazione e Collegamenti
- Aggiornare SEMPRE questa pagina dopo ogni macro-blocco di correzioni.
- Aggiornare la sezione "PHPStan Level 9" nella cartella `docs` della root con link a questa pagina e ai file/fix più rilevanti.

---

**Ultimo aggiornamento:** 2025-04-16

**Collegamenti bidirezionali:**
- [Indice correzioni PHPStan livello 9 (root)](../../../../docs/phpstan)
- [Altri moduli](../../)
