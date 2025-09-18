# Modulo Performance

## Linee Guida per lo Sviluppo

### Azioni nell'Header
Quando si implementa il metodo `getHeaderActions()` in una classe che estende `XotBaseListRecords`, è necessario seguire queste regole:

1. **Formato del Return**
   ```php
   protected function getHeaderActions(): array
   {
       return [
           'create' => CreateAction::make(),
           'copy_from_last_year' => CopyFromLastYearAction::make(),
       ];
   }
   ```

2. **Requisiti delle Chiavi**
   - Devono essere stringhe descrittive
   - Devono essere univoche all'interno della stessa risorsa
   - Devono seguire il pattern snake_case
   - Non devono contenere caratteri speciali o spazi

3. **Requisiti dei Valori**
   - Devono essere istanze di `Action`
   - Devono essere creati usando il metodo `make()`
   - Devono essere configurati correttamente con i parametri necessari

4. **Best Practices**
   - Utilizzare nomi di chiavi che descrivano chiaramente l'azione
   - Mantenere la coerenza nelle chiavi tra le diverse risorse
   - Documentare le azioni personalizzate nel file di documentazione della risorsa

### Azioni nella Tabella
Il metodo `getTableActions()` deve essere implementato seguendo queste regole:

1. **Quando Implementare**
   - Solo quando sono presenti azioni personalizzate oltre a edit e delete
   - Quando è necessario configurare azioni specifiche con parametri particolari

2. **Quando Non Implementare**
   - Se contiene solo le azioni standard `edit` e `delete`
   - Queste azioni sono già gestite automaticamente da `XotBaseListRecords`

3. **Esempio di Implementazione Corretta**
   ```php
   public function getTableActions(): array
   {
       return [
           'custom_action' => Actions\Action::make('custom_action')
               ->label('Azione Personalizzata')
               ->action(function () {
                   // Logica personalizzata
               }),
       ];
   }
   ```

4. **Esempio di Quando Rimuovere**
   ```php
   // Rimuovere questo metodo se contiene solo:
   public function getTableActions(): array
   {
       return [
           'edit' => Actions\EditAction::make(),
           'delete' => Actions\DeleteAction::make(),
       ];
   }
   ```

### Struttura del Database 