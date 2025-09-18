# Performance Module Traits

Questo documento descrive i traits utilizzati nel modulo Performance.

## FunctionTrait

Trait che fornisce funzionalità comuni per i modelli del modulo Performance.

### Proprietà

- `peso`: Relazione con il modello `IndividualePesi`
- `pesoPo`: Relazione con il modello `IndividualePoPesi`
- `options`: Collezione di `CriteriOption`
- `criteriValutazione`: Collezione di `CriteriValutazione`
- `codiciAssenze`: Collezione di oggetti `stdClass` contenenti informazioni sulle assenze
- `posfun`: Posizione funzionale (null o intero)
- `anno`: Anno di riferimento (null o intero)
- `type`: Tipo di performance (null o stringa)
- `ha_diritto`: Flag che indica se l'utente ha diritto (intero)
- `totale_punteggio`: Punteggio totale (null o float)
- `dal`: Data di inizio (stringa)
- `al`: Data di fine (stringa)
- `disci1`: Codice disciplina (intero)
- `attributes`: Array associativo di attributi con tipi strettamente definiti

### Metodi

- `listaTipoCodiceAssenze()`: Restituisce una stringa concatenata dei codici assenza
- `check()`: Verifica i criteri di esclusione
- `optionsCriteriOrdered()`: Restituisce i criteri ordinati
- `criteriOptionsYear()`: Restituisce le opzioni dei criteri per un anno specifico
- `criteriEsclusioneYear()`: Restituisce i criteri di esclusione per un anno specifico
- `getHaDirittoEMotivo()`: Calcola se l'utente ha diritto e il motivo
- `getPeso()`: Ottiene il peso per un criterio specifico
- `getPesoFunc()`: Calcola il peso in base alla funzione
- `setValutazioneFunc()`: Imposta il valore di valutazione
- `option()`: Ottiene un'opzione specifica
- `isPo()`: Verifica se è una posizione organizzativa
- `isRegionale()`: Verifica se è regionale
- `scopeWithTotPunt()`: Scope per il totale punti
- `canSendEmail()`: Verifica se è possibile inviare email

## MutatorTrait

Trait che fornisce mutatori e accessori per i modelli del modulo Performance.

### Proprietà

- `criteriValutazione`: Collezione di `CriteriValutazione`
- `dal`: Data di inizio (stringa)
- `al`: Data di fine (stringa)
- `ha_diritto`: Flag che indica se l'utente ha diritto (intero)
- `totale_punteggio`: Punteggio totale (null o float)
- `gg_assenza_dalal`: Giorni di assenza (null o intero)
- `hh_assenza_dalal`: Ore di assenza (null o float)

### Metodi

- `scopeOfListaTipoCodice()`: Scope per filtrare per lista tipo codice
- `getGgAssenzaDalalAttribute()`: Calcola i giorni di assenza
- `getHhAssenzaDalalAttribute()`: Calcola le ore di assenza
- `getTotalePunteggioAttribute()`: Calcola il punteggio totale

## Note sulla Tipizzazione

- Tutti i tipi sono strettamente definiti per garantire la compatibilità con PHPStan livello 7
- Le collezioni sono tipizzate con i tipi generici appropriati
- I valori nullable sono gestiti con operatori di coalescenza null
- I cast di tipo sono espliciti e sicuri
- Le proprietà dinamiche sono documentate con annotazioni PHPDoc
- I metodi magici sono documentati con annotazioni PHPDoc 