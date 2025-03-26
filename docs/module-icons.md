# Icone dei Moduli Laravel

## Struttura e Convenzioni

### 1. Posizione File SVG
Le icone SVG devono essere posizionate nella cartella `resources/svg` del modulo:
```
ModuloEsempio/
├── resources/
│   └── svg/
│       ├── icon1.svg
│       └── icon2.svg
```

### 2. Convenzione Nomi
Per garantire la corretta associazione tra file SVG e riferimenti nelle traduzioni:

1. **File SVG**: 
   - Nome in inglese
   - Kebab-case (parole separate da trattini)
   - Esempio: `team-work.svg`

2. **Riferimento nelle Traduzioni**:
   ```php
   // ✅ CORRETTO
   'navigation' => [
       'label' => 'Gruppo di Lavoro',
       'icon' => 'incentivi-team-work' // {module-name}-{svg-name}
   ]
   ```

### 3. Integrazione con Filament
Per far funzionare le icone in Filament:

1. **Registrazione Icone**
   Nel service provider del modulo:
   ```php
   use Filament\Support\Assets\Svg;
   use Filament\Support\Facades\FilamentAsset;

   public function boot()
   {
       FilamentAsset::register([
           Svg::make('incentivi-team-work', __DIR__ . '/../resources/svg/team-work.svg'),
           // Registra altre icone...
       ]);
   }
   ```

2. **Uso nelle Traduzioni**
   ```php
   return [
       'navigation' => [
           'label' => 'Gruppo di Lavoro',
           'icon' => 'incentivi-team-work',
       ]
   ];
   ```

### 4. Requisiti SVG
Le icone SVG devono:
1. Usare `class="fill-current"` per il colore
2. Avere dimensioni 24x24 pixels
3. Usare `viewBox="0 0 24 24"`
4. Non includere colori hardcoded

Esempio SVG corretto:
```svg
<svg 
    xmlns="http://www.w3.org/2000/svg"
    width="24"
    height="24" 
    viewBox="0 0 24 24"
    fill="none"
>
    <path 
        class="fill-current"
        d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"
    />
</svg>
```

### 5. Errori Comuni da Evitare
❌ **NON FARE**:
- Usare animazioni CSS/SVG complesse che potrebbero impattare le performance
- Includere stili inline o `<style>` tag
- Usare colori fissi invece di `class="fill-current"`
- Dimenticare di registrare l'icona nel service provider
- Usare nomi di file diversi dal riferimento nelle traduzioni

✅ **FARE**:
- Usare SVG semplici e ottimizzati
- Mantenere la consistenza tra nome file e riferimento
- Registrare tutte le icone nel service provider
- Testare le icone in modalità light e dark
