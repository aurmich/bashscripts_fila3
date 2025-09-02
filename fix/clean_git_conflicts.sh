#!/bin/bash

# Script to clean all git conflict markers from files
# Keeps the current version (HEAD) and removes all conflict markers
# Location: bashscripts/fix/clean_git_conflicts.sh

echo "🔍 Searching for files with git conflict markers in Laravel project..."

# Change to Laravel directory
cd "$(dirname "$0")/../../laravel" || exit 1

# Find all files with conflict markers (excluding vendor and node_modules)
FILES=$(grep -rl "^<<<<<<< HEAD\|^=======\|^>>>>>>> " . --include="*.php" --include="*.md" --include="*.txt" --include="*.json" --exclude-dir=vendor --exclude-dir=node_modules 2>/dev/null)

if [ -z "$FILES" ]; then
    echo "✅ No conflict markers found!"
    exit 0
fi

echo "📝 Files with conflict markers:"
echo "$FILES"
echo ""

# Process each file
for file in $FILES; do
    echo "🔧 Processing: $file"
    
    # Create backup
    cp "$file" "$file.backup"
    
    # Remove conflict markers while keeping current version (HEAD)
    # This sed command:
    # 1. Removes lines starting with <<<<<<< HEAD
    # 2. Removes lines starting with =======
    # 3. Removes lines starting with >>>>>>> 
    sed -i '/^<<<<<<< HEAD/d; /^=======/d; /^>>>>>>> /d' "$file"
    
    # Remove excessive blank lines (more than 2 consecutive)
    sed -i '/^$/N;/^\n$/d' "$file"
    
    echo "✅ Cleaned: $file"
done

echo ""
echo "🎉 All conflict markers cleaned!"
echo "📦 Backups created with .backup extension"
echo ""
echo "🔍 Verification - searching for remaining conflict markers..."
REMAINING=$(grep -rl "^<<<<<<< HEAD\|^=======\|^>>>>>>> " . --include="*.php" --include="*.md" --include="*.txt" --include="*.json" --exclude-dir=vendor --exclude-dir=node_modules 2>/dev/null)

if [ -z "$REMAINING" ]; then
    echo "✅ All conflict markers successfully removed!"
else
    echo "⚠️  Some conflict markers might still exist in:"
    echo "$REMAINING"
fi
