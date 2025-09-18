#!/bin/bash

# Script per risolvere automaticamente i conflitti PHP rimanenti
echo "🔧 Risoluzione automatica conflitti PHP..."

# Trova tutti i file PHP con conflitti rimanenti
php_files_with_conflicts=$(find /var/www/html/_bases/base_techplanner_fila3_mono/laravel -name "*.php" -exec grep -l "<<<<<<< HEAD" {} \;)

if [ -z "$php_files_with_conflicts" ]; then
    echo "✅ Nessun conflitto PHP trovato!"
    exit 0
fi

echo "📊 File PHP con conflitti trovati:"
echo "$php_files_with_conflicts"

# Processo ogni file PHP
for file in $php_files_with_conflicts; do
    echo "🔍 Processo: $file"
    
    # Backup del file
    cp "$file" "$file.backup"
    
    # Rimuovi marcatori di conflitto
    sed -i '/^<<<<<<< HEAD$/d' "$file"
    sed -i '/^=======$/d' "$file"
    sed -i '/^>>>>>>> [a-z0-9]*.*$/d' "$file"
    
    # Rimuovi import duplicati
    sed -i '/^use .*$/s/use \(.*\);use \1;/use \1;/' "$file"
    
    # Rimuovi linee duplicate di import
    awk '!seen[$0]++ || !/^use /' "$file" > "$file.tmp" && mv "$file.tmp" "$file"
    
    # Controlla la sintassi PHP
    if php -l "$file" > /dev/null 2>&1; then
        echo "✅ Sintassi OK: $file"
        rm "$file.backup"
    else
        echo "❌ Errore sintassi: $file - Ripristino backup"
        mv "$file.backup" "$file"
    fi
done

echo "🎉 Risoluzione conflitti PHP completata!"

# Verifica finale
remaining_conflicts=$(find /var/www/html/_bases/base_techplanner_fila3_mono/laravel -name "*.php" -exec grep -l "<<<<<<< HEAD" {} \; | wc -l)
echo "📈 Conflitti PHP rimanenti: $remaining_conflicts"