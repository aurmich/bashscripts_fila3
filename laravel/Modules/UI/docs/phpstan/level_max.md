# Analisi PHPStan - Livello Massimo

[⬅️ Torna alla Roadmap del modulo](../roadmap.md)


## Risultati
- **Errori totali**: 27
- **Errori nei file**: 10

## Analisi
Il modulo UI ha mostrato gli stessi errori al livello massimo che al livello 10. Questo indica che il livello 10 è già molto rigoroso e copre la maggior parte dei controlli possibili. Gli errori sono stati trovati in vari file:

1. **GetAllIconsAction.php** (4 errori):
   - Problemi con iterazione su tipi non iterabili
   - Problemi con i tipi dei parametri in `File::allFiles()`
   - Operazioni binarie non valide su tipi misti

2. **SliderData.php** (9 errori):
   - Problemi con i tipi dei parametri nel costruttore

3. **TableLayoutEnum.php** (1 errore):
   - Tipo di ritorno non corretto in `getTableColumns()`

4. **TableLayoutToggleHeaderAction.php** (3 errori):
   - Accesso a proprietà su tipi misti

5. **TableLayoutToggleTableAction.php** (1 errore):
   - Tipo di parametro non corretto in `toggleLayout()`

6. **Image.php** (2 errori):
   - Tipo di parametro non corretto in `options()`
   - Tentativo di invocare un tipo misto come callable

7. **Title.php** (1 errore):
   - Tentativo di invocare un tipo misto come callable

8. **AddressField.php** (3 errori):
   - Chiamate a metodi su tipi misti

9. **IconPicker.php** (1 errore):
   - Tipo di parametro non corretto in `array_combine()`

10. **UIServiceProvider.php** (1 errore):
    - Tipo di parametro non corretto in `module_path()`

11. **Block.php** (1 errore):
    - Tipo di parametro non corretto in `view()`

## Consigli
- Aggiungere type hints espliciti per tutti i parametri e valori di ritorno
- Implementare interfacce appropriate per i tipi di dati
- Utilizzare PHPDoc per documentare i tipi complessi
- Considerare l'uso di DTO per gestire meglio i tipi dei dati
- Aggiungere validazione dei dati in ingresso
- Utilizzare tipi specifici invece di `mixed` dove possibile
- Implementare controlli di tipo più rigorosi
- Considerare l'uso di PHP 8.0+ per sfruttare i tipi union e altre funzionalità di tipo avanzate

## Dubbi
- Come vengono gestiti i dati in `GetAllIconsAction`?
- Qual è la struttura corretta per `TableLayoutEnum::getTableColumns()`?
- Come vengono gestiti i layout in `TableLayoutToggleHeaderAction`?
- Qual è il flusso corretto per `TableLayoutToggleTableAction`?
- Come vengono gestiti i blocchi in `Image` e `Title`?
- Qual è la struttura corretta per `AddressField`?
- Come vengono gestite le icone in `IconPicker`?
- Qual è il contesto d'uso di `module_path` in `UIServiceProvider`?
- Come vengono gestiti i blocchi in `Block`?
- È necessario mantenere la flessibilità di `mixed` per alcuni parametri o possiamo essere più specifici? 
