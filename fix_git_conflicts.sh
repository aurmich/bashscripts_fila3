#!/bin/bash

# Funzione per risolvere i conflitti in un file
fix_conflicts() {
    local file="$1"
    echo "🔧 Risoluzione conflitti in: $file"
    
    # Backup del file originale
    cp "$file" "${file}.bak"
    
    # Rimuove i marcatori di conflitto e mantiene la versione più recente
    sed -i -e '/^<<<<<<< HEAD$/d' \
           -e '/^=======$/d' \
           -e '/^>>>>>>> /d' \
           "$file"
    
    # Verifica se il file è stato modificato
    if diff -q "$file" "${file}.bak" >/dev/null; then
        echo "⚠️ Nessuna modifica necessaria in: $file"
        rm "${file}.bak"
    else
        echo "✅ Conflitti risolti in: $file"
        rm "${file}.bak"
        git add "$file"
    fi
}

# Trova tutti i file con conflitti
echo "🔍 Ricerca file con conflitti..."
files_with_conflicts=$(find . -type f -not -path "*/\.*" -not -path "*/vendor/*" -not -path "*/node_modules/*" -exec grep -l "<<<<<<< HEAD" {} \;)

if [ -z "$files_with_conflicts" ]; then
    echo "✨ Nessun conflitto trovato!"
    exit 0
fi

# Risolvi i conflitti in ogni file
echo "🚀 Inizio risoluzione conflitti..."
echo "$files_with_conflicts" | while read -r file; do
    if [ -f "$file" ]; then
        fix_conflicts "$file"
    fi
done

# Esegui i test
echo "🧪 Esecuzione test..."
cd laravel && ./vendor/bin/pest tests/Feature/GitConflictTest.php

# Verifica PHPStan per i file PHP
echo "🔍 Verifica PHPStan..."
find . -type f -name "*.php" -not -path "*/vendor/*" -not -path "*/node_modules/*" | while read -r file; do
    if [ -f "$file" ]; then
        ./vendor/bin/phpstan analyse "$file"
    fi
done

echo "✅ Processo completato!" 