#!/bin/bash

# Script per aggiornare i file .gitignore in tutti i moduli
# Da eseguire dalla directory laravel/Modules

# Verifica che il template esista
if [ ! -f ".gitignore-template" ]; then
  echo "File template .gitignore-template non trovato!"
  exit 1
fi

# Trova tutti i moduli (directory)
for MODULE_DIR in */; do
  MODULE_NAME=${MODULE_DIR%/}

  echo "Aggiornamento .gitignore per modulo $MODULE_NAME..."

  # Se il modulo ha già un .gitignore, verifica se contiene '*.log'
  if [ -f "$MODULE_NAME/.gitignore" ]; then
    # Verifica se il file .gitignore contiene già *.log
    if ! grep -q "^\*\.log$" "$MODULE_NAME/.gitignore"; then
      echo "Aggiunta regola '*.log' al file .gitignore esistente in $MODULE_NAME"
      # Aggiungi *.log nella sezione appropriata o alla fine del file
      if grep -q "# File di log" "$MODULE_NAME/.gitignore"; then
        # Inserisci dopo la sezione esistente
        sed -i '/# File di log/a *.log' "$MODULE_NAME/.gitignore"
      else
        # Aggiungi alla fine con intestazione
        echo -e "\n# File di log\n*.log" >> "$MODULE_NAME/.gitignore"
      fi
    else
      echo "Il file .gitignore di $MODULE_NAME già contiene '*.log'"
    fi
  else
    # Copia il template se il file .gitignore non esiste
    echo "Creazione nuovo .gitignore per $MODULE_NAME"
    cp ".gitignore-template" "$MODULE_NAME/.gitignore"
  fi
done

echo "Aggiornamento completato di tutti i file .gitignore nei moduli."
