# Documentazione Icone Modulo Incentivi

## Linee Guida per le Icone SVG

### 1. Struttura Base
```xml
<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" 
     width="24" 
     height="24" 
     viewBox="0 0 24 24" 
     fill="none" 
     stroke="currentColor" 
     stroke-width="2" 
     stroke-linecap="round" 
     stroke-linejoin="round">
    <!-- Stili e contenuto -->
</svg>
```

### 2. Stile Outline
- Utilizzare `stroke="currentColor"` invece di `fill="currentColor"`
- Impostare `fill="none"` per elementi che devono essere solo outline
- Mantenere uno `stroke-width="2"` uniforme
- Usare `stroke-linecap="round"` e `stroke-linejoin="round"` per angoli smussati

### 3. Animazioni
```xml
<style>
    .main-element {
        transform-origin: center;
        transition: all 0.3s ease-in-out;
    }
    svg:hover .main-element {
        transform: scale(1.1);
    }
    .secondary-element {
        transition: transform 0.3s ease-in-out;
        transform-origin: center;
    }
    svg:hover .secondary-element {
        transform: rotate(15deg);
    }
</style>
```

### 4. Convenzioni di Nomenclatura
- File: `kebab-case.svg` (es. `capital-percentage.svg`)
- Riferimenti nei file di traduzione: `incentivi-nome-icona`
- Classi CSS: `kebab-case` per elementi multipli (es. `main-element`)

### 5. Organizzazione del Codice
```xml
<!-- Gruppo principale con animazione di scala -->
<g class="main-element">
    <!-- Elementi di base -->
</g>

<!-- Elementi secondari con animazioni specifiche -->
<g class="secondary-element">
    <!-- Dettagli animati -->
</g>
```

### 6. Best Practices per le Animazioni
- Scala principale: `transform: scale(1.1)`
- Rotazioni: tra 10° e 180° in base al contesto
- Traslazioni: `translateY(-2px)` per effetto di sollevamento
- Durata transizione: `0.3s` con `ease-in-out`
- Origine trasformazione: `transform-origin: center`

### 7. Esempi di Icone

#### Activity Icon
```xml
<g class="checklist">
    <rect x="4" y="2" width="16" height="20" rx="2" class="stroke-current" fill="none"/>
    <line x1="8" y1="6" x2="16" y2="6" class="stroke-current"/>
</g>
<g class="check">
    <line x1="8" y1="11" x2="16" y2="11" class="stroke-current"/>
    <polyline points="6,11 7,12 9,10" class="stroke-current"/>
</g>
```

#### Project Board
```xml
<g class="board">
    <rect x="3" y="3" width="18" height="18" rx="2" class="stroke-current" fill="none"/>
    <line x1="9" y1="3" x2="9" y2="21" class="stroke-current"/>
</g>
<g class="cards">
    <rect x="4" y="6" width="4" height="3" rx="1" class="stroke-current" fill="none"/>
</g>
```

### 8. File di Traduzione
```php
'navigation' => [
    'name' => 'Nome Sezione',
    'plural' => 'Nomi Sezioni',
    'group' => [
        'name' => 'Incentivi',
    ],
    'label' => 'Nome Sezione',
    'icon' => 'incentivi-nome-icona',
    'sort' => 50,
],
```

### 9. Dimensioni e Viewport
- Dimensione file: 24x24 pixel
- ViewBox: "0 0 24 24"
- Area di lavoro effettiva: 18x18 pixel (margine di 3px)
- Raggio angoli: 2px per elementi principali, 1px per elementi secondari

### 10. Compatibilità
- Testare le icone in modalità chiara e scura
- Verificare la visibilità con diversi spessori di stroke
- Assicurarsi che le animazioni non interferiscano con il layout
- Mantenere le dimensioni dei file SVG ottimizzate
