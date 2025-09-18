#!/bin/bash

# Script per correggere automaticamente alcuni errori comuni di PHPStan

# Colori per output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Verifica se è stato fornito un modulo come argomento
if [ -z "$1" ]; then
    echo -e "${RED}Errore: È necessario specificare un modulo${NC}"
    echo -e "${YELLOW}Uso: $0 NomeModulo${NC}"
    exit 1
fi

MODULE=$1
MODULE_PATH="Modules/$MODULE"

# Verifica se il modulo esiste
if [ ! -d "$MODULE_PATH" ]; then
    echo -e "${RED}Errore: Il modulo $MODULE non esiste${NC}"
    exit 1
fi

echo -e "${BLUE}Inizio correzione automatica degli errori comuni per il modulo $MODULE${NC}"

# Funzione per sostituire namespace errati
fix_namespaces() {
    echo -e "${YELLOW}Correzione dei namespace...${NC}"
    
    # Trova tutti i file PHP nel modulo
    find "$MODULE_PATH" -type f -name "*.php" | while read file; do
        # Correzione namespace con App
        if grep -q "namespace Modules\\\\$MODULE\\\\App\\\\" "$file"; then
            # Rimuove \App\ dal namespace
            sed -i "s/namespace Modules\\\\$MODULE\\\\App\\\\/namespace Modules\\\\$MODULE\\\\/g" "$file"
            echo -e "${GREEN}✓ Corretto namespace in $file${NC}"
        fi
    done
}

# Funzione per correggere le annotazioni PHPDoc per proprietà $fillable e $hidden
fix_model_properties() {
    echo -e "${YELLOW}Correzione delle annotazioni PHPDoc nei modelli...${NC}"
    
    # Trova tutti i file dei modelli
    find "$MODULE_PATH/app/Models" -type f -name "*.php" 2>/dev/null | while read file; do
        # Corregge le annotazioni per $fillable
        if grep -q "protected.*\\$fillable" "$file" && ! grep -q "@var list<string>" "$file"; then
            # Cerca la riga dove si trova $fillable
            line_num=$(grep -n "protected.*\\$fillable" "$file" | cut -d: -f1)
            if [ ! -z "$line_num" ]; then
                # Estrai la linea precedente
                prev_line=$(sed -n "$((line_num-1))p" "$file")
                # Se la linea precedente non contiene già un'annotazione PHPDoc
                if [[ "$prev_line" != *"@var"* ]]; then
                    # Inserisci l'annotazione PHPDoc corretta prima di $fillable
                    sed -i "$((line_num))i\\    /**\\n     * @var list<string>\\n     */" "$file"
                    echo -e "${GREEN}✓ Aggiunta annotazione PHPDoc per \$fillable in $file${NC}"
                fi
            fi
        fi
        
        # Corregge le annotazioni per $hidden
        if grep -q "protected.*\\$hidden" "$file" && ! grep -q "@var list<string>.*\\$hidden" "$file"; then
            # Cerca la riga dove si trova $hidden
            line_num=$(grep -n "protected.*\\$hidden" "$file" | cut -d: -f1)
            if [ ! -z "$line_num" ]; then
                # Estrai la linea precedente
                prev_line=$(sed -n "$((line_num-1))p" "$file")
                # Se la linea precedente non contiene già un'annotazione PHPDoc
                if [[ "$prev_line" != *"@var"* ]]; then
                    # Inserisci l'annotazione PHPDoc corretta prima di $hidden
                    sed -i "$((line_num))i\\    /**\\n     * @var list<string>\\n     */" "$file"
                    echo -e "${GREEN}✓ Aggiunta annotazione PHPDoc per \$hidden in $file${NC}"
                fi
            fi
        fi
        
        # Corregge le annotazioni per $casts
        if grep -q "protected.*\\$casts" "$file" && ! grep -q "@var array<string, string>.*\\$casts" "$file"; then
            # Cerca la riga dove si trova $casts
            line_num=$(grep -n "protected.*\\$casts" "$file" | cut -d: -f1)
            if [ ! -z "$line_num" ]; then
                # Estrai la linea precedente
                prev_line=$(sed -n "$((line_num-1))p" "$file")
                # Se la linea precedente non contiene già un'annotazione PHPDoc
                if [[ "$prev_line" != *"@var"* ]]; then
                    # Inserisci l'annotazione PHPDoc corretta prima di $casts
                    sed -i "$((line_num))i\\    /**\\n     * @var array<string, string>\\n     */" "$file"
                    echo -e "${GREEN}✓ Aggiunta annotazione PHPDoc per \$casts in $file${NC}"
                fi
            fi
        fi
    done
}

# Funzione per aggiungere use statement per il trait RelationX
add_relation_x_trait() {
    echo -e "${YELLOW}Aggiunta del trait RelationX nei modelli...${NC}"
    
    # Trova tutti i file dei modelli
    find "$MODULE_PATH/app/Models" -type f -name "*.php" 2>/dev/null | while read file; do
        # Controlla se il modello usa metodi di relazione come belongsToMany o hasMany
        if grep -q "belongsToMany\|hasMany\|hasOne\|morphMany\|morphOne\|morphToMany" "$file"; then
            # Controlla se il trait è già importato
            if ! grep -q "use Modules\\\\Xot\\\\Models\\\\Traits\\\\RelationX;" "$file" && ! grep -q "use RelationX;" "$file"; then
                # Trova l'ultimo use statement per inserire il nuovo dopo
                last_use_line=$(grep -n "use " "$file" | tail -1 | cut -d: -f1)
                if [ ! -z "$last_use_line" ]; then
                    # Inserisci l'import del trait dopo l'ultimo use
                    sed -i "$((last_use_line))a\\use Modules\\\\Xot\\\\Models\\\\Traits\\\\RelationX;" "$file"
                    echo -e "${GREEN}✓ Aggiunto import per RelationX in $file${NC}"
                    
                    # Verifica se la classe già usa il trait
                    if ! grep -q "use RelationX;" "$file"; then
                        # Trova la riga dove inizia la classe
                        class_line=$(grep -n "class " "$file" | head -1 | cut -d: -f1)
                        if [ ! -z "$class_line" ]; then
                            # Cerca la prima parentesi graffa dopo la dichiarazione della classe
                            brace_line=$(tail -n +"$class_line" "$file" | grep -n "{" | head -1 | cut -d: -f1)
                            if [ ! -z "$brace_line" ]; then
                                # Calcola la riga assoluta della parentesi graffa
                                abs_brace_line=$((class_line + brace_line - 1))
                                # Inserisci l'uso del trait dopo la parentesi graffa
                                sed -i "$((abs_brace_line + 1))i\\    use RelationX;" "$file"
                                echo -e "${GREEN}✓ Aggiunto use RelationX; nella classe in $file${NC}"
                            fi
                        fi
                    fi
                fi
            fi
        fi
    done
}

# Funzione per correggere il metodo newFactory
fix_new_factory() {
    echo -e "${YELLOW}Correzione del metodo newFactory nei modelli...${NC}"
    
    # Trova tutti i file dei modelli
    find "$MODULE_PATH/app/Models" -type f -name "*.php" 2>/dev/null | while read file; do
        # Controlla se il file contiene un metodo newFactory senza il tipo di ritorno
        if grep -q "protected static function newFactory" "$file" && ! grep -q "newFactory(): Factory" "$file"; then
            # Correggi il tipo di ritorno
            sed -i 's/protected static function newFactory(/protected static function newFactory(): \\Illuminate\\Database\\Eloquent\\Factories\\Factory(/g' "$file"
            echo -e "${GREEN}✓ Corretto tipo di ritorno per newFactory in $file${NC}"
            
            # Aggiungi PHPDoc se non presente
            line_num=$(grep -n "protected static function newFactory" "$file" | cut -d: -f1)
            if [ ! -z "$line_num" ]; then
                prev_line=$(sed -n "$((line_num-1))p" "$file")
                if [[ "$prev_line" != *"@return"* ]]; then
                    sed -i "$((line_num))i\\    /**\\n     * @return \\\\Illuminate\\\\Database\\\\Eloquent\\\\Factories\\\\Factory\\n     */" "$file"
                    echo -e "${GREEN}✓ Aggiunta annotazione PHPDoc per newFactory in $file${NC}"
                fi
            fi
        fi
    done
}

# Esegui le funzioni di correzione
fix_namespaces
fix_model_properties
add_relation_x_trait
fix_new_factory

echo -e "${BLUE}Correzioni automatiche completate per il modulo $MODULE${NC}"
echo -e "${YELLOW}Esegui PHPStan per verificare i miglioramenti:${NC}"
echo -e "${GREEN}./vendor/bin/phpstan analyse --level=9 --memory-limit=2G $MODULE_PATH${NC}" 