# 📊 PHPStan - Strategie di Correzione e Best Practice (Root)

---

## Implementazione Metodi Astratti

Quando si estende una classe base che dichiara metodi astratti, è obbligatorio implementare tutti i metodi astratti nelle classi figlie concrete. L'assenza di implementazione genera errori PHPStan e a runtime.

**Esempio di errore:**

> Class Modules\Blog\Filament\Resources\TextWidgetResource\Pages\ListTextWidgets contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Modules\Xot\Filament\Resources\Pages\XotBaseListRecords::getListTableColumns)

**Soluzione:**

Implementare il metodo richiesto, anche solo restituendo un array vuoto se non ancora personalizzato:

```php
public function getListTableColumns(): array
{
    // TODO: Personalizza le colonne secondo le specifiche di dominio
    return [];
}
```

**Link bidirezionale:**
- Vedi la sezione dedicata nel modulo Blog: [Correzione: Implementazione metodo astratto getListTableColumns](../../Modules/Blog/docs/phpstan/level_2.md)

---

## Altre strategie ricorrenti

- Correggere la visibilità dei metodi per rispettare le signature delle classi base
- Evitare override di metodi final
- Aggiornare i PHPDoc per compatibilità con PHPStan
- Documentare sempre la causa e la soluzione all'interno dei file docs/phpstan dei moduli

---

**Questa documentazione centralizza le strategie e i rimandi a tutte le correzioni PHPStan dei moduli. Aggiorna sempre con link bidirezionali!**
